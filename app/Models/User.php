<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable 
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
        'phone_number',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->role) {
                if ($user->hasRole('admin')) {
                    $user->role = 'admin';
                }
                elseif (!$user->hasAnyRole(['admin', 'staff'])) {
                    $user->role = 'user';
                    $user->assignRole('user');
                } 
                elseif ($user->hasRole('staff')) {
                    $user->role = 'staff';
                    $user->assignRole('staff');
                }
            }
        });
    }

    public function setPasswordAttribute($value)
    {
        if (substr($value, 0, 4) !== '$2y$') {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

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
