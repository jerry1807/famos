<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;

class GoogleCalendarController extends Controller
{
    public function connect()
    {
        // Create a new Google Client
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('secrets/client_secret.json'));
        $client->setRedirectUri(url('/google-calendar/callback'));

        // Set the scopes for the Calendar API
        $client->setScopes([Google_Service_Calendar::CALENDAR]);

        // Generate the OAuth consent URL
        $authUrl = $client->createAuthUrl();

        return view('user.google-calendar.connect', ['authUrl' => $authUrl]);
    }

    public function callback(Request $request)
    {
        // Create a new Google Client
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('secrets/client_secret.json'));
        $client->setRedirectUri(url('/google-calendar/callback'));

        // Set the scopes for the Calendar API
        $client->setScopes([Google_Service_Calendar::CALENDAR]);

        if ($request->has('code')) {
            // Handle the authorization code from Google and exchange it for an access token
            $client->fetchAccessTokenWithAuthCode($request->input('code'));
            
            // You can now use $client to interact with the Google Calendar API
            $calendarService = new Google_Service_Calendar($client);

            // Example: List upcoming events
            $events = $calendarService->events->list('primary', ['maxResults' => 10]);
            $calendarEvents = $events->getItems();

            return view('google-calendar.callback', ['calendarEvents' => $calendarEvents]);
        }

        return redirect('/google-calendar/connect')->with('error', 'Google Calendar connection failed.');
    }
}
