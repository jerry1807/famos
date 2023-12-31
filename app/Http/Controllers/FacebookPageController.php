<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;

class FacebookPageController extends Controller
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v14.1',
        ]);
    }

    public function redirectToFacebook()
        {
            $helper = $this->facebook->getRedirectLoginHelper();
            $permissions = ['email', 'pages_show_list', 'pages_manage_cta'];
            $callbackUrl = route('facebook.callback');

            // Generate a random 'state' parameter
            $state = \Illuminate\Support\Str::random(40);

            // Store the 'state' parameter in the session for later verification
            session(['facebook_state' => $state]);

            // Construct the base URL
            $baseUrl = $helper->getLoginUrl($callbackUrl, $permissions);

            // Append the 'state' parameter manually
            $urlWithState = $baseUrl . '&state=' . $state;

            // Redirect to the constructed URL
            return redirect()->away($urlWithState);
        }




    
    public function handleFacebookCallback(Request $request)
    {
        // Initialize Facebook SDK's redirect login helper
        $helper = $this->facebook->getRedirectLoginHelper();

        // Retrieve the 'state' parameter from the session
        $storedState = session('facebook_state');

        try {
            // Get the access token
            $accessToken = $helper->getAccessToken();

            // Verify that the 'state' parameter matches the stored 'state'
            if ($request->input('state') !== $storedState) {
                throw new \Exception('Invalid state parameter');
            }

            // Access token is valid, make Facebook API requests
            $response = $this->facebook->get('/me?fields=id,name,email', $accessToken);
            $user = $response->getGraphUser();

            // Save the access token into the 'facebook_page_sessions' table
            $pageSession = new \App\Models\FacebookPageSession();
            $pageSession->page_id = $user->getId();
            $pageSession->user_id = \Illuminate\Support\Facades\Auth::id();
            $pageSession->access_token = $accessToken->getToken();
            $pageSession->page_name = $user->getName();
            $pageSession->page_avatar_url = ''; // You can set the avatar URL here if needed
            $pageSession->token_expiration = $accessToken->getExpiresAt()->format('Y-m-d H:i:s');
            $pageSession->permissions = implode(',', $accessToken->getPermissions());
            $pageSession->last_updated = now();
            $pageSession->save();

            // Continue with your Facebook callback logic

        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // Handle Facebook API errors, e.g., if the user denied permissions
            return redirect()->route('login')->withErrors(['error' => 'Facebook API error: ' . $e->getMessage()]);
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // Handle SDK errors
            return redirect()->route('login')->withErrors(['error' => 'Facebook SDK error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Handle other exceptions, including CSRF validation failure
            return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
        }

        // Clear the 'state' parameter from the session after successful validation
        session()->forget('facebook_state');
    }
}
