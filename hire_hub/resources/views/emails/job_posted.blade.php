<x-mail::message>
# Hey {{ $company->name }}

Your job posting has been successfully submitted and is now live on our job portal.

<x-mail::button :url="env('APP_URL') . '/jobs">
View Jobs
</x-mail::button>

Thank you for using our platform to post job opportunities.

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
