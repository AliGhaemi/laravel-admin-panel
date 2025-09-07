<ul>
    @foreach ($replies as $reply)
        <li class="flex flex-col gap-5 mx-5 py-6 border border-x-0 border-t-0 border-b-utility last:border-b-0">
            <div class="mr-auto flex flex-row items-center gap-4">
                <img class="rounded-3xl w-8 h-8"
                     src="{{ asset('storage/'. $reply->user->picture_path) }}"
                     alt="{{ $reply->user->username }}">
                <p>From {{ $reply->user->username }}</p>
            </div>
            <div class="">
                <div class="">
                    <p class="text-xl block">{{ $reply->body }}</p>
                    <div class="flex flex-row gap-5 mt-4">
                        @if($reply->replies_count > 0)
                            <p onclick="loadReplies({{ $reply->id }}, {{ $post->id }})"
                               class="cursor-pointer hover:text-blue-500 border border-l-0 border-y-0 border-r-utility pr-5">Load Replies</p>
                        @endif
                        <p onclick="openReplySection({{ $reply->id }})" class="cursor-pointer hover:text-blue-500">Reply to
                            this comment</p>
                    </div>
                </div>
                <div class="mx-8" id="replies-{{ $reply->id }}"></div>
                <form id="reply-form-{{ $reply->id }}" action="{{ route('comments.store',$post) }}" method="POST"
                      class="hidden flex-col gap-4 px-14">
                    @csrf
                    <x-form-field id="comment-body" type="textarea" label="Write A Comment"
                                  value="{{ old('comments-body') }}"/>
                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                    <x-button type="submit" text="Submit" class="w-40 ml-auto"/>
                </form>
            </div>
        </li>
    @endforeach
</ul>
