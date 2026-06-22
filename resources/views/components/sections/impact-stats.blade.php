@php
    $stats = [
        ['value' => '148,000+', 'label' => 'Meals served', 'sublabel' => 'Across Abuja, Niger & Plateau states', 'icon' => 'meal', 'tone' => 'brand'],
        ['value' => '1,250',    'label' => 'Families sheltered', 'sublabel' => 'Emergency & transitional housing', 'icon' => 'home', 'tone' => 'spark'],
        ['value' => '890',      'label' => 'Students in education', 'sublabel' => 'Scholarships + after-school', 'icon' => 'book', 'tone' => 'brand'],
        ['value' => '320',      'label' => 'Trafficking survivors', 'sublabel' => 'Since 2019', 'icon' => 'shield', 'tone' => 'brand'],
        ['value' => '4,200',    'label' => 'Medical consultations', 'sublabel' => 'Free community clinics, 2024', 'icon' => 'stethoscope', 'tone' => 'spark'],
        ['value' => '680',      'label' => 'Jobs placed & trained', 'sublabel' => 'Pathways graduates employed', 'icon' => 'briefcase', 'tone' => 'brand'],
        ['value' => '340',      'label' => 'Active volunteers', 'sublabel' => 'Serving weekly across programs', 'icon' => 'users', 'tone' => 'brand'],
        ['value' => '1,150',    'label' => 'Youth mentored', 'sublabel' => 'Bright Futures mentorship', 'icon' => 'heart', 'tone' => 'spark'],
    ];
@endphp

<x-ui.section bg="muted" spacing="default">
    <div class="container-prose">
        <x-ui.section-heading
            eyebrow="Our Impact"
            title="Lives changed, one act of compassion at a time"
            intro="Numbers are not the point — people are. But these figures represent real meals eaten, real children back in school, real survivors reunited with family."
        />

        <div class="mt-12 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 lg:grid-cols-4 lg:gap-x-8">
            @foreach ($stats as $stat)
                <x-ui.stat
                    :value="$stat['value']"
                    :label="$stat['label']"
                    :sublabel="$stat['sublabel']"
                    :icon="$stat['icon']"
                    :tone="$stat['tone']"
                />
            @endforeach
        </div>

        <div class="mt-12 flex justify-center">
            <x-ui.button variant="outline" size="md" href="{{ route('impact-report') }}">
                Read the 2024 Impact Report
            </x-ui.button>
        </div>
    </div>
</x-ui.section>
