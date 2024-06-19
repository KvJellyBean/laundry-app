<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ServicePackageStatus;

class ServicePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    protected $casts = [
        'status' => ServicePackageStatus::class,
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
