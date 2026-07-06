@extends('layouts.app', [
    'title' => 'Prayer Request',
    'description' => 'Submit a prayer request to CHJ Foundation. Our team prays over every request we receive — confidentially and faithfully.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Prayer Request"
    title="We would be honoured to pray for you."
    intro="Every request is read by a member of our team. Every request is prayed over — by name or anonymously, in our chapel and at our weekly staff devotions."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="mx-auto max-w-2xl">

            {{-- How it works --}}
            <div class="rounded-2xl bg-brand-50 p-6 ring-1 ring-brand-200/60 mb-10">
                <div class="flex gap-3">
                    <svg class="h-6 w-6 flex-shrink-0 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6"/></svg>
                    <div class="text-sm text-brand-900">
                        <p class="font-semibold">How it works</p>
                        <ol class="mt-2 space-y-1 text-brand-800 list-decimal pl-4">
                            <li>You submit the form below — share as much or as little as you wish.</li>
                            <li>Our team gathers weekly to pray over every request received.</li>
                            <li>If you request a personal response, a staff member will reach out within 5 days.</li>
                            <li>All requests are kept strictly confidential.</li>
                        </ol>
                    </div>
                </div>
            </div>

            <x-ui.card>
                <form
                    x-data="chjForm"
                    action="{{ route('prayer.store') }}"
                    method="POST"
                    @submit.prevent="submit($event)"
                    class="space-y-5"
                >
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-ui.input label="Your name (or alias)" name="name" placeholder="Aisha, or leave blank to remain anonymous"/>
                        <x-ui.input label="Email (optional, if you'd like a response)" name="email" type="email" placeholder="you@example.com"/>
                    </div>

                    <x-ui.select
                        label="Prayer category"
                        name="category"
                        required
                        :options="[
                            'health' => 'Health / healing',
                            'family' => 'Family / relationships',
                            'provision' => 'Financial provision',
                            'grief' => 'Grief / loss',
                            'guidance' => 'Guidance / direction',
                            'protection' => 'Protection / safety',
                            'thanksgiving' => 'Thanksgiving',
                            'other' => 'Other',
                        ]"
                    />

                    <x-ui.textarea
                        label="Your prayer request"
                        name="request"
                        required
                        rows="8"
                        placeholder="Share as much or as little as you feel comfortable. We will read every word."
                        hint="Be as specific or as brief as you wish. We honor both."
                    />

                    <fieldset class="rounded-2xl border border-stone-200 bg-stone-50/50 p-5">
                        <legend class="px-2 text-sm font-semibold text-stone-800">Privacy</legend>
                        <div class="mt-3 space-y-2.5">
                            <label class="flex items-start gap-3 text-sm text-stone-700">
                                <input type="radio" name="visibility" value="private" checked class="mt-1 h-4 w-4 border-stone-300 text-brand-600 focus:ring-brand-500"/>
                                <span><span class="font-medium">Private</span> — only the CHJ prayer team will see this.</span>
                            </label>
                            <label class="flex items-start gap-3 text-sm text-stone-700">
                                <input type="radio" name="visibility" value="staff" class="mt-1 h-4 w-4 border-stone-300 text-brand-600 focus:ring-brand-500"/>
                                <span><span class="font-medium">Share with staff</span> — include in our weekly all-staff devotion.</span>
                            </label>
                            <label class="flex items-start gap-3 text-sm text-stone-700">
                                <input type="radio" name="visibility" value="public" class="mt-1 h-4 w-4 border-stone-300 text-brand-600 focus:ring-brand-500"/>
                                <span><span class="font-medium">Public (anonymous)</span> — share on our prayer wall for the wider community to pray.</span>
                            </label>
                        </div>
                    </fieldset>

                    <label class="flex items-start gap-3 text-sm text-stone-700">
                        <input type="checkbox" name="follow_up" value="1" class="mt-1 h-4 w-4 rounded border-stone-300 text-brand-600 focus:ring-brand-500"/>
                        <span>I would like someone from the team to follow up with me (requires email above).</span>
                    </label>

                    <div class="flex justify-end border-t border-stone-200 pt-5">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-soft transition-all hover:bg-brand-700 hover:shadow-lifted" :disabled="submitting">
                            <span x-show="!submitting">Submit prayer request</span>
                            <span x-show="submitting" class="flex items-center gap-2">
                                <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                                Submitting…
                            </span>
                        </button>
                    </div>
                </form>
            </x-ui.card>

            <p class="mt-6 text-center text-xs text-stone-500">
                In crisis? If you or someone you know is in immediate danger, please call <a href="tel:112" class="font-semibold text-brand-700 hover:underline">112</a> (Nigerian emergency) or NAPTIP at <a href="tel:070300002030" class="font-semibold text-brand-700 hover:underline">0703 000 2030</a> for trafficking-related emergencies.
            </p>
        </div>
    </div>
</x-ui.section>

{{-- Scripture encouragement --}}
<x-ui.section bg="muted" spacing="tight">
    <div class="container-narrow text-center">
        <svg class="mx-auto h-8 w-8 text-spark-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
        <p class="mt-4 font-display text-2xl italic text-stone-800 sm:text-3xl">
            "Therefore confess your sins to each other and pray for each other so that you may be healed. The prayer of a righteous person is powerful and effective."
        </p>
        <p class="mt-3 text-sm font-semibold text-brand-700">— James 5:16</p>
    </div>
</x-ui.section>

@endsection
