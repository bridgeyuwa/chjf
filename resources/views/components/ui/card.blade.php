@props([
    'variant' => 'default',  // default | muted | brand | dark
    'as' => 'div',
    'padding' => 'default',  // default | tight | none
])

@php
    $variants = [
        'default' => 'bg-white ring-1 ring-stone-200/60 shadow-card',
        'muted'   => 'bg-stone-50 ring-1 ring-stone-200/60',
        'brand'   => 'bg-brand-50 ring-1 ring-brand-200/60',
        'dark'    => 'bg-stone-900 ring-1 ring-stone-800 text-white',
    ];
    $paddings = [
        'default' => 'p-6 sm:p-8',
        'tight'   => 'p-4 sm:p-5',
        'none'    => '',
    ];
    $classes = 'rounded-2xl ' . ($variants[$variant] ?? $variants['default']) . ' ' . ($paddings[$padding] ?? $paddings['default']);
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $as }}>
