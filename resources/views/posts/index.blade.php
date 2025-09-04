<x-layouts.layout title="Posts">
    <div class="p-5">
        <h1 class="text-3xl text-font mb-3">Latest Posts</h1>

        {{--    <a href="{{ route('posts.create') }}">Create New Post</a>--}}

        <hr class="text-utility">

        <x-posts.post-list :posts="$posts" :limit="50"/>

        <div class="my-10">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.layout>
