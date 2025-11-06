<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'dob',
        'password',
    ];

    protected $hidden = ['password'];

    public function tryOns()
    {
        return $this->hasMany(TryOn::class, 'customer_id', 'customer_id');
    }
}
