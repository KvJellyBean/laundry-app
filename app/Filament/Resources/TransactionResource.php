<?php

namespace App\Filament\Resources;

use App\Enums\TransactionStatus;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Sales';

    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->can('view transactions')){
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
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->placeholder('Enter user id')
                    ->live(),
                Forms\Components\Select::make('order_id')
                    ->required()
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->options(function () {
                        return \App\Models\Order::where('status', 'processed')
                            ->get()
                            ->pluck('id', 'id')
                            ->toArray();
                    })
                    ->placeholder('Enter order id')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $order = \App\Models\Order::find($state);
                            if ($order) {
                                $set('total_payment', $order->total_price);
                            }
                        } else {
                            $set('total_payment', null);
                        }
                    }),
                Forms\Components\TextInput::make('total_payment')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.')
                    ->readonly(),
                Forms\Components\Select::make('payment_method')
                    ->required()
                    ->options([
                        'cash' => 'Cash',
                        'credit_card' => 'Credit Card',
                        'debit_card' => 'Debit Card',
                        'bank_transfer' => 'Bank Transfer',
                    ])
                    ->native(false)
                    ->placeholder('Select payment method'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options(TransactionStatus::class)
                    ->default('pending')
                    ->native(false)
                    ->placeholder('Select status')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'paid') {
                            $set('paid_at', now());
                        } else {
                            $set('paid_at', null);
                        }
                    }),
                Forms\Components\DatePicker::make('paid_at')
                ->reactive()
                // change state when date is selected
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state) {
                        $set('status', 'paid');
                    }
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.id')
                    ->label("Order ID")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_payment')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->date()
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
                        'paid' => 'Paid',
                        'failed' => 'Failed',
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
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Transaction information')
            ->columns(3)
            ->schema([
                TextEntry::make('order.id'),
                TextEntry::make('user.name'),
                TextEntry::make('total_payment')->prefix('Rp.'),
                TextEntry::make('payment_method'),
                TextEntry::make('status'),
                TextEntry::make('paid_at')->date(),
            ])
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            // 'view' => Pages\ViewTransaction::route('/{record}'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
