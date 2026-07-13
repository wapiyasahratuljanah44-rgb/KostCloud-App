<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'room_number', 'status'];

    // Kamar ini milik properti/kost mana
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Satu kamar bisa punya banyak riwayat booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
