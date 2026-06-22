@extends('layouts.app', [
    'title' => 'Volunteer',
    'description' => 'Volunteer with CHJ Foundation in Abuja. Meal service, mentorship, medical, legal, admin, events and more. Find your role.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Volunteer"
    title="Your hands. Your time. Their hope."
    intro="Volunteers are the heartbeat of CHJ Foundation. Whether you can give two hours a month or two days a week, there is a place for you in this work."
/>

{{-- Open roles --}}
<x-ui.section bg="white" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Open Roles"
            title="Find a role that fits your gifts"
            intro="Browse our current openings. Don't see a fit? Apply anyway — we match volunteers to roles based on gifts and availability, not just listed openings."
        />

        @php
            $roles = [
                ['title' => 'Hope Kitchen Server', 'program' => 'Hope Kitchen', 'commitment' => 'Saturdays, 4 hrs', 'location' => 'Jabi, Nyanya, Gwarinpa', 'desc' => 'Help cook, serve, and clean up at our weekly community meals. No experience needed — just a willingness to serve.'],
                ['title' => 'Youth Mentor', 'program' => 'Bright Futures', 'commitment' => '2 hrs/week, 1 year min', 'location' => 'Various', 'desc' => 'Become a steady adult presence in a young person\'s life. Training and ongoing support provided. Background check required.'],
                ['title' => 'Medical Volunteer', 'program' => 'Healing Hands', 'commitment' => '1 clinic day/month', 'location' => 'Jabi or Nyanya clinic', 'desc' => 'Licensed doctors, nurses, pharmacists, and lab techs. Provide free care at our clinics or mobile outreach.'],
                ['title' => 'Trauma Counselor', 'program' => 'Safe Harbor', 'commitment' => '4 hrs/week', 'location' => 'Safe house (confidential)', 'desc' => 'Licensed counselors or final-year counseling students. Provide trauma-informed therapy to trafficking survivors.'],
                ['title' => 'Vocational Trainer', 'program' => 'Pathways', 'commitment' => '6 hrs/week', 'location' => 'Pathways training center', 'desc' => 'Skilled tradespeople (tailoring, catering, IT, hairdressing, plumbing, solar). Teach your trade to a cohort of 24.'],
                ['title' => 'Event Volunteer', 'program' => 'All programs', 'commitment' => 'Occasional', 'location' => 'Various', 'desc' => 'Help with fundraising events, holiday camps, community outreach days. Flexible, event-based commitment.'],
                ['title' => 'Administrative Support', 'program' => 'All programs', 'commitment' => '4–8 hrs/week', 'location' => 'CHJ HQ, Wuse 2', 'desc' => 'Data entry, donor communications, social media, graphic design, photography, video editing.'],
                ['title' => 'Prayer Partner', 'program' => 'All programs', 'commitment' => 'Weekly', 'location' => 'Remote', 'desc' => 'Join our prayer team. Receive weekly prayer requests and pray for the work and the people we serve.'],
                ['title' => 'Driver', 'program' => 'All programs', 'commitment' => 'Occasional', 'location' => 'Abuja', 'desc' => 'Help transport supplies, food parcels, and occasionally people. Valid license and clean record required.'],
                ['title' => 'Translator (Hausa, Yoruba, Igbo)', 'program' => 'All programs', 'commitment' => 'As needed', 'location' => 'Various', 'desc' => 'Help us communicate with families in their heart language. Especially needed in clinics and Safe Harbor.'],
                ['title' => 'Pro Bono Legal', 'program' => 'Safe Harbor', 'commitment' => 'Case-by-case', 'location' => 'Abuja', 'desc' => 'Licensed lawyers willing to take on trafficking survivor cases pro bono. Partnership with our legal advocacy team.'],
                ['title' => 'Grant Writer', 'program' => 'All programs', 'commitment' => '6 hrs/week', 'location' => 'Remote', 'desc' => 'Experienced grant writers to help us secure institutional funding. Stewardship of every gift starts here.'],
            ];
        @endphp

        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($roles as $i => $role)
                <div
                    x-data="reveal({{ ($i % 3) * 80 }})"
                    x-intersect.once="onIntersect()"
                    class="fade-up flex flex-col rounded-2xl bg-white p-6 shadow-card ring-1 ring-stone-200/60 transition-all hover:shadow-lifted"
                >
                    <div class="flex items-center justify-between">
                        <span class="inline-block rounded-full bg-brand-50 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-widest text-brand-700 ring-1 ring-inset ring-brand-200">{{ $role['program'] }}</span>
                    </div>
                    <h3 class="mt-3 font-display text-lg font-semibold text-stone-900">{{ $role['title'] }}</h3>
                    <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">{{ $role['desc'] }}</p>
                    <dl class="mt-4 space-y-1 border-t border-stone-100 pt-4 text-xs">
                        <div class="flex items-center gap-2 text-stone-500">
                            <svg class="h-3.5 w-3.5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <dd>{{ $role['commitment'] }}</dd>
                        </div>
                        <div class="flex items-center gap-2 text-stone-500">
                            <svg class="h-3.5 w-3.5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <dd>{{ $role['location'] }}</dd>
                        </div>
                    </dl>
                    <a href="#apply" class="mt-4 inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-brand-700">
                        Apply for this role
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-ui.section>

{{-- Application form --}}
<x-ui.section id="apply" bg="muted" spacing="default">
    <div class="container-prose">
        <div class="mx-auto max-w-3xl">
            <x-ui.section-heading
                eyebrow="Volunteer Application"
                title="Apply to volunteer"
                intro="Fill out the form below. Our volunteer coordinator will be in touch within 5 working days. All information is confidential."
                align="center"
            />

            <x-ui.card class="mt-10">
                <form
                    x-data="chjForm"
                    action="{{ route('volunteer.store') }}"
                    method="POST"
                    class="space-y-6"
                >
                    @csrf

                    <x-ui.fieldset legend="About you" description="Tell us who you are.">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <x-ui.input label="First name" name="first_name" required placeholder="Aisha" autocomplete="given-name"/>
                            <x-ui.input label="Last name" name="last_name" required placeholder="Bello" autocomplete="family-name"/>
                            <x-ui.input label="Email" name="email" type="email" required placeholder="you@example.com" autocomplete="email"/>
                            <x-ui.input label="Phone" name="phone" type="tel" required placeholder="+234 803 123 4567" autocomplete="tel"/>
                            <x-ui.input label="City / Area" name="city" required placeholder="Wuse 2, Abuja" autocomplete="address-level2"/>
                            <x-ui.select label="Age range" name="age_range" required :options="['18-25' => '18–25', '26-35' => '26–35', '36-50' => '36–50', '51+' => '51+']"/>
                        </div>
                    </x-ui.fieldset>

                    <x-ui.fieldset legend="Your interests" description="Help us match you to the right role.">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <x-ui.select
                                label="Preferred program"
                                name="program"
                                required
                                :options="[
                                    'hope-kitchen' => 'Hope Kitchen',
                                    'safe-harbor' => 'Safe Harbor',
                                    'pathways' => 'Pathways',
                                    'healing-hands' => 'Healing Hands',
                                    'bright-futures' => 'Bright Futures',
                                    'any' => 'No preference — wherever needed',
                                ]"
                                hint="Where do you feel most called to serve?"
                            />
                            <x-ui.select
                                label="Availability"
                                name="availability"
                                required
                                :options="[
                                    'weekdays-day' => 'Weekdays, daytime',
                                    'weekdays-eve' => 'Weekdays, evenings',
                                    'weekends' => 'Weekends',
                                    'flexible' => 'Flexible',
                                ]"
                            />
                            <x-ui.select
                                label="Time commitment"
                                name="commitment"
                                required
                                :options="[
                                    '2-4-hrs-month' => '2–4 hours / month',
                                    'weekly' => 'Weekly',
                                    'fortnightly' => 'Fortnightly',
                                    'monthly' => 'Monthly',
                                    'event-based' => 'Event-based only',
                                ]"
                            />
                            <x-ui.select
                                label="How did you hear about us?"
                                name="referral"
                                :options="[
                                    'friend' => 'Friend / family',
                                    'church' => 'Church',
                                    'social' => 'Social media',
                                    'event' => 'Event',
                                    'press' => 'News / press',
                                    'other' => 'Other',
                                ]"
                            />
                        </div>
                    </x-ui.fieldset>

                    <x-ui.fieldset legend="Your skills & experience" description="Optional — but helps us place you well.">
                        <div class="grid gap-4">
                            <x-ui.input label="Profession / skills" name="skills" placeholder="Teacher, nurse, accountant, photographer…" hint="List any professional skills or qualifications relevant to volunteering."/>
                            <x-ui.textarea label="Why do you want to volunteer with CHJ Foundation?" name="motivation" rows="4" placeholder="A few sentences about what draws you to this work."/>
                            <x-ui.textarea label="Previous volunteer experience" name="experience" rows="3" placeholder="Where have you served before? In what capacity?"/>
                        </div>
                    </x-ui.fieldset>

                    <x-ui.fieldset legend="Background check consent" description="Required for roles working with children or vulnerable adults.">
                        <div class="space-y-3">
                            <label class="flex items-start gap-3 text-sm text-stone-700">
                                <input type="checkbox" name="consent_background_check" required class="mt-1 h-4 w-4 rounded border-stone-300 text-brand-600 focus:ring-brand-500"/>
                                <span>I consent to a background check if matched to a role working with children or vulnerable adults. I understand this is required for safeguarding.</span>
                            </label>
                            <label class="flex items-start gap-3 text-sm text-stone-700">
                                <input type="checkbox" name="consent_data" required class="mt-1 h-4 w-4 rounded border-stone-300 text-brand-600 focus:ring-brand-500"/>
                                <span>I consent to CHJ Foundation storing my information for volunteer matching purposes. I can request deletion at any time.</span>
                            </label>
                        </div>
                    </x-ui.fieldset>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end border-t border-stone-200 pt-6">
                        <button type="reset" class="rounded-lg px-4 py-2.5 text-sm font-semibold text-stone-600 hover:bg-stone-100">Clear form</button>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-soft transition-all hover:bg-brand-700 hover:shadow-lifted"
                            :disabled="submitting"
                        >
                            <span x-show="!submitting">Submit application</span>
                            <span x-show="submitting" class="flex items-center gap-2">
                                <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                                Submitting…
                            </span>
                        </button>
                    </div>
                </form>
            </x-ui.card>

            <p class="mt-6 text-center text-xs text-stone-500">
                Questions? Email <a href="mailto:volunteer@chjfoundation.org" class="text-brand-700 hover:underline">volunteer@chjfoundation.org</a> or call <a href="tel:+2348031234567" class="text-brand-700 hover:underline">+234 803 123 4567</a>.
            </p>
        </div>
    </div>
</x-ui.section>

@endsection
