<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class HotelManager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "hotel_managers";

    protected $guarded = "hotelmanager";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'h_manager_email_verified_at' => 'datetime',
    ];
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
