<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Observers\OrderObserver;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        Filament::registerNavigationGroups([
            'Data Management',
            'Sales',
            'Reports',
        ]);
    }
}
