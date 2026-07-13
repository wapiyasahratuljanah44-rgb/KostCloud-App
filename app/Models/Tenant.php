<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email'];

    // Satu penyewa bisa punya banyak booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
