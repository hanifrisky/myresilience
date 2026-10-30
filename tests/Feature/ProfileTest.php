<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_konseli_profile_page_is_displayed(): void
    {
        $user = User::factory()->create(['role' => 'konseli']);

        $response = $this
            ->actingAs($user)
            ->get('/konseli/profile');

        $response->assertOk();
    }

    public function test_konseli_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create(['role' => 'konseli']);

        $response = $this
            ->actingAs($user)
            ->put('/konseli/profile', [
                'name' => 'Konseli Hebat',
                'email' => 'konseli_hebat@example.com',
                'school' => 'SMA Negeri 3 Malang',
                'class' => 'XII IPS 1',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $user->refresh();

        $this->assertSame('Konseli Hebat', $user->name);
        $this->assertSame('konseli_hebat@example.com', $user->email);
        $this->assertSame('SMA Negeri 3 Malang', $user->school);
        $this->assertSame('XII IPS 1', $user->class);
    }
}
