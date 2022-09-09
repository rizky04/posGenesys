<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionControllerBeli;
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
    return view('auth.login');

});

Route::resource('barang', BarangController::class);
Route::resource('transaction', TransactionController::class);
Route::resource('transactionBeli', TransactionControllerBeli::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
