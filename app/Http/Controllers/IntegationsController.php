<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntgationsController extends Controller
{
    public function index()
    {

        return view('user.integations.index');
    }
}
