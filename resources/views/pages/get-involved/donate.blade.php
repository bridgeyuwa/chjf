@extends('layouts.app', [
    'title' => 'Donate',
    'description' => 'Donate to Compassionate Heart of Jesus Foundation. Nigerian bank transfer, international SWIFT transfer, and partnership options.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Donate"
    title="Every gift, stewarded with care."
    intro="Your generosity feeds families, shelters survivors, sends children to school, and cares for the sick. Here's how to give — from Nigeria or anywhere in the world."
/>

{{-- Why give --}}
<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
            <div>
                <span class="eyebrow">Why your gift matters</span>
                <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">
                    We stretch every naira — and we tell you how.
                </h2>
                <p class="mt-5 text-lg leading-relaxed text-stone-600">
                    CHJ Foundation operates with a lean admin overhead (under 12%). The vast majority of every donation goes directly to programs serving the vulnerable. We publish a full annual audited financial report — because trust is earned, not assumed.
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        ['label' => '88% to programs', 'desc' => 'Direct service delivery — food, shelter, education, medical care, anti-trafficking.'],
                        ['label' => '12% to admin & fundraising', 'desc' => 'Staff, office, audit, communications — the skeleton that lets the body serve.'],
                        ['label' => '0% to overhead waste', 'desc' => 'No flashy offices, no first-class travel, no inflated salaries. We live in the communities we serve.'],
                        ['label' => '100% transparency', 'desc' => 'Annual audited accounts published. Donor reports sent quarterly. Available on request.'],
                    ] as $point)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <div>
                                <p class="font-semibold text-stone-900">{{ $point['label'] }}</p>
                                <p class="text-sm text-stone-600">{{ $point['desc'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="rounded-2xl bg-gradient-to-br from-brand-700 to-brand-900 p-8 text-white shadow-lifted">
                <p class="text-xs font-semibold uppercase tracking-widest text-brand-200">What your gift can do</p>
                <dl class="mt-5 space-y-4">
                    @foreach ([
                        ['amount' => '₦5,000', 'impact' => 'Feeds a family of five for one week through Hope Kitchen', 'equivalent' => '~$3.20 USD'],
                        ['amount' => '₦25,000', 'impact' => 'Sponsors a child\'s education for one month', 'equivalent' => '~$16 USD'],
                        ['amount' => '₦50,000', 'impact' => 'Funds a mobile medical clinic reaching 100 patients', 'equivalent' => '~$32 USD'],
                        ['amount' => '₦100,000', 'impact' => 'Funds a full clinic day at our Jabi or Nyanya location', 'equivalent' => '~$65 USD'],
                        ['amount' => '₦150,000', 'impact' => 'Sponsors a trafficking survivor\'s recovery for one month', 'equivalent' => '~$97 USD'],
                        ['amount' => '₦500,000', 'impact' => 'Funds a vocational training cohort\'s starter kits', 'equivalent' => '~$325 USD'],
                    ] as $tier)
                        <div class="flex items-baseline justify-between border-b border-white/10 pb-4 last:border-0">
                            <div class="flex-1 pr-4">
                                <dt class="font-display text-xl font-semibold text-white">{{ $tier['amount'] }}</dt>
                                <dd class="mt-0.5 text-sm text-brand-100">{{ $tier['impact'] }}</dd>
                            </div>
                            <span class="text-xs text-brand-300">{{ $tier['equivalent'] }}</span>
                        </div>
                    @endforeach
                </dl>
                <p class="mt-6 text-xs text-brand-200">USD equivalents are approximate, based on current exchange rates. Donate in any currency via SWIFT transfer (details below).</p>
            </div>
        </div>
    </div>
</x-ui.section>

{{-- Bank details --}}
<x-ui.section bg="muted" spacing="default">
    <div class="container-prose">
        <div class="mx-auto max-w-3xl">
            <x-ui.section-heading
                eyebrow="How to Give"
                title="Bank transfer details"
                intro="Donate directly to the CHJ Foundation official bank account. Use the details below for Nigerian transfers; international donors please use the SWIFT section."
                align="center"
            />

            {{-- Nigerian transfer --}}
            <x-ui.card class="mt-10">
                <div class="flex items-center gap-3 border-b border-stone-200 pb-4">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-100 text-brand-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </span>
                    <div>
                        <h3 class="font-display text-lg font-semibold text-stone-900">Nigerian Bank Transfer</h3>
                        <p class="text-xs text-stone-500">For donations within Nigeria — instant clearance, no fees.</p>
                    </div>
                </div>

                <dl class="mt-5 divide-y divide-stone-100">
                    @php
                        $ngDetails = [
                            ['label' => 'Bank Name', 'value' => 'Zenith Bank Nigeria'],
                            ['label' => 'Account Name', 'value' => 'Compassionate Heart of Jesus Foundation'],
                            ['label' => 'Account Number', 'value' => '0123456789'],
                            ['label' => 'Account Type', 'value' => 'Current (Corporate)'],
                            ['label' => 'Sort Code', 'value' => '057150023'],
                        ];
                    @endphp
                    @foreach ($ngDetails as $detail)
                        <div
                            x-data="copyable('{{ $detail['value'] }}')"
                            class="flex items-center justify-between gap-4 py-3"
                        >
                            <div class="flex-1">
                                <dt class="text-xs font-semibold uppercase tracking-widest text-stone-500">{{ $detail['label'] }}</dt>
                                <dd class="mt-0.5 font-mono text-base font-semibold text-stone-900">{{ $detail['value'] }}</dd>
                            </div>
                            <button
                                @click="copy()"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-stone-100 px-3 py-1.5 text-xs font-semibold text-stone-700 transition-colors hover:bg-brand-100 hover:text-brand-700"
                                :class="copied ? 'bg-emerald-100 text-emerald-700' : ''"
                            >
                                <svg x-show="!copied" class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184"/></svg>
                                <svg x-show="copied" x-cloak class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span x-text="copied ? 'Copied' : 'Copy'"></span>
                            </button>
                        </div>
                    @endforeach
                </dl>
            </x-ui.card>

            {{-- International transfer --}}
            <x-ui.card class="mt-6">
                <div class="flex items-center gap-3 border-b border-stone-200 pb-4">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-spark-400/20 text-spark-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>
                    </span>
                    <div>
                        <h3 class="font-display text-lg font-semibold text-stone-900">International Wire / SWIFT Transfer</h3>
                        <p class="text-xs text-stone-500">For donations from outside Nigeria. Funds arrive in 3–5 working days.</p>
                    </div>
                </div>

                <dl class="mt-5 divide-y divide-stone-100">
                    @php
                        $intlDetails = [
                            ['label' => 'Beneficiary Bank', 'value' => 'Zenith Bank Plc'],
                            ['label' => 'Bank Address', 'value' => 'Zenith Bank House, 84 Ajose Adeogun Street, Victoria Island, Lagos, Nigeria'],
                            ['label' => 'SWIFT / BIC Code', 'value' => 'ZEIBNGLA'],
                            ['label' => 'Account Name', 'value' => 'Compassionate Heart of Jesus Foundation'],
                            ['label' => 'Account Number (IBAN)', 'value' => 'NG0123456789'],
                            ['label' => 'Account Currency', 'value' => 'NGN (Naira) — USD/EUR/GBP auto-converted on arrival'],
                            ['label' => 'Routing / Sort Code', 'value' => '057150023'],
                            ['label' => 'Correspondent Bank (USD)', 'value' => 'Citibank N.A., New York · SWIFT: CITIUS33'],
                            ['label' => 'Correspondent Bank (EUR)', 'value' => 'Standard Chartered Bank, Frankfurt · SWIFT: SCBLDEFX'],
                            ['label' => 'Reference / Memo', 'value' => 'Donation — [Your Name]'],
                        ];
                    @endphp
                    @foreach ($intlDetails as $detail)
                        <div
                            x-data="copyable('{{ $detail['value'] }}')"
                            class="flex items-start justify-between gap-4 py-3"
                        >
                            <div class="flex-1">
                                <dt class="text-xs font-semibold uppercase tracking-widest text-stone-500">{{ $detail['label'] }}</dt>
                                <dd class="mt-0.5 font-mono text-sm font-semibold text-stone-900">{{ $detail['value'] }}</dd>
                            </div>
                            <button
                                @click="copy()"
                                class="inline-flex flex-shrink-0 items-center gap-1.5 rounded-lg bg-stone-100 px-3 py-1.5 text-xs font-semibold text-stone-700 transition-colors hover:bg-brand-100 hover:text-brand-700"
                                :class="copied ? 'bg-emerald-100 text-emerald-700' : ''"
                            >
                                <svg x-show="!copied" class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184"/></svg>
                                <svg x-show="copied" x-cloak class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span x-text="copied ? 'Copied' : 'Copy'"></span>
                            </button>
                        </div>
                    @endforeach
                </dl>

                <div class="mt-5 rounded-xl bg-amber-50 p-4 ring-1 ring-amber-200">
                    <div class="flex gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                        <div class="text-sm text-amber-800">
                            <p class="font-semibold">Important for international donors:</p>
                            <ul class="mt-2 space-y-1 text-xs text-amber-700 list-disc pl-4">
                                <li>Ask your bank to charge all fees to your side, so the full amount arrives.</li>
                                <li>Always include your name in the reference field so we can thank you.</li>
                                <li>Email <a href="mailto:donate@chjfoundation.org" class="font-semibold underline">donate@chjfoundation.org</a> after sending — we'll confirm receipt.</li>
                                <li>For donations over $1,000 USD, please contact us first for tax receipt coordination.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </x-ui.card>

            {{-- Notify form --}}
            <x-ui.card class="mt-6">
                <h3 class="font-display text-lg font-semibold text-stone-900">Let us know you've given</h3>
                <p class="mt-1 text-sm text-stone-600">If you've made a donation, please let us know — so we can thank you, send a receipt, and (if you wish) keep you updated on the impact.</p>

                <form
                    x-data="chjForm"
                    action="{{ route('donate.store') }}"
                    method="POST"
                    @submit.prevent="submit($event)"
                    class="mt-5 space-y-4"
                >
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-ui.input label="Your name" name="name" required placeholder="Aisha Bello"/>
                        <x-ui.input label="Email" name="email" type="email" required placeholder="you@example.com"/>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-ui.input label="Amount sent" name="amount" placeholder="₦50,000 / $100 USD"/>
                        <x-ui.input label="Date sent" name="date_sent" type="date"/>
                    </div>
                    <x-ui.textarea label="Anything you'd like us to know?" name="message" rows="3" placeholder="e.g., 'In memory of my mother' or 'For the Safe Harbor program'"/>
                    <label class="flex items-start gap-3 text-sm text-stone-700">
                        <input type="checkbox" name="consent" required class="mt-1 h-4 w-4 rounded border-stone-300 text-brand-600 focus:ring-brand-500"/>
                        <span>I consent to CHJ Foundation storing my information to respond to this donation notification. (See our <a href="#" class="text-brand-700 hover:underline">Privacy Policy</a>.)</span>
                    </label>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-soft transition-all hover:bg-brand-700 hover:shadow-lifted">
                            Notify CHJ Foundation
                        </button>
                    </div>
                </form>
            </x-ui.card>

            {{-- Other ways to give --}}
            <div class="mt-10">
                <h3 class="font-display text-xl font-semibold text-stone-900 text-center">Other ways to give</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-xl bg-white p-5 ring-1 ring-stone-200/60">
                        <h4 class="font-semibold text-stone-900 text-sm">Cheque</h4>
                        <p class="mt-1 text-xs text-stone-600">Make payable to "Compassionate Heart of Jesus Foundation" and mail to: Plot 12, Peace Avenue, Jabi District, Abuja, FCT, Nigeria.</p>
                    </div>
                    <div class="rounded-xl bg-white p-5 ring-1 ring-stone-200/60">
                        <h4 class="font-semibold text-stone-900 text-sm">In-kind donations</h4>
                        <p class="mt-1 text-xs text-stone-600">Food, clothing, medical supplies, equipment. Email <a href="mailto:donate@chjfoundation.org" class="text-brand-700 hover:underline">donate@chjfoundation.org</a> to coordinate.</p>
                    </div>
                    <div class="rounded-xl bg-white p-5 ring-1 ring-stone-200/60">
                        <h4 class="font-semibold text-stone-900 text-sm">Legacy giving</h4>
                        <p class="mt-1 text-xs text-stone-600">Remember CHJ Foundation in your will. Contact us for confidential legacy giving conversations.</p>
                    </div>
                </div>
            </div>

            <p class="mt-8 text-center text-xs text-stone-500">
                Compassionate Heart of Jesus Foundation is a registered non-profit in Nigeria (RC 0123456). All donations are tax-deductible to the extent allowed by Nigerian law. International donors: please consult your tax advisor regarding deductibility.
            </p>
        </div>
    </div>
</x-ui.section>

@endsection
