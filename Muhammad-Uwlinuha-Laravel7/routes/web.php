<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/rowten', [App\Http\Controllers\CustomerController::class, 'getrowten'])->name('rowten');
Route::get('/az', [App\Http\Controllers\CustomerController::class, 'getaz'])->name('az');
Route::post('/search', [App\Http\Controllers\CustomerController::class, 'searchcustomer'])->name('search');
Route::post('/searchdate', [App\Http\Controllers\CustomerController::class, 'getdate'])->name('searchdate');

Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'profile'])->name('myprofile');


// Route::resource('/customer', CustomerController::class);
Route::resource('customer', 'CustomerController');

// Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store']);


