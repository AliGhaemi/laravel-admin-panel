<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function showReplies(Post $post, Comment $comment)
    {
        $replies = $comment->replies()->with('user')->withCount('replies')->get();
        return view('posts.replies', compact('replies', 'post'));
    }

    public function store(CommentRequest $request, Post $post, Comment $comment)
    {
        $post->comments()->create([
            'body' => $request->validated()['comment-body'],
            'user_id' => Auth::id(),
            'parent_id' => $request->validated()['parent_id'] ?? null
        ]);
        return Redirect::back()->with('success', 'Comment created.');
    }
}
