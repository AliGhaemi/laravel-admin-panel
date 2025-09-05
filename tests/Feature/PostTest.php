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


        $post = Post::firstWhere('title', 'My New Post');

        $this->assertDatabaseHas('posts', [
            'title' => 'My New Post',
            'description' => 'My New Post Description',
            'user_id' => $user->id,
            'image_path' => $post->image_path,
        ]);

        Storage::disk('public')->assertExists($post->image_path);

        $response->assertRedirect(route('posts.show', ['post' => $post]));
    }

    #[Test]
    public function owner_of_the_post_can_update_the_post()
    {
        $user = User::factory()->create();
        Storage::fake('public');
        $previousImage = UploadedFile::fake()->image('previous-image.jpg');
        $post = Post::factory()->for($user)->create([
            'image_path' => $previousImage->store('images', 'public'),
        ]);
        $newImage = UploadedFile::fake()->image('new-image.jpg');

        $data = [
            'post-title' => 'My New Updated Post',
            'post-description' => 'My New Updated Post Description',
            'post-image' => $newImage,
        ];

        $response = $this->actingAs($user)->put(route('posts.update', $post), $data);

        $updatedPost = Post::firstWhere('title', 'My New Updated Post');
        $response->assertRedirect(route('posts.show', $updatedPost));

        $this->assertDatabaseHas('posts', [
            'title' => 'My New Updated Post',
            'id' => $post->id,
            'description' => 'My New Updated Post Description',
            'image_path' => $updatedPost->image_path,
        ]);

        Storage::disk('public')->assertExists($updatedPost->image_path);
        Storage::disk('public')->assertMissing($post->image_path);

        $this->assertDatabaseMissing('posts', [
            'title' => $post->title
        ]);
    }
}
