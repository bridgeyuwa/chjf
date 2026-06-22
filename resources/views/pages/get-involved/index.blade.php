@extends('layouts.app', [
    'title' => 'Get Involved',
    'description' => 'Volunteer, donate, pray, or partner with CHJ Foundation. There are many ways to join the work of compassion in Abuja.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Get Involved"
    title="Find your place in this work."
    intro="Whether you have two hours a month or two days a week, ₦5,000 or ₦500,000, a prayer or a partnership — there is a role for you."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">

            {{-- Volunteer --}}
            <a href="{{ route('get-involved.volunteer') }}"
               x-data="reveal"
               x-intersect.once="onIntersect()"
               class="fade-up group flex flex-col rounded-2xl bg-white p-8 shadow-card ring-1 ring-stone-200/60 transition-all hover:-translate-y-1 hover:shadow-lifted">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                </div>
                <h2 class="mt-5 font-display text-2xl font-semibold text-stone-900 group-hover:text-brand-700">Volunteer</h2>
                <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">Give your time and skills. Meal service, mentoring, medical, legal, admin, events — there is a role for every gift.</p>
                <dl class="mt-5 space-y-1 border-t border-stone-100 pt-4 text-xs text-stone-500">
                    <div class="flex justify-between"><dt>Open roles:</dt><dd class="font-semibold text-stone-700">12</dd></div>
                    <div class="flex justify-between"><dt>Active volunteers:</dt><dd class="font-semibold text-stone-700">340</dd></div>
                    <div class="flex justify-between"><dt>Commitment:</dt><dd class="font-semibold text-stone-700">From 2 hrs/month</dd></div>
                </dl>
                <span class="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-brand-700">Apply now <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
            </a>

            {{-- Donate --}}
            <a href="{{ route('get-involved.donate') }}"
               x-data="reveal(80)"
               x-intersect.once="onIntersect()"
               class="fade-up group flex flex-col rounded-2xl bg-brand-700 p-8 text-white shadow-lifted transition-all hover:-translate-y-1 hover:shadow-lifted">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/15 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                </div>
                <h2 class="mt-5 font-display text-2xl font-semibold text-white">Donate</h2>
                <p class="mt-2 flex-1 text-sm leading-relaxed text-brand-100">Every naira, dollar, and euro goes directly to programs. Donate via Nigerian bank transfer — details and international transfer info on the donate page.</p>
                <dl class="mt-5 space-y-1 border-t border-white/15 pt-4 text-xs text-brand-200">
                    <div class="flex justify-between"><dt>Feed a family / week:</dt><dd class="font-semibold text-white">₦5,000</dd></div>
                    <div class="flex justify-between"><dt>Sponsor a child / month:</dt><dd class="font-semibold text-white">₦25,000</dd></div>
                    <div class="flex justify-between"><dt>Fund a clinic day:</dt><dd class="font-semibold text-white">₦100,000</dd></div>
                </dl>
                <span class="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-white">Give now <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
            </a>

            {{-- Pray --}}
            <a href="{{ route('prayer-request') }}"
               x-data="reveal(160)"
               x-intersect.once="onIntersect()"
               class="fade-up group flex flex-col rounded-2xl bg-white p-8 shadow-card ring-1 ring-stone-200/60 transition-all hover:-translate-y-1 hover:shadow-lifted">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-spark-400/20 text-spark-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                </div>
                <h2 class="mt-5 font-display text-2xl font-semibold text-stone-900 group-hover:text-brand-700">Pray</h2>
                <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">Submit a prayer request — our team prays over every request we receive. Or join our monthly prayer gathering.</p>
                <dl class="mt-5 space-y-1 border-t border-stone-100 pt-4 text-xs text-stone-500">
                    <div class="flex justify-between"><dt>Requests prayed over (2024):</dt><dd class="font-semibold text-stone-700">1,840</dd></div>
                    <div class="flex justify-between"><dt>Monthly prayer gathering:</dt><dd class="font-semibold text-stone-700">First Saturday</dd></div>
                    <div class="flex justify-between"><dt>Confidential:</dt><dd class="font-semibold text-stone-700">Always</dd></div>
                </dl>
                <span class="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-brand-700">Send a request <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
            </a>
        </div>

        {{-- Other ways --}}
        <div class="mt-16">
            <x-ui.section-heading
                eyebrow="Other Ways to Partner"
                title="Beyond volunteering and giving"
                intro="There are more ways to stand with us — and the communities we serve."
                align="center"
            />

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Corporate Partnership', 'desc' => 'CSR partnerships, payroll giving, employee volunteering, cause marketing.', 'icon' => 'briefcase'],
                    ['title' => 'Church Partnership', 'desc' => 'Adopt a program, host a CHJ Sunday, mobilize your congregation to serve.', 'icon' => 'faith'],
                    ['title' => 'Legacy & Will', 'desc' => 'Remember CHJ Foundation in your will — a lasting legacy of compassion.', 'icon' => 'heart'],
                    ['title' => 'Internship & Research', 'desc' => 'University students and researchers — intern with us or study our work.', 'icon' => 'book'],
                ] as $option)
                    <div class="rounded-xl bg-stone-50 p-5 ring-1 ring-stone-200/60">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-100 text-brand-700">
                            @if ($option['icon'] === 'briefcase')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.073a2.25 2.25 0 01-2.25 2.25h-12a2.25 2.25 0 01-2.25-2.25v-4.073m16.5 0a2.25 2.25 0 00-2.25-2.25h-12a2.25 2.25 0 00-2.25 2.25"/></svg>
                            @elseif ($option['icon'] === 'faith')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M9 9h6"/></svg>
                            @elseif ($option['icon'] === 'heart')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                            @elseif ($option['icon'] === 'book')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/></svg>
                            @endif
                        </div>
                        <h3 class="mt-3 font-display text-base font-semibold text-stone-900">{{ $option['title'] }}</h3>
                        <p class="mt-1 text-xs leading-relaxed text-stone-600">{{ $option['desc'] }}</p>
                        <a href="{{ route('contact') }}?subject={{ urlencode($option['title']) }}" class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-brand-700 hover:text-brand-800">
                            Enquire →
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-ui.section>

@endsection
