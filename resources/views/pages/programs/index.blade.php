@extends('layouts.app', [
    'title' => 'Programs',
    'description' => 'Five core programs of CHJ Foundation — Hope Kitchen (food security), Safe Harbor (anti-trafficking), Pathways (education & jobs), Healing Hands (medical care), and Bright Futures (youth mentorship).',
])

@section('content')

<x-ui.page-hero
    eyebrow="Our Programs"
    title="Five programs. One mission. Thousands of lives."
    intro="Each program began by listening to a community tell us what they needed most. Each one is led by local staff who live in the communities they serve."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="mx-auto max-w-3xl text-center"
             x-data="reveal"
             x-intersect.once="onIntersect()"
             class="fade-up">
            <p class="text-lg leading-relaxed text-stone-600">
                We deliberately keep our focus narrow. Rather than spreading thin across dozens of causes, we run five programs — each deeply, faithfully, and with measurable impact. Click any program to learn how it works, who it serves, and what difference it makes.
            </p>
        </div>

        <div class="mt-16 space-y-16">
            @php
                $programs = [
                    [
                        'slug' => 'hope-kitchen',
                        'name' => 'Hope Kitchen',
                        'tag' => 'Food Security',
                        'desc' => 'Hot meals, dry rations, and emergency food parcels for families facing hunger. Operating since 2018 — the original program of CHJ Foundation.',
                        'img' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'stat' => '148,000+ meals served',
                        'served' => 'Families in informal settlements across Abuja, displaced persons in Borno & Plateau camps, elderly living alone.',
                        'approach' => 'Weekly community meals in 3 locations, biweekly dry ration distribution to 600+ families, emergency food response within 48 hours of crisis.',
                    ],
                    [
                        'slug' => 'safe-harbor',
                        'name' => 'Safe Harbor',
                        'tag' => 'Anti-Trafficking',
                        'desc' => 'Rescue, recovery, and reintegration support for survivors of human trafficking and modern slavery — in partnership with NAPTIP.',
                        'img' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'stat' => '320 survivors supported',
                        'served' => 'Women and children trafficked internally or across borders, primarily for domestic servitude and sexual exploitation.',
                        'approach' => '24/7 rescue line, safe house with capacity for 20 survivors, trauma-informed counseling, family reunification, vocational training, legal advocacy.',
                    ],
                    [
                        'slug' => 'pathways',
                        'name' => 'Pathways',
                        'tag' => 'Education & Jobs',
                        'desc' => 'Scholarships, vocational training, and job placement for young people ready to build a future — including trafficking survivors reintegrating.',
                        'img' => 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'stat' => '680 graduates employed',
                        'served' => 'Youth aged 16–30 from low-income backgrounds, secondary school dropouts, trafficking survivors, young mothers.',
                        'approach' => 'Full secondary scholarships for 200 students, vocational training in 6 trades (tailoring, catering, IT, hairdressing, plumbing, solar installation), job placement with corporate partners.',
                    ],
                    [
                        'slug' => 'healing-hands',
                        'name' => 'Healing Hands',
                        'tag' => 'Medical Care',
                        'desc' => 'Free community clinics, maternal care, and emergency medical assistance for those without access to healthcare.',
                        'img' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'stat' => '4,200 consultations in 2024',
                        'served' => 'Uninsured families, pregnant women without antenatal care, children needing vaccinations, chronic illness patients.',
                        'approach' => 'Two permanent clinics in Jabi and Nyanya, monthly mobile clinics to rural communities, maternal care program serving 180 women annually, emergency medical fund for life-threatening cases.',
                    ],
                    [
                        'slug' => 'bright-futures',
                        'name' => 'Bright Futures',
                        'tag' => 'Youth Mentorship',
                        'desc' => 'One-to-one mentorship, life skills, and faith formation for young people aged 10–18 — building the next generation of compassionate leaders.',
                        'img' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'stat' => '1,150 youth mentored',
                        'served' => 'Youth aged 10–18 from low-income families, at-risk youth, children of single parents, youth in foster care.',
                        'approach' => 'One-to-one mentor matching with trained adult volunteers, weekly group sessions on life skills and character, holiday camps, faith formation in partnership with local churches.',
                    ],
                ];
            @endphp

            @foreach ($programs as $i => $program)
                <article
                    x-data="reveal({{ $i * 60 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up grid items-center gap-8 lg:grid-cols-2 lg:gap-12 {{ $i % 2 === 1 ? 'lg:[&>*:first-child]:order-last' : '' }}"
                >
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl shadow-lifted">
                        <img src="{{ $program['img'] }}" alt="{{ $program['name'] }}" class="h-full w-full object-cover" loading="lazy"/>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-700 ring-1 ring-inset ring-brand-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                            {{ $program['tag'] }}
                        </span>
                        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">{{ $program['name'] }}</h2>
                        <p class="mt-4 text-base leading-relaxed text-stone-600">{{ $program['desc'] }}</p>

                        <dl class="mt-6 space-y-3">
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-widest text-stone-500">Who we serve</dt>
                                <dd class="mt-1 text-sm text-stone-700">{{ $program['served'] }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-widest text-stone-500">Our approach</dt>
                                <dd class="mt-1 text-sm text-stone-700">{{ $program['approach'] }}</dd>
                            </div>
                        </dl>

                        <div class="mt-6 flex items-center justify-between border-t border-stone-200 pt-5">
                            <p class="font-display text-xl font-semibold text-brand-700">{{ $program['stat'] }}</p>
                            <x-ui.button variant="primary" href="{{ route('programs.show', $program['slug']) }}">
                                Explore program
                            </x-ui.button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-ui.section>

@include('components.sections.cta-band', ['variant' => 'volunteer'])

@endsection
