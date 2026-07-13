<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Kolom-kolom yang diizinkan untuk diisi massal (Mass Assignment)
    protected $fillable = [
        'name', 
        'address', 
        'description', 
        'harga', 
        'phone', 
        'image'
    ];

    /**
     * Relasi: Satu kosan punya BANYAK kamar
     */
    public function rooms() 
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Relasi: Properti ini dimiliki oleh seorang User (Owner)
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}