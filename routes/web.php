<?php

use App\Http\Controllers\DownloadInvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/services', [LandingController::class, 'services'])->name('services');
Route::get('/signin', function () {
    return redirect('/dashboard/login');
})->name('signin');

Route::get('/signup', function () {
    return redirect('/dashboard/register');
})->name('signup');

Route::get('/{record}/invoice', [DownloadInvoiceController::class, 'download'])->name('order.invoice');

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');