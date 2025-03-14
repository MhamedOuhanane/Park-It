<?php

namespace Tests\Feature;

use App\Models\Administrateur;
use App\Models\Parking;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_dashboard(): void
    {
        
        Parking::factory()->create();
        Reservation::factory()->create();
        $user = Administrateur::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash  ::make('loginlogin'),
            'role_id' => 2,
        ]);
        
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/dashboard');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'parkingCount',
            'placeTotale',
            'reservationCount',
            'reservationTer',
            'utilisteurCount',
            'porsentageRese',
        ]);
    }
}
