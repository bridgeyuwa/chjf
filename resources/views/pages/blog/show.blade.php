@extends('layouts.app', [
    'title' => $post->title ?? 'Article',
    'description' => $post->excerpt ?? '',
])

@section('content')

<article>
    {{-- Header --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900">
        <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-24 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

        <div class="container-prose relative py-14 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-3xl text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-widest text-brand-200 hover:text-white">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    Back to all stories
                </a>
                <span class="mt-5 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/15">
                    <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                    {{ $post->category ?? 'Story' }}
                </span>
                <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    {{ $post->title }}
                </h1>
                <p class="mt-5 text-lg leading-relaxed text-brand-100">{{ $post->excerpt }}</p>
                <div class="mt-6 flex items-center justify-center gap-3 text-sm text-brand-200">
                    <span class="font-medium text-white">{{ $post->author ?? 'CHJ Team' }}</span>
                    <span>·</span>
                    <span>{{ isset($post->published_at) ? $post->published_at->format('j F Y') : date('j F Y') }}</span>
                    <span>·</span>
                    <span>{{ $post->reading_time ?? 4 }} min read</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured image --}}
    @if (!empty($post->featured_image))
        <div class="container-prose -mt-12 sm:-mt-16 relative z-10">
            <div class="aspect-[16/9] overflow-hidden rounded-2xl shadow-lifted ring-4 ring-white">
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="h-full w-full object-cover"/>
            </div>
        </div>
    @endif

    {{-- Body --}}
    <x-ui.section bg="white" spacing="default">
        <div class="container-narrow">
            <div class="prose-chj">
                @php
                    $body = $post->body ?? '
                        <p>The afternoon sun was relentless the day we met Amina. She was sitting on a low wall outside the Hope Kitchen in Gwarinpa, watching her three children line up with plastic bowls for the Saturday meal.</p>
                        <p>Her husband had died six months earlier — a sudden illness, no diagnosis, no insurance. The rent was overdue. The children were not in school. The bowl of rice and stew she was about to receive would be their only meal that day.</p>
                        <p>That was two years ago. Today, Amina works in the Hope Kitchen. She cooks the rice, hands out the bowls, knows every child by name. Her children are back in school, on CHJ Foundation scholarships. She still attends the Saturday meal — but now as a server, not a recipient.</p>
                        <h2>What changed</h2>
                        <p>When we met Amina, our team did not have a program for her. We had Hope Kitchen for food. We had Pathways for education. We had Bright Futures for mentorship. But we did not have a coordinated way to walk with a widow from crisis to stability.</p>
                        <p>So we created one. Amina was the first participant in what we now call our Family Resilience Program — a six-month wraparound support that includes food, school fees for children, vocational assessment, trauma counseling, and a clear path to employment.</p>
                        <blockquote>"They did not just give me food," Amina says. "They gave me back my dignity. Today I work in their kitchen, serving other mothers. I am not who I was two years ago."</blockquote>
                        <h2>The bigger picture</h2>
                        <p>Amina\'s story is one of dozens. Since 2023, 47 families have completed the Family Resilience Program. 89% are now economically self-sufficient. 100% have their children back in school.</p>
                        <p>Numbers tell part of the story. Amina tells the rest.</p>
                        <p>If you would like to support this work — whether through giving, volunteering, or partnership — we would love to hear from you. The next Amina is sitting on a wall somewhere right now, watching her children line up for a meal.</p>
                        <p>Will you help us find her?</p>
                    ';
                @endphp
                {!! $body !!}
            </div>

            {{-- Share + author --}}
            <div class="mt-12 border-t border-stone-200 pt-8">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-100 text-brand-700">
                            <span class="font-display text-lg font-semibold">{{ strtoupper(substr($post->author ?? 'CHJ Team', 0, 1)) }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-stone-900">{{ $post->author ?? 'CHJ Team' }}</p>
                            <p class="text-xs text-stone-500">{{ $post->author_bio ?? 'Staff writer, CHJ Foundation' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-widest text-stone-500">Share</span>
                        <a href="#" aria-label="Share on Facebook" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-stone-100 text-stone-600 hover:bg-brand-100 hover:text-brand-700">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12a12 12 0 10-13.9 11.9v-8.4H7.1V12h3V9.4c0-3 1.8-4.6 4.5-4.6 1.3 0 2.6.2 2.6.2v2.9h-1.5c-1.5 0-1.9.9-1.9 1.8V12h3.3l-.5 3.5h-2.8v8.4A12 12 0 0024 12z"/></svg>
                        </a>
                        <a href="#" aria-label="Share on X" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-stone-100 text-stone-600 hover:bg-brand-100 hover:text-brand-700">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.9 1.2h3.7l-8 9.1 9.4 12.5h-7.4l-5.8-7.6-6.6 7.6H1.5l8.5-9.7L.9 1.2h7.5l5.2 7 5.3-7z"/></svg>
                        </a>
                        <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode($post->excerpt) }}" aria-label="Share by email" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-stone-100 text-stone-600 hover:bg-brand-100 hover:text-brand-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

    {{-- CTA --}}
    <x-ui.section bg="muted" spacing="tight">
        <div class="container-narrow text-center">
            <h2 class="font-display text-2xl font-semibold text-stone-900 sm:text-3xl">Will you stand with families like Amina's?</h2>
            <p class="mt-3 text-stone-600">Your gift of ₦25,000 sponsors a child like Amina's for a month. Your time as a volunteer helps serve the meal that becomes a turning point.</p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <x-ui.button variant="primary" href="{{ route('get-involved.donate') }}">Donate</x-ui.button>
                <x-ui.button variant="outline" href="{{ route('get-involved.volunteer') }}">Volunteer</x-ui.button>
            </div>
        </div>
    </x-ui.section>
</article>

@endsection
