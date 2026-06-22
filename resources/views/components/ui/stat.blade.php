@props([
    'value' => null,
    'label' => null,
    'sublabel' => null,
    'icon' => null,
    'tone' => 'brand',  // brand | spark | neutral
])

@php
    $tones = [
        'brand'   => 'bg-brand-50 text-brand-700',
        'spark'   => 'bg-spark-400/20 text-spark-500',
        'neutral' => 'bg-stone-100 text-stone-700',
    ];
    $iconBg = $tones[$tone] ?? $tones['brand'];
@endphp

<div
    x-data="reveal"
    x-intersect.once="onIntersect()"
    class="fade-up flex flex-col gap-3"
>
    @if ($icon)
        <div class="flex h-11 w-11 items-center justify-center rounded-xl {{ $iconBg }}">
            @if ($icon === 'meal')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v6H3zM5 9v11a1 1 0 001 1h12a1 1 0 001-1V9M9 13h6"/></svg>
            @elseif ($icon === 'home')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h4v-6h6v6h4V10"/></svg>
            @elseif ($icon === 'book')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            @elseif ($icon === 'shield')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 5.25-4.5 9.75-9 9.75S3 17.25 3 12V5.25l9-3 9 3V12z"/></svg>
            @elseif ($icon === 'heart')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
            @elseif ($icon === 'stethoscope')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.25v3m0-3h-1.5m1.5 0H9m-3.75 3v6.75A4.5 4.5 0 0010.5 19.5h1a4.5 4.5 0 004.5-4.5V8.25M19.5 12a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
            @elseif ($icon === 'briefcase')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.073a2.25 2.25 0 01-2.25 2.25h-12a2.25 2.25 0 01-2.25-2.25v-4.073m16.5 0a2.25 2.25 0 00-2.25-2.25h-12a2.25 2.25 0 00-2.25 2.25m16.5 0V9a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 9v5.15"/></svg>
            @elseif ($icon === 'users')
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
            @elseif ($icon === 'spark')
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
            @endif
        </div>
    @endif

    <div>
        <p class="font-display text-3xl font-semibold text-stone-900 sm:text-4xl">{{ $value }}</p>
        @if ($label)
            <p class="mt-1 text-sm font-medium text-stone-700">{{ $label }}</p>
        @endif
        @if ($sublabel)
            <p class="mt-0.5 text-xs text-stone-500">{{ $sublabel }}</p>
        @endif
    </div>
</div>
