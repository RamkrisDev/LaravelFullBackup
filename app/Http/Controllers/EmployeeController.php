<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use Excel;
class EmployeeController extends Controller
{
    //




    public function importForm()
    {
       return view('importform');
    }

    public function importt(Request $request)
    {
        # code...
        Excel::import(new EmployeeImport,$request->file);
        return "imported successfuylly";
    }
}
