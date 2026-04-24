@component('mail::message')
# Welcome to {{ config('app.name') }}, {{ $name }}

Thank you for joining us!

We're excited to have you on board.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
