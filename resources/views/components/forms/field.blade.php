@props(['name', 'type', 'placeholder', 'labelText', 'labelClass'])

@php
    $labelDefaults = [
        'for'=>$name,
        'class' => ' block mb-2 text-sm font-medium text-gray-900 dark:text-white '. $labelClass,
    ];
@endphp

@if ($labelText)
    <label {{ $attributes($labelDefaults) }}>
        {{ $labelText }}
    </label>
    <x-forms.input :$type :$name :$placeholder/>
@endif
