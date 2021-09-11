<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\login;
use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Mail;

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



//login/logout
Route::get('/login', [App\Http\Controllers\login::class, 'index'])->name('login_index');
Route::get('/logout', [App\Http\Controllers\login::class, 'logout'])->name('logout');
Route::post('/login', [App\Http\Controllers\login::class, 'store'])->name('login_post');
//end login/logout


//create a bill
Route::get('/CreateBill', [App\Http\Controllers\BillController::class, 'Create'])->name('CreateBill');
Route::post("/save-bill",[BillController::class, "Storing"]);
//end create a bill

// show bill
Route::get('/ShowBill', [App\Http\Controllers\BillController::class, 'show_bill'])->name('ShowBill');
Route::get('/DetailBill/{id}', [App\Http\Controllers\BillController::class, 'detail_bill'])->name('Detail_bill');

Route::get('/PrntBill/{id}', [App\Http\Controllers\BillController::class, 'PrintB'])->name('Print_bill');
Route::get('/WordBill/{id}', [App\Http\Controllers\BillController::class, 'WordB'])->name('Word_bill');