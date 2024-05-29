<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_income',
        'total_expense',
        'total_profit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
