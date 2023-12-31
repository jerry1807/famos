<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;

class InstagramController extends Controller
{
    protected $facebook; // You can continue using the Facebook SDK since Instagram uses Facebook App ID and Secret.

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'), // Use your Instagram App ID
            'app_secret' => env('FACEBOOK_APP_SECRET'), // Use your Instagram App Secret
            'default_graph_version' => 'v14.1', // Use the appropriate Graph API version
        ]);
    }

    public function redirectToInstagram()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = ['user_profile']; // Specify the required Instagram permissions
        $callbackUrl = route('instagram.callback');

        // Generate a random 'state' parameter
        $state = \Illuminate\Support\Str::random(40);

        // Store the 'state' parameter in the session for later verification
        session(['instagram_state' => $state]);

        // Construct the base URL
        $baseUrl = $helper->getLoginUrl($callbackUrl, $permissions);

        // Append the 'state' parameter manually
        $urlWithState = $baseUrl . '&state=' . $state;

        // Redirect to the constructed URL
        return redirect()->away($urlWithState);
    }

    public function handleInstagramCallback(Request $request)
    {
        // Initialize Facebook SDK's redirect login helper
        $helper = $this->facebook->getRedirectLoginHelper();

        // Retrieve the 'state' parameter from the session
        $storedState = session('instagram_state');

        try {
            // Get the access token
            $accessToken = $helper->getAccessToken();

            // Verify that the 'state' parameter matches the stored 'state'
            if ($request->input('state') !== $storedState) {
                throw new \Exception('Invalid state parameter');
            }

            // Access token is valid, make Instagram Graph API requests
            $response = $this->facebook->get('/me', $accessToken);
            $user = $response->getGraphUser();

            // Save the access token into your database or perform any other logic
            // You can use the $accessToken->getValue() method to get the access token value

            // Continue with your Instagram callback logic

        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // Handle Instagram API errors, e.g., if the user denied permissions
            return redirect()->route('login')->withErrors(['error' => 'Instagram API error: ' . $e->getMessage()]);
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // Handle SDK errors
            return redirect()->route('login')->withErrors(['error' => 'Instagram SDK error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Handle other exceptions, including CSRF validation failure
            return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
        }

        // Clear the 'state' parameter from the session after successful validation
        session()->forget('instagram_state');
    }



    public function createFacebookPost(Request $request)
{
    $accessToken = $request->input('access_token'); // Retrieve the user's access token
    $message = $request->input('message'); // Get the message from the request

    try {
        // Make a POST request to Facebook's Graph API to create a post
        $response = $this->facebook->post('/me/feed', [
            'message' => $message,
        ], $accessToken);

        // Check if the request was successful
        if ($response->isSuccess()) {
            // Post created successfully
            return response()->json(['message' => 'Post created successfully']);
        } else {
            // Handle the error
            return response()->json(['error' => 'Failed to create the post'], 500);
        }
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        // Handle SDK errors
        return response()->json(['error' => 'Facebook SDK error: ' . $e->getMessage()], 500);
    }
}





}
