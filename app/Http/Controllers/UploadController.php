<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
  
    public function uploadfile()
    {
       return view('upload');
    }
    public function upp(Request $request)
    {
      $request->file->store('public');
      return "uploaded";
    }
}
