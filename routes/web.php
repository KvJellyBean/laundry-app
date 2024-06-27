<?php

use App\Http\Controllers\DownloadInvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Semua rute ini
| akan dimuat oleh RouteServiceProvider dan semuanya akan ditugaskan ke grup middleware "web".
| Buat sesuatu yang hebat!
|
*/

Route::get('/', [LandingController::class, 'home'])->name('home'); // Rute untuk halaman utama
Route::get('/services', [LandingController::class, 'services'])->name('services'); // Rute untuk halaman layanan
Route::get('/about' , [LandingController::class, 'about'])->name('about'); // Rute untuk halaman tentang kami
Route::get('/contact' , [LandingController::class, 'contact'])->name('contact'); // Rute untuk halaman kontak
Route::get('/signin', function () {
    return redirect('/dashboard/login');
})->name('signin'); // Rute untuk mengarahkan pengguna ke halaman masuk

Route::get('/signup', function () {
    return redirect('/dashboard/register');
})->name('signup'); // Rute untuk mengarahkan pengguna ke halaman pendaftaran

Route::get('/{record}/invoice', [DownloadInvoiceController::class, 'download'])->name('order.invoice'); // Rute untuk mengunduh invoice berdasarkan id rekaman

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout'); // Rute untuk logout pengguna

