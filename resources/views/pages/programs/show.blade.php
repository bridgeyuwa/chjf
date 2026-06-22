@extends('layouts.app', [
    'title' => $program['name'] ?? 'Program',
    'description' => $program['meta_description'] ?? ($program['name'] . ' — a CHJ Foundation program.'),
])

@section('content')

@php
    $allPrograms = [
        'hope-kitchen'    => ['name' => 'Hope Kitchen',    'route' => route('programs.show', 'hope-kitchen')],
        'safe-harbor'     => ['name' => 'Safe Harbor',     'route' => route('programs.show', 'safe-harbor')],
        'pathways'        => ['name' => 'Pathways',        'route' => route('programs.show', 'pathways')],
        'healing-hands'   => ['name' => 'Healing Hands',   'route' => route('programs.show', 'healing-hands')],
        'bright-futures'  => ['name' => 'Bright Futures',  'route' => route('programs.show', 'bright-futures')],
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900">
    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-24 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

    <div class="container-prose relative py-14 sm:py-20 lg:py-24">
        <div class="grid gap-10 lg:grid-cols-2 lg:gap-16 items-center">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/15">
                    <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                    {{ $program['tag'] }}
                </span>
                <h1 class="mt-5 font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    {{ $program['name'] }}
                </h1>
                <p class="mt-5 text-lg leading-relaxed text-brand-100 sm:text-xl">{{ $program['hero_intro'] }}</p>

                <dl class="mt-8 grid grid-cols-3 gap-4">
                    @foreach ($program['quick_stats'] as $stat)
                        <div class="rounded-xl bg-white/5 p-3 text-center ring-1 ring-inset ring-white/10">
                            <dt class="font-display text-xl font-semibold text-white sm:text-2xl">{{ $stat['value'] }}</dt>
                            <dd class="mt-0.5 text-[10px] uppercase tracking-wider text-brand-200">{{ $stat['label'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
            <div class="relative aspect-[4/3] overflow-hidden rounded-2xl shadow-lifted">
                <img src="{{ $program['hero_image'] }}" alt="{{ $program['name'] }}" class="h-full w-full object-cover" fetchpriority="high"/>
            </div>
        </div>
    </div>
</section>

{{-- Body --}}
<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid gap-12 lg:grid-cols-3 lg:gap-16">

            {{-- Main column --}}
            <div class="lg:col-span-2">
                <span class="eyebrow">About this program</span>
                <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">{{ $program['about_title'] }}</h2>

                <div class="mt-6 prose-chj">
                    @foreach ($program['about_paragraphs'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                @if (!empty($program['approach_points']))
                <h3 class="mt-10 font-display text-2xl font-semibold text-stone-900">How we work</h3>
                <ul class="mt-4 space-y-3">
                    @foreach ($program['approach_points'] as $point)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <div>
                                <p class="font-semibold text-stone-900">{{ $point['title'] }}</p>
                                <p class="mt-0.5 text-sm text-stone-600">{{ $point['desc'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif

                @if (!empty($program['quote']))
                <blockquote class="mt-10 rounded-2xl bg-brand-50 p-6 ring-1 ring-brand-200/60">
                    <p class="font-display text-xl italic leading-relaxed text-brand-900">"{{ $program['quote']['text'] }}"</p>
                    <footer class="mt-4 text-sm font-semibold text-brand-700">— {{ $program['quote']['author'] }}</footer>
                </blockquote>
                @endif

                @if (!empty($program['gallery']))
                <h3 class="mt-12 font-display text-2xl font-semibold text-stone-900">From the field</h3>
                <div class="mt-4 grid grid-cols-2 gap-4">
                    @foreach ($program['gallery'] as $img)
                        <x-ui.image-frame src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" ratio="{{ $loop->even ? '3/4' : '4/3' }}" />
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <x-ui.card>
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Quick facts</p>
                        <dl class="mt-3 space-y-3 text-sm">
                            @foreach ($program['sidebar_facts'] as $fact)
                                <div class="flex justify-between gap-4 border-b border-stone-100 pb-2 last:border-0">
                                    <dt class="text-stone-500">{{ $fact['label'] }}</dt>
                                    <dd class="font-semibold text-stone-900 text-right">{{ $fact['value'] }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </x-ui.card>

                    <x-ui.card variant="brand">
                        <h3 class="font-display text-lg font-semibold text-brand-900">Support this program</h3>
                        <p class="mt-2 text-sm text-brand-800">{{ $program['support_text'] }}</p>
                        <div class="mt-4 space-y-2">
                            <x-ui.button variant="primary" size="md" href="{{ route('get-involved.donate') }}" class="w-full justify-center">
                                Donate now
                            </x-ui.button>
                            <x-ui.button variant="outline" size="md" href="{{ route('get-involved.volunteer') }}?program={{ $program['slug'] }}" class="w-full justify-center">
                                Volunteer here
                            </x-ui.button>
                        </div>
                    </x-ui.card>

                    {{-- Other programs --}}
                    <x-ui.card>
                        <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Other programs</p>
                        <ul class="mt-3 space-y-2">
                            @foreach ($allPrograms as $slug => $info)
                                @if ($slug !== $program['slug'])
                                    <li>
                                        <a href="{{ $info['route'] }}" class="flex items-center justify-between rounded-lg px-2 py-1.5 text-sm text-stone-700 hover:bg-brand-50 hover:text-brand-800">
                                            <span>{{ $info['name'] }}</span>
                                            <svg class="h-3.5 w-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </x-ui.card>
                </div>
            </aside>
        </div>
    </div>
</x-ui.section>

@include('components.sections.cta-band', ['variant' => 'donate'])

@endsection
