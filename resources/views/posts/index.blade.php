@extends('app')

@section('content')
    <h1>Latest Posts</h1>

{{--    <a href="{{ route('posts.create') }}">Create New Post</a>--}}

    <hr>

    <x-posts.post-list :posts="$posts" />
@endsection
