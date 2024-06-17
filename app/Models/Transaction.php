<?php

namespace App\Models;

use App\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'total_payment',
        'payment_method',
        'paid_at',
        'status',
    ];

    protected $casts = [
        'status' => TransactionStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->where('role', 'user');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    protected static function booted()
    {
        static::updated(function ($transaction) {
            if ($transaction->paid_at) {
                $order = $transaction->order;
                $order->status = 'processed';
                $order->save();
            }
        });
    }
}
