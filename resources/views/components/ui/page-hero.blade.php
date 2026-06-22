{{--
    Page hero (interior pages). Compact, brand-tinted, with breadcrumb.
    Usage: <x-ui.page-hero eyebrow="About" title="Our Story" intro="..." />
--}}
@props([
    'eyebrow' => null,
    'title' => null,
    'intro' => null,
])

<section class="relative overflow-hidden bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900">
    {{-- Decorative blobs --}}
    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-24 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

    <div class="container-prose relative py-14 sm:py-20 lg:py-24">
        <div class="max-w-3xl">
            @if ($eyebrow)
                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-white/15">
                    <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                    {{ $eyebrow }}
                </span>
            @endif
            @if ($title)
                <h1 class="mt-5 font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    {{ $title }}
                </h1>
            @endif
            @if ($intro)
                <p class="mt-5 text-lg leading-relaxed text-brand-100 sm:text-xl">{{ $intro }}</p>
            @endif
            @if (isset($actions))
                <div class="mt-8 flex flex-wrap gap-3">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
</section>
