@extends('layouts.app', [
    'title' => 'Home',
    'description' => 'Compassionate Heart of Jesus Foundation — bringing hope and healing to a hurting world from Abuja, Nigeria. Food, shelter, education, medical care, and anti-trafficking programs.',
])

@section('content')

    {{-- 1. Hero (split layout, purple + photo) --}}
    @include('components.sections.hero')

    {{-- 2. Mission statement band --}}
    <x-ui.section bg="white" spacing="default">
        <div class="container-prose">
            <div class="mx-auto max-w-3xl text-center fade-up"
                 x-data="reveal"
                 x-intersect.once="onIntersect()">
                <span class="eyebrow justify-center">Who We Are</span>
                <p class="mt-5 font-display text-2xl font-medium leading-relaxed text-stone-800 sm:text-3xl sm:leading-relaxed">
                   Our Mission is to Listen, to Serve,and Love, that all
may know the transformative power of Jesus’s
Compassionate Heart
                </p>
                <p class="mt-6 text-base text-stone-600">
                    Empowered by the love of Jesus Christ, we envision
a world where every individual is treated with dignity,
and compassion, regardless of their religious
background, circumstances or struggles. (Mat9:36)
We see a community that embodies the heart of
Jesus Christ, offering hope, healing and support to
the marginalized or oppressed. (Mat11:28-30)
Through our words & actions, we strive to be a
beacon of love, fostering a culture of " empathy,
kindness & grace.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <x-ui.button variant="primary" href="{{ route('about') }}">Our story</x-ui.button>
                    <x-ui.button variant="outline" href="{{ route('programs.index') }}">Explore programs</x-ui.button>
                </div>
            </div>
        </div>
    </x-ui.section>

    {{-- 3. Impact stats --}}
    @include('components.sections.impact-stats')

    {{-- 4. Programs preview --}}
    @include('components.sections.programs-preview')

    {{-- 5. Featured story / story video block --}}
    <x-ui.section bg="white" spacing="default">
        <div class="container-prose">
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="relative fade-up"
                     x-data="reveal"
                     x-intersect.once="onIntersect()">
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl shadow-lifted">
                        <img
                            src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Volunteers preparing meals in the Hope Kitchen"
                            class="h-full w-full object-cover"
                            loading="lazy"
                        />
                    </div>
                    <div class="absolute -bottom-6 -right-4 hidden rounded-2xl bg-white p-5 shadow-lifted ring-1 ring-stone-200/60 sm:block">
                        <p class="font-display text-2xl font-semibold text-brand-700">2018</p>
                        <p class="mt-1 text-xs text-stone-500">Serving since</p>
                    </div>
                </div>
                <div
                    x-data="reveal(120)"
                    x-intersect.once="onIntersect()"
                    class="fade-up"
                >
                    <span class="eyebrow">Why we exist</span>
                    <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">
                        A hurting world needs more than words.
                    </h2>
                    <p class="mt-5 text-lg leading-relaxed text-stone-600">
                        Nigeria is home to over 200 million people — and to profound inequality. In the corners of Abuja's satellite settlements, in the rural villages of Niger state, in the camps for displaced families, the need is overwhelming.
                    </p>
                    <p class="mt-4 text-base leading-relaxed text-stone-600">
                        We do not pretend to solve everything. But we believe small acts of compassion, faithfully carried out, change the world one life at a time. That is the heart of Jesus — and that is the heart of this foundation.
                    </p>
                    <ul class="mt-6 space-y-3">
                        @foreach (['Faith-rooted, action-driven', 'Local staff, local solutions', 'Transparent stewardship of every gift', 'Partnership over pity'] as $value)
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                <span class="text-stone-700">{{ $value }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        <x-ui.button variant="primary" href="{{ route('about') }}#mission">
                            Read our mission & values
                        </x-ui.button>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

    {{-- 6. Stories (gradient band) --}}
    @include('components.sections.stories')

    {{-- 7. Events preview --}}
    @include('components.sections.events-preview', ['events' => $upcomingEvents ?? []])

    {{-- 8. Partners strip --}}
    @include('components.sections.partners')

    {{-- 9. Volunteer CTA --}}
    @include('components.sections.cta-band', ['variant' => 'volunteer'])

    {{-- 10. Donate CTA --}}
    @include('components.sections.cta-band', ['variant' => 'donate'])

@endsection
