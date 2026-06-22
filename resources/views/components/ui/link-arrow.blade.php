@props(['href' => null])

<a {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 text-sm font-semibold text-brand-700 transition-colors hover:text-brand-800 hover:gap-2 group']) }}
   href="{{ $href }}">
    {{ $slot }}
    <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
    </svg>
</a>
