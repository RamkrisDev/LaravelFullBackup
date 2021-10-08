<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function addImage()
    {
        return view('addimage');
    }
    public function store(Request $request)
    {
        # code...
        $name=$request->name;
        $img=$request->file('file');
        $imgname=time().'.'.$img->extension();
        
        
        $img->move(public_path('images'),$imgname);
        $image=new Image();
        $image->name=$name;
        $image->profilepic=$imgname;
        $image->save();

        return back()->with('image','Student record Inserted');
    }
    public function allShow()
    {

        $data=Image::all();
      return view("allview",compact('data'));
    }
}
