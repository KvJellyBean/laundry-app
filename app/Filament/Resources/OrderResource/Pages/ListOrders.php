<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // get tabs
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'pending');
            }),
            'processed' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'processed');
            }),
            'completed' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'completed');
            }),
        ];
    }
}
