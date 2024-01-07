<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class JobOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'status',
        // Add other attributes as needed
    ];

    // Define relationships or other configurations here

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}