<x-layouts.layout title="Search Posts">
    <h1 class="text-3xl">Search Posts</h1>
    @if(!$posts->isEmpty())
        <x-posts.post-list :posts="$posts" :limit="50"/>
    @endif
</x-layouts.layout>
