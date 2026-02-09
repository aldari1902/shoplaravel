<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'decimal:2',
    ];
}
