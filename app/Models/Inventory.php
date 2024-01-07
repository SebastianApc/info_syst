<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'quantity',
        'price',
        // Add other attributes you want to allow for mass assignment here
    ];

    // Other model configurations, relationships, etc.
}
