<?php

namespace Tests\Feature;

use App\Models\Song;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SongTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Ensure a user can create a song
     *
     * @test
     */
    public function a_user_can_create_a_song()
    {
        // Given
        $user = User::factory()->create();
        $input = Song::factory(['user_id' => $user])->raw();

        // When
        $this->actingAs($user);
        $response = $this->post('/songs', $input);

        // Then
        $this->assertDatabaseHas('songs', $input);
        $this->assertDatabaseCount('songs', 1);
        $response->assertRedirect('/songs');
    }

    /** @test */
    public function users_cannot_submit_empty_forms()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->post('/songs', []);

        $response->assertSessionHasErrors(['title', 'url', 'platform']);
    }

    /** @test */
    public function song_urls_must_be_valid()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->post('/songs', ['url' => 'some bad value']);

        $response->assertSessionHasErrors(['url']);
    }

    /** @test */
    public function users_cannot_create_songs_for_others()
    {
        $user = User::factory()->create();
        $other_user = User::factory()->create();

        $this->actingAs($user);
        $this->post('/songs', [
            'title' => 'Up to no good',
            'url' => 'http://valid.url.com',
            'platform' => 'soundcloud',
            'user_id' => $other_user->id
        ]);

        $this->assertCount(1, $user->songs);
        $this->assertCount(0, $other_user->songs);
    }
}
