@extends('layouts.app', [
    'title' => 'Annual Report 2024',
    'description' => 'CHJ Foundation Annual Report 2024 — full audited financials, governance, and program impact.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Annual Report 2024"
    title="Transparency is not optional. It's the gospel."
    intro="Every naira entrusted to us is stewarded with care. Here is the full picture of 2024 — financial, governance, and impact."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-narrow prose-chj">
        <h2>Letter from the Executive Director</h2>
        <p>Dear friends, partners, and supporters,</p>
        <p>2024 was a year of both deep joy and deep sorrow for CHJ Foundation. Joy, because we saw lives transformed — children back in school, survivors reunited with families, patients healed. Sorrow, because the need around us only grew. Inflation pushed more families into food insecurity. Trafficking networks adapted. The cost of medical supplies rose 40%.</p>
        <p>And yet — we served more people than ever before. We expanded our mobile clinics. We opened a second permanent clinic. We graduated our largest Pathways cohort to date. We supported 47 new trafficking survivors through Safe Harbor.</p>
        <p>This report is our accounting to you. To our donors: every naira, dollar, and euro you gave is documented here. To our partners: every collaboration is named. To the communities we serve: every commitment we made has been kept.</p>
        <p>Thank you for walking with us. The work is far from done.</p>
        <p class="mt-6"><strong>— Fr. Daniel Okonkwo, Founder & Executive Director</strong></p>

        <h2>Financial Summary</h2>
        <p>Total revenue in 2024: <strong>₦287,500,000</strong>. Total expenditure: <strong>₦281,300,000</strong>. Surplus carried into 2025 reserves: <strong>₦6,200,000</strong>.</p>

        <h3>Revenue sources</h3>
        <ul>
            <li>Individual donations (Nigeria): ₦112.5M (39%)</li>
            <li>Individual donations (international): ₦58.7M (20%)</li>
            <li>Corporate partnerships: ₦48.2M (17%)</li>
            <li>Grants (foundations, institutional): ₦42.3M (15%)</li>
            <li>Church partnerships: ₦18.4M (6%)</li>
            <li>In-kind donations (food, supplies): ₦7.4M (3%)</li>
        </ul>

        <h3>Expenditure by program</h3>
        <ul>
            <li>Hope Kitchen: ₦92.0M (33%)</li>
            <li>Safe Harbor: ₦69.0M (24%)</li>
            <li>Pathways: ₦51.7M (18%)</li>
            <li>Healing Hands: ₦40.2M (14%)</li>
            <li>Bright Futures: ₦23.0M (8%)</li>
            <li>Administration & fundraising: ₦5.4M (2%)</li>
        </ul>

        <p class="mt-6"><em>All figures are illustrative placeholders for the design template. Final audited figures will be added once the 2024 audit is complete. The audit is conducted by PwC Nigeria and the audited statement will be available as a PDF download.</em></p>

        <h2>Governance</h2>
        <p>CHJ Foundation is governed by a 7-member Board of Directors, meeting quarterly. Board members serve 3-year terms, renewable once. The current board includes representatives from finance, law, social work, theology, and public health.</p>
        <p>Our safeguarding policy covers children and vulnerable adults. All staff and volunteers complete annual safeguarding training. Any concerns can be reported confidentially to safeguarding@chjfoundation.org.</p>

        <h2>Looking to 2025</h2>
        <p>2025 will see us expand in three areas: (1) opening two new mobile clinic sites in Niger State, (2) expanding Safe Harbor capacity from 20 to 60 beds, and (3) growing Pathways scholarships from 200 to 300 students. Total budget for 2025: ₦340M.</p>
        <p>We invite you to walk with us into 2025 — as a donor, volunteer, partner, or prayer partner. The work continues. The need is great. The hope is real.</p>
    </div>
</x-ui.section>

<x-ui.section bg="muted" spacing="tight">
    <div class="container-narrow text-center">
        <h2 class="font-display text-2xl font-semibold text-stone-900">Download the full report</h2>
        <p class="mt-2 text-sm text-stone-600">The complete audited 2024 Annual Report will be available here as a PDF once the audit is finalized (expected Q1 2025).</p>
        <div class="mt-5">
            <x-ui.button variant="primary" href="#" class="opacity-60 cursor-not-allowed">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                Download PDF (coming soon)
            </x-ui.button>
        </div>
    </div>
</x-ui.section>

@endsection
