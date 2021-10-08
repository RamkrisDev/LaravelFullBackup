<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\EmployeeController;
Route::get('import',[EmployeeController::class,'importForm']);
Route::post('importto',[EmployeeController::class,'importt']);


use App\Http\Controllers\StudentController;
Route::get("stu",[StudentController::class,'index']);
Route::post("/addstu",[StudentController::class,'addstudent'])->name('stu.add');
Route::get("getedit/{id}",[StudentController::class,'geteditstudent'])->name('stu.getedit');
Route::put("upd",[StudentController::class,'update'])->name('stu.upd');
Route::delete("del/{id}",[StudentController::class,'deleteStu'])->name('stu.Del');


//upload

use App\Http\Controllers\UploadController;
Route::get('upload',[UploadController::class,'uploadfile']);
Route::post('up',[UploadController::class,'upp']);

use App\Http\Controllers\ImageController;
Route::get('img',[ImageController::class,'addImage']);
Route::post('imgup',[ImageController::class,'store']);
Route::get('allimg',[ImageController::class,'allshow']);


use App\Http\Controllers\ProductController;
Route::get('addpro',[ProductController::class,'addProduct']);
Route::get('search',[ProductController::class,'search']);
Route::get('getPro',[ProductController::class,'autocomplete'])->name('pro.get');



//loadmore
use App\Http\Controllers\PostController;
Route::get('posts',[PostController::class,'index']);


