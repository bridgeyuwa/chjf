{{--
    Upcoming events preview — used on home page.
    Shows 3 event cards pulled from the events table via the controller.
--}}
@props(['events' => []])

<x-ui.section bg="muted" spacing="default">
    <div class="container-prose">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <x-ui.section-heading
                eyebrow="What's Next"
                title="Upcoming events & gatherings"
                intro="Join us in person or in prayer — every gathering is an open invitation."
            />
            <div class="hidden sm:block">
                <x-ui.link-arrow href="{{ route('events.index') }}">All events</x-ui.link-arrow>
            </div>
        </div>

        @if (count($events) > 0)
            <div class="mt-12 grid gap-6 lg:grid-cols-3 lg:gap-8">
                @foreach ($events as $i => $event)
                    <article
                        x-data="reveal({{ $i * 80 }})"
                        x-intersect.once="onIntersect()"
                        class="fade-up flex flex-col rounded-2xl bg-white p-6 shadow-card ring-1 ring-stone-200/60 transition-all hover:shadow-lifted"
                    >
                        <div class="flex items-center gap-3">
                            <div class="flex h-14 w-14 flex-col items-center justify-center rounded-xl bg-brand-50 text-brand-700 ring-1 ring-brand-100">
                                <span class="text-[10px] font-semibold uppercase">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                                <span class="font-display text-xl font-semibold leading-none">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</span>
                            </div>
                            <div class="flex-1">
                                <span class="inline-block rounded-full bg-stone-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-widest text-stone-600">
                                    {{ $event->category }}
                                </span>
                                <p class="mt-1 text-xs text-stone-500">{{ \Carbon\Carbon::parse($event->start_date)->format('l, g:i A') }} · {{ $event->location }}</p>
                            </div>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold text-stone-900">{{ $event->title }}</h3>
                        <p class="mt-2 flex-1 text-sm text-stone-600">{{ $event->excerpt }}</p>
                        <a href="{{ route('events.show', $event) }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700 hover:text-brand-800">
                            View details
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="mt-12 rounded-2xl bg-white p-8 text-center ring-1 ring-stone-200/60">
                <p class="text-sm text-stone-500">No events scheduled at the moment. Check back soon — or subscribe to our newsletter below.</p>
            </div>
        @endif
    </div>
</x-ui.section>
