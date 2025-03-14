<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login()
    {
            $user = Utilisateur::factory()->create([
                'name' => 'login',
                'email' => 'login@gmail.com',
                'password' => Hash::make('loginlogin'),
                'role_id' => 2,
            ]);

        $response = $this->postJson('/api/login', [
            'email' => 'logint@gmail.com',
            'password' => 'loginlogin',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'user', 'token']);
    }

    public function test_password()
    {
        $user = Utilisateur::factory()->create([
            'name' => 'password',
            'email' => 'password@gmail.com',
            'password' => Hash::make('passwordpassword'),
            'role_id' => 2,
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'password@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Mot de passe incorrect.']);
    }

    public function test_existence()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'nonexistent@gmail.com',
            'password' => 'passwordpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Utilisateur non trouvé.']);
    }

}
