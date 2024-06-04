<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
        'phone_number',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function financialReports()
    {
        return $this->hasMany(FinancialReport::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
