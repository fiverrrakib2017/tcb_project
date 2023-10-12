<?php

use App\Http\Controllers\Backend\BeneficiriesController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\UpzilaController;
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
/* Get Zila with ajax request */
Route::get('/get-zilas/{division_id}', [zilaController::class,'get_zila']);


/* Upzila Route*/
Route::get('/admin/upzila/list',[UpzilaController::class,'index'])->name('admin.upzila.list');
Route::post('/admin/upzila/add',[UpzilaController::class,'store'])->name('admin.upzila.store');
Route::get('/admin/upzila/delete/{id}',[UpzilaController::class,'delete'])->name('admin.upzila.delete');
Route::get('/admin/upzila/edit/{id}',[UpzilaController::class,'edit'])->name('admin.upzila.edit');
Route::post('/admin/upzila/update/',[UpzilaController::class,'update'])->name('admin.upzila.update');
/* Get upZila with ajax request */
Route::get('/get-upzila/{zilaId}', [UpzilaController::class,'get_upzila']);



/* Union Route*/
Route::get('/admin/union/list',[UnionController::class,'index'])->name('admin.union.list');
Route::post('/admin/union/add',[UnionController::class,'store'])->name('admin.union.store');
Route::get('/admin/union/delete/{id}',[UnionController::class,'delete'])->name('admin.union.delete');
Route::get('/admin/union/edit/{id}',[UnionController::class,'edit'])->name('admin.union.edit');
Route::post('/admin/union/update/',[UnionController::class,'update'])->name('admin.union.update');


/* Beneficiries Route*/
Route::get('/admin/beneficiries/list',[BeneficiriesController::class,'index'])->name('admin.beneficiries.list');
Route::get('/admin/beneficiries/add',[BeneficiriesController::class,'add'])->name('admin.beneficiries.add');
Route::post('/admin/beneficiries/store',[BeneficiriesController::class,'store'])->name('admin.beneficiries.store');

