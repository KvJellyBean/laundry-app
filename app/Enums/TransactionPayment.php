<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
 
enum TransactionPayment: string implements HasLabel
{
    case Cash = 'cash';
    case Transfer = 'transfer';
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Cash => 'Cash',
            self::Transfer => 'Transfer',
        };
    }
}