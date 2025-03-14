<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login()
    {
        $user = User::factory()->create([
            'email' => 'login@example.com',
            'password' => Hash::make('ploginlogin'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'logint@example.com',
            'password' => 'loginlogin',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'user', 'token']);
    }

    public function test_password()
    {
        $user = User::factory()->create([
            'email' => 'password@example.com',
            'password' => Hash::make('passwordpassword'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'password@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Mot de passe incorrect.']);
    }

    public function test_existence()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'passwordpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Utilisateur non trouvé.']);
    }

}
