@extends('layouts.frontend')
@section('content')
    <!-- main body - start
                                    ================================================== -->
    <main>
        <!-- breadcrumb_section - start
                                        ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="index.html">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
                                        ================================================== -->
        <!-- cart_section - start
                                        ================================================== -->
        <section class="cart_section section_space">
            <div class="container">
                <!-- cart_table - start
                                        ================================================== -->
                @livewire('cart.main-cart')
                <!-- cart_table - end
                                        ================================================== -->
                <div class="cart_btns_wrap">
                    <div class="row">
                        <div class="col col-lg-6">
                            <form action="#">
                                <div class="coupon_form form_item mb-0">
                                    <input type="text" name="coupon" placeholder="Coupon Code...">
                                    <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                    <div class="info_icon">
                                        <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Your Info Here"></i>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col col-lg-6">
                            <ul class="btns_group ul_li_right">
                                {{-- <li><a class="btn border_black" href="#!">Update Cart</a></li> --}}
                                <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- toatal_price_table - start
                            ================================================== -->
                @livewire('cart.cart-total-price')
                <!-- toatal_price_table - end
                            ================================================== -->
            </div>
        </section>
        <!-- cart_section - end
                                        ================================================== -->
        <!-- newsletter_section - start
                                        ================================================== -->
        <section class="newsletter_section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-lg-6">
                        <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                        <p>Get E-mail updates about our latest products and special offers.</p>
                    </div>
                    <div class="col col-lg-6">
                        <form action="#!">
                            <div class="newsletter_form">
                                <input type="email" name="email" placeholder="Enter your email address">
                                <button type="submit" class="btn btn_secondary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter_section - end
                                        ================================================== -->

    </main>
    <!-- main body - end
                                    ================================================== -->
@endsection
