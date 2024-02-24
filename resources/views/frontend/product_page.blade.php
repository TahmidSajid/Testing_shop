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
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
                    ================================================== -->

        <!-- product_details - start
                    ================================================== -->
        <section class="product_details section_space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="product_details_image">
                            <div class="details_image_carousel">
                                <div class="slider_item">
                                    <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}"
                                        alt="image_not_found">
                                </div>
                                @foreach ($gallery_images as $image)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/gallery_images') }}/{{ $image->gallery_image }}"
                                            alt="image_not_found">
                                    </div>
                                @endforeach
                            </div>
                            <div class="details_image_carousel_nav">
                                <div class="slider_item">
                                    <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}"
                                        alt="image_not_found">
                                </div>
                                @foreach ($gallery_images as $image)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/gallery_images') }}/{{ $image->gallery_image }}"
                                            alt="image_not_found">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product_details_content">
                            <h2 class="item_title">{{ $product->name }}</h2>
                            <p>{{ $product->short_description }}</p>
                            <div class="item_review">
                                @php
                                $total_rating_individual = 0;
                                $total_review_individual;
                                foreach ($product_reviews as $key => $reviews_individual) {
                                    $total_rating_individual = $total_rating_individual + $reviews_individual->rating;
                                    $total_review_individual = $key + 1;
                                }
                                if ($total_rating_individual === 0) {
                                    $avg_rating_individual = 0;
                                } else {
                                    $avg_rating_individual = $total_rating_individual / $total_review_individual;
                                }
                                @endphp
                                <ul class="rating_star ul_li">
                                    @if ($avg_rating_individual === 0)
                                        <li>
                                            <p class="mb-0">not rated yet</p>
                                        </li>
                                    @else
                                        <li>
                                            @for ($y = 0; $y < round($avg_rating_individual); $y++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </li>
                                    @endif
                                </ul>
                                <span class="review_value">{{ $product_reviews_count }} Rating(s)</span>
                            </div>
                            <div class="item_price">
                                @if ($product->discount_price)
                                    <span>৳{{ $product->discount_price }}</span>
                                    <del>৳{{ $product->regular_price }}</del>
                                @else
                                    <Span>৳{{ $product->regular_price }}</span>
                                @endif
                            </div>
                            <hr>

                            {{-- ********** Section Component Start *********** --}}

                            @livewire('selection.select', ['product_id' => $product->id])

                            {{-- ********** Section Component End *********** --}}

                        </div>

                        <!-- Product Details Tab Component Start
                                    ================================================== -->

                        @include('frontend.components.product_details_tab')

                        <!-- Product Details Tab Component End
                                    ================================================== -->

                    </div>
                </div>
        </section>
        <!-- product_details - end
                    ================================================== -->

        <!-- related_products_section - start
                    ================================================== -->
        @include('frontend.components.related_products')
        <!-- related_products_section - end
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


<!-- Rivew Success Alert
================================================== -->

@if (session('review_successfull'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('review_successfull') }}"
            });
        </script>
    @endsection
@endif
