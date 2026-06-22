@extends('layouts.app', [
    'title' => 'Page not found',
    'description' => 'The page you were looking for could not be found.',
])

@section('content')

<section class="relative overflow-hidden bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900 min-h-[70vh] flex items-center">
    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-24 h-72 w-72 rounded-full bg-spark-500/15 blur-3xl"></div>

    <div class="container-prose relative">
        <div class="mx-auto max-w-2xl text-center">
            <p class="font-display text-8xl font-bold text-white sm:text-9xl">404</p>
            <h1 class="mt-4 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">This page wandered off.</h1>
            <p class="mt-4 text-lg leading-relaxed text-brand-100">
                The page you were looking for doesn't exist — or has been moved. Like a lost sheep, perhaps it needs to be found.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-6 py-3.5 text-base font-semibold text-brand-700 shadow-lifted transition-all hover:bg-stone-50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Back home
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white/5 px-6 py-3.5 text-base font-semibold text-white ring-1 ring-inset ring-white/20 transition-colors hover:bg-white/10">
                    Contact us
                </a>
            </div>

            <p class="mt-10 text-xs text-brand-200">
                "What man of you, having a hundred sheep, if he has lost one of them, does not leave the ninety-nine in the open country, and go after the one that is lost, until he finds it?" — Luke 15:4
            </p>
        </div>
    </div>
</section>

@endsection
