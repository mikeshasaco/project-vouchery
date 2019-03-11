@component('mail::message')
## Hello {{ $customer['username'] }},

Your account has been successfully registered. Please click the below link to verify your email address. Your registered email-id is {{ $customer['email'] }}.

@component('mail::button', ['url' => url('account/customer/verify', $customer->verifyCustomer->token , 'color' => 'red')])
Verify Email
@endcomponent

Regards,<br>
{{ config('app.name') }}

<hr />

<small>
If you’re having trouble clicking the "Verify Email" button, copy and paste the URL below into your web browser:
[{{ url('account/customer/verify', $customer->verifyCustomer->token) }}]({{ url('account/customer/verify', $customer->verifyCustomer->token) }})
</small>
@endcomponent