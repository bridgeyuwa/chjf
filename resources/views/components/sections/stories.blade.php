@php
    $stories = [
        [
            'quote' => 'When my husband passed, I had no idea how to feed my four children. Hope Kitchen didn\'t just give us food — they gave me back my dignity. Today I work in their kitchen, serving other mothers.',
            'name' => 'Amina',
            'detail' => 'Mother of four · Gwarinpa',
            'img' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'program' => 'Hope Kitchen',
        ],
        [
            'quote' => 'I was 16 when Safe Harbor found me. I had given up hope of ever seeing my family again. Today I am in university studying social work — because someone believed I was worth rescuing.',
            'name' => 'Grace',
            'detail' => 'Survivor · Pathways graduate',
            'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'program' => 'Safe Harbor',
        ],
        [
            'quote' => 'Volunteering with Bright Futures has changed me more than the youth I mentor. Watching a shy 12-year-old grow into a confident young leader is the closest thing to miracles I have seen.',
            'name' => 'David',
            'detail' => 'Volunteer mentor · 3 years',
            'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'program' => 'Bright Futures',
        ],
    ];
@endphp

<x-ui.section bg="gradient" spacing="default">
    <div class="container-prose">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/20">
                <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                Stories of Hope
            </span>
            <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                Real lives. Real transformation.
            </h2>
            <p class="mt-4 text-lg leading-relaxed text-brand-100">
                These are composite stories representing the thousands of people we have walked alongside. Names have been changed to protect privacy — the journeys are real.
            </p>
        </div>

        <div class="mt-12 grid gap-6 lg:grid-cols-3 lg:gap-8">
            @foreach ($stories as $i => $story)
                <article
                    x-data="reveal({{ $i * 100 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up flex flex-col rounded-2xl bg-white/5 p-6 ring-1 ring-inset ring-white/10 backdrop-blur-sm transition-colors hover:bg-white/10 sm:p-8"
                >
                    <svg class="h-8 w-8 text-spark-400" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6.5 10c-.7 0-1.3-.2-1.8-.7-.5-.5-.7-1.1-.7-1.8 0-1.5 1-3 3-4l.5 1c-1.3.7-1.9 1.5-2 2.5.3-.2.6-.3 1-.3.7 0 1.3.2 1.8.7.5.5.7 1.1.7 1.8s-.2 1.3-.7 1.8c-.5.5-1.1.7-1.8.7zm10 0c-.7 0-1.3-.2-1.8-.7-.5-.5-.7-1.1-.7-1.8 0-1.5 1-3 3-4l.5 1c-1.3.7-1.9 1.5-2 2.5.3-.2.6-.3 1-.3.7 0 1.3.2 1.8.7.5.5.7 1.1.7 1.8s-.2 1.3-.7 1.8c-.5.5-1.1.7-1.8.7z"/>
                    </svg>
                    <p class="mt-4 flex-1 text-base leading-relaxed text-white">
                        {{ $story['quote'] }}
                    </p>
                    <footer class="mt-6 flex items-center gap-4 border-t border-white/10 pt-5">
                        <img src="{{ $story['img'] }}" alt="" class="h-12 w-12 rounded-full object-cover ring-2 ring-white/20" loading="lazy"/>
                        <div class="flex-1">
                            <p class="font-semibold text-white">{{ $story['name'] }}</p>
                            <p class="text-xs text-brand-200">{{ $story['detail'] }}</p>
                        </div>
                        <span class="rounded-full bg-brand-500/20 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-widest text-brand-200 ring-1 ring-inset ring-brand-400/30">
                            {{ $story['program'] }}
                        </span>
                    </footer>
                </article>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <x-ui.button variant="white" size="lg" href="{{ route('blog.index') }}?category=stories">
                Read more stories
            </x-ui.button>
        </div>
    </div>
</x-ui.section>
