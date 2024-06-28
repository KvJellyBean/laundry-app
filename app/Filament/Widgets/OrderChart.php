<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class OrderChart extends ChartWidget
{
    protected static ?int $sort = 3;

    // Judul atau heading widget
    protected static ?string $heading = 'Order Overview';

    // Getter grafik
    protected function getData(): array
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('staff')) {
            $orders = Order::query()
                ->where(function ($query) {
                    $query->where('status', 'processed')
                        ->orWhere('status', 'completed');
                })
                ->selectRaw('DATE(processed_at) as date, COUNT(*) as value')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        } else {
            $orders = Order::query()
                ->where('user_id', $user->id)
                ->where(function ($query) {
                    $query->where('status', 'processed')
                        ->orWhere('status', 'completed');
                })
                ->selectRaw('DATE(processed_at) as date, COUNT(*) as value')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        $labels = $orders->pluck('date')->toArray();
        $data = $orders->pluck('value')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Orders',
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
                        'text' => 'Number of Orders',
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
