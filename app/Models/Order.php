<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_package_id',
        'weight',
        'staff_id',
        'status',
        'processed_at',
        'completed_at',
        'total_price',
        'note',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->where('role', 'user');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id')->where(function ($query) {
            $query->where('role', 'staff')->orWhere('role', 'admin');
        });
    }

    public function servicePackage()
    {
        return $this->belongsTo(ServicePackage::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeAccessibleByUser($query)
    {
        $user = auth()->user();
        if ($user->hasRole('admin') || $user->hasRole('staff')) {
            return $query;
        } else {
            return $query->where('user_id', $user->id);
        }
    }

    public function orders()
    {
        if ($this->hasRole('admin') || $this->hasRole('staff')) {
            return Order::query();
        } else {
            return $this->hasMany(Order::class); 
        }
    }

}
