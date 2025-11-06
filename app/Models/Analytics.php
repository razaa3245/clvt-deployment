<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    use HasFactory;

    protected $table = 'analytics';
    protected $primaryKey = 'analytics_id';

    protected $fillable = [
        'shopkeeper_id',
        'views',
        'clicks',
        'sales',
        'date',
    ];

    public function shopkeeper()
    {
        return $this->belongsTo(Shopkeeper::class, 'shopkeeper_id', 'shopkeeper_id');
    }
}
