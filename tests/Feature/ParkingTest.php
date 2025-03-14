<?php

namespace Tests\Feature;

use App\Models\Parking;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParkingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $user = Utilisateur::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $parking = Parking::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->getJson('/api/parkings');

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => $parking->name]);
    }

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

    

    public function test_update()
    {
        $parking = Parking::factory()->create();

        $user = Utilisateur::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/parkings/" . $parking->id, [
            'name' => 'Updated Parking',
            'places' => 20,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Updated Parking']);
    }

    public function test_delete()
    {
        $parking = Parking::factory()->create();

        $user = Utilisateur::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/parkings/".$parking->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Le parking "' . $parking->name . '" a été supprimé avec succès.',
        ]);

        $parking->refresh();
        $this->assertNotNull($parking->deleted_at);
    }

    // public function test_restore()
    // {
    //     $parking = Parking::factory()->create();
    //     $user = Utilisateur::factory()->create();
    //     $token = $user->createToken('TestToken')->plainTextToken;

    //     $response = $this->withHeaders([
    //         'Authorization' => 'Bearer ' . $token,
    //     ])->deleteJson("/api/parkings/".$parking->id);

    //     $response->assertStatus(200);
    //     $response->assertJsonFragment([
    //         'message' => 'Le parking "' . $parking->name . '" a été restauré avec succès.',
    //     ]);

    //     $parking->refresh();
    //     $this->assertNull($parking->deleted_at);
    // }
}