<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'birthdate',
        'phone_number',
        'address',
        'city',
        'country',
        // Remove 'job_order_id' and 'vehicle_id' from fillable
        // Add other attributes as needed
    ];

    protected $dates = ['birthdate'];

    // Define relationships or other configurations here

    

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
