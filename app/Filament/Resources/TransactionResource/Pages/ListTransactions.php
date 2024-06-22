<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'pending');
            }),
            'paid' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'paid');
            }),
            'failed' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->where('status', 'failed');
            }),
        ];
    }
}
