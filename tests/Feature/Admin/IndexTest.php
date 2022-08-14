<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_page_forbidden_for_user()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->withToken('123123')
            ->get('/admin');

        $response->assertStatus(403);
    }

    public function test_redirect_if_guest()
    {
        $response = $this->get('/admin');

        $response->assertRedirect(route('login'));
    }

    public function test_admin_page_not_found_for_admin()
    {
        $user = User::factory()->create(['role' => 2]);

        $response = $this
            ->actingAs($user)
            ->withToken('123123')
            ->get('/admin');

        $response->assertStatus(404);
    }
}
