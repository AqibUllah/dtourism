<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'city',
        'street',
        'hotelNo',
        'phone_no',
        'email',
        'total_rooms',
        'available_rooms',
        'room_type',
        'image',
        'cost_per_day',
    ];

    public $timestamps = false;

    // Define the relationship with the Customer model
    // public function manager()
    // {
    //     return $this->belongsTo(User::class, 'manager_id');
    // }
    public function manager()
    {
        return $this->belongsTo(HotelManager::class);
    }
    public function bookings() {
        return $this->morphMany(Booking::class, 'bookable');
    }
}
