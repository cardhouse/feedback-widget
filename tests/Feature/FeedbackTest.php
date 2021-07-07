<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Feedback;
use App\Models\Song;
use App\Models\User;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function feedback_can_be_created()
    {
        $viewer = User::factory()->has(Song::factory())->create();
        $broadcaster = User::factory()->create();
        $input = [
            'broadcaster_id' => $broadcaster->id,
            'song_id' => $viewer->songs->first()->id
        ];
        
        $this->actingAs($viewer);

        $this->post('/feedback', $input);
        $this->assertCount(1, $broadcaster->feedback);
    }

    /** @test */
    public function a_user_cannot_submit_another_users_song_for_feedback()
    {
        $viewer = User::factory()->has(Song::factory())->create();
        $broadcaster = User::factory()->create();
        $input = [
            'broadcaster_id' => $broadcaster->id,
            'song_id' => $viewer->songs->first()->id
        ];
        
        $this->actingAs(User::factory()->create());
        $response = $this->post('/feedback', $input);
        
        $response->assertStatus(403);
        $this->assertCount(0, $broadcaster->feedback);
    }
}
