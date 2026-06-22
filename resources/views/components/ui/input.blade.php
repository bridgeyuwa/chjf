@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'required' => false,
    'placeholder' => null,
    'autocomplete' => null,
    'hint' => null,
    'value' => null,
])

@php
    $name = $name ?? str($label)->snake()->lower();
    $id = 'field-' . str($name)->slug();
    $hasError = $errors->has($name);
    $error = $errors->first($name);
    $oldVal = old($name, $value);
@endphp

<div x-data="{ field: '{{ $name }}' }" class="w-full">
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-stone-800">
            {{ $label }}
            @if ($required)<span class="text-rose-500" aria-hidden="true">*</span>@endif
        </label>
    @endif

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $oldVal }}"
        placeholder="{{ $placeholder }}"
        autocomplete="{{ $autocomplete }}"
        @if ($required) required @endif
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        class="mt-1.5 block w-full rounded-lg border-0 bg-white px-3.5 py-2.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 transition-all placeholder:text-stone-400 focus:ring-2 focus:ring-inset focus:ring-brand-500"
        :class="hasError('{{ $name }}') ? 'ring-rose-400 focus:ring-rose-500' : ''"
        @blur="validateField('{{ $name }}', '{{ $required ? 'required' : '' }}{{ $type === 'email' ? '|email' : '' }}{{ $type === 'tel' ? '|phone' : '' }}')"
    />

    @if ($hint && !$hasError)
        <p class="mt-1.5 text-xs text-stone-500">{{ $hint }}</p>
    @endif

    @if ($hasError)
        <p id="{{ $id }}-error" class="mt-1.5 flex items-center gap-1 text-xs text-rose-600">
            <svg class="h-3.5 w-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            {{ $error }}
        </p>
    @endif
    <p x-show="hasError('{{ $name }}')" x-cloak x-text="errors['{{ $name }}']" class="mt-1.5 flex items-center gap-1 text-xs text-rose-600">
        <svg class="h-3.5 w-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
    </p>
</div>
