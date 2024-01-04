<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AiProfileController extends Controller
{
    public function index()
    {
        return view('user.aiprofile.index');
    }
}
