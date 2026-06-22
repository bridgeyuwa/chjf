@props([
    'variant' => 'brand',  // brand | spark | neutral | success | warning
    'size' => 'md',
])

@php
    $variants = [
        'brand'   => 'bg-brand-100 text-brand-800',
        'spark'   => 'bg-spark-400/20 text-spark-500',
        'neutral' => 'bg-stone-100 text-stone-700',
        'success' => 'bg-emerald-100 text-emerald-800',
        'warning' => 'bg-amber-100 text-amber-800',
    ];
    $sizes = [
        'sm' => 'px-2 py-0.5 text-[10px]',
        'md' => 'px-2.5 py-1 text-xs',
        'lg' => 'px-3 py-1.5 text-sm',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 rounded-full font-semibold ' . ($variants[$variant] ?? $variants['brand']) . ' ' . ($sizes[$size] ?? $sizes['md'])]) }}>
    {{ $slot }}
</span>
