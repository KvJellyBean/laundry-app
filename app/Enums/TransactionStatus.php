<?php
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;
 
enum TransactionStatus: string implements HasLabel, HasColor, HasIcon
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Paid => 'Paid',
            self::Failed => 'Failed',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Paid => 'success',
            self::Failed => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Pending => 'heroicon-o-clock',
            self::Paid => 'heroicon-o-check',
            self::Failed => 'heroicon-o-x-mark',
        };
    }
}