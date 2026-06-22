NEW PRAYER REQUEST
==================

Name: {{ $prayer->name ?? 'Anonymous' }}
Email: {{ $prayer->email ?? 'n/a' }}
Category: {{ $prayer->category }}
Visibility: {{ $prayer->visibility }}
Follow-up requested: {{ $prayer->follow_up ? 'YES' : 'NO' }}

REQUEST
-------
{{ $prayer->request }}

Submitted: {{ $prayer->created_at }}
