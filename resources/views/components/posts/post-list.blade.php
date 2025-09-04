<div class="text-font px-5 py-3">
    @if($posts->isEmpty())
        <p>No posts to display</p>

    @else
        <ul class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @foreach($posts as $post)
                <li class="flex flex-col gap-4 items-center text-center rounded-3xl bg-secondary overflow-hidden">
                    @if(Str::contains($post->image_path,'picsum.photos'))
                        <img class="w-full h-35" alt="1" src="{{ $post->image_path }}">
                    @else
                        <img class="w-full h-35" alt="1" src="{{ asset('storage/'. $post->image_path) }}">
                    @endif
                    <h3 class="text-md mx-1">{{ $post->title }}</h3>
                    <p class="text-sm mx-3 mb-4">{{ Str::limit($post->description, $limit) }}</p>
                    <a type="button" href="{{ route('posts.show', ['post' => $post]) }}"
                       class="w-full p-3 bg-utility mt-auto flex justify-center items-center hover:bg-hover duration-200 hover:ease-in-out hover:cursor-pointer">Read
                        More</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
