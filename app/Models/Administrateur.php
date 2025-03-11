<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Administrateur extends User
{
    /** @use HasFactory<\Database\Factories\AdministrateurFactory> */
    use HasFactory, HasApiTokens;
}
