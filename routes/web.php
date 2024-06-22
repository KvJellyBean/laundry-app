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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/about', [LandingController::class, 'about'])->name('about');
Route::get('/services', [LandingController::class, 'services'])->name('services');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

Route::get('/signin', function () {
    return redirect('/admin');
});

Route::get('/get-started', function () {
    return redirect('/admin');
})->name('get-started');

Route::get('/learn-more', function () {
    return redirect('/services');
})->name('learn-more');

Route::get('/cuci', function () {
    return redirect('/admin');
})->name('cuci');

Route::get('/setrika', function () {
    return redirect('/admin');
})->name('setrika');

Route::get('/cuci-komplit', function () {
    return redirect('/admin');
})->name('cuci-komplit');

Route::get('/{record}/invoice', [DownloadInvoiceController::class, 'download'])->name('order.invoice');




