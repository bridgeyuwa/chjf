@php
    $year = date('Y');
    $socials = [
        ['label' => 'Instagram', 'href' => '#', 'icon' => 'instagram'],
        ['label' => 'Facebook',  'href' => '#', 'icon' => 'facebook'],
        ['label' => 'X',         'href' => '#', 'icon' => 'x'],
        ['label' => 'YouTube',   'href' => '#', 'icon' => 'youtube'],
        ['label' => 'TikTok',    'href' => '#', 'icon' => 'tiktok'],
        ['label' => 'LinkedIn',  'href' => '#', 'icon' => 'linkedin'],
    ];
    $footerCols = [
        [
            'title' => 'About',
            'links' => [
                ['label' => 'Our Story', 'route' => route('about') . '#story'],
                ['label' => 'Mission & Values', 'route' => route('about') . '#mission'],
                ['label' => 'Our Team', 'route' => route('about') . '#team'],
                ['label' => 'Partners', 'route' => route('about') . '#partners'],
                ['label' => 'FAQ', 'route' => route('faq')],
            ],
        ],
        [
            'title' => 'Programs',
            'links' => [
                ['label' => 'Hope Kitchen', 'route' => route('programs.show', 'hope-kitchen')],
                ['label' => 'Safe Harbor', 'route' => route('programs.show', 'safe-harbor')],
                ['label' => 'Pathways', 'route' => route('programs.show', 'pathways')],
                ['label' => 'Healing Hands', 'route' => route('programs.show', 'healing-hands')],
                ['label' => 'Bright Futures', 'route' => route('programs.show', 'bright-futures')],
            ],
        ],
        [
            'title' => 'Get Involved',
            'links' => [
                ['label' => 'Volunteer', 'route' => route('get-involved.volunteer')],
                ['label' => 'Donate', 'route' => route('get-involved.donate')],
                ['label' => 'Prayer Request', 'route' => route('prayer-request')],
                ['label' => 'Upcoming Events', 'route' => route('events.index')],
                ['label' => 'Newsletter', 'route' => '#newsletter'],
            ],
        ],
        [
            'title' => 'Stories',
            'links' => [
                ['label' => 'Blog & News', 'route' => route('blog.index')],
                ['label' => 'Impact Report', 'route' => route('impact-report')],
                ['label' => 'Annual Report', 'route' => route('annual-report')],
                ['label' => 'Gallery', 'route' => route('gallery')],
                ['label' => 'Contact', 'route' => route('contact')],
            ],
        ],
    ];

    $verses = [
        ['text' => '“I was hungry and you gave me food, I was thirsty and you gave me drink...”', 'ref' => 'Matthew 25:35'],
        ['text' => '“The Lord is near to the brokenhearted and saves the crushed in spirit.”', 'ref' => 'Psalm 34:18'],
        ['text' => '“Bear one another’s burdens, and so fulfil the law of Christ.”', 'ref' => 'Galatians 6:2'],
        ['text' => '“He has told you, O man, what is good... to do justice, love kindness, walk humbly.”', 'ref' => 'Micah 6:8'],
        ['text' => '“Let us not love in word or talk but in deed and in truth.”', 'ref' => '1 John 3:18'],
    ];
    $verse = $verses[array_rand($verses)];
@endphp

