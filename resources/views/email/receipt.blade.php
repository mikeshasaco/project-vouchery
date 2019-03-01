@component('mail::message')
# Order Receipt

Your Coupon Advertisement is Running, Coupon lasts up to 7 days from when the coupon was originally created. So Advertisements will delete once the original 7 days are up.<br>
@component('mail::table')
| Advertisement       | CouponName         | Price  |
|: ------------- :|:-------------:| --------:|
| <h3 style="color:green;">Running</h3>       | {{ $advertisement->adname}}       | {{ $advertisement->adprice }}  |
@endcomponent

@component('mail::button', ['url' => 'https://www.voucheryhub.com', 'color' => 'red'])
VoucheryHub
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
