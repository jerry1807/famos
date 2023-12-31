<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyintegationsController extends Controller
{
    public function index()
    {
        return view('user.integations.index'); // Load the corresponding view
    }
}
