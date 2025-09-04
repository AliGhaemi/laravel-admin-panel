<header class="h-20 w-full fixed top-0 bg-secondary flex items-center justify-end">
    <div class="mx-4 flex gap-3">
        @guest
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('login') }}">Login</a>
            <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
               href="{{ route('register') }}">Register</a>
        @endguest
        @auth
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
