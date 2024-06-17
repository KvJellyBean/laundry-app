<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enums\OrderStatus;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Sales';

    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->can('view orders')){
            return true;
        } else {
            return false;
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->placeholder('Enter user')
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'user', titleAttribute: 'name'),
                Forms\Components\Select::make('service_package_id')
                    ->required()
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'servicePackage', titleAttribute: 'name')
                    ->placeholder('Enter service package id')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $servicePackage = \App\Models\ServicePackage::find($state);
                            if ($servicePackage) {
                                $set('total_price', $servicePackage->price);
                            }
                        } else {
                            $set('total_price', null);
                        }
                    }),
                Forms\Components\Select::make('staff_id')
                    ->placeholder('Enter staff')
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'staff', titleAttribute: 'name'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options(OrderStatus::class)
                    ->native(false)
                    ->default('pending')
                    ->placeholder('Enter status')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'completed' || $state === 'Completed') {
                            $set('completed_at', now());
                            $set('processed_at', now());
                        } else if ($state === 'processed' || $state === 'Processed') {
                            $set('processed_at', now());
                        } else {
                            $set('completed_at', null);
                        }
                    }),
                Forms\Components\DatePicker::make('processed_at')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('status', 'processed');
                        }
                    }),
                Forms\Components\DatePicker::make('completed_at')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('status', 'completed');
                        }
                    }),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.')
                    ->placeholder('Enter total price')
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicePackage.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff.name')
                    ->label('Staff')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('processed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processed' => 'Processed',
                        'completed' => 'Completed',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    BulkAction::make('Set Processed')
                        ->icon('heroicon-o-arrow-path')
                        ->requiresConfirmation()
                        ->action(fn (array $records) => Order::whereIn('id', $records)->update(['status' => 'processed'])),
                    BulkAction::make('Set Completed')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->action(fn (array $records) => Order::whereIn('id', $records)->update(['status' => 'completed'])),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Order Detail')
            ->columns(3)
            ->schema([
                TextEntry::make('user.name')->label('User'),
                TextEntry::make('servicePackage.name')->label('Service Package'),
                TextEntry::make('staff.name')->label('Staff'),
                TextEntry::make('status'),
                TextEntry::make('total_price')->prefix('Rp.'),
                TextEntry::make('processed_at')->label('Processed At'),
                TextEntry::make('completed_at')->label('Completed At'),
            ])
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            // 'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
