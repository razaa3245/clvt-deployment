<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    use HasFactory;

    protected $table = 'lenses';
    protected $primaryKey = 'lens_id';

    protected $fillable = [
        'shopkeeper_id',
        'name',
        'brand',
        'color',
        'price',
        'type',
        'image_url',
    ];

    public function shopkeeper()
    {
        return $this->belongsTo(Shopkeeper::class, 'shopkeeper_id', 'shopkeeper_id');
    }

    public function tryOns()
    {
        return $this->hasMany(TryOn::class, 'lens_id', 'lens_id');
    }

    public function qrcodes()
    {
        return $this->hasMany(QrCode::class, 'lens_id', 'lens_id');
    }
}
