<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_package_id',
        'staff_id',
        'status',
        'processed_at',
        'completed_at',
        'total_price',
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
}
