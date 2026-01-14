<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'price_per_item',
        'quantity',
    ];

    protected $casts = [
        'price_per_item' => 'decimal:2',
        'quantity' => 'integer',
    ];
}
