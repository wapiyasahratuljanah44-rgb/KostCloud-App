<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'tenant_id', 'start_date', 'end_date', 'payment_status'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Booking ini untuk kamar mana
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Booking ini atas nama penyewa siapa
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
