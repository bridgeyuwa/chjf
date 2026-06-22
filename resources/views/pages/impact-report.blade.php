@extends('layouts.app', [
    'title' => '2024 Impact Report',
    'description' => 'CHJ Foundation\'s 2024 Impact Report — what we achieved, what we learned, and where we are going next.',
])

@section('content')

<x-ui.page-hero
    eyebrow="2024 Impact Report"
    title="A year of compassion, in numbers and stories."
    intro="We don't measure our impact by what we did — but by what changed in the lives of those we served. Here's what 2024 looked like."
/>

{{-- Headline stats --}}
<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-4">
            @php
                $headlineStats = [
                    ['value' => '15,200', 'label' => 'People served', 'sublabel' => 'Across all 5 programs', 'icon' => 'users'],
                    ['value' => '148,000+', 'label' => 'Meals served', 'sublabel' => 'Hope Kitchen', 'icon' => 'meal'],
                    ['value' => '320', 'label' => 'Survivors supported', 'sublabel' => 'Safe Harbor (cumulative)', 'icon' => 'shield'],
                    ['value' => '680', 'label' => 'Graduates employed', 'sublabel' => 'Pathways (cumulative)', 'icon' => 'briefcase'],
                    ['value' => '4,200', 'label' => 'Medical consultations', 'sublabel' => 'Healing Hands (2024)', 'icon' => 'stethoscope'],
                    ['value' => '1,150', 'label' => 'Youth mentored', 'sublabel' => 'Bright Futures (cumulative)', 'icon' => 'heart'],
                    ['value' => '340', 'label' => 'Active volunteers', 'sublabel' => 'Serving weekly', 'icon' => 'users'],
                    ['value' => '88%', 'label' => 'To direct programs', 'sublabel' => 'Of every naira donated', 'icon' => 'spark'],
                ];
            @endphp
            @foreach ($headlineStats as $stat)
                <x-ui.stat :value="$stat['value']" :label="$stat['label']" :sublabel="$stat['sublabel']" :icon="$stat['icon']" :tone="$stat['tone'] ?? 'brand'"/>
            @endforeach
        </div>
    </div>
</x-ui.section>

