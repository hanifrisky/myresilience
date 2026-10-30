<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_new_users_can_register_with_school_and_class(): void
    {
        $response = $this->post('/register', [
            'name' => 'Konseli User',
            'email' => 'konseli@example.com',
            'school' => 'SMA Negeri 1 Malang',
            'class' => 'XI MIPA 2',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $user = \App\Models\User::where('email', 'konseli@example.com')->first();
        $this->assertNotNull($user);
        $this->assertSame('SMA Negeri 1 Malang', $user->school);
        $this->assertSame('XI MIPA 2', $user->class);
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}
