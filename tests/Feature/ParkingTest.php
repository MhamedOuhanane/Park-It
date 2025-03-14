<?php

namespace Tests\Feature;

use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParkingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_store(): void
    {
        $user = Utilisateur::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/parkings', [
            'name' => 'Parking A',
            'places' => 10,
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'Parking A']);
    }
}
