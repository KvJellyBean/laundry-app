<?php
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;
 
enum OrderStatus: string implements HasLabel, HasColor, HasIcon
{
    case Pending = 'pending';
    case Processed = 'processed';
    case Completed = 'completed';
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processed => 'Processed',
            self::Completed => 'Completed',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Pending => 'danger',
            self::Processed => 'warning',
            self::Completed => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Pending => 'heroicon-o-clock',
            self::Processed => 'heroicon-o-cog',
            self::Completed => 'heroicon-o-check',
        };
    }
}