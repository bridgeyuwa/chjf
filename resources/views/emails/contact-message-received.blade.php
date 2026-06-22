NEW CONTACT MESSAGE
===================

From: {{ $message->name }} <{{ $message->email }}>
Phone: {{ $message->phone ?? 'n/a' }}
Topic: {{ $message->subject }}

MESSAGE
-------
{{ $message->message }}

Submitted: {{ $message->created_at }}
