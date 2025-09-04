<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getPosts(): LengthAwarePaginator {
        $posts = Post::latest()->paginate(9);
        $posts->withQueryString();

        return $posts;
    }
    public function storePost(array $data): Post {
        $imagePath = $data['post-image']->store('posts', 'public');
        return Post::create([
            'image_path' => $imagePath,
            'description' => $data['post-description'],
            'title' => $data['post-title'],
            'user_id' => Auth::id()
        ]);
    }

    public function updatePost(Post $post, array $data): Post
    {
        if (isset($data['post-image']) && $data['post-image'] instanceof UploadedFile) {
            Storage::disk('public')->delete($post->image_path);
            $imagePath = $data['post-image']->store('posts', 'public');
        }
        $post->update([
            'description' => $data['post-description'],
            'title' => $data['post-title'],
            'image_path' => $imagePath
        ]);
        return $post;
    }
}
