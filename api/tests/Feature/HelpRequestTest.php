<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\HelpBoard\Models\HelpPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_user_can_create_help_request_if_less_than_3_pending(): void
    {
        $user = User::factory()->create();
        HelpPost::factory()->count(2)->create([
          'user_id' => $user->id,
          'status' => 'pending'
        ]);

        $response = $this->actingAs($user)->postJson('/api/help-requests',[
          'title' => 'Need help with TV',
          'description' => 'LCD screen damaged',
          'type' => 'help_request',
          'location' => 'DV'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('help_posts',[
          'title' => 'Need help with TV',
        ]);
    }
}