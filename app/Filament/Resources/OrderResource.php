<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\ServicePackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use App\Enums\OrderStatus;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Sales';

    public static function form(Form $form): Form
    {
        $user = auth()->user();

        return $form
            ->schema([
                Forms\Components\Section::make('Order Form')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->placeholder('Enter user')
                            ->disabled(fn () => $user->hasRole('user'))
                            ->default($user->id)
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
                            // ->disabledOn('edit')
                            ->reactive()
                            ->lazy()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if ($state) {
                                    $servicePackage = ServicePackage::find($state);
                                    if ($servicePackage) {
                                        $weight = $get('weight') ?? 1;
                                        $set('total_price', ($weight * $servicePackage->price));
                                    }
                                } else {
                                    $set('total_price', null);
                                }
                            }),
                        Forms\Components\TextInput::make('weight')
                            ->required()
                            ->numeric()
                            ->placeholder('Enter weight')
                            ->minValue(0)
                            ->suffix('kg')
                            ->reactive()
                            // ->disabledOn('edit')
                            ->lazy()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if($state) {
                                    $servicePackageId = $get('service_package_id');
                                    $servicePackage = ServicePackage::find($servicePackageId);
                                    if ($servicePackage) {
                                        $set('total_price', ($state * $servicePackage->price));
                                    } else {
                                        $set('total_price', null);
                                    }
                                } else {
                                    $set('total_price', null);
                                }
                            }),
                        Forms\Components\TextInput::make('total_price')
                            ->required()
                            ->numeric()
                            ->prefix('Rp.')
                            ->minValue(0)
                            ->readOnly(fn () => $user->hasRole('user')),
                        Forms\Components\Textarea::make('note')
                            ->placeholder('Enter note for your laundry order (optional)')
                            ->columnSpan(2)
                            ->rows(3)
                            ->maxLength(255),
                    ]),
                Forms\Components\Select::make('staff_id')
                    ->placeholder('Enter staff')
                    ->hidden(fn () => $user->hasRole('user'))
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'staff', titleAttribute: 'name')
                    ->disabled(fn () => $user->hasRole('user')),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options(OrderStatus::class)
                    ->hidden(fn () => $user->hasRole('user'))
                    ->native(false)
                    ->placeholder('Enter status')
                    ->reactive()
                    ->default('pending')
                    ->disabled(fn () => $user->hasRole('user'))
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'completed' || $state === 'Completed') {
                            $set('completed_at', now());
                            $set('processed_at', now());
                        } else if ($state === 'processed' || $state === 'Processed') {
                            $set('completed_at', null);
                            $set('processed_at', now());
                        } else {
                            $set('completed_at', null);
                            $set('processed_at', null);
                        }
                    }),
                Forms\Components\DatePicker::make('processed_at')
                    ->reactive()
                    ->hidden(fn () => $user->hasRole('user'))
                    ->readonly()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('status', 'processed');
                        }
                    }),
                Forms\Components\DatePicker::make('completed_at')
                    ->reactive()
                    ->hidden(fn () => $user->hasRole('user'))
                    ->readonly()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('status', 'completed');
                        }
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return Order::accessibleByUser();
            })
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicePackage.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->suffix('kg')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff.name')
                    ->label('Staff')
                    ->hidden(fn () => auth()->user()->hasRole('user'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('processed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('note')
                    ->limit(30)
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
