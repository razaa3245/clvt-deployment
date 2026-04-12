<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
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


    // Append computed URL so API responses include convenient resolved path
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        $image = $this->attributes['image'] ?? null;

        if (!$image) {
            return null;
        }

        // If it's already an absolute URL or absolute path, return as-is
        if (preg_match('/^https?:\/\//i', $image) || str_starts_with($image, '/')) {
            return $image;
        }

        // Otherwise return public storage URL (e.g. /storage/..)
        return '/storage/' . ltrim($image, '/');
    }

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
