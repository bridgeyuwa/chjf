@props([
    'src' => null,
    'alt' => '',
    'ratio' => '4/3',  // 4/3 | 16/9 | 1/1 | 3/2 | 3/4
    'rounded' => '2xl',
    'overlay' => false,  // add subtle bottom-up gradient overlay
])

@php
    $ratios = [
        '4/3'  => 'aspect-[4/3]',
        '16/9' => 'aspect-[16/9]',
        '1/1'  => 'aspect-square',
        '3/2'  => 'aspect-[3/2]',
        '3/4'  => 'aspect-[3/4]',
    ];
    $roundedClass = 'rounded-' . $rounded;
@endphp

<div class="overflow-hidden {{ $roundedClass }} bg-stone-100 ring-1 ring-stone-200/60 {{ $ratios[$ratio] ?? $ratios['4/3'] }} {{ $attributes->get('class') }}">
    <div class="relative h-full w-full">
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            loading="lazy"
            decoding="async"
            class="h-full w-full object-cover"
        />
        @if ($overlay)
            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/60 via-transparent to-transparent"></div>
        @endif
        @if (isset($caption))
            <figcaption class="absolute bottom-3 left-3 right-3 text-xs text-white/90">{{ $caption }}</figcaption>
        @endif
    </div>
</div>
