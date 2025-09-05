<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_create_a_post()
    {
        $user = User::factory()->create();
        Storage::fake('public');

        $data = [
            'post-title' => 'My New Post',
            'post-description' => 'My New Post Description',
            'post-image' => UploadedFile::fake()->image('image.jpg'),
        ];

        $response = $this->actingAs($user)->post(route('posts.store'), $data);

        $this->assertDatabaseHas('posts', [
            'title' => 'My New Post',
            'description' => 'My New Post Description',
            'user_id' => $user->id,
        ]);

        $post = Post::firstWhere('title', 'My New Post');

        Storage::disk('public')->assertExists($post->image_path);

        $response->assertRedirect(route('posts.show', ['post' => $post]));
    }
}
