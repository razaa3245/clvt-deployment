<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type', 
        'address',
        'phone',
        'is_approved',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_approved' => 'boolean',
    ];
      /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->type === 'admin';
    }

    /**
     * Check if user is shopkeeper
     */
    public function isShopkeeper(): bool
    {
        return $this->type === 'shopkeeper';
    }

    /**
     * Check if shopkeeper is approved
     */
    public function isApproved(): bool
    {
        return $this->is_approved == 1;
    }

    /**
     * Scope a query to only include pending shopkeepers
     */
    public function scopePendingShopkeepers($query)
    {
        return $query->where('type', 'shopkeeper')
                     ->where('is_approved', 0);
    }

    /**
     * Scope a query to only include approved shopkeepers
     */
    public function scopeApprovedShopkeepers($query)
    {
        return $query->where('type', 'shopkeeper')
                     ->where('is_approved', 1);
    }
}
