<form action="{{ $action }}" method="GET" class="mx-auto flex flex-row justify-center items-center">
    {{--        <input type="hidden" name="sort_by" value="desc">--}}
    <div class="flex flex-col relative ">
        <x-form-field class="w-100 h-12" id="search-query" label="Search" type="text" value="{{ old('query', request('search-query')) }}"/>
        <x-button type="submit" text="Submit Search" class="absolute right-0 bottom-0 !rounded-l-none border border-l-stone-800 border-y-0 border-r-0 px-2"/>
    </div>
</form>
