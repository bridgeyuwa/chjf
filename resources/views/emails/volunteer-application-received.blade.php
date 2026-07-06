NEW VOLUNTEER APPLICATION
=========================

Name: {{ $application->full_name }}
Email: {{ $application->email }}
Phone: {{ $application->phone }}
City: {{ $application->city }}
Age range: {{ $application->age_range }}

Preferred program: {{ $application->program }}
Availability: {{ $application->availability }}
Commitment: {{ $application->commitment }}
Referral: {{ $application->referral ?? 'n/a' }}

SKILLS / EXPERIENCE
-------------------
{{ $application->skills ?? 'n/a' }}

MOTIVATION
----------
{{ $application->motivation ?? 'n/a' }}

PREVIOUS VOLUNTEER EXPERIENCE
------------------------------
{{ $application->experience ?? 'n/a' }}

CONSENTS
--------
Background check: {{ $application->consent_background_check ? 'YES' : 'NO' }}
Data storage: {{ $application->consent_data ? 'YES' : 'NO' }}

Submitted: {{ $application->created_at }}
