@extends('layouts.app', [
    'title' => 'About Us',
    'description' => 'The story, mission, and values of Compassionate Heart of Jesus Foundation — a faith-based ministry serving the most vulnerable from Abuja, Nigeria since 2018.',
])

@section('content')

<x-ui.page-hero
    eyebrow="About CHJ Foundation"
    title="A small act of compassion, faithfully repeated, can change a community."
    intro="Founded in 2018 in Abuja, we are a faith-rooted ministry serving thousands of people across Nigeria — through food, shelter, education, medical care, and protection from exploitation."
/>

{{-- Story --}}
<x-ui.section id="story" bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="eyebrow">Our Story</span>
                <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">
                    It began with a pot of rice.
                </h2>
                <div class="mt-6 space-y-4 text-base leading-relaxed text-stone-600">
                    <p>In 2018, a small group of friends from three different churches in Abuja started cooking rice and stew every Saturday in a borrowed kitchen in Wuse 2. They carried the pots to a settlement of displaced families in Jabi, where 40 children would line up with plastic bowls.</p>
                    <p>Within six months, the line had grown to 200. Within a year, the team was running a weekly meal program, a small after-school study group, and a free clinic once a month with a volunteer doctor.</p>
                    <p>They registered as a non-profit in 2019, named after the devotion to the Compassionate Heart of Jesus — a reminder that the work was never about the founders, but about the One who first showed us what compassion looks like.</p>
                    <p>Today, CHJ Foundation serves over 15,000 people a year across five core programs. The pot of rice is still on the stove every Saturday morning.</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <x-ui.image-frame
                        src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        alt="Volunteers serving meals"
                        ratio="3/4"
                    />
                    <x-ui.image-frame
                        src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        alt="Community gathering"
                        ratio="4/3"
                    />
                </div>
                <div class="space-y-4 pt-8">
                    <x-ui.image-frame
                        src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        alt="Youth mentorship session"
                        ratio="4/3"
                    />
                    <x-ui.image-frame
                        src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        alt="Free medical clinic"
                        ratio="3/4"
                    />
                </div>
            </div>
        </div>
    </div>
</x-ui.section>

{{-- Mission, Vision, Values --}}
<x-ui.section id="mission" bg="muted" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Mission & Values"
            title="What drives us"
            intro="Our mission is fixed. Our methods adapt. Our values never compromise."
            align="center"
        />

        <div class="mt-12 grid gap-6 lg:grid-cols-3 lg:gap-8">
            <x-ui.card class="text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="mt-4 font-display text-xl font-semibold text-stone-900">Mission</h3>
                <p class="mt-2 text-sm leading-relaxed text-stone-600">To bring hope and healing to hurting communities in Nigeria through compassionate, faith-rooted service — meeting physical needs while honouring the dignity of every person.</p>
            </x-ui.card>
            <x-ui.card class="text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-spark-400/20 text-spark-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="mt-4 font-display text-xl font-semibold text-stone-900">Vision</h3>
                <p class="mt-2 text-sm leading-relaxed text-stone-600">Communities where no one goes hungry, no child is exploited, no sick person is left untended — and where the love of God is felt through the hands of His people.</p>
            </x-ui.card>
            <x-ui.card class="text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="mt-4 font-display text-xl font-semibold text-stone-900">Approach</h3>
                <p class="mt-2 text-sm leading-relaxed text-stone-600">Local staff. Local solutions. Long-term presence. We do not parachute in — we live in the communities we serve, and we stay long after the cameras leave.</p>
            </x-ui.card>
        </div>

        {{-- Values grid --}}
        <div class="mt-16">
            <h3 class="font-display text-2xl font-semibold text-stone-900 text-center">Our seven values</h3>
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @php
                    $values = [
                        ['name' => 'Compassion', 'desc' => 'We meet suffering with tenderness, never pity.'],
                        ['name' => 'Dignity', 'desc' => 'Every person bears the image of God — we treat them as such.'],
                        ['name' => 'Faithfulness', 'desc' => 'We show up. Day after day, year after year.'],
                        ['name' => 'Integrity', 'desc' => 'Every naira is accounted for. Every story is true.'],
                        ['name' => 'Partnership', 'desc' => 'We work alongside churches, government, and people of goodwill.'],
                        ['name' => 'Humility', 'desc' => 'We listen before we speak. We serve before we lead.'],
                        ['name' => 'Hope', 'desc' => 'We refuse despair. The story is not over.'],
                        ['name' => 'Excellence', 'desc' => 'Compassion without competence is not compassion.'],
                        ['name' => 'Prayer', 'desc' => 'We begin and end every day on our knees.'],
                    ];
                @endphp
                @foreach ($values as $value)
                    <div class="flex items-start gap-3 rounded-xl bg-white p-4 ring-1 ring-stone-200/60">
                        <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-stone-900">{{ $value['name'] }}</p>
                            <p class="mt-0.5 text-xs text-stone-600">{{ $value['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-ui.section>

{{-- Team --}}
<x-ui.section id="team" bg="white" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Our Team"
            title="The people behind the work"
            intro="A small staff team, supported by hundreds of volunteers and an engaged board of directors."
            align="center"
        />

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
            @php
                $team = [
                    ['name' => 'Fr. Daniel Okonkwo', 'role' => 'Founder & Executive Director', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                    ['name' => 'Aisha Bello', 'role' => 'Director of Programs', 'img' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                    ['name' => 'Emmanuel Tola', 'role' => 'Safe Harbor Lead', 'img' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                    ['name' => 'Dr. Ngozi Eze', 'role' => 'Healing Hands Medical Lead', 'img' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                ];
            @endphp
            @foreach ($team as $member)
                <div class="text-center">
                    <div class="mx-auto aspect-square w-full max-w-[260px] overflow-hidden rounded-2xl bg-stone-100">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="h-full w-full object-cover" loading="lazy"/>
                    </div>
                    <h3 class="mt-4 font-display text-lg font-semibold text-stone-900">{{ $member['name'] }}</h3>
                    <p class="mt-1 text-sm text-brand-700">{{ $member['role'] }}</p>
                </div>
            @endforeach
        </div>

        <p class="mt-10 text-center text-sm text-stone-500">Plus 18 full-time staff, 340 active volunteers, and a 7-member board of directors.</p>
    </div>
</x-ui.section>

{{-- Partners --}}
<x-ui.section id="partners" bg="muted" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Partners & Affiliations"
            title="We do not do this alone"
            intro="CHJ Foundation works in formal partnership with government agencies, faith communities, and international NGOs."
            align="center"
        />

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['name' => 'FCT Social Development Secretariat', 'type' => 'Government'],
                ['name' => 'National Agency for the Prohibition of Trafficking in Persons (NAPTIP)', 'type' => 'Government'],
                ['name' => 'Caritas Nigeria', 'type' => 'Faith-based'],
                ['name' => 'World Food Programme', 'type' => 'UN Agency'],
                ['name' => 'Zenith Bank Foundation', 'type' => 'Corporate'],
                ['name' => 'Christian Association of Nigeria (CAN)', 'type' => 'Faith-based'],
            ] as $partner)
                <div class="flex items-center gap-3 rounded-xl bg-white p-4 ring-1 ring-stone-200/60">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </span>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-stone-900">{{ $partner['name'] }}</p>
                        <p class="text-xs text-stone-500">{{ $partner['type'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="mt-6 text-center text-xs text-stone-400">Illustrative — partner logos and registration documents to be added before launch.</p>
    </div>
</x-ui.section>

{{-- CTA --}}
@include('components.sections.cta-band', ['variant' => 'donate'])

@endsection
