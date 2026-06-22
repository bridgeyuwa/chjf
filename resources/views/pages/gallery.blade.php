@extends('layouts.app', [
    'title' => 'Gallery',
    'description' => 'Photos from CHJ Foundation programs across Nigeria — Hope Kitchen, Safe Harbor, Pathways, Healing Hands, and Bright Futures.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Gallery"
    title="Faces of the work."
    intro="Real people, real moments, real compassion. A photo essay from our programs across Abuja, Niger, and Plateau states."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">

        {{-- Filter chips --}}
        <div class="flex flex-wrap gap-2 border-b border-stone-200 pb-6">
            @foreach (['All', 'Hope Kitchen', 'Safe Harbor', 'Pathways', 'Healing Hands', 'Bright Futures', 'Events'] as $i => $cat)
                <a href="?program={{ urlencode(strtolower($cat)) }}"
                   class="rounded-full px-3 py-1.5 text-xs font-semibold uppercase tracking-widest transition-colors
                   @if (request('program', 'all') === strtolower($cat) || ($i === 0 && !request('program')))
                       bg-brand-600 text-white shadow-soft
                   @else
                       bg-stone-100 text-stone-700 hover:bg-brand-100 hover:text-brand-700
                   @endif">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        @php
            $photos = [
                ['src' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80', 'alt' => 'Hope Kitchen — Saturday meal service', 'caption' => 'Saturday meal service · Jabi', 'span' => 'lg:col-span-2'],
                ['src' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Children with bowls of food', 'caption' => 'Children receiving meals', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Youth mentorship session', 'caption' => 'Bright Futures mentorship', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80', 'alt' => 'Pathways classroom', 'caption' => 'Pathways vocational training', 'span' => 'lg:col-span-2'],
                ['src' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Healing Hands clinic', 'caption' => 'Healing Hands clinic · Nyanya', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Mobile medical clinic', 'caption' => 'Mobile clinic · Niger State', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Counseling session', 'caption' => 'Safe Harbor counseling', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1530541930197-ff16ac917b0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Group session', 'caption' => 'Youth group session', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1607582544185-66fdfaee69ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80', 'alt' => 'Dry ration distribution', 'caption' => 'Dry ration distribution · Gwarinpa', 'span' => 'lg:col-span-2'],
                ['src' => 'https://images.unsplash.com/photo-1572177812156-58036aae439c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Tailoring workshop', 'caption' => 'Pathways tailoring workshop', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'IT training', 'caption' => 'Pathways IT training', 'span' => ''],
                ['src' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'alt' => 'Holiday camp', 'caption' => 'Bright Futures holiday camp', 'span' => ''],
            ];
        @endphp

        <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
            @foreach ($photos as $i => $photo)
                <figure
                    x-data="reveal({{ ($i % 4) * 80 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up group relative overflow-hidden rounded-2xl bg-stone-100 shadow-card {{ $photo['span'] ?? '' }}"
                >
                    <img src="{{ $photo['src'] }}" alt="{{ $photo['alt'] }}" loading="lazy" class="aspect-[4/3] h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                    <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-stone-900/80 to-transparent p-4 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100">
                        {{ $photo['caption'] }}
                    </figcaption>
                </figure>
            @endforeach
        </div>

        <p class="mt-10 text-center text-xs text-stone-500">
            All photos used are royalty-free Unsplash imagery used as placeholders. Real CHJ Foundation photography to be added before launch. Privacy and dignity of those we serve is paramount in our photo policy.
        </p>
    </div>
</x-ui.section>

@endsection
