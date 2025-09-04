<label for="{{ $id }}">{{ $label }}</label>
@if($type == 'textarea')
    <textarea {{ $attributes->merge(['class' => 'bg-utility rounded-lg h-40']) }}
              id="{{ $id }}" type="{{ $type }}" name="{{ $id }}" value="{{ $value }}"></textarea>
@else
    <input {{ $attributes->merge(['class' => 'bg-utility rounded-lg h-10']) }}
           id="{{ $id }}" type="{{ $type }}" name="{{ $id }}" value="{{ $value }}">
@endif
{{--        @error('name')--}}
{{--        <div style="color: red;">{{ $message }}</div>--}}
{{--        @enderror--}}
