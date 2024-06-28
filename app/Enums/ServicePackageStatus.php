<?php
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;
 
enum ServicePackageStatus: string implements HasLabel, HasColor, HasIcon
{
    case Active = 'active';
    case Inactive = 'inactive';

    // Mendapatkan label status
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
        };
    }
    
    // Mendapatkan warna status
    public function getColor(): ?string
    {
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'danger',
        };
    }

    // Mendapatkan icon status
    public function getIcon(): ?string
    {
        return match ($this) {
            self::Active => 'heroicon-o-check',
            self::Inactive => 'heroicon-o-x-mark',
        };
    }
}