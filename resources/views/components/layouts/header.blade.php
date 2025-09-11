<header class="h-20 px-4 w-full fixed top-0 bg-secondary flex items-center justify-end">
    <a href="/">
        <img class="mr-6 w-12 h-12" src="{{ Vite::index('favicon.svg') }}" alt="Home Icon">
    </a>
    @if(Auth::check())
        <div class="mr-auto flex flex-row items-center gap-4">
            <img class="rounded-3xl w-12 h-12"
                 src="{{ asset('storage/'. Auth::user()->picture_path) }}" alt="{{ Auth::user()->username }}">
            <p>{{ __('welcome') }} {{ Auth::user()->username }}!</p>
            <a href="@if(app()->getLocale() == 'en') lang/tr @else lang/en @endif" class="px-4 py-2 rounded-md border border-utility">
                {{ Str::upper(app()->getLocale()) }}
            </a>
        </div>
    @endif
    <x-search-field :action="route('posts.search')" />
    <div class="flex gap-3">
        @guest
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('login') }}">{{ __('login') }}</a>
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('register') }}">{{ __('register') }}</a>
        @endguest
        @auth
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('posts.store') }}">{{ __('create_post') }}</a>
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('send.request.create') }}">{{ __('send_request') }}</a>
            @can('is-admin')
                <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
                   href="{{ route('admin.handle') }}">{{ __('admin_panel') }}</a>
            @endcan
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg">
                    {{ __('logout') }}
                </button>
            </form>
        @endauth
    </div>
</header>
