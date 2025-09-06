<header class="h-20 px-4 w-full fixed top-0 bg-secondary flex items-center justify-end">
    <a href="/">
        <img class="mr-6 w-12 h-12" src="{{ Vite::index('favicon.svg') }}" alt="Home Icon">
    </a>
    @if(Auth::check())
        <div class="mr-auto flex flex-row items-center gap-4">
            <img class="rounded-3xl w-12 h-12"
                 src="{{ asset('storage/'. Auth::user()->picture_path) }}" alt="{{ Auth::user()->username }}">
            <p>Welcome {{ Auth::user()->username }}!</p>
        </div>
    @endif

    <form action="{{ route('posts.search') }}" method="GET" class="mx-auto flex flex-row justify-center items-center">
        <div class="flex flex-col relative ">
            <x-form-field class="w-100 h-12" id="search-query" label="Search" type="text" value="{{ old('query', request('search-query')) }}"/>
            <x-button type="submit" text="Submit Search" class="absolute right-0 bottom-0 !rounded-l-none border border-l-stone-800 border-y-0 border-r-0 px-2"/>
        </div>

    </form>

    <div class="flex gap-3">
        @guest
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('login') }}">Login</a>
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('register') }}">Register</a>
        @endguest
        @auth
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('posts.store') }}">Create Post</a>
            @can('is-admin')
                <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
                   href="{{ route('admin.handle') }}">Admin Panel</a>
            @endcan
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</header>
