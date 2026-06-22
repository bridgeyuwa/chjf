@props([
    'variant' => 'primary',  // primary | secondary | ghost | outline | white
    'size' => 'md',          // sm | md | lg
    'as' => 'a',             // a | button
    'type' => 'button',
    'href' => null,
])

@php
    $base = 'inline-flex items-center justify-center gap-1.5 rounded-lg font-semibold transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2';

    $variants = [
        'primary'   => 'bg-brand-600 text-white shadow-soft hover:bg-brand-700 hover:shadow-lifted',
        'secondary' => 'bg-brand-100 text-brand-800 hover:bg-brand-200',
        'outline'   => 'bg-white text-brand-700 ring-1 ring-inset ring-brand-200 hover:bg-brand-50 hover:ring-brand-300',
        'ghost'     => 'bg-transparent text-stone-700 hover:bg-stone-100',
        'white'     => 'bg-white text-brand-700 shadow-soft hover:bg-stone-50 hover:shadow-lifted',
        'danger'    => 'bg-rose-600 text-white shadow-soft hover:bg-rose-700',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-6 py-3.5 text-base',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if ($as === 'button')
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
