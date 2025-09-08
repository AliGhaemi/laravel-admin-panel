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
        <hr>
        <h1 class="text-4xl">Summerized By Ai</h1>
        <br>
        <p class="text-xl">{{ $summerized }}</p>
        <hr>
    </div>
    <div class="mx-5 py-5 border border-x-0 border-b-0 border-t-utility">
        <form action="{{ route('comments.store', $post) }}" method="POST"
              class="flex flex-col gap-4 px-14">
            @csrf
            <x-form-field id="comment-body" type="textarea" label="Write A Comment"
                          value="{{ old('comments-body') }}"/>
            <x-button type="submit" text="Submit" class="w-40 ml-auto"/>
        </form>
        <h1 class="text-4xl my-6 border border-x-0 border-t-0 border-b-utility py-4">Comments</h1>
        @if($post->comments->isNotEmpty())
            <ul>
                @foreach($post->comments as $comment)
                    <li class="flex flex-col gap-5 mx-20 py-6 border border-x-0 border-t-0 border-b-utility  last:border-b-0">
                        <div class="mr-auto flex flex-row items-center gap-4">
                            <img class="rounded-3xl w-8 h-8"
                                 src="{{ asset('storage/'. $comment->user->picture_path) }}"
                                 alt="{{ $comment->user->username }}">
                            <p>From {{ $comment->user->username }}</p>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="cursor-pointer hover:text-red-500 border border-r-0 border-y-0 border-l-utility px-5">
                                    delete comment
                                </button>
                            </form>
                        </div>
                        <div>
                            <div>
                                <p class="text-xl block">{{ $comment->body }}</p>
                                <div class="flex flex-row gap-5 mt-4">
                                    @if($comment->replies_count > 0)
                                        <p onclick="loadReplies({{ $comment->id }}, {{ $post->id }})"
                                           class="cursor-pointer hover:text-blue-500 border border-l-0 border-y-0 border-r-utility pr-5">
                                            Load Replies</p>
                                    @endif
                                    <p onclick="openCommentSection({{ $comment->id }})"
                                       class="cursor-pointer hover:text-blue-500">Reply to
                                        this comment</p>
                                </div>
                            </div>
                            <div class="mx-8" id="replies-{{ $comment->id }}"></div>
                            <form id="comment-form-{{ $comment->id }}" action="{{ route('comments.store',$post) }}"
                                  method="POST"
                                  class="hidden flex-col gap-4 px-14">
                                @csrf
                                <x-form-field id="comment-body" type="textarea" label="Write A Comment"
                                              value="{{ old('comments-body') }}"/>
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <x-button type="submit" text="Submit" class="w-40 ml-auto"/>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <h1 class="text-4xl">
                No Comments Here! Be The First One To Comment On This Post.
            </h1>
        @endif
    </div>
    <script>
        function loadReplies(commentId, postId) {
            const replyElement = document.getElementById('replies-' + commentId)
            fetch(`/${postId}/${commentId}/replies`)
                .then(response => response.text())
                .then(view => {
                    replyElement.innerHTML = view;
                })
                .catch(e => console.error(e));
        }

        function openCommentSection(commentId) {
            document.getElementById('comment-form-' + commentId).classList.replace('hidden', 'flex')
        }

        function openReplySection(replyId) {
            document.getElementById('reply-form-' + replyId).classList.replace('hidden', 'flex')
        }
    </script>
</x-layouts.layout>
