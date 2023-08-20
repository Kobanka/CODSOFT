<x-mail::message>
# Contact {{ config('app.name') }}

You have received a message from {{ $contact->name }}

## Message

{{ $contact->message }}



Best regards,<br>
{{ $contact->email }}
</x-mail::message>
