<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'price',
        'category'
    ];

    // Updated relationship name to match your database structure
    public function sold()
    {
        return $this->hasMany(Sold::class, 'products_id');
    }
}
