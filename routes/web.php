<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;
use App\Http\Controllers\QueryController;
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
    return view('product');
})->name('product');
Route::get('/receipt', function () {
    return view('receipt');
})->name('receipt');
Route::post('addProduct',[AddController::class,'addProduct'])->name('addProduct');
Route::post('queryProduct',[QueryController::class,'queryProduct']);

Route::post('addReceipt',[AddController::class,'addReceipt']);
