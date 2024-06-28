<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class TransactionChart extends ChartWidget
{
    //   Urutan widget ini dalam tampilan.
    protected static ?int $sort = 3;    

    //  Judul atau heading widget.]
    protected static ?string $heading = 'Transaction Overview';

    // Getter grafik
    protected function getData(): array
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('staff')) {
            // Admin or staff can view all paid transactions
            $transactions = Transaction::query()
                ->where('status', 'paid')
                ->selectRaw('DATE(paid_at) as date, COUNT(*) as value')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        } else {
            // Regular user can only view their own paid transactions
            $transactions = Transaction::query()
                ->where('user_id', $user->id)
                ->where('status', 'paid')
                ->selectRaw('DATE(paid_at) as date, COUNT(*) as value')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        $labels = $transactions->pluck('date')->toArray();
        $data = $transactions->pluck('value')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Paid Transactions',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
        ];
    }

    // Mendapatkan jenis grafik yang akan digunakan (line, bar, dll.).
    protected function getType(): string
    {
        return 'line';
    }

    // Mendapatkan opsi tambahan untuk konfigurasi grafik.
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'type' => 'time',
                    'time' => [
                        'unit' => 'day',
                        'tooltipFormat' => 'MMM DD',
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Date',
                    ],
                ],
                'y' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Number of Transactions',
                    ],
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'enabled' => true,
                    'mode' => 'index',
                    'intersect' => false,
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
        ];
    }
}
