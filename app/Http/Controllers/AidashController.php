<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AidashController extends Controller
{
    public function index()
    {

        return view('user.dashwidgets.index');
    }
}
