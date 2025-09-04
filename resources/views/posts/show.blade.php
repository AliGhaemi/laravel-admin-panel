<x-layouts.layout title="{{$post->title}}">
    <div class="px-20 w-full flex flex-col items-center gap-8 py-6">
        <h1 class="text-4xl">{{$post->title}}</h1>
        <div class="flex flex-row gap-8 items-center">
            <div class="mr-auto flex flex-row items-center gap-4">
                <img class="rounded-3xl w-12 h-12"
                     src="{{ asset('storage/'. Auth::user()->picture_path) }}" alt="{{ Auth::user()->username }}">
                <p>Welcome {{ Auth::user()->username }}!</p>
            </div>
            <div class="bg-utility w-0.5 h-8"></div>
            <div>
                <p>{{ $post->updated_at }}</p>
                <p>5 min read</p>
            </div>
            <div class="bg-utility w-0.5 h-8"></div>
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" text="Delete Post" class="!bg-red-600"/>
                </form>
            @endcan
        </div>
        <img class="w-200" src="{{ asset('storage/'. $post->image_path) }}" alt="{{ $post->title }}">
        <p class="text-xl">
            {!! wordwrap($post->description, 200, '<br><br>') !!}
        </p>
    </div>
</x-layouts.layout>
