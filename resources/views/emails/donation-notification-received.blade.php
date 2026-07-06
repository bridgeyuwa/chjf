NEW DONATION NOTIFICATION
=========================

From: {{ $notification->name }} <{{ $notification->email }}>
Amount: {{ $notification->amount ?? 'not specified' }}
Date sent: {{ $notification->date_sent ? $notification->date_sent->format('j F Y') : 'not specified' }}

MESSAGE
-------
{{ $notification->message ?? 'n/a' }}

Submitted: {{ $notification->created_at }}
