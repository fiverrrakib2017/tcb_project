<?php

use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\zilaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Frontend.Pages.Home');
});

Route::get('/login',function(){
    return view('Backend.Auth.Login');
});

Route::get('/admin/dashboard',function(){
    return view('Backend.Pages.Dashboard');
});

Route::get('/admin/beneficiary',function(){
    return view('Backend.Pages.Beneficiary.index');
});

/* Division Route*/
Route::get('/admin/division/list',[DivisionController::class,'index'])->name('admin.division.list');


/* Zila Route*/
Route::get('/admin/zila/list',[zilaController::class,'index'])->name('admin.zila.list');
Route::post('/admin/zila/add',[zilaController::class,'store'])->name('admin.zila.store');
Route::get('/admin/zila/delete/{id}',[zilaController::class,'delete'])->name('admin.zila.delete');
Route::get('/admin/zila/edit/{id}',[zilaController::class,'edit'])->name('admin.zila.edit');
Route::post('/admin/zila/update/',[zilaController::class,'update'])->name('admin.zila.update');
