@extends('layouts.app', [
    'title' => 'Events',
    'description' => 'Upcoming events, gatherings, fundraisers, and mission trips with CHJ Foundation in Abuja and beyond.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Events"
    title="Come and see. Come and serve. Come and pray."
    intro="From community meals to fundraising galas, holiday camps to mission trips — there are many ways to gather with us throughout the year."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">

        {{-- Filter --}}
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-stone-200 pb-6">
            <div class="flex flex-wrap gap-2">
                @foreach (['All', 'Community', 'Fundraiser', 'Volunteer', 'Prayer', 'Camp'] as $i => $cat)
                    <a href="?category={{ strtolower($cat) }}"
                       class="rounded-full px-3 py-1.5 text-xs font-semibold uppercase tracking-widest transition-colors
                       @if (request('category', 'all') === strtolower($cat) || ($i === 0 && !request('category')))
                           bg-brand-600 text-white shadow-soft
                       @else
                           bg-stone-100 text-stone-700 hover:bg-brand-100 hover:text-brand-700
                       @endif">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>

        @if (count($events) > 0)
            <div class="mt-10 space-y-6">
                @foreach ($events as $i => $event)
                    <article
                        x-data="reveal({{ $i * 60 }})"
                        x-intersect.once="onIntersect()"
                        class="fade-up grid gap-6 rounded-2xl bg-white p-6 shadow-card ring-1 ring-stone-200/60 transition-all hover:shadow-lifted sm:grid-cols-[auto,1fr,auto] sm:items-center"
                    >
                        {{-- Date block --}}
                        <div class="flex h-20 w-20 flex-col items-center justify-center rounded-xl bg-brand-50 text-brand-700 ring-1 ring-brand-100">
                            <span class="text-[10px] font-semibold uppercase">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                            <span class="font-display text-2xl font-semibold leading-none">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</span>
                            <span class="text-[10px] text-brand-600">{{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}</span>
                        </div>

                        {{-- Content --}}
                        <div>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="inline-block rounded-full bg-stone-100 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-widest text-stone-600">{{ $event->category }}</span>
                                @if (!empty($event->is_free))
                                    <span class="inline-block rounded-full bg-emerald-100 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-widest text-emerald-700">Free</span>
                                @endif
                            </div>
                            <h2 class="mt-2 font-display text-xl font-semibold text-stone-900 sm:text-2xl">
                                <a href="{{ route('events.show', $event) }}" class="hover:text-brand-700">{{ $event->title }}</a>
                            </h2>
                            <p class="mt-1.5 text-sm text-stone-600">{{ $event->excerpt }}</p>
                            <div class="mt-3 flex flex-wrap items-center gap-4 text-xs text-stone-500">
                                <span class="flex items-center gap-1">
                                    <svg class="h-3.5 w-3.5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('l, g:i A') }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="h-3.5 w-3.5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $event->location }}
                                </span>
                            </div>
                        </div>

                        {{-- CTA --}}
                        <div class="sm:justify-self-end">
                            <x-ui.button variant="primary" size="sm" href="{{ route('events.show', $event) }}">
                                Details
                            </x-ui.button>
                        </div>
                    </article>
                @endforeach
            </div>

            @if (method_exists($events, 'links'))
                <div class="mt-10">{{ $events->withQueryString()->links() }}</div>
            @endif
        @else
            <div class="mt-10 rounded-2xl bg-stone-50 p-12 text-center ring-1 ring-stone-200/60">
                <svg class="mx-auto h-12 w-12 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <h3 class="mt-4 font-display text-lg font-semibold text-stone-900">No events scheduled right now</h3>
                <p class="mt-1 text-sm text-stone-500">Check back soon — or subscribe to our newsletter below to be the first to know.</p>
                <div class="mt-5">
                    <x-ui.button variant="outline" href="#newsletter">Subscribe to updates</x-ui.button>
                </div>
            </div>
        @endif
    </div>
</x-ui.section>

@endsection
