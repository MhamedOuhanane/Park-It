<?php

namespace Tests\Feature;

use App\Models\Parking;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dashboard(): void
    {
        
        $user = Utilisateur::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        Parking::factory()->create();
        Reservation::factory()->create();
        Utilisateur::factory()->create();

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
