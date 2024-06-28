<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    // Nama model yang digunakan
    protected static ?string $model = User::class;

    // Icon untuk navigasi
    protected static ?string $navigationIcon = 'heroicon-o-user';

    // Judul untuk navigasi
    protected static ?string $navigationGroup = 'Data Management';

    // Urutan navigasi
    protected static ?int $navigationSort = 1;

    /**
     * Menentukan apakah sumber daya ini harus didaftarkan di menu navigasi berdasarkan izin pengguna.
     *
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view user');
    }

    /**
     * Mendefinisikan bidang formulir untuk membuat dan mengedit pengguna.
     *
     * @param Form $form
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User account')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter user name'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter user email')
                            ->disabledOn('edit'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter user password'),
                        Forms\Components\Select::make('role')
                            ->options(Role::pluck('name', 'name')->toArray())
                            ->preload()
                            ->required(),
                    ]),
                Forms\Components\Section::make('User profile')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->maxLength(255)
                            ->placeholder('Enter user phone number (e.g. 081234567890)'),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->placeholder('Enter user address (e.g. Jl. Jend. Sudirman No. 1, Jakarta Pusat)'),
                    ]),
            ]);
    }

    /**
     * Mendefinisikan tabel untuk menampilkan pengguna.
     *
     * @param Table $table
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('role')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('role', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options(Role::pluck('name', 'name')->toArray())
                    ->label('Role')
                    ->placeholder('Filter by role')
                    ->searchable(true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn () => auth()->user()->can('edit orders')),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    // Mendefinisikan tampilan infolist
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Section::make('Account information')
            ->columns(2)
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('role'),
                TextEntry::make('phone_number'),
                TextEntry::make('address')->columnSpan(2),
            ])
        ]);
    }

    /**
     * Mendefinisikan halaman yang tersedia untuk sumber daya ini.
     *
     * @return array
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
