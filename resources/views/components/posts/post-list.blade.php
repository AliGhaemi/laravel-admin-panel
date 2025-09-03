<div class="text-3xl text-font">
    @if($posts->isEmpty())
        <p>No posts to display</p>

    @else
        <ul>
            @foreach($posts as $post)
                <li>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
