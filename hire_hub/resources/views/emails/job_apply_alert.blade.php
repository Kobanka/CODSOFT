<x-mail::message>
# Hey {{ $company->name }}

We're excited to inform you that a candidate has applied to your job posting on our platform. This shows that there is interest in your company and the position you've offered.

Here are some details about the candidate:

- Candidate Name: {{ $candidate->first_name }} {{ $candidate->last_name }}
- Email: {{ $candidate->email }}
- Applied Job Title: {{ $listing->title }}

<x-mail::button :url="''">
View Jobs
</x-mail::button>

Thank you for using our platform!

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
