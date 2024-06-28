<?php

namespace App\Filament\Resources;

use App\Enums\ServicePackageStatus;
use App\Filament\Resources\ServicePackageResource\Pages;
use App\Models\ServicePackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Illuminate\Support\Facades\Auth;

class ServicePackageResource extends Resource
{
    // Nama model yang digunakan
    protected static ?string $model = ServicePackage::class;

    // Icon untuk navigasi
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    // Judul untuk navigasi
    protected static ?string $navigationGroup = 'Data Management';

    // Urutan navigasi
    protected static ?int $navigationSort = 2;

    /**
     * Menentukan apakah sumber daya ini harus didaftarkan di menu navigasi berdasarkan izin pengguna.
     *
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->can('view service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Mendefinisikan bidang formulir untuk membuat dan mengedit paket layanan.
     *
     * @param Form $form
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form
        // buat section Service Package
            ->schema([
                Forms\Components\Section::make('Service Package')
                    ->columns(4)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter new package name'),
                        Forms\Components\TextInput::make('description')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter new package description'),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('IDR.')
                            ->placeholder('Enter new package price')
                            ->minValue(0),
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options(ServicePackageStatus::class)
                            ->native(false)
                            ->placeholder('Select status')
                            ->default('active'),
                    ]),
            ]);
    }

    /**
     * Mendefinisikan tabel untuk menampilkan paket layanan.
     *
     * @param Table $table
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->limit(45),
                Tables\Columns\TextColumn::make('price')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
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
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn () => Auth::user()->can('edit orders')),
            ]);
    }

    /**
     * Mendefinisikan relasi yang akan dimuat bersama sumber daya.
     *
     * @return array
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Mendefinisikan tampilan infolist untuk melihat detail paket layanan individu.
     *
     * @param Infolist $infolist
     * @return Infolist
     */
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Service Package Detail')
            ->columns(2)
            ->schema([
                TextEntry::make('name')->label('Service Package Name'),
                TextEntry::make('description'),
                TextEntry::make('price'),
                TextEntry::make('status'),
            ])
        ]);
    }

    /**
     * Mendefinisikan halaman yang terkait dengan sumber daya paket layanan.
     *
     * @return array
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicePackages::route('/'),
            'create' => Pages\CreateServicePackage::route('/create'),
            // 'view' => Pages\ViewServicePackage::route('/{record}'),
            'edit' => Pages\EditServicePackage::route('/{record}/edit'),
        ];
    }
}
