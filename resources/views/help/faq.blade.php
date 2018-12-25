@extends('layouts.master')
@section('content')


<section id="Vouch-help" style="background-color:white;" >
    <div class="container">
        <div class="row row-help">
            <div class="col-md-12">
                <h2 class="vouch-h2-title"><b>What is VoucheryHub?</b></h2>
                <p >VoucheryHub is an E-Commerce marketplace that focuses on online businesses to direct consumers to coupons for their products & services. We focus on simplicity to make it easier for online businesses to run advertisements on our platform. The goal for VoucheryHub is to act as the intermediary between e-Commerce businesses and the consumers bringing both sides together. Online businesses can use our platform to focus on promoting their special deals in our marketplace for their products & services.
                </p>
            </div>
        </div>

    </div>

</section>

<section id="Merchant-help" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="vouch-merchant-customerh2">Merchants Frequently Asked Questions?</h2>

                    <div class="question-title">
                        <h3>What can merchants do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>Merchants can upload their coupon deals with or without a coupon code and a website link for customers to go directly to their business webpage in the appropriate category. Merchants can track coupon clicks and how many customers subscribed to them for analytics purposes. Merchants can also pay a fee on VoucheryHub to have their product and/or service advertised for 7 days in the chosen category for more popularity.</p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3>As a merchant, what is the benefit of paying for “Promoted Ad” for my coupon than just posting without paying for advertising?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>All Merchants can post their coupon for special deals for their product/service in the appropriate category for free. The benefit of paying for “Promoted Ad” allows your coupon to stay in front of coupon placement of all regular ads for that category for 7 days to gain more popularity on their deals, visit your page and website.</p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3>I cannot find the appropriate coupon category for my product/service, what do I do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>You can place your coupon in the “Miscellaneous” category.</p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3>As a merchant, how long does coupons stay up in the marketplace?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>Whether you post a regular ad or promoted ad, all coupons expire 7 days from the day they are posted. The set limit for all coupons are 7 days and then they are auto-deleted/expired. The merchant has the option to delete the coupon before the 7-day limit if they choose to.</p>
                            </div>

                        </div>

                    </div>


                    <div class="question-title">
                        <h3>My question is not listed on here, what do I do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>If your question is not listed on here and you need assistance, please scroll to the bottom and click on “Email us”. Please wait 24-48 hours for a response, we may respond sooner.</p>
                            </div>

                        </div>

                    </div>

                         <div class="question-title">
                        <h3>Are there limits to the amount of coupons I can create?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>Yes, Merchants are allowed to only create up to 9 coupons, If they want to create another coupon they must delete or wait till one of there previous coupons expire.</p>
                            </div>

                        </div>

                    </div>




            </div>

        </div>
    </div>

</section>

<section id="Customer-help">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="vouch-merchant-customerh2">Customer Frequently Asked Questions?</h2>

                    <div class="question-title">
                        <h3>What can customers do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>Customers that sign up for VoucheryHub can subscribe to merchants & receive email notifications when new coupons are added, as well as view recently clicked coupons, receive email updates/news from VoucheryHub.</p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3>I have a dispute with an item/service/coupon code, what do I do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>If you have a dispute or problem with your item/service and/or coupon code not working, please contact the merchant’s customer service for help directly. If there are further problems not resolved, please go to our “Help” page and scroll to the bottom to send us an email.</p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3>My question is not listed on here, what do I do?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>If your question is not listed on here and you need assistance, please scroll to the bottom and click on “Email us”. Please wait 24-48 hours for a response, we may respond sooner.</p>
                            </div>

                        </div>

                    </div>



            </div>

        </div>
    </div>

</section>

<section id="questions-help" style="background-color:#FFF5EE;">
    <div class="container">
        <div class="row" style="padding-bottom:10%;">
            <div class="col-md-12">
                <h3 style="text-align:center; padding-bottom:5%;"> <b> Still have Questions?</b></h3>
                <p>You still have questions about VoucheryHub you can Email US and we will be gladly be able to give you a response in 24-48 hours.
                </p>

                <center>
                    <a href="{{ route('help.quest') }}" class="questionbutton">Email Page</a>
                </center>

            </div>

        </div>
    </div>

</section>



@endsection

@section('javascripts')
<script  type="text/javascript">
$(document).ready(function(){
	$('.question-title h3').click(function(){
		$(this).next('.content-main').slideToggle();
		$(this).parent().toggleClass('active');
		$(this).parent().siblings().children('.content-main').slideUp();
		$(this).parent().siblings().removeClass('active');
	});
});
</script>
@endsection
