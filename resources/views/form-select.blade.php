<form action="/send-request" method="POST" class="grid grid-cols-2 gap-10" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-3">
        <x-form-field class="w-full" label="Request Name" id="request-name" type="text"
                      value="{{ old('request-name') }}" required autofocus/>
    </div>
    <div class="flex flex-col gap-3">
        <x-form-field class="w-full" label="Email Address" id="request-email" type="email"
                      value="{{ old('request-email') }}" required autofocus/>
    </div>
    <div class="flex flex-col gap-3">
        <label for="request-date">Request Date</label>
        <input class="bg-utility" id="request-date" name="request-date" value="{{ old('request-date') }}" type="date">
        @error('request-date')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div class="flex flex-col gap-3">
        <label for="request-tel">Telephone</label>
        <input class="bg-utility" id="request-tel" name="request-tel" value="{{ old('request-tel') }}" type="tel">
        @error('request-tel')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country:</label>
        <select id="country" name="country" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select a Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
            @endforeach
        </select>
        @error('country')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City:</label>
        <select id="city" name="city" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select a City</option>
        </select>
        @error('city')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label
            class="w-50 h-14 rounded-xl bg-utility flex items-center px-4 cursor-pointer hover:bg-hover"
            for="image-input">Image</label>
        <input id="image-input" type="file" name="image-input" hidden>
        @error('image-input')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="file-input"
               class="w-50 h-14 rounded-xl bg-utility flex items-center px-4 cursor-pointer hover:bg-hover"
        >File</label>
        <input id="file-input" type="file" name="file-input" hidden>
        @error('file-input')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div class="flex flex-row items-center gap-2">
        <input type="hidden" name="request-checkbox" value="0">
        <input type="checkbox" id="request-checkbox" name="request-checkbox" value="1">
        <label for="request-checkbox">
            <a href="#">Terms of Use</a> And <a href="#">Privacy Policy</a>
        </label>
        @error('request-checkbox')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <x-button class="col-span-2 w-50 mx-auto" type="submit" text="Send"/>
</form>
