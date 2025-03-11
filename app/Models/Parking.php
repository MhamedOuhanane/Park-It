<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    /** @use HasFactory<\Database\Factories\ParkingFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'places'
    ];
    
    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }
}
