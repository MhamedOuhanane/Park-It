<?php

namespace Tests\Feature;

use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_logout(): void
    {
        $user = Utilisateur::factory()->create();
        $token = $user->createToken('Test Token')->plainTextToken;

        $response = $this->withToken($token)->deleteJson('/api/logout/'.$user->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Vous avez été déconnecté.']);
    }
}

