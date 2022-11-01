@extends('layouts.master')

@section('title')
    <title>Checkout</title>
@endsection;

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href=" {{ route('home.home') }} ">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href=" {{ route('checkout.index') }} ">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <label for="first">First name <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="first" name="name">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="last">Last name <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="last" name="name">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="number">Phone number <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="number" name="number">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="email">Email Address <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="email" name="compemailany">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="add">Address <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="add" name="add">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                @php $subTotal = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <li><a href="#"> {{ $details['name'] }} <span class="middle">x {{ $details['quantity'] }}</span> <span class="last">{{ number_format($details['price'] * $details['quantity']) }} VND</span></a></li>
                                        @php $subTotal += ($details['quantity'] * $details['price'])  @endphp
                                    @endforeach
                                @endif
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total <span>{{ number_format($subTotal) }} VND</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="online-payment" name="selector">
                                    <label for="online-payment">Online payment</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="pay-later" name="selector">
                                    <label for="pay-later">Pay later </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <a class="primary-btn" href="#">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
