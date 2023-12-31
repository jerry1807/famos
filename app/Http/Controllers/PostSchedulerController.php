<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostSchedulerController extends Controller
{
    public function index()
    {

        return view('user.postscheduler.index');
    }
}
