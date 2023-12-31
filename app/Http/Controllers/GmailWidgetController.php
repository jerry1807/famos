<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Gmail;
use Google_Service_PeopleService;
use App\Models\AccessToken;
use App\Models\EmailPull;
use Illuminate\Support\Facades\Http;

class GmailWidgetController extends Controller
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId(config('services.google.client_id'));
        $this->googleClient->setClientSecret(config('services.google.client_secret'));
        $this->googleClient->setRedirectUri(config('services.google.redirect'));
        $this->googleClient->setScopes([
            'https://www.googleapis.com/auth/gmail.readonly',
            'https://www.googleapis.com/auth/contacts.readonly',
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email',
        ]);
    }

    public function index()
    {
        $gmailAccountDetails = $this->getGmailAccountDetails();

        return view('user.email.index', ['gmailAccountDetails' => $gmailAccountDetails]);
        }

    public function connect()
    {
        return redirect()->away($this->googleClient->createAuthUrl());
    }

    public function handleGoogleCallback(Request $request)
    {
        if (!$request->has('code')) {
            return response()->json(['error' => 'Google authentication failed.']);
        }
    
        $this->googleClient->authenticate($request->code);
        $accessToken = $this->googleClient->getAccessToken();
        $gmailAccessToken = $accessToken['access_token'] ?? null;
    
        if (!$gmailAccessToken) {
            return response()->json(['error' => 'Failed to obtain Gmail access token.']);
        }
    
        $profile = $this->getUserProfile();
    
        $user = auth()->user();
    
        // Create a new AccessToken record in the database
        AccessToken::create([
            'token' => $gmailAccessToken,
            'user_id' => $user->id,
            'type' => 'gmail',
            'profile_url' => $profile['profileUrl'],
            'account_name' => $profile['displayName'],
            'account_id' => $profile['gaiaId'],
            'account_email' => $profile['email'],
        ]);
    
        return response()->json([
            'access_token' => $gmailAccessToken,
            'profile_url' => $profile['profileUrl'],
            'profile_name' => $profile['displayName'],
            'account_id' => $profile['gaiaId'],
            'account_email' => $profile['email'],
        ]);
    }
    
    public function getGmailAccountDetails()
    {
        $user = auth()->user();
        
        // Retrieve the Gmail account details for the user
        $gmailAccount = AccessToken::where('user_id', $user->id)
            ->where('type', 'gmail')
            ->first();
        
        if ($gmailAccount) {
            return response()->json([
                'accountName' => $gmailAccount->account_name,
                'accountEmail' => $gmailAccount->account_email,
                'profileUrl' => $gmailAccount->profile_url,
            ]);
        } else {
            return response()->json([
                'error' => 'Gmail account details not found.',
            ]);
        }
    }
       public function sendEmail(Request $request)
    {
        // Get the authenticated user (you may need to modify this based on your authentication logic)
        $user = auth()->user();

        // Fetch the Gmail account details from the database
        $gmailAccount = $this->getGmailAccount($user->id);

        if (!$gmailAccount || empty($gmailAccount->token)) {
            return response()->json(['error' => 'Gmail account not found or missing access token.']);
        }

        // Define the Gmail API endpoint for sending emails
        $sendEmailEndpoint = 'https://www.googleapis.com/gmail/v1/users/me/messages/send';

        // Create an email message using the Gmail API format
        $emailMessage = [
            'raw' => base64_encode($this->createEmail($request->to, $request->subject, $request->message)),
        ];

        // Send the email using Gmail's API
        $response = Http::withToken($gmailAccount->token)->post($sendEmailEndpoint, $emailMessage);

        if ($response->successful()) {
            return response()->json(['message' => 'Email sent successfully.']);
        } else {
            return response()->json(['error' => 'Failed to send email.']);
        }
    }

    public function fetchNewEmails(Request $request)
    {
        $user = auth()->user();
        $accessToken = $this->getAccessToken($user->id);
    
        if (!$accessToken) {
            return response()->json(['error' => 'Access token not found for the user'], 404);
        }
    
        // Create a Google API client instance
        $client = $this->createGoogleClient();
    
        // Set the Gmail access token
        $client->setAccessToken($accessToken->token);
    
        // Create a Gmail service instance
        $gmailService = new Google_Service_Gmail($client);
    
        $sinceDate = $request->input('since_date');
        $searchQuery = "is:unread after:$sinceDate";
        $messages = $this->listUnreadMessages($gmailService, 'me', $searchQuery, 10);
    
        $emails = $this->extractEmailData($gmailService, $messages);
    
        // Save the new emails to the EmailPull model
        foreach ($emails as $emailData) {
            EmailPull::create([
                'access_token_id' => $accessToken->id,
                'user_id' => $user->id,
                'data' => json_encode($emailData),
            ]);
        }
    
        return response()->json(['new_emails' => $emails]);
    }
    
    private function getUserProfile()
    {
        $peopleService = new Google_Service_PeopleService($this->googleClient);

        $profile = $peopleService->people->get('people/me', [
            'personFields' => 'urls,names,emailAddresses,metadata',
        ]);

        $profileUrl = null;
        $profileUrls = $profile->getUrls();
        foreach ($profileUrls as $url) {
            if ($url->metadata->source->type === 'PROFILE' && $url->metadata->source->id === 'g') {
                $profileUrl = $url->value;
                break;
            }
        }

        $names = $profile->getNames();
        $displayName = count($names) > 0 ? $names[0]->getDisplayName() : '';
        $gaiaId = $profile->getMetadata()->getSources()[0]->getId();
        $email = $profile->getEmailAddresses()[0]->getValue() ?? '';

        return [
            'profileUrl' => $profileUrl,
            'displayName' => $displayName,
            'gaiaId' => $gaiaId,
            'email' => $email,
        ];
    }

    private function getGmailAccount($userId)
    {
        return AccessToken::where('user_id', $userId)
            ->where('type', 'gmail')
            ->first();
    }

    private function createEmail($to, $subject, $message)
    {
        $email = new \Google_Service_Gmail_Message();
        $email->setRaw($this->createMessage($to, $subject, $message));

        return $email->toArray();
    }

    private function createMessage($to, $subject, $message)
    {
        $boundary = uniqid(rand(), true);
        $subject = '=?utf-8?B?' . base64_encode($subject) . '?=';

        $message = wordwrap($message, 70, "\r\n");
        $message = base64_encode($message);

        $rawMessage =
            "MIME-Version: 1.0\r\n" .
            "To: $to\r\n" .
            "Subject: $subject\r\n" .
            "Content-Type: text/plain; charset=utf-8\r\n" .
            "Content-Transfer-Encoding: base64\r\n\r\n" .
            "$message\r\n";

        return $rawMessage;
    }

    private function getAccessToken($userId)
    {
        return AccessToken::where('user_id', $userId)
            ->where('type', 'gmail')
            ->first();
    }

    private function createGoogleClient()
    {
        $client = new Google_Client();

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->setScopes([
            'https://www.googleapis.com/auth/gmail.readonly',
        ]);

        return $client;
    }

    private function listUnreadMessages($service, $userId, $query, $maxResults)
    {
        return $service->users_messages->listUsersMessages($userId, [
            'q' => $query,
            'maxResults' => $maxResults,
        ]);
    }

    private function extractEmailData($service, $messages)
    {
        $emails = [];

        foreach ($messages as $message) {
            $email = $service->users_messages->get('me', $message->getId());

            $subject = '';
            $sender = '';
            $date = '';

            foreach ($email->getPayload()->getHeaders() as $header) {
                if ($header->name == 'Subject') {
                    $subject = $header->value;
                } elseif ($header->name == 'From') {
                    $sender = $header->value;
                } elseif ($header->name == 'Date') {
                    $date = $header->value;
                }
            }

            $emails[] = [
                'subject' => $subject,
                'sender' => $sender,
                'date' => $date,
            ];
        }

        return $emails;
    }
}
