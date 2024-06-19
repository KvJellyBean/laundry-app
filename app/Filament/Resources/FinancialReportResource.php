<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancialReportResource\Pages;
use App\Filament\Resources\FinancialReportResource\RelationManagers;
use App\Models\FinancialReport;
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

class FinancialReportResource extends Resource
{
    protected static ?string $model = FinancialReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-bankNotes';

    protected static ?string $navigationGroup = 'Reports';

    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->can('view financial reports')){
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
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->placeholder('Enter user id'),
                Forms\Components\TextInput::make('total_income')
                    ->required()
                    ->numeric()
                    ->placeholder('Enter total income')
                    ->minValue(0)
                    ->prefix('Rp.')
                    ->reactive()
                    ->lazy()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $totalIncome = $state;
                        $totalExpense = $get('total_expense') ?? 0;
                        $totalProfit = $totalIncome - $totalExpense;
                        $set('total_profit', $totalProfit);
                    }),
                Forms\Components\TextInput::make('total_expense')
                    ->required()
                    ->numeric()
                    ->placeholder('Enter total expense')
                    ->minValue(0)
                    ->prefix('Rp.')
                    ->reactive()
                    ->lazy()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $totalIncome = $get('total_income') ?? 0;
                        $totalExpense = $state;
                        $totalProfit = $totalIncome - $totalExpense;
                        $set('total_profit', $totalProfit);
                    }),
                Forms\Components\TextInput::make('total_profit')
                    ->disabled()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('Rp.')
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_income')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_expense')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_profit')
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
                //
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Report Information')
            ->columns(2)
            ->schema([
                TextEntry::make('user.name')->label('Staff'),
                TextEntry::make('total_income')->prefix('Rp.'),
                TextEntry::make('total_expense')->prefix('Rp.'),
                TextEntry::make('total_profit')->prefix('Rp.'),
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
            'index' => Pages\ListFinancialReports::route('/'),
            'create' => Pages\CreateFinancialReport::route('/create'),
            // 'view' => Pages\ViewFinancialReport::route('/{record}'),
            'edit' => Pages\EditFinancialReport::route('/{record}/edit'),
        ];
    }
}
