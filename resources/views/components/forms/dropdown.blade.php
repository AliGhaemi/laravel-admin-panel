<div class="w-60 h-50 dropdown">
    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
            class="dropdown-button w-full inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Dropdown search
        <svg class="w-2.5 h-2.5 ms-2.5 ml-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    <div class="dropdown-list hidden bg-white shadow-sm dark:bg-gray-700 h-full overflow-auto">
        <div class="p-3">
            <label for="input-column-expression" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="input-column-expression"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search expression">
            </div>
        </div>
        <ul class="px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownSearchButton">
            <li class="dropdown-list-item">
                <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                    <label for="input-hidden-item-1"
                           class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                        Data Type
                    </label>
{{--                    <input type="hidden" id="input-hidden-item-1" name="input-hidden-item-1">--}}
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                    <label for="checkbox-item-2"
                           class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                        Time
                    </label>
{{--                    <input type="hidden" id="input-hidden-item-2" name="input-hidden-item-2">--}}
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                    <label for="checkbox-item-3"
                           class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                        Length
                    </label>
{{--                    <input type="hidden" id="input-hidden-item-3" name="input-hidden-item-3">--}}
                </div>
            </li>
        </ul>
        <button type="submit"
                class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-500 hover:underline">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 18">
                <path
                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-6a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2Z"/>
            </svg>
            Send Data
        </button>
    </div>
</div>
