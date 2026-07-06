<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'Compassionate Heart of Jesus Foundation — bringing hope and healing to a hurting world from Abuja, Nigeria.' }}">
    <meta name="theme-color" content="#9333ea">
    <meta property="og:title" content="{{ $title ?? 'CHJ Foundation' }}">
    <meta property="og:description" content="{{ $ogDescription ?? 'Bringing hope & healing to a Hurting World!' }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_NG">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <title>{{ isset($title) ? $title . ' · CHJ Foundation' : 'CHJ Foundation · Bringing hope & healing to a Hurting World' }}</title>
    <style>[x-cloak]{display:none!important}</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="min-h-screen bg-white text-stone-700 antialiased">
    {{-- Skip link for accessibility --}}
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-brand-700 focus:px-4 focus:py-2 focus:text-white">Skip to content</a>

    {{-- Header --}}
    @include('components.nav.header')

    {{-- Main content --}}
    <main id="main" class="relative">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer.site-footer')

    {{-- Toast stack (AlpineJS) --}}
    <div
        x-data="toastStack"
        class="pointer-events-none fixed bottom-4 right-4 z-[100] flex w-full max-w-sm flex-col gap-2"
        aria-live="polite"
        aria-atomic="true"
    >
        <template x-for="toast in toasts" :key="toast.id">
            <div
                x-show="true"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2"
                class="pointer-events-auto flex items-start gap-3 rounded-xl bg-white p-4 shadow-lifted ring-1 ring-stone-200"
            >
                <div
                    class="mt-0.5 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full"
                    :class="toast.type === 'success' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700'"
                >
                    <svg x-show="toast.type === 'success'" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <svg x-show="toast.type !== 'success'" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"></path>
                    </svg>
                </div>
                <p class="flex-1 text-sm font-medium text-stone-800" x-text="toast.message"></p>
                <button @click="dismiss(toast.id)" class="text-stone-400 hover:text-stone-600" aria-label="Dismiss">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </template>
    </div>

    {{-- Flash + error bridges for Alpine --}}
    <script>
        window.__chjFlash = @json(session()->only(['status', 'error']));
        window.__chjErrors = @json($errors->toArray());
    </script>
</body>
</html>
