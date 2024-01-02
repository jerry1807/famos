<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Aifileupload;
use App\Models\Workbook;

class AiFilesController extends Controller
{
    public function index()
    {
        $projects = Workbook::where('user_id', auth()->user()->id)->get();
        return view('user.aifiles.index');
    }

  


public function uploadFile(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpeg,png,pdf,mov,avi,docx|max:10000',
        'scannable_by_ai' => 'required|in:yes,no',
        'description' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('file')) {
        $userid = auth()->user()->id; // Get it from Davinci DB
        $s3_path = "aifiles/" . $userid;
        $file = $request->file('file');
        $scannableByAI = $request->input('scannable_by_ai');

        if ($scannableByAI=='yes') {
            $s3_path .= "/scannable/";
        } else {
            $s3_path .= "/nonscannable/";
        }

        $description = $request->input('description');

        // Store the file in the S3 bucket
        $path = Storage::disk('s3')->put($s3_path, $file, 'public');

        // Create a new Aifileupload record and save it to the database
        $aifileupload = new Aifileupload();
        $aifileupload->name = $request->input('name'); // You should add a 'name' field in your form
        $aifileupload->description = $description;
        $aifileupload->file_path = $path;
        $aifileupload->ai_details = $scannableByAI;
        
        // Set the S3 path without the full URL
        $aifileupload->s3_path = $s3_path;
        
        // Concatenate the S3 path with the S3 base URL to get the full URL
        $aifileupload->s3_url = 'https://davinci-famos.s3.amazonaws.com/' . $s3_path;
        
        $aifileupload->user_id = auth()->user()->id; // Assuming you want to associate the upload with the logged-in user
        $aifileupload->save();

        return back()->with('success', 'File uploaded successfully.');
    }

    return back()->with('error', 'File upload failed.');
}
}