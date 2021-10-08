<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   
    public function addProduct()
    {
       $products=[
           ["name"=>"phone"],
           ["name"=>"laptop"],
           ["name"=>"watch"],
           ["name"=>"pen"],
           ["name"=>"pencil"],
           ["name"=>"Freezer"],
       ];
       Product::insert($products);
       return "Product Added";
    }

    public function search()
    {
       return view('search');
    }

    public function autocomplete(Request $request)
    {
       $datas=Product::select('name')->where("name","LIKE","%{$request->terms}%")->get();
                    return response()->json($datas);
    }

}
