@props([
    'bg' => 'white',  // white | muted | brand | dark | gradient
    'spacing' => 'default',  // default | tight | none
    'id' => null,
    'class' => '',
])

@php
    $bgs = [
        'white'    => 'bg-white',
        'muted'    => 'bg-stone-50',
        'brand'    => 'bg-brand-50',
        'dark'     => 'bg-stone-900 text-stone-300',
        'gradient' => 'bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 text-white',
    ];
    $spacings = [
        'default' => 'py-16 sm:py-20 lg:py-28',
        'tight'   => 'py-12 sm:py-16 lg:py-20',
        'none'    => '',
    ];
    $classes = $bgs[$bg] . ' ' . $spacings[$spacing] . ' ' . $class;
@endphp

<section id="{{ $id }}" class="{{ $classes }}">
    {{ $slot }}
</section>
