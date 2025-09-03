<div class="text-font px-5 py-3">
    @if($posts->isEmpty())
        <p>No posts to display</p>

    @else
        <ul class="grid grid-cols-3 gap-5">
            @foreach($posts as $post)
                <li class="flex flex-col gap-2 items-center text-center rounded-3xl bg-utility overflow-hidden">
                    <div class="bg-blue-700 w-full h-35"></div>
                    <h3 class="text-md">{{ $post->title }}</h3>
                    <p class="text-sm">{{ Str::limit($post->description, $limit) }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
