<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
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
        $validatedImage = $data['post-image'];
        $imagePath = $validatedImage->store('posts', 'public');

        return Post::create([
            'image_path' => $imagePath,
            'description' => $data['post-description'],
            'title' => $data['post-title'],
            'user_id' => Auth::id()
        ]);
    }
}
