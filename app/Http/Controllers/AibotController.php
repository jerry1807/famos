<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AibotController extends Controller
{
    public function index()
    {
        return view('user.aibots.index'); // Load the corresponding view
    }
}
