@php
    $nav = [
        [
            'label' => 'About',
            'route' => route('about'),
            'children' => [
                ['label' => 'Our Story', 'route' => route('about') . '#story'],
                ['label' => 'Mission & Values', 'route' => route('about') . '#mission'],
                ['label' => 'Our Team', 'route' => route('about') . '#team'],
                ['label' => 'Partners', 'route' => route('about') . '#partners'],
            ],
        ],
        [
            'label' => 'Programs',
            'route' => route('programs.index'),
            'children' => [
                ['label' => 'Hope Kitchen — Food Security', 'route' => route('programs.show', 'hope-kitchen')],
                ['label' => 'Safe Harbor — Anti-Trafficking', 'route' => route('programs.show', 'safe-harbor')],
                ['label' => 'Pathways — Education & Jobs', 'route' => route('programs.show', 'pathways')],
                ['label' => 'Healing Hands — Medical Care', 'route' => route('programs.show', 'healing-hands')],
                ['label' => 'Bright Futures — Youth Mentorship', 'route' => route('programs.show', 'bright-futures')],
            ],
        ],
        [
            'label' => 'Get Involved',
            'route' => route('get-involved.index'),
            'children' => [
                ['label' => 'Volunteer', 'route' => route('get-involved.volunteer')],
                ['label' => 'Donate', 'route' => route('get-involved.donate')],
                ['label' => 'Prayer Request', 'route' => route('prayer-request')],
                ['label' => 'Upcoming Events', 'route' => route('events.index')],
            ],
        ],
        [
            'label' => 'Stories',
            'route' => route('blog.index'),
            'children' => [
                ['label' => 'Blog & News', 'route' => route('blog.index')],
                ['label' => 'Impact Report', 'route' => route('impact-report')],
                ['label' => 'Annual Report', 'route' => route('annual-report')],
                ['label' => 'Gallery', 'route' => route('gallery')],
            ],
        ],
        ['label' => 'Contact', 'route' => route('contact')],
    ];
@endphp

<header x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 8" class="sticky top-0 z-50 border-b transition-colors duration-200"
    :class="scrolled ? 'border-stone-200 bg-white/95 backdrop-blur-md shadow-soft' : 'border-transparent bg-white'">
    <div class="container-prose">
        <div class="flex h-16 items-center justify-between sm:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white shadow-soft transition-transform group-hover:scale-105">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        {{-- Heart + cross mark --}}
                        <path d="M12 21s-7-4.5-9.5-9.5C1 7.5 4 4 7.5 4c1.8 0 3.4 1 4.5 2.5C13.1 5 14.7 4 16.5 4 20 4 23 7.5 21.5 11.5 19 16.5 12 21 12 21z" fill="currentColor" fill-opacity="0.15"/>
                        <path d="M12 21s-7-4.5-9.5-9.5C1 7.5 4 4 7.5 4c1.8 0 3.4 1 4.5 2.5C13.1 5 14.7 4 16.5 4 20 4 23 7.5 21.5 11.5 19 16.5 12 21 12 21z"/>
                        <path d="M12 8v9M10 10h4" stroke="currentColor" stroke-width="1.5"/>
                    </svg>
                </span>
                <span class="flex flex-col leading-tight">
                    <span class="font-display text-base font-semibold text-stone-900 sm:text-lg">CHJ Foundation</span>
                    <span class="text-[10px] font-medium uppercase tracking-widest text-brand-700">Compassionate Heart of Jesus</span>
                </span>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden lg:flex items-center gap-1" aria-label="Primary">
                @foreach ($nav as $item)
                    @if (isset($item['children']))
                        <div class="group relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <a href="{{ $item['route'] }}"
                               class="inline-flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition-colors hover:bg-brand-50 hover:text-brand-800"
                               :class="open ? 'bg-brand-50 text-brand-800' : ''"
                               @click="open = true"
                               aria-haspopup="true"
                               :aria-expanded="open">
                                {{ $item['label'] }}
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div
                                x-show="open"
                                x-cloak
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                class="absolute left-0 top-full pt-2 w-72">
                                <div class="overflow-hidden rounded-xl bg-white shadow-lifted ring-1 ring-stone-200">
                                    <ul class="py-1.5">
                                        @foreach ($item['children'] as $child)
                                            <li>
                                                <a href="{{ $child['route'] }}" class="block px-4 py-2.5 text-sm text-stone-700 hover:bg-brand-50 hover:text-brand-800 transition-colors">
                                                    {{ $child['label'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $item['route'] }}"
                           class="rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition-colors hover:bg-brand-50 hover:text-brand-800">
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            {{-- CTA + mobile toggle --}}
            <div class="flex items-center gap-2">
                <a href="{{ route('get-involved.donate') }}" class="hidden sm:inline-flex items-center gap-1.5 rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-soft transition-all hover:bg-brand-700 hover:shadow-lifted">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                    </svg>
                    Donate
                </a>

                {{-- Mobile toggle --}}
                <button
                    x-data="mobileNav"
                    @click="open = true; document.body.style.overflow = 'hidden'"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-stone-700 hover:bg-brand-50 lg:hidden"
                    aria-label="Open menu"
                >
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile nav drawer --}}
    @include('components.nav.mobile-nav', ['nav' => $nav])
</header>
