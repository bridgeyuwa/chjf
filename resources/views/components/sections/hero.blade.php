{{--
    Home hero — split layout (RefactoringUI / TailwindLabs pattern).
    Solid purple background left, human photo right. No text-over-photo.
--}}
<section class="relative overflow-hidden bg-stone-900">
    {{-- Decorative gradient blobs --}}
    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-brand-500/20 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-spark-500/10 blur-3xl"></div>

    <div class="container-prose relative">
        <div class="grid lg:grid-cols-2 lg:gap-0">

            {{-- Text side --}}
            <div class="py-16 sm:py-20 lg:py-28 lg:pr-12">
                <span class="inline-flex items-center gap-2 rounded-full bg-brand-100/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-100 ring-1 ring-inset ring-brand-300/20">
                    <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                    Abuja · Nigeria · Est. 2018
                </span>

                <h1 class="mt-5 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-white sm:text-5xl lg:text-6xl xl:text-7xl">
                    Bringing hope & healing to a
                    <span class="text-gradient-brand bg-gradient-to-br from-spark-300 via-brand-300 to-brand-400 bg-clip-text text-transparent">hurting world</span>.
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-relaxed text-stone-300 sm:text-xl">
                    The Compassionate Heart of Jesus Foundation is a faith-rooted ministry serving the most vulnerable across our communities — through food, shelter, education, medical care, and protection from exploitation.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('get-involved.donate') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-3.5 text-base font-semibold text-white shadow-lifted transition-all hover:bg-brand-500 hover:shadow-glow">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                        Donate Now
                    </a>
                    <a href="{{ route('get-involved.volunteer') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white/5 px-6 py-3.5 text-base font-semibold text-white ring-1 ring-inset ring-white/20 backdrop-blur-sm transition-all hover:bg-white/10 hover:ring-white/30">
                        Become a Volunteer
                    </a>
                </div>

                {{-- Trust strip --}}
                <dl class="mt-12 grid grid-cols-3 gap-6 border-t border-white/10 pt-8">
                    <div>
                        <dt class="text-2xl font-semibold text-white sm:text-3xl">12,400+</dt>
                        <dd class="mt-1 text-xs text-stone-400">Meals served monthly</dd>
                    </div>
                    <div>
                        <dt class="text-2xl font-semibold text-white sm:text-3xl">340</dt>
                        <dd class="mt-1 text-xs text-stone-400">Volunteers active</dd>
                    </div>
                    <div>
                        <dt class="text-2xl font-semibold text-white sm:text-3xl">5</dt>
                        <dd class="mt-1 text-xs text-stone-400">Programs of impact</dd>
                    </div>
                </dl>
            </div>

            {{-- Image side --}}
            <div class="relative min-h-[400px] lg:min-h-full">
                <img
                    src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="Volunteers serving meals to families in a community hall"
                    class="absolute inset-0 h-full w-full object-cover"
                    fetchpriority="high"
                />
                {{-- Subtle gradient from text side for visual cohesion --}}
                <div class="absolute inset-0 bg-gradient-to-r from-stone-900/80 via-transparent to-transparent lg:from-stone-900/40"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-stone-900/60 via-transparent to-transparent"></div>

                {{-- Photo caption --}}
                <div class="absolute bottom-4 right-4 max-w-[220px] rounded-lg bg-white/95 px-3 py-2 text-xs text-stone-700 shadow-lifted backdrop-blur-sm">
                    <p class="font-semibold text-stone-900">Hope Kitchen · Wuse</p>
                    <p class="mt-0.5 text-stone-500">Tuesday community meal, May 2025</p>
                </div>
            </div>
        </div>
    </div>
</section>
