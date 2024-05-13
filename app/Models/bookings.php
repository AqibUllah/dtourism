<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;
    public function bookable() {
        return $this->morphTo();
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
