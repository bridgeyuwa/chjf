@extends('layouts.app', [
    'title' => 'Contact',
    'description' => 'Get in touch with Compassionate Heart of Jesus Foundation. Office in Jabi, Abuja. Phone, email, and contact form.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Contact"
    title="We'd love to hear from you."
    intro="Whether you're a community member in need, a potential partner, a volunteer, or simply curious — reach out. We answer every message."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">

            {{-- Contact info --}}
            <div>
                <span class="eyebrow">Reach us directly</span>
                <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900">Our details</h2>

                <ul class="mt-8 space-y-6">
                    <li class="flex items-start gap-4">
                        <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Office</p>
                            <p class="mt-1 text-stone-800 font-medium">Plot 12, Peace Avenue</p>
                            <p class="text-stone-600">Jabi District, Abuja</p>
                            <p class="text-stone-600">Federal Capital Territory, Nigeria</p>
                            <p class="mt-1 text-xs text-stone-500">Mon–Fri, 9am–5pm WAT</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Phone</p>
                            <a href="tel:+2348031234567" class="mt-1 block font-medium text-stone-800 hover:text-brand-700">+234 803 123 4567</a>
                            <a href="tel:+2348098765432" class="block text-stone-600 hover:text-brand-700">+234 809 876 5432 (Safe Harbor line)</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Email</p>
                            <a href="mailto:hello@chjfoundation.org" class="mt-1 block font-medium text-stone-800 hover:text-brand-700">hello@chjfoundation.org</a>
                            <a href="mailto:volunteer@chjfoundation.org" class="block text-stone-600 hover:text-brand-700">volunteer@chjfoundation.org</a>
                            <a href="mailto:donate@chjfoundation.org" class="block text-stone-600 hover:text-brand-700">donate@chjfoundation.org</a>
                            <a href="mailto:prayer@chjfoundation.org" class="block text-stone-600 hover:text-brand-700">prayer@chjfoundation.org</a>
                        </div>
                    </li>
                </ul>

                {{-- Map placeholder --}}
                <div class="mt-8 overflow-hidden rounded-2xl ring-1 ring-stone-200/60">
                    <iframe
                        src="https://www.openstreetmap.org/export/embed.html?bbox=7.4305%2C9.0780%2C7.4555%2C9.0920&layer=mapnik&marker=9.0850%2C7.4430"
                        class="h-64 w-full"
                        style="border:0;"
                        loading="lazy"
                        title="CHJ Foundation office location map"
                    ></iframe>
                </div>
            </div>

            {{-- Contact form --}}
            <div>
                <x-ui.card>
                    <h2 class="font-display text-2xl font-semibold text-stone-900">Send us a message</h2>
                    <p class="mt-1 text-sm text-stone-600">We aim to respond within 2 working days. For urgent matters, please call.</p>

                    <form
                        x-data="chjForm"
                        action="{{ route('contact.store') }}"
                        method="POST"
                        @submit.prevent="submit($event)"
                        class="mt-6 space-y-5"
                    >
                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2">
                            <x-ui.input label="Your name" name="name" required placeholder="Aisha Bello" autocomplete="name"/>
                            <x-ui.input label="Email" name="email" type="email" required placeholder="you@example.com" autocomplete="email"/>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <x-ui.input label="Phone (optional)" name="phone" type="tel" placeholder="+234 803 123 4567" autocomplete="tel"/>
                            <x-ui.select
                                label="Topic"
                                name="subject"
                                required
                                :options="[
                                    'general' => 'General enquiry',
                                    'volunteer' => 'Volunteering',
                                    'donation' => 'Donation',
                                    'partnership' => 'Partnership',
                                    'press' => 'Press / media',
                                    'prayer' => 'Prayer request',
                                    'other' => 'Other',
                                ]"
                            />
                        </div>

                        <x-ui.textarea label="Your message" name="message" required rows="6" placeholder="How can we help?"/>

                        <label class="flex items-start gap-3 text-sm text-stone-700">
                            <input type="checkbox" name="consent" required class="mt-1 h-4 w-4 rounded border-stone-300 text-brand-600 focus:ring-brand-500"/>
                            <span>I consent to CHJ Foundation storing my information to respond to this enquiry. (See our <a href="#" class="text-brand-700 hover:underline">Privacy Policy</a>.)</span>
                        </label>

                        <div class="flex justify-end border-t border-stone-200 pt-5">
                            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-soft transition-all hover:bg-brand-700 hover:shadow-lifted" :disabled="submitting">
                                <span x-show="!submitting">Send message</span>
                                <span x-show="submitting" class="flex items-center gap-2">
                                    <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                                    Sending…
                                </span>
                            </button>
                        </div>
                    </form>
                </x-ui.card>
            </div>
        </div>
    </div>
</x-ui.section>

@endsection
