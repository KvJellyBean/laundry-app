<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Observers\OrderObserver;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use App\Http\Responses\LogoutResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * Metode ini digunakan untuk mendaftarkan layanan ke dalam container aplikasi.
     */
    public function register(): void
    {
        // Mendaftarkan singleton untuk LoginResponse
        $this->app->singleton(
            LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );

        // Mendaftarkan implementasi kontrak LogoutResponseContract
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     * Metode ini digunakan untuk menginisialisasi layanan setelah semua layanan terdaftar.
     */
    public function boot()
    {
        // Mendaftarkan observer OrderObserver untuk model Order
        Order::observe(OrderObserver::class);
        // Mendaftarkan kelompok navigasi di Filament
        Filament::registerNavigationGroups([
            'Data Management',
            'Sales',
            'Orders & Transactions',
            'Reports',
        ]);
    }
}
