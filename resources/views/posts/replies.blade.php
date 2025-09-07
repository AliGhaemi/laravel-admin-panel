<ul>
    @foreach ($replies as $reply)
        <li class="flex flex-col gap-5 mx-20 py-6 border border-x-0 border-t-0 border-b-utility">
            <div class="mr-auto flex flex-row items-center gap-4">
                <img class="rounded-3xl w-8 h-8"
                     src="{{ asset('storage/'. $reply->user->picture_path) }}"
                     alt="{{ $reply->user->username }}">
                <p>From {{ $reply->user->username }}</p>
            </div>
            <div class="">
                <div class="">
                    <p class="text-xl block">{{ $reply->body }}</p>
                    <x-button onclick="loadReplies({{ $reply->id }})" text="Load Replies"/>
                </div>
                <div class="mx-8" id="replies-{{ $reply->id }}"></div>
            </div>
        </li>
    @endforeach
</ul>
