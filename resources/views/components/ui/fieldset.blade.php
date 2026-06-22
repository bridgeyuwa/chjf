@props([
    'legend' => null,
    'description' => null,
    'class' => '',
])

<fieldset {{ $attributes->merge(['class' => 'rounded-2xl border border-stone-200 bg-stone-50/50 p-5 sm:p-6 ' . $class]) }}>
    @if ($legend)
        <legend class="px-2 text-sm font-semibold text-stone-800">{{ $legend }}</legend>
    @endif
    @if ($description)
        <p class="mt-1 px-2 text-xs text-stone-500">{{ $description }}</p>
    @endif
    <div class="mt-4">
        {{ $slot }}
    </div>
</fieldset>
