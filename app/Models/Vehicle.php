<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'city',
        'vehicle_type',
        'capacity',
        'price_per_km',
        'picture',
        'transporter_id',
    ];
    public function bookings() {
        return $this->morphMany(Booking::class, 'bookable');
    }
}
