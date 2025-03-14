<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $userData = [
            'name' => 'Mohammed',
            'email' => 'Mohammed@gmail.com',
            'password' => 'mohammedmohammed',
            'password_confirmation' => 'mohammedmohammed',
            'role_id' => '2',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'Create compte avec succes']);
        $response->assertJsonStructure(['user', 'token']);
    }
}