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
                <!-- cart_table - start
                                            ================================================== -->
                @livewire('cart.add-cupon')
                <!-- cart_table - end
                                            ================================================== -->
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
