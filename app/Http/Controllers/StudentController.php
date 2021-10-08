<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    function index()
    {
        # code...
        $student=Student::orderBy('id','DESC')->get();
        return view('students',compact('student'));
    }
    public function addstudent(Request $request)
    {
       $stu = new Student();
       $stu->firstname=$request->firstname;
       $stu->lastname=$request->lastname;
       $stu->email=$request->email;
       $stu->phone=$request->phone;
       $stu->save();
       return response()->json($stu);
  
     }
     public function geteditstudent($id)
     {
        $stu =Student::find($id);
       
        return response()->json($stu);
     
      }
      public function update(Request $request)
      {
        $stu =Student::find($request->id);
         $stu->firstname=$request->firstname;
         $stu->lastname=$request->lastname;
         $stu->email=$request->email;
         $stu->phone=$request->phone;
         $stu->save();
         return response()->json($stu);
    
       }

       public function deleteStu($id)
       {
           # code...
           $stu=Student::find($id);
           $stu->delete();
           return response()->json(["success"=>"record deleted"]);
       }
}
