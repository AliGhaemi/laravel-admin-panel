<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(PostService $service)
    {
        return view('posts.index', [
            'posts' => $service->getPosts(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = $this->postService->storePost($request->validated());
        return Redirect::route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['comments' => function ($query) {
            $query->whereNull('parent_id');
        }]);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $this->postService->updatePost($post, $request->validated());
        return Redirect::route('posts.show', ['post' => $post->slug])->with('status', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        Storage::disk('public')->delete($post->image_path);
        $post->delete();
        return Redirect::route('posts.index')->with('status', 'Post deleted successfully!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search-query');
        $sort = $request->input('sort_by');
        $posts = Post::search($search)->orderBy('description_length', $sort)->get();
        return view('results', compact('posts'));
    }
}
