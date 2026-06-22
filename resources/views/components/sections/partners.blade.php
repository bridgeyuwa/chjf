{{--
    Partner logos strip — placeholder SVG logos representing categories.
    Replace with real partner logos when available.
--}}
<x-ui.section bg="white" spacing="tight">
    <div class="container-prose">
        <div class="text-center">
            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Trusted by partners across faith, government & civil society</p>
        </div>
        <div class="mt-8 grid grid-cols-2 items-center justify-items-center gap-x-8 gap-y-6 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ([
                ['name' => 'FCT Social Development', 'mark' => 'gov'],
                ['name' => 'NAPTIP', 'mark' => 'gov'],
                ['name' => 'Caritas Nigeria', 'mark' => 'faith'],
                ['name' => 'World Food Programme', 'mark' => 'un'],
                ['name' => 'Zenith Bank Foundation', 'mark' => 'corp'],
                ['name' => 'ECWA Foundation', 'mark' => 'faith'],
            ] as $partner)
                <div class="flex items-center gap-2 opacity-70 transition-opacity hover:opacity-100" title="{{ $partner['name'] }}">
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-stone-100 text-stone-500">
                        @if ($partner['mark'] === 'gov')
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"/></svg>
                        @elseif ($partner['mark'] === 'faith')
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M9 9h6"/></svg>
                        @elseif ($partner['mark'] === 'un')
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/></svg>
                        @else
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"/></svg>
                        @endif
                    </span>
                    <span class="text-sm font-medium text-stone-500">{{ $partner['name'] }}</span>
                </div>
            @endforeach
        </div>
        <p class="mt-6 text-center text-xs text-stone-400">Illustrative — official partner logos to be added.</p>
    </div>
</x-ui.section>
