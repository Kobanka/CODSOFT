<x-mail::message>
# Hey {{ $candidate->first_name }} {{ $candidate->last_name }}

We wanted to let you know that a new job opportunity has been posted on our platform that may match your skills and interests. Don't miss out on this exciting opportunity to take your career to the next level!

Here are some details about the company:
- Company Name: {{ $company->name }} 
- Email: {{ $company->email }}
- Posted Job Title: {{ $listing->title }}

<x-mail::button :url="env('APP_URL') . '/jobs">
View Jobs
</x-mail::button>

Thanks<br>
{{ config('app.name') }}
</x-mail::message>
