<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qr_codes';

    protected $fillable = [
        'shop_id',
        'qr_image',
    ];

    public function shopkeeper()
    {
        return $this->belongsTo(Shopkeeper::class, 'shop_id', 'id');
    }

    public function lens()
    {
        return $this->belongsTo(Lens::class, 'lens_id', 'lens_id');
    }
}
