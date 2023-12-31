<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Aifileupload;
use App\Models\Workbook;

class AllFilesController extends Controller
    {
        public function index()
        {
            $files = Aifileupload::where('user_id', auth()->user()->id)->get();
            return view('user.aifiles.allfiles', compact('files'));
        }

        
    }