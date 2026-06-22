@props([
    'eyebrow' => null,
    'title' => null,
    'intro' => null,
    'align' => 'left',  // left | center
    'tone' => 'dark',   // dark | light (for dark backgrounds)
])

@php
    $aligns = [
        'left'   => 'text-left',
        'center' => 'text-center mx-auto',
    ];
    $isLight = $tone === 'light';
    $titleColor = $isLight ? 'text-white' : 'text-stone-900';
    $introColor = $isLight ? 'text-stone-300' : 'text-stone-600';
    $eyebrowClass = $isLight ? 'text-brand-200' : 'text-brand-700';
@endphp

<div class="max-w-2xl {{ $aligns[$align] ?? $aligns['left'] }}"
     x-data="reveal"
     x-intersect.once="onIntersect()"
     class="fade-up">
    @if ($eyebrow)
        <span class="eyebrow {{ $eyebrowClass }}">{{ $eyebrow }}</span>
    @endif
    @if ($title)
        <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl {{ $titleColor }}">
            {{ $title }}
        </h2>
    @endif
    @if ($intro)
        <p class="mt-4 text-lg leading-relaxed {{ $introColor }}">{{ $intro }}</p>
    @endif
    {{ $slot }}
</div>
