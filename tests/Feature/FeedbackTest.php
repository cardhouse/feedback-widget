<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Feedback;
use App\Models\User;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function feedback_can_be_created()
    {
        $viewer = User::factory()->create();
        $broadcaster = User::factory()->create();
        $input = Feedback::factory()->raw(['broadcaster_id' => $broadcaster->id]);
        
        $this->actingAs($viewer);

        $response = $this->post('/feedback', $input);

        $response->assertStatus(201);
        $this->assertDatabaseHas('feedback', $input);
        $this->assertDatabaseCount('feedback', 1);
    }
}
