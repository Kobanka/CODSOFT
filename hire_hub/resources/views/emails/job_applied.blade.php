<x-mail::message>
# Hey {{ $candidate->first_name }} {{ $candidate->last_name }}

Your job application has been successfully submitted.

<x-mail::button :url="'https://anicetkobanka.online/jobs'">
View Jobs
</x-mail::button>

Thank you for using our job portal!<br>
{{ config('app.name') }}
</x-mail::message>
