<x-layouts.layout title="{{$post->title}}">
    <div class="px-20 w-full flex flex-col items-center gap-8 py-6">
        <h1 class="text-4xl">{{$post->title}}</h1>
        <div class="flex flex-row gap-8 items-center">
            <div class="mr-auto flex flex-row items-center gap-4">
                <img class="rounded-3xl w-12 h-12"
                     src="{{ asset('storage/'. $post->user->picture_path) }}" alt="{{ $post->user->username }}">
                <p>Publisher {{ $post->user->username }}</p>
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
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}">
                    <x-button type="submit" text="Update Post" class="!bg-green-600"/>
                </a>
            @endcan
        </div>
        <img class="w-200" src="{{ asset('storage/'. $post->image_path) }}" alt="{{ $post->title }}">
        <p class="text-xl">
            {!! wordwrap($post->description, 200, '<br><br>') !!}
        </p>
    </div>
    <div class="px-5">
        <h1 class="text-4xl my-6 border border-x-0 border-t-0 border-b-utility py-4">Comments</h1>
        <ul>
            @foreach($post->comments as $comment)
                <li class="grid grid-cols-6 gap-5 mx-20 py-6 border border-x-0 border-t-0 border-b-utility">
                    <div class="mr-auto flex flex-row items-center gap-4">
                        <img class="rounded-3xl w-8 h-8"
                             src="{{ asset('storage/'. $comment->user->picture_path) }}"
                             alt="{{ $comment->user->username }}">
                        <p>From {{ $comment->user->username }}</p>
                    </div>
                    <div class="col-span-4">
                        <p class="text-xl block">{{ $comment->body }}</p>
                        <a href="">
                            <x-button text="Load Replies"/>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <script>
        // function loadReplies(commentId) {
        //     // Example using the Fetch API
        //     fetch(`/comments/${commentId}/replies`)
        //         .then(response => response.json())
        //         .then(data => {
        //             // Handle the replies data
        //             console.log(data.replies);
        //         });
        // }
    </script>
</x-layouts.layout>
