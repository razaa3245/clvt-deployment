<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryOn extends Model
{
    use HasFactory;

    protected $table = 'try_ons';
    protected $primaryKey = 'tryon_id';

    protected $fillable = [
        'customer_id',
        'lens_id',
        'image_url',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function lens()
    {
        return $this->belongsTo(Lens::class, 'lens_id', 'lens_id');
    }
}
