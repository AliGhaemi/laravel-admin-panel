<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showReplies(Comment $comment)
    {
        $replies = $comment->replies()->with('user')->get();

        return view('posts.replies', compact('replies'));
    }
}
