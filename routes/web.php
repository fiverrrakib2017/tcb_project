<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BeneficiriesController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\UpzilaController;
use App\Http\Controllers\Backend\userController;
use App\Http\Controllers\Backend\zilaController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/admin/login',[LoginController::class,'index'])->name('admin.login');
Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');





Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('is_admin');
/* Division Route*/
Route::get('/admin/division/list',[DivisionController::class,'index'])->name('admin.division.list')->middleware('is_admin');


/* Zila Route*/
Route::get('/admin/zila/list',[zilaController::class,'index'])->name('admin.zila.list')->middleware('is_admin');
Route::post('/admin/zila/add',[zilaController::class,'store'])->name('admin.zila.store')->middleware('is_admin');
Route::get('/admin/zila/delete/{id}',[zilaController::class,'delete'])->name('admin.zila.delete')->middleware('is_admin');
Route::get('/admin/zila/edit/{id}',[zilaController::class,'edit'])->name('admin.zila.edit')->middleware('is_admin');
Route::post('/admin/zila/update/',[zilaController::class,'update'])->name('admin.zila.update')->middleware('is_admin');
/* Get Zila with ajax request */
Route::get('/get-zilas/{division_id}', [zilaController::class,'get_zila'])->middleware('is_admin');


/* Upzila Route*/
Route::get('/admin/upzila/list',[UpzilaController::class,'index'])->name('admin.upzila.list')->middleware('is_admin');
Route::post('/admin/upzila/add',[UpzilaController::class,'store'])->name('admin.upzila.store')->middleware('is_admin');
Route::get('/admin/upzila/delete/{id}',[UpzilaController::class,'delete'])->name('admin.upzila.delete')->middleware('is_admin');
Route::get('/admin/upzila/edit/{id}',[UpzilaController::class,'edit'])->name('admin.upzila.edit')->middleware('is_admin');
Route::post('/admin/upzila/update/',[UpzilaController::class,'update'])->name('admin.upzila.update')->middleware('is_admin');
/* Get upZila with ajax request */
Route::get('/get-upzila/{zilaId}', [UpzilaController::class,'get_upzila'])->middleware('is_admin');



/* Union Route*/
Route::get('/admin/union/list',[UnionController::class,'index'])->name('admin.union.list')->middleware('is_admin');
Route::post('/admin/union/add',[UnionController::class,'store'])->name('admin.union.store')->middleware('is_admin');
Route::get('/admin/union/delete/{id}',[UnionController::class,'delete'])->name('admin.union.delete')->middleware('is_admin');
Route::get('/admin/union/edit/{id}',[UnionController::class,'edit'])->name('admin.union.edit')->middleware('is_admin');
Route::post('/admin/union/update/',[UnionController::class,'update'])->name('admin.union.update')->middleware('is_admin');
/* Get Union with ajax request */
Route::get('/get-union/{Id}', [UnionController::class,'get_union'])->middleware('is_admin');

/* Beneficiries Route*/
Route::get('/admin/beneficiries/list',[BeneficiriesController::class,'index'])->name('admin.beneficiries.list')->middleware('is_admin');
Route::get('/admin/beneficiries/add',[BeneficiriesController::class,'add'])->name('admin.beneficiries.add')->middleware('is_admin');
Route::post('/admin/beneficiries/store',[BeneficiriesController::class,'store'])->name('admin.beneficiries.store')->middleware('is_admin');
Route::get('/admin/beneficiries/edit/{id}',[BeneficiriesController::class,'edit'])->name('admin.beneficiries.edit')->middleware('is_admin');
Route::post('/admin/beneficiries/update',[BeneficiriesController::class,'update'])->name('admin.beneficiries.update')->middleware('is_admin');
Route::get('/admin/beneficiries/delete/{id}',[BeneficiriesController::class,'delete'])->name('admin.beneficiries.delete')->middleware('is_admin');

/* Stock Route*/
Route::get('/admin/stock/list',[StockController::class,'index'])->name('admin.stock.list')->middleware('is_admin');
Route::post('/admin/stock/store',[StockController::class,'store'])->name('admin.stock.store')->middleware('is_admin');
Route::get('/admin/stock/edit/{id}',[StockController::class,'edit'])->name('admin.stock.edit')->middleware('is_admin');
Route::post('/admin/stock/update',[StockController::class,'update'])->name('admin.stock.update')->middleware('is_admin');
Route::get('/admin/stock/delete/{id}',[StockController::class,'delete'])->name('admin.stock.delete')->middleware('is_admin');

/* Users Route*/
Route::get('/admin/users/list',[userController::class,'index'])->name('admin.users.list')->middleware('is_admin');
Route::get('/admin/users/edit/{id}',[userController::class,'edit'])->name('admin.user.edit')->middleware('is_admin');
Route::get('/admin/users/delete/{id}',[userController::class,'delete'])->name('admin.user.delete')->middleware('is_admin');




Auth::routes();

