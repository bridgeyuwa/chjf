@extends('layouts.app', [
    'title' => $event->title,
    'description' => $event->excerpt,
])

@section('content')

<article>
    {{-- Header --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900">
        <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-24 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

        <div class="container-prose relative py-14 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-3xl text-center">
                <a href="{{ route('events.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-widest text-brand-200 hover:text-white">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    Back to all events
                </a>
                <div class="mt-5 flex flex-wrap items-center justify-center gap-2">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/15">
                        <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                        {{ $event->category }}
                    </span>
                    @if ($event->is_free)
                        <span class="inline-flex items-center rounded-full bg-emerald-400/20 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-emerald-300 ring-1 ring-inset ring-emerald-400/30">Free</span>
                    @endif
                </div>
                <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    {{ $event->title }}
                </h1>
                <p class="mt-5 text-lg leading-relaxed text-brand-100">{{ $event->excerpt }}</p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-4 text-sm text-brand-200">
                    <span class="flex items-center gap-1.5">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ \Carbon\Carbon::parse($event->start_date)->format('l, j F Y · g:i A') }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $event->location }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured image --}}
    @if (!empty($event->image))
        <div class="container-prose -mt-12 sm:-mt-16 relative z-10">
            <div class="aspect-[16/9] overflow-hidden rounded-2xl shadow-lifted ring-4 ring-white">
                <img src="{{ $event->image }}" alt="{{ $event->title }}" class="h-full w-full object-cover" loading="lazy"/>
            </div>
        </div>
    @endif

    {{-- Body --}}
    <x-ui.section bg="white" spacing="default">
        <div class="container-narrow">
            @if (!empty($event->description))
                <div class="prose-chj">
                    <p>{{ $event->description }}</p>
                </div>
            @endif

            {{-- Details grid — uses the contact page's div+p pattern --}}
            <div class="mt-12 border-t border-stone-200 pt-8">
                <h2 class="font-display text-2xl font-semibold text-stone-900">Event details</h2>
                <div class="mt-6 grid gap-6 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Date &amp; time</p>
                        <p class="mt-1 font-medium text-stone-800">{{ \Carbon\Carbon::parse($event->start_date)->format('l, j F Y') }}</p>
                        <p class="text-sm text-stone-600">
                            {{ \Carbon\Carbon::parse($event->start_date)->format('g:i A') }}
                            @if ($event->end_date)
                                — {{ \Carbon\Carbon::parse($event->end_date)->format('g:i A') }}
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Location</p>
                        <p class="mt-1 font-medium text-stone-800">{{ $event->location }}</p>
                        @if ($event->venue_address)
                            <p class="text-sm text-stone-600">{{ $event->venue_address }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Cost</p>
                        @if ($event->is_free)
                            <p class="mt-1 font-medium text-emerald-700">Free admission</p>
                        @elseif ($event->price)
                            <p class="mt-1 font-medium text-stone-800">₦{{ number_format($event->price) }}</p>
                        @else
                            <p class="mt-1 text-sm text-stone-600">See details</p>
                        @endif
                    </div>
                    @if ($event->capacity)
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Capacity</p>
                            <p class="mt-1 font-medium text-stone-800">{{ $event->registered ?? 0 }} / {{ $event->capacity }} registered</p>
                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-stone-200">
                                <div class="h-full rounded-full bg-brand-500" style="width: {{ min(100, (($event->registered ?? 0) / max(1, $event->capacity)) * 100) }}%"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-ui.section>

    {{-- CTA --}}
    <x-ui.section bg="muted" spacing="tight">
        <div class="container-narrow text-center">
            <h2 class="font-display text-2xl font-semibold text-stone-900 sm:text-3xl">Want to join us?</h2>
            <p class="mt-3 text-stone-600">Contact us to confirm your attendance or ask any questions about this event.</p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <x-ui.button variant="primary" href="{{ route('contact') }}">Contact us</x-ui.button>
                <x-ui.button variant="outline" href="{{ route('events.index') }}">All events</x-ui.button>
            </div>
        </div>
    </x-ui.section>
</article>

@endsection
