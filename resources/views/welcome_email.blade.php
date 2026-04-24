@component('mail::message')
# Welcome to {{ config('app.name') }}, {{ $name }}

Thank you for joining us!

We're excited to have you on board.

@component('mail::button', ['url' => config('app.url')])
Verify Your Account
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
