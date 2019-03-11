@component('mail::message')
## Hello {{ $user['company'] }},

Your account has been successfully registered. Please click the below link to verify your email address. Your registered email-id is {{ $user['email'] }}.

@component('mail::button', ['url' => url('account/merchant/verify', $user->verifyUser->token , 'color' => 'red'])
Verify Email
@endcomponent

Regards,<br>
{{ config('app.name') }}

<hr />

<small>
If you’re having trouble clicking the "Verify Email" button, copy and paste the URL below into your web browser:
[{{ url('account/merchant/verify', $user->verifyUser->token) }}]({{ url('account/merchant/verify', $user->verifyUser->token) }})
</small>
@endcomponent