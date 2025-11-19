<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shopkeeper extends Authenticatable
{
    use HasFactory;

    protected $table = 'shopkeepers';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'shop_name',
        'address',
        'status',
        'retailer_name',
    ];

    protected $hidden = ['password'];

    // Relationships
    public function lenses()
    {
        return $this->hasMany(Lens::class, 'shop_id', 'id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'shop_id', 'id');
    }

    public function qrcodes()
    {
        return $this->hasMany(QrCode::class, 'shop_id', 'id');
    }

    public function analytics()
    {
        return $this->hasMany(Analytics::class, 'shop_id', 'id');
    }
}
