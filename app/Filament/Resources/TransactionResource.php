<?php

namespace App\Filament\Resources;

use App\Enums\TransactionPayment;
use App\Enums\TransactionStatus;
use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Support\Facades\Auth;

class TransactionResource extends Resource
{
    // Nama model yang digunakan
    protected static ?string $model = Transaction::class;

    // Icon untuk navigasi
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    // Judul untuk navigasi
    protected static ?string $navigationGroup = 'Sales';

    /**
     * Mendefinisikan bidang formulir untuk membuat dan mengedit transaksi
     *
     * @param Form $form
     * @return Form
     */
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
                                $set('service_package_name', $order->servicePackage->name);
                            }
                        } else {
                            $set('total_payment', null);
                            $set('service_package_name', null);
                        }
                    }),
                Forms\Components\Select::make('service_package_id')
                    ->native(false)
                    ->searchable()
                    ->relationship(name: 'servicePackage', titleAttribute: 'name')
                    ->disabled()
                    ->placeholder('Enter service package id'),
                Forms\Components\TextInput::make('total_payment')
                    ->required()
                    ->numeric()
                    ->prefix('IDR.')
                    ->readonly(),
                Forms\Components\Select::make('payment_method')
                    ->required()
                    ->options(TransactionPayment::class)
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
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('status', 'paid');
                        }
                    }),
            ]);
    }

    // Mendefinisikan tabel untuk menampilkan transaksi
    public static function table(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.id')
                    ->hidden(fn () => $user->hasRole('user'))
                    ->label("Order ID")
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order.servicePackage.name')
                    ->disabled()
                    ->label("Service Package")
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_payment')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\SelectColumn::make('payment_method')
                    ->options(TransactionPayment::class)
                    ->selectablePlaceholder(false)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->alignCenter()
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('qr_code')
                    ->alignCenter()
                    ->label('Bank Transfer')
                    ->defaultImageUrl(asset('assets/images/qr.png')),
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
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn () => Auth::user()->can('edit orders')),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Mendefinisikan tampilan infolist untuk
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Transaction information')
            ->columns(3)
            ->schema([
                TextEntry::make('order.id'),
                TextEntry::make('user.name'),
                TextEntry::make('order.servicePackage.name')->label('Service Package'),
                TextEntry::make('total_payment')->prefix('IDR.'),
                TextEntry::make('payment_method'),
                TextEntry::make('status'),
                ImageEntry::make('qr_code')
                    ->defaultImageUrl(asset('assets/images/qr.png'))
                    ->label('Bank Transfer'),
                TextEntry::make('paid_at')->date(),
            ])
        ]);
    }

    // Mendefinisikan halaman yang akan digunakan
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
