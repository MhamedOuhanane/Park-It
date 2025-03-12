<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class Utilisateur extends User
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory, HasApiTokens;

    public function parkings()
    {
        return $this->belongsToMany(Parking::class, 'reservations');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
