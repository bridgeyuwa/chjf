@props(['size' => 'default', 'class' => ''])

@php
    $sizes = [
        'default' => 'container-prose',
        'narrow'  => 'container-narrow',
        'full'    => 'mx-auto w-full max-w-[96rem] px-5 sm:px-6 lg:px-8',
    ];
@endphp

<div class="{{ $sizes[$size] ?? $sizes['default'] }} {{ $class }}">
    {{ $slot }}
</div>
