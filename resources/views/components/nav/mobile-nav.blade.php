@props(['nav'])

<div
    x-show="open"
    x-cloak
    class="fixed inset-0 z-[60] lg:hidden"
    aria-modal="true"
    role="dialog"
>
    {{-- Backdrop --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="close()"
        class="absolute inset-0 bg-stone-900/40 backdrop-blur-sm"
    ></div>

    {{-- Panel --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="absolute right-0 top-0 flex h-full w-full max-w-sm flex-col bg-white shadow-2xl"
    >
        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">
            <span class="font-display text-base font-semibold text-stone-900">Menu</span>
            <button @click="close()" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-stone-500 hover:bg-stone-100" aria-label="Close menu">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Nav list (scrollable) --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4" aria-label="Mobile">
            <ul class="space-y-1">
                @foreach ($nav as $item)
                    <li>
                        @if (isset($item['children']))
                            <div x-data="{ expanded: false }">
                                <button
                                    @click="expanded = !expanded"
                                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-base font-medium text-stone-800 hover:bg-brand-50"
                                    :aria-expanded="expanded"
                                >
                                    <span>{{ $item['label'] }}</span>
                                    <svg class="h-4 w-4 transition-transform text-stone-400" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-collapse
                                    class="ml-3 mt-1 border-l border-stone-200 pl-3"
                                >
                                    <a href="{{ $item['route'] }}" class="block rounded-lg px-3 py-2 text-sm font-medium text-brand-700 hover:bg-brand-50">
                                        View all {{ $item['label'] }} →
                                    </a>
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ $child['route'] }}" class="block rounded-lg px-3 py-2 text-sm text-stone-700 hover:bg-brand-50 hover:text-brand-800">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $item['route'] }}" class="block rounded-lg px-3 py-2.5 text-base font-medium text-stone-800 hover:bg-brand-50 hover:text-brand-800">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>

        {{-- Footer CTA --}}
        <div class="border-t border-stone-200 p-5 space-y-2">
            <a href="{{ route('get-involved.donate') }}" class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-600 px-4 py-3 text-sm font-semibold text-white shadow-soft hover:bg-brand-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                </svg>
                Donate Now
            </a>
            <a href="{{ route('get-involved.volunteer') }}" class="flex w-full items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-semibold text-brand-700 ring-1 ring-brand-200 hover:bg-brand-50">
                Become a Volunteer
            </a>
        </div>
    </div>
</div>
