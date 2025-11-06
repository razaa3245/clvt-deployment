<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qrcodes';
    protected $primaryKey = 'qrcode_id';

    protected $fillable = [
        'shopkeeper_id',
        'lens_id',
        'qr_image',
    ];

    public function shopkeeper()
    {
        return $this->belongsTo(Shopkeeper::class, 'shopkeeper_id', 'shopkeeper_id');
    }

    public function lens()
    {
        return $this->belongsTo(Lens::class, 'lens_id', 'lens_id');
    }
}