{{-- Program-by-program --}}
<x-ui.section bg="muted" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Program Highlights"
            title="What each program achieved in 2024"
            intro="Behind every number is a person. Here's what 2024 looked like across our five core programs."
        />

        <div class="mt-12 space-y-8">
            @php
                $programHighlights = [
                    ['name' => 'Hope Kitchen', 'color' => 'amber', 'stats' => [['148,400', 'meals served'], ['612', 'families on ration list'], ['3', 'weekly meal sites'], ['48 hrs', 'emergency response time']], 'story' => 'In April 2024, floods displaced 400 families in Nyanya. Within 48 hours, Hope Kitchen was serving hot meals at the displacement camp — and continued daily for three weeks until families were resettled.'],
                    ['name' => 'Safe Harbor', 'color' => 'rose', 'stats' => [['47', 'new survivors in 2024'], ['64%', 'family reunification rate'], ['20', 'safe house beds'], ['100%', 'received counseling']], 'story' => 'In September 2024, Safe Harbor coordinated the rescue of 9 young women from a trafficking ring operating between Lagos and Cotonou. All 9 are now in recovery at our safe house. 4 have begun Pathways vocational training.'],
                    ['name' => 'Pathways', 'color' => 'sky', 'stats' => [['142', 'graduates in 2024'], ['87%', 'employed within 6 months'], ['200', 'scholarship students'], ['6', 'trades taught']], 'story' => 'Our 2024 tailoring cohort included 14 Safe Harbor graduates. All 14 completed the program. 11 are now employed in fashion houses in Abuja. 3 started their own businesses with our microenterprise starter kit.'],
                    ['name' => 'Healing Hands', 'color' => 'emerald', 'stats' => [['4,200', 'consultations'], ['180', 'maternal patients'], ['4', 'mobile clinic sites'], ['67', 'emergency fund cases']], 'story' => 'In June 2024, Healing Hands launched a maternal care program in partnership with Wuse General Hospital. 180 women received full antenatal, delivery, and postnatal care — 100% free of charge.'],
                    ['name' => 'Bright Futures', 'color' => 'brand', 'stats' => [['240', 'active youth'], ['180', 'active mentors'], ['95%', 'program completion'], ['3', 'holiday camps run']], 'story' => 'Our August 2024 holiday camp hosted 80 youth for a week of sports, arts, faith, and friendship. 12 campers have since volunteered to become junior mentors — a generational ripple effect of compassion.'],
                ];
            @endphp

            @foreach ($programHighlights as $i => $ph)
                <article
                    x-data="reveal({{ $i * 80 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up grid gap-6 rounded-2xl bg-white p-6 shadow-card ring-1 ring-stone-200/60 sm:p-8 lg:grid-cols-[1fr,2fr] lg:gap-10"
                >
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-{{ $ph['color'] }}-50 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-{{ $ph['color'] }}-700 ring-1 ring-inset ring-{{ $ph['color'] }}-200">
                            {{ $ph['name'] }}
                        </span>
                        <dl class="mt-5 grid grid-cols-2 gap-4">
                            @foreach ($ph['stats'] as $stat)
                                <div>
                                    <dt class="font-display text-2xl font-semibold text-stone-900">{{ $stat[0] }}</dt>
                                    <dd class="text-xs text-stone-500">{{ $stat[1] }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                    <div class="lg:border-l lg:border-stone-200 lg:pl-10">
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Highlight from the year</p>
                        <p class="mt-2 text-base leading-relaxed text-stone-700">{{ $ph['story'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-ui.section>

{{-- Financial summary --}}
<x-ui.section bg="white" spacing="default">
    <div class="container-narrow">
        <x-ui.section-heading
            eyebrow="Financial Stewardship"
            title="Where every naira went in 2024"
            intro="Total raised in 2024: ₦287,500,000. Here's how it was deployed. Full audited accounts available in our Annual Report."
            align="center"
        />

        <div class="mt-10 rounded-2xl bg-stone-50 p-6 ring-1 ring-stone-200/60 sm:p-8">
            <div class="space-y-5">
                @php
                    $finances = [
                        ['label' => 'Hope Kitchen (food security)', 'pct' => 32, 'amount' => '₦92.0M'],
                        ['label' => 'Safe Harbor (anti-trafficking)', 'pct' => 24, 'amount' => '₦69.0M'],
                        ['label' => 'Pathways (education & jobs)', 'pct' => 18, 'amount' => '₦51.7M'],
                        ['label' => 'Healing Hands (medical care)', 'pct' => 14, 'amount' => '₦40.2M'],
                        ['label' => 'Bright Futures (youth mentorship)', 'pct' => 8, 'amount' => '₦23.0M'],
                        ['label' => 'Administration & fundraising', 'pct' => 4, 'amount' => '₦11.6M'],
                    ];
                @endphp
                @foreach ($finances as $fin)
                    <div>
                        <div class="flex items-baseline justify-between text-sm">
                            <span class="font-medium text-stone-800">{{ $fin['label'] }}</span>
                            <span class="font-semibold text-stone-900">{{ $fin['amount'] }} <span class="text-stone-500">({{ $fin['pct'] }}%)</span></span>
                        </div>
                        <div class="mt-1.5 h-2 overflow-hidden rounded-full bg-stone-200">
                            <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-700" style="width: {{ $fin['pct'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p class="mt-4 text-center text-xs text-stone-500">Figures are illustrative placeholders — final audited numbers to be added before publication.</p>
    </div>
</x-ui.section>

{{-- What's next --}}
<x-ui.section bg="gradient" spacing="default">
    <div class="container-narrow text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/20">
            <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
            Looking ahead
        </span>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">2025: Where we are going</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-3">
            <div class="rounded-xl bg-white/5 p-5 ring-1 ring-inset ring-white/10">
                <p class="font-display text-3xl font-semibold text-white">2 new</p>
                <p class="mt-1 text-sm text-brand-100">Mobile clinic sites in Niger State</p>
            </div>
            <div class="rounded-xl bg-white/5 p-5 ring-1 ring-inset ring-white/10">
                <p class="font-display text-3xl font-semibold text-white">+40 beds</p>
                <p class="mt-1 text-sm text-brand-100">Safe Harbor expansion by Q3 2025</p>
            </div>
            <div class="rounded-xl bg-white/5 p-5 ring-1 ring-inset ring-white/10">
                <p class="font-display text-3xl font-semibold text-white">300 students</p>
                <p class="mt-1 text-sm text-brand-100">Pathways scholarship goal</p>
            </div>
        </div>
        <p class="mt-8 text-base leading-relaxed text-brand-100">None of this is possible without you. Will you partner with us in 2025?</p>
        <div class="mt-6 flex flex-wrap justify-center gap-3">
            <x-ui.button variant="white" size="lg" href="{{ route('get-involved.donate') }}">Donate</x-ui.button>
            <x-ui.button variant="ghost" size="lg" href="{{ route('get-involved.volunteer') }}" class="text-white ring-white/30">Volunteer</x-ui.button>
        </div>
    </div>
</x-ui.section>

@endsection
