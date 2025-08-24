@props(['name','type', 'placeholder'])
@php
    $defaults = [
        'type' => $type,
        'id'=>$name,
        'name' => $name,
        'placeholder' => $placeholder,
        'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
        'value' => old($name),
    ]
@endphp

<input {{ $attributes($defaults) }}>

