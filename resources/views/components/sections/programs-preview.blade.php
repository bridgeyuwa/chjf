@php
    $programs = [
        [
            'slug' => 'hope-kitchen',
            'name' => 'Hope Kitchen',
            'tag' => 'Food Security',
            'desc' => 'Hot meals, dry rations, and emergency food parcels for families facing hunger across Abuja and surrounding states.',
            'img' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'stat' => '148,000+ meals served',
            'icon' => 'meal',
            'accent' => 'bg-amber-50 text-amber-700 ring-amber-200',
        ],
        [
            'slug' => 'safe-harbor',
            'name' => 'Safe Harbor',
            'tag' => 'Anti-Trafficking',
            'desc' => 'Rescue, recovery, and reintegration support for survivors of human trafficking and modern slavery.',
            'img' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'stat' => '320 survivors supported',
            'icon' => 'shield',
            'accent' => 'bg-rose-50 text-rose-700 ring-rose-200',
        ],
        [
            'slug' => 'pathways',
            'name' => 'Pathways',
            'tag' => 'Education & Jobs',
            'desc' => 'Scholarships, vocational training, and job placement for young people ready to build a future.',
            'img' => 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'stat' => '680 graduates employed',
            'icon' => 'book',
            'accent' => 'bg-sky-50 text-sky-700 ring-sky-200',
        ],
        [
            'slug' => 'healing-hands',
            'name' => 'Healing Hands',
            'tag' => 'Medical Care',
            'desc' => 'Free community clinics, maternal care, and emergency medical assistance for those without access.',
            'img' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'stat' => '4,200 consultations in 2024',
            'icon' => 'stethoscope',
            'accent' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
        ],
        [
            'slug' => 'bright-futures',
            'name' => 'Bright Futures',
            'tag' => 'Youth Mentorship',
            'desc' => 'One-to-one mentorship, life skills, and faith formation for young people aged 10–18.',
            'img' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'stat' => '1,150 youth mentored',
            'icon' => 'users',
            'accent' => 'bg-brand-50 text-brand-700 ring-brand-200',
        ],
    ];
@endphp

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <x-ui.section-heading
                eyebrow="What We Do"
                title="Five programs. One mission."
                intro="Each program is rooted in the conviction that every person bears the image of God — and deserves to be treated as such."
            />
            <div class="hidden sm:block">
                <x-ui.link-arrow href="{{ route('programs.index') }}">All programs</x-ui.link-arrow>
            </div>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
            @foreach ($programs as $i => $program)
                <a
                    href="{{ route('programs.show', $program['slug']) }}"
                    x-data="reveal({{ $i * 80 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up group flex flex-col overflow-hidden rounded-2xl bg-white shadow-card ring-1 ring-stone-200/60 transition-all duration-300 hover:-translate-y-1 hover:shadow-lifted"
                >
                    <div class="relative aspect-[3/2] overflow-hidden">
                        <img
                            src="{{ $program['img'] }}"
                            alt="{{ $program['name'] }}"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-900/50 via-transparent to-transparent"></div>
                        <span class="absolute left-3 top-3 inline-flex items-center rounded-full bg-white/95 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-widest text-stone-700 shadow-soft backdrop-blur">
                            {{ $program['tag'] }}
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="font-display text-xl font-semibold text-stone-900 group-hover:text-brand-700">{{ $program['name'] }}</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">{{ $program['desc'] }}</p>
                        <div class="mt-5 flex items-center justify-between border-t border-stone-100 pt-4">
                            <span class="text-xs font-semibold text-brand-700">{{ $program['stat'] }}</span>
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-stone-500 group-hover:text-brand-700">
                                Learn more
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center sm:hidden">
            <x-ui.button variant="outline" href="{{ route('programs.index') }}">All programs</x-ui.button>
        </div>
    </div>
</x-ui.section>
