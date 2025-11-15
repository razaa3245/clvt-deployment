<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'lenses';

    // Primary key (the migration uses 'id')
    protected $primaryKey = 'id';

    // Columns that are mass assignable
    protected $fillable = [
        'name',
        'brand',
        'type',
        'color',
        'description',
        'image',
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
