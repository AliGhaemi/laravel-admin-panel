<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

    @routes
    @viteReactRefresh
    @vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    @inertiaHead
</head>

<body class="bg-primary text-font">
@inertia
<div class="max-h-screen">
    <header class="hidden">
        <nav class="flex items-center py-4">
            <div>
            </div>
        </nav>
    </header>
    <div class="flex h-screen">
        <div class="flex flex-col gap-y-4 self-start bg-secondary w-90 h-screen p-2">
            <header class="p-5 border-b border-hover" id="sidebar-header">
                <a href="/">
                    <div class="flex justify-items-start space-x-6 items-center">
                        <img class="rounded-xl h-12" src="{{ Vite::jpgs('profile-picture.jpg') }}" alt="HomePage">
                        <div>
                            <x-elements.text class="font-bold text-sm" id="first">Admin User -> John Doe
                            </x-elements.text>
                            <x-elements.text class="text-sm" id="second">Full Permission</x-elements.text>
                        </div>
                    </div>
                </a>
            </header>
            <div class="flex flex-1 p-5" id="sidebar-items">
                <ol class="flex flex-col flex-1 space-y-3 text-sm font-bold">
                    <li class="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                        <img
                            style="filter: invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)"
                            class="h-6 w-6 my-auto" src="{{ Vite::svgs('home.svg') }}" alt="Dashboard Logo">
                        <a class="my-auto" href="#">Dashboard</a>
                    </li>
                    <li class="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                        <img
                            style="filter: invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)"
                            class="h-6 w-6 my-auto" src="{{ Vite::svgs('database.svg') }}" alt="Database Logo">
                        <a class="my-auto" href="#">Tables</a>
                    </li>
                    <li class="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                        <img
                            style="filter: invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)"
                            class="h-6 w-6 my-auto" src="{{ Vite::svgs('file.svg') }}" alt="File Logo">
                        <a class="my-auto" href="#">Storage</a>
                    </li>
                    <li class="flex flex-row gap-x-5 p-3 hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                        <img
                            style="filter: invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)"
                            class="h-6 w-6 my-auto" src="{{ Vite::svgs('play.svg') }}" alt="Play Logo">
                        <a class="my-auto" href="#">Ai Apps</a>
                    </li>
                    <li class="flex flex-row gap-x-5 p-3 mt-auto hover:bg-hover hover:cursor-pointer transition duration-100 ease-in-out rounded-md">
                        <img
                            style="filter: invert(93%) sepia(3%) saturate(536%) hue-rotate(329deg) brightness(104%) contrast(86%)"
                            class="h-6 w-6 my-auto" src="{{ Vite::svgs('settings.svg') }}" alt="Settings Logo">
                        <a class="my-auto" href="#">Settings</a>
                    </li>
                </ol>
            </div>
        </div>
        {{--        mt-10 max-w-[986px] mx-auto self-end h-screen --}}
        <main class="py-8 px-4 mx-auto h-screen">
            {{ $slot }}
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new table</h2>
            <x-forms.form action="/do" method="POST">
                <div class="commenttt">
                    {{--                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">--}}
                    {{--                    <div class="sm:col-span-2">--}}
                    {{--                        <x-forms.field type="text"--}}
                    {{--                                       name="table_name"--}}
                    {{--                                       placeholder="Type table's name"--}}
                    {{--                                       labelText="Table Name"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="w-full">--}}
                    {{--                        <x-forms.field type="text"--}}
                    {{--                                       name="brand"--}}
                    {{--                                       placeholder="Product brand"--}}
                    {{--                                       labelText="Brand"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="w-full">--}}
                    {{--                        <x-forms.field type="text"--}}
                    {{--                                       name="price"--}}
                    {{--                                       placeholder="$2999"--}}
                    {{--                                       labelText="Price"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div>--}}
                    {{--                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>--}}
                    {{--                        <select id="category"--}}
                    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">--}}
                    {{--                            <option selected="">Select category</option>--}}
                    {{--                            <option value="TV">TV/Monitors</option>--}}
                    {{--                            <option value="PC">PC</option>--}}
                    {{--                            <option value="GA">Gaming/Console</option>--}}
                    {{--                            <option value="PH">Phones</option>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    {{--                    <div>--}}
                    {{--                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item--}}
                    {{--                            Weight (kg)</label>--}}
                    {{--                        <input type="number" name="item-weight" id="item-weight"--}}
                    {{--                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"--}}
                    {{--                               placeholder="12" required="">--}}
                    {{--                    </div>--}}
                    {{--                    <div class="sm:col-span-2">--}}
                    {{--                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>--}}
                    {{--                        <textarea id="description" rows="8"--}}
                    {{--                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"--}}
                    {{--                                  placeholder="Your description here"></textarea>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="sm:col-span-2">--}}
                    {{--                        <x-forms.dropdown />--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
                <x-sections.card :reqData="$reqData" />
            </x-forms.form>
        </main>
    </div>
</div>
</body>
</html>
