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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($financialReport) {
            $financialReport->total_profit = $financialReport->total_income - $financialReport->total_expense;
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
