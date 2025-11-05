<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title', 'price', 'description', 'category',
        'image', 'rating_rate', 'rating_count'
    ];
}
