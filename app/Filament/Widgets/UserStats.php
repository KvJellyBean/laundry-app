<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class UserStats extends BaseWidget
{
     /**
     * The sort order of this widget in the UI.
     *
     * @var int|null
     */
    protected static ?int $sort = -3;

    /**
     * Retrieves statistics based on the user's role.
     *
     * @return array
     */
    protected function getStats(): array
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('staff')) {
             // For admins and staff, show total users, orders this week, and paid transactions this week
             return [
                Stat::make('Total Users', User::where('role', 'user')->count())
                    ->description('Total users registered in the system')
                    ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                    ->color('warning'),
                Stat::make('Total Orders This Week', Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count())
                    ->description('Total orders created this week')
                    ->descriptionIcon('heroicon-o-shopping-cart', IconPosition::Before)
                    ->color('warning'),
                Stat::make('Success Transactions This Week', Transaction::where('status', 'paid')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count())
                    ->description('Total transactions paid this week')
                    ->descriptionIcon('heroicon-o-credit-card', IconPosition::Before)
                    ->color('warning'),
            ];;
        }

        // For regular users, show their orders and paid transactions this month
        return [
            Stat::make('Total Orders This Month', Order::where('user_id', $user->id)->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count())
                ->description('Total orders created this month')
                ->descriptionIcon('heroicon-o-shopping-cart', IconPosition::Before)
                ->color('warning'),
            Stat::make('Success Transactions This Month', Transaction::where('user_id', $user->id)->where('status', 'paid')->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count())
                ->description('Total transactions paid this month')
                ->descriptionIcon('heroicon-o-credit-card', IconPosition::Before)
                ->color('warning'),
        ];
    }
}
