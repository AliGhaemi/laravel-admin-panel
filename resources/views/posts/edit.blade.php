<x-layouts.layout title="Update Post">
    <div class="w-full min-h-full flex flex-col gap-8 justify-center items-center">
        <form class="flex flex-col gap-3" method="POST" enctype="multipart/form-data" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')
            <x-form-field class="w-full" label="Title" id="post-title" type="text" value="{{ old('post-title') }}"
                          required autofocus/>
            <x-form-field label="Description" id="post-description" type="textarea"
                          value="{{ old('post-description') }}"
                          required autofocus/>
            <x-form-field label="Post Image" id="post-image" type="file" value="{{ old('post-image') }}"
                          required autofocus/>
            <x-button type="submit" text="Update Post" />
        </form>
    </div>
</x-layouts.layout>
