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
    
    public function servicePackage()
    {
        return $this->hasOneThrough(ServicePackage::class, Order::class, 'id', 'id', 'order_id', 'service_package_id');
    }

    protected static function booted()
    {
        static::updated(function ($transaction) {
            $order = $transaction->order;
            if ($transaction->status == TransactionStatus::Paid) {
                $order->status = 'processed';
            } elseif (in_array($transaction->status, [TransactionStatus::Failed, TransactionStatus::Pending])) {
                $order->status = 'pending';
                $order->processed_at = null;
            }
            $order->save();
        });
    }
}