<footer class="relative mt-24 bg-stone-900 text-stone-300">
    {{-- Decorative top edge --}}
    <div class="h-1 bg-gradient-to-r from-brand-700 via-brand-500 to-brand-700"></div>

    {{-- Newsletter + Verse band --}}
    <div class="border-b border-stone-800">
        <div class="container-prose py-12 lg:py-16">
            <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">

                {{-- Newsletter --}}
                <div id="newsletter">
                    <p class="eyebrow text-brand-300">Stay Connected</p>
                    <h2 class="mt-3 text-2xl text-white sm:text-3xl">Stories of hope, straight to your inbox</h2>
                    <p class="mt-3 text-stone-400">Monthly updates from our programs in Abuja — no spam, no fundraising appeals, just real stories of lives being changed.</p>

                    <form
                        x-data="chjForm"
                        action="{{ route('newsletter.store') }}"
                        method="POST"
                        class="mt-6 flex flex-col gap-3 sm:flex-row"
                    >
                        @csrf
                        <label class="flex-1">
                            <span class="sr-only">Email address</span>
                            <input
                                type="email"
                                name="email"
                                required
                                placeholder="you@example.com"
                                autocomplete="email"
                                class="w-full rounded-lg border-0 bg-stone-800 px-4 py-3 text-white placeholder-stone-500 ring-1 ring-stone-700 focus:ring-2 focus:ring-brand-400"
                                :class="hasError('email') ? 'ring-rose-500' : ''"
                                @blur="validateField('email', 'required|email')"
                            />
                            <p x-show="hasError('email')" x-text="errors.email" class="mt-1 text-xs text-rose-400"></p>
                        </label>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-brand-600 px-5 py-3 text-sm font-semibold text-white shadow-soft transition-colors hover:bg-brand-500"
                            :disabled="submitting"
                        >
                            <span x-show="!submitting">Subscribe</span>
                            <span x-show="submitting" class="flex items-center gap-2">
                                <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                                Subscribing…
                            </span>
                        </button>
                    </form>
                    <p class="mt-3 text-xs text-stone-500">We respect your privacy. Unsubscribe at any time.</p>
                </div>

                {{-- Verse of the day --}}
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-brand-800 to-brand-950 p-8">
                    <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-brand-600/30 blur-2xl"></div>
                    <div class="absolute -bottom-8 -left-8 h-24 w-24 rounded-full bg-spark-500/20 blur-2xl"></div>
                    <div class="relative">
                        <div class="flex items-center gap-2 text-brand-200">
                            <svg class="h-5 w-5 text-spark-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
                            <span class="text-xs font-semibold uppercase tracking-widest">Verse of the Day</span>
                        </div>
                        <p class="mt-4 font-display text-xl text-white leading-relaxed">
                            {{ $verse['text'] }}
                        </p>
                        <p class="mt-3 text-sm font-semibold text-brand-200">— {{ $verse['ref'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main footer grid --}}
    <div class="container-prose py-12 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-6 lg:gap-8">

            {{-- Brand col --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21s-7-4.5-9.5-9.5C1 7.5 4 4 7.5 4c1.8 0 3.4 1 4.5 2.5C13.1 5 14.7 4 16.5 4 20 4 23 7.5 21.5 11.5 19 16.5 12 21 12 21z" fill="currentColor" fill-opacity="0.15"/>
                            <path d="M12 21s-7-4.5-9.5-9.5C1 7.5 4 4 7.5 4c1.8 0 3.4 1 4.5 2.5C13.1 5 14.7 4 16.5 4 20 4 23 7.5 21.5 11.5 19 16.5 12 21 12 21z"/>
                            <path d="M12 8v9M10 10h4" stroke-width="1.5"/>
                        </svg>
                    </span>
                    <div>
                        <p class="font-display text-base font-semibold text-white">CHJ Foundation</p>
                        <p class="text-xs text-stone-400">Compassionate Heart of Jesus</p>
                    </div>
                </div>
                <p class="mt-4 text-sm leading-relaxed text-stone-400">Bringing hope & healing to a hurting world — through food, shelter, education, medical care, and protection for the most vulnerable in Abuja and beyond.</p>

                {{-- Contact details --}}
                <ul class="mt-6 space-y-2.5 text-sm">
                    <li class="flex items-start gap-2.5">
                        <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-stone-400">Plot 12, Peace Avenue, Jabi District, Abuja, FCT, Nigeria</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 flex-shrink-0 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <a href="tel:+2348031234567" class="text-stone-400 hover:text-white">+234 803 123 4567</a>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 flex-shrink-0 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:hello@chjfoundation.org" class="text-stone-400 hover:text-white">hello@chjfoundation.org</a>
                    </li>
                </ul>

                {{-- Socials --}}
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach ($socials as $social)
                        <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-stone-800 text-stone-400 ring-1 ring-stone-700 transition-colors hover:bg-brand-600 hover:text-white hover:ring-brand-500">
                            @if ($social['icon'] === 'instagram')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1 .4 2.2.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1 .4-2.2.4-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1-.4-2.2C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1-.4 2.2-.4 1.2-.1 1.6-.1 4.8-.1zm0 3.4a6.4 6.4 0 100 12.8 6.4 6.4 0 000-12.8zm0 10.6a4.2 4.2 0 110-8.4 4.2 4.2 0 010 8.4zm6.6-10.9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/></svg>
                            @elseif ($social['icon'] === 'facebook')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12a12 12 0 10-13.9 11.9v-8.4H7.1V12h3V9.4c0-3 1.8-4.6 4.5-4.6 1.3 0 2.6.2 2.6.2v2.9h-1.5c-1.5 0-1.9.9-1.9 1.8V12h3.3l-.5 3.5h-2.8v8.4A12 12 0 0024 12z"/></svg>
                            @elseif ($social['icon'] === 'x')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.9 1.2h3.7l-8 9.1 9.4 12.5h-7.4l-5.8-7.6-6.6 7.6H1.5l8.5-9.7L.9 1.2h7.5l5.2 7 5.3-7zm-1.3 19.8h2L7.5 3.1H5.4l12.2 17.9z"/></svg>
                            @elseif ($social['icon'] === 'youtube')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 00-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 00.5 6.2 31.4 31.4 0 000 12c0 1.9.2 3.8.5 5.8a3 3 0 002.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 002.1-2.1c.3-2 .5-3.9.5-5.8s-.2-3.8-.5-5.8zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
                            @elseif ($social['icon'] === 'tiktok')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.6 6.7a5.5 5.5 0 01-3.4-1.2 5.5 5.5 0 01-2.1-3.6h-3v12.3a2.7 2.7 0 11-2-2.6V8.5a5.7 5.7 0 105 5.6V9.8a8.4 8.4 0 005 1.7V8.4l-.5-.1z"/></svg>
                            @elseif ($social['icon'] === 'linkedin')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.4 20.4h-3.6v-5.6c0-1.3 0-3-1.9-3s-2.1 1.4-2.1 2.9v5.7H9.3V9h3.4v1.6h.1a3.8 3.8 0 013.4-1.9c3.6 0 4.3 2.4 4.3 5.5v6.2zM5.3 7.4a2.1 2.1 0 110-4.2 2.1 2.1 0 010 4.2zM7.1 20.4H3.5V9h3.6v11.4zM22.2 0H1.8C.8 0 0 .8 0 1.7v20.6C0 23.2.8 24 1.8 24h20.4c1 0 1.8-.8 1.8-1.7V1.7C24 .8 23.2 0 22.2 0z"/></svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Link columns --}}
            @foreach ($footerCols as $col)
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-stone-500">{{ $col['title'] }}</h3>
                    <ul class="mt-4 space-y-2.5">
                        @foreach ($col['links'] as $link)
                            <li>
                                <a href="{{ $link['route'] }}" class="text-sm text-stone-400 transition-colors hover:text-white">{{ $link['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Legal bar --}}
    <div class="border-t border-stone-800">
        <div class="container-prose py-6">
            <div class="flex flex-col items-start gap-3 text-xs text-stone-500 sm:flex-row sm:items-center sm:justify-between">
                <p>© {{ $year }} Compassionate Heart of Jesus Foundation. All rights reserved. <span class="text-stone-600">Registered in Nigeria · RC 0123456</span></p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-stone-300">Privacy Policy</a>
                    <a href="#" class="hover:text-stone-300">Terms of Use</a>
                    <a href="#" class="hover:text-stone-300">Safeguarding</a>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- x-cloak style (must be in head or here) --}}
<style>[x-cloak] { display: none !important; }</style>
