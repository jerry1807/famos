<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AiProfileController extends Controller
{
    public function index()
    {
            // Dummy data for demonstration purposes
    $aboutMeData = "Enter your Preferences for the AI to Analyse about You.";
    $familyData = "Enter your Preferences for the AI to Analyse about You.";
    $travelPreferencesData = "Enter your Preferences for the AI to Analyse about You.";

    return view('user.aiprofile.index', compact('aboutMeData', 'familyData', 'travelPreferencesData'));

    }


}
