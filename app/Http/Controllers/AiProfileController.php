<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AiProfileController extends Controller
{
    public function index()
    {
            // Dummy data for demonstration purposes
    $aboutMeData = "Enter your Detials for the AI to Analyse about You.";
    $familyData = "Enter your Travel Preferences for the AI to Analyse about You.";
    $travelPreferencesData = "Enter data about your family preferences for the AI to Analyse about You.";

    return view('user.aiprofile.index', compact('aboutMeData', 'familyData', 'travelPreferencesData'));

    }


}
