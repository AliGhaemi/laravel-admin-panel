<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public function getPosts(): LengthAwarePaginator {
        $posts = Post::paginate(9);
        $posts->withQueryString();

        return $posts;
    }
}
