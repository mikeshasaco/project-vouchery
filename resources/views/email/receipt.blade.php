@component('mail::message')
# Order Receipt

Your Coupon Advertisement is Running!, Coupon last up to 7 days from when the coupon was originally created. So Advertisements delete once the original 7 days are up.<br>
@component('mail::table')
| Advertisement       | CouponName         | Price  |
|: ------------- :|:-------------:| --------:|
| <h3 style="color:green;">Running</h3>       | {{ $advertisement->adname}}       | {{ $advertisement->adprice }}  |
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/', 'color' => 'red'])
VoucheryHub
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
