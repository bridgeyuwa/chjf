@extends('layouts.app', [
    'title' => 'FAQ',
    'description' => 'Frequently asked questions about CHJ Foundation — programs, volunteering, donating, partnerships, and safeguarding.',
])

@section('content')

<x-ui.page-hero
    eyebrow="FAQ"
    title="Questions, answered."
    intro="Everything you might want to know before getting involved — whether you're a community member, donor, volunteer, or partner."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-narrow">

        @php
            $faqs = [
                ['section' => 'About CHJ Foundation', 'items' => [
                    ['q' => 'Is CHJ Foundation affiliated with a specific church or denomination?', 'a' => 'No. CHJ Foundation is an interfaith-friendly, faith-rooted ministry. We are Christian in identity — founded on the conviction that every person bears the image of God — but we work with people of all faiths and none. We partner with churches across denominations (Catholic, Protestant, Evangelical) and with secular organizations and government agencies.'],
                    ['q' => 'Where do you operate?', 'a' => 'Our headquarters is in Jabi, Abuja. We run programs in three FCT locations (Jabi, Nyanya, Gwarinpa), plus monthly mobile clinics and outreach to communities in Niger and Nasarawa states.'],
                    ['q' => 'How long has CHJ Foundation been operating?', 'a' => 'We began informally in 2018 with a Saturday meal program in Jabi. We registered as a non-profit with the Corporate Affairs Commission (CAC) in 2019 (RC 0123456).'],
                    ['q' => 'How can I verify your registration and legitimacy?', 'a' => 'Our CAC registration number is RC 0123456 (placeholder — actual number to be added). We are registered with the FCT Social Development Secretariat. We publish an annual audited financial report, available on our Annual Report page.'],
                ]],
                ['section' => 'Volunteering', 'items' => [
                    ['q' => 'Do I need to be Christian to volunteer?', 'a' => 'No. We welcome volunteers of any faith or no faith. The only requirement is a genuine heart to serve and alignment with our values of compassion, dignity, and respect.'],
                    ['q' => 'What is the minimum time commitment?', 'a' => 'It varies by role. Event-based roles can be as little as 2 hours per month. Mentorship roles require a minimum one-year commitment. Most roles fall somewhere in between.'],
                    ['q' => 'Do you accept international volunteers?', 'a' => 'Yes, with caveats. We accept short-term international volunteers (2 weeks to 3 months) for specific skilled roles. We do not accept voluntourism — international volunteers must have relevant skills (medical, counseling, vocational training, etc.) and undergo our standard screening.'],
                    ['q' => 'Is there a background check?', 'a' => 'Yes — for any role working with children or vulnerable adults. This is non-negotiable for safeguarding. The check is conducted through the Nigeria Police Force and takes 2–3 weeks.'],
                ]],
                ['section' => 'Donations & Finances', 'items' => [
                    ['q' => 'Where does my money go?', 'a' => '88% goes directly to programs. 12% covers admin and fundraising (staff, office, audit, communications). We publish a full audited annual report — see our Annual Report page.'],
                    ['q' => 'Can I donate from outside Nigeria?', 'a' => 'Yes. We accept SWIFT/wire transfers in USD, EUR, GBP (auto-converted to NGN on arrival). See our Donate page for full bank details including correspondent bank information.'],
                    ['q' => 'Do you accept in-kind donations?', 'a' => 'Yes — food, clothing, medical supplies, and equipment. Please email donate@chjfoundation.org before sending, so we can confirm current needs and arrange logistics.'],
                    ['q' => 'Can I donate to a specific program?', 'a' => 'Yes. Just include the program name in the reference field of your transfer (e.g., "Hope Kitchen — Aisha"). We honor restricted donations and report back on the specific impact.'],
                    ['q' => 'Are donations tax-deductible?', 'a' => 'Donations are tax-deductible to the extent allowed by Nigerian law. International donors should consult their tax advisor regarding deductibility in their country.'],
                ]],
                ['section' => 'Safeguarding & Ethics', 'items' => [
                    ['q' => 'How do you protect the privacy of those you serve?', 'a' => 'Privacy is paramount. We never share names, photos, or identifying details of beneficiaries without their explicit informed consent. Composite stories on our website use first names only, with photos that do not show faces of vulnerable individuals.'],
                    ['q' => 'Do you have a safeguarding policy?', 'a' => 'Yes. Our safeguarding policy covers children and vulnerable adults. All staff and volunteers complete safeguarding training. Any concerns can be reported to safeguarding@chjfoundation.org — confidentially.'],
                    ['q' => 'Why do you use placeholder/Unsplash images?', 'a' => 'We are in the process of gathering proper consent for using real beneficiary photos. Until that process is complete, we use dignity-centered stock imagery that represents — but does not exploit — the people we serve.'],
                ]],
                ['section' => 'Partnerships', 'items' => [
                    ['q' => 'How can my church partner with CHJ Foundation?', 'a' => 'We partner with churches in several ways: adopting a program (financial + volunteer commitment), hosting a CHJ Sunday (we share about our work), mobilizing your congregation to serve, or including us in your mission budget. Email partners@chjfoundation.org to start the conversation.'],
                    ['q' => 'Do you partner with corporations?', 'a' => 'Yes — CSR partnerships, payroll giving, employee volunteering, cause marketing, and in-kind donations. We provide full impact reporting. See our Get Involved page or email partners@chjfoundation.org.'],
                    ['q' => 'Can my university or research organization study your work?', 'a' => 'We welcome researchers and interns, with prior arrangement. We also share anonymized data with academic institutions studying NGO effectiveness in Nigeria. Email research@chjfoundation.org.'],
                ]],
            ];
        @endphp

        @php $counter = 0; @endphp
        @foreach ($faqs as $section)
            <div class="mt-12 first:mt-0">
                <h2 class="font-display text-2xl font-semibold text-stone-900 border-b border-stone-200 pb-3">{{ $section['section'] }}</h2>
                <div class="mt-4 divide-y divide-stone-100" x-data="accordion(null)">
                    @foreach ($section['items'] as $item)
                        @php $counter++; @endphp
                        <div class="py-2">
                            <button
                                @click="toggle({{ $counter }})"
                                class="flex w-full items-center justify-between gap-4 py-3 text-left"
                                :aria-expanded="open === {{ $counter }}"
                            >
                                <span class="font-medium text-stone-900">{{ $item['q'] }}</span>
                                <svg
                                    class="h-5 w-5 flex-shrink-0 text-brand-600 transition-transform"
                                    :class="open === {{ $counter }} ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div
                                x-show="open === {{ $counter }}"
                                x-cloak
                                x-collapse
                            >
                                <p class="pb-4 pr-8 text-sm leading-relaxed text-stone-600">{{ $item['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- Still have questions? --}}
        <div class="mt-16 rounded-2xl bg-brand-50 p-8 text-center ring-1 ring-brand-200/60">
            <h2 class="font-display text-2xl font-semibold text-brand-900">Still have questions?</h2>
            <p class="mt-2 text-sm text-brand-800">We're happy to help. Reach out and a real human will get back to you.</p>
            <div class="mt-5 flex flex-wrap justify-center gap-3">
                <x-ui.button variant="primary" href="{{ route('contact') }}">Contact us</x-ui.button>
                <x-ui.button variant="outline" href="mailto:hello@chjfoundation.org">Email us</x-ui.button>
            </div>
        </div>
    </div>
</x-ui.section>

@endsection
