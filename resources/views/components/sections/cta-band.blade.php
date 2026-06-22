{{--
    CTA band — used on home + interior pages.
    Variant: "donate" (purple) | "volunteer" (light)
--}}
@props(['variant' => 'donate'])

@if ($variant === 'donate')
<section class="relative overflow-hidden bg-brand-700">
    <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

    <div class="container-prose relative py-14 sm:py-16 lg:py-20">
        <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/20">
                    <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                    Will you partner with us?
                </span>
                <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    ₦5,000 feeds a family for a week.
                </h2>
                <p class="mt-4 text-lg leading-relaxed text-brand-100">
                    Every naira, dollar, and euro goes directly to programs serving the most vulnerable. No gift is too small — and every gift is stewarded with care.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <div class="rounded-xl bg-white/5 p-4 text-center ring-1 ring-inset ring-white/10 backdrop-blur-sm">
                    <p class="font-display text-2xl font-semibold text-white">₦5K</p>
                    <p class="mt-1 text-xs text-brand-200">feeds 1 family / week</p>
                </div>
                <div class="rounded-xl bg-white/5 p-4 text-center ring-1 ring-inset ring-white/10 backdrop-blur-sm">
                    <p class="font-display text-2xl font-semibold text-white">₦25K</p>
                    <p class="mt-1 text-xs text-brand-200">sponsors a child / month</p>
                </div>
                <div class="rounded-xl bg-white/5 p-4 text-center ring-1 ring-inset ring-white/10 backdrop-blur-sm">
                    <p class="font-display text-2xl font-semibold text-white">₦100K</p>
                    <p class="mt-1 text-xs text-brand-200">funds a clinic day</p>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('get-involved.donate') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-6 py-3.5 text-base font-semibold text-brand-700 shadow-lifted transition-all hover:bg-stone-50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                Donate to CHJ Foundation
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-transparent px-6 py-3.5 text-base font-semibold text-white ring-1 ring-inset ring-white/30 transition-colors hover:bg-white/5">
                Partner with us
            </a>
        </div>
    </div>
</section>

@else
<section class="bg-stone-50">
    <div class="container-prose py-14 sm:py-16 lg:py-20">
        <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="eyebrow">Get Involved</span>
                <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">
                    Your hands. Your time. Their hope.
                </h2>
                <p class="mt-4 text-lg leading-relaxed text-stone-600">
                    Volunteers are the heartbeat of CHJ Foundation. Whether you can give two hours a month or two days a week, there is a place for you in this work.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl bg-white p-5 ring-1 ring-stone-200/60 shadow-soft">
                    <p class="font-display text-3xl font-semibold text-brand-700">340</p>
                    <p class="mt-1 text-sm text-stone-600">Active volunteers across 5 programs</p>
                </div>
                <div class="rounded-2xl bg-white p-5 ring-1 ring-stone-200/60 shadow-soft">
                    <p class="font-display text-3xl font-semibold text-brand-700">12</p>
                    <p class="mt-1 text-sm text-stone-600">Open volunteer roles right now</p>
                </div>
                <div class="rounded-2xl bg-brand-600 p-5 text-white shadow-soft sm:col-span-2">
                    <p class="font-display text-lg font-semibold">Ready to serve?</p>
                    <p class="mt-1 text-sm text-brand-100">Fill out our volunteer application — we'll match you with a program that fits your gifts.</p>
                    <a href="{{ route('get-involved.volunteer') }}" class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-white underline-offset-4 hover:underline">
                        Apply now →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
