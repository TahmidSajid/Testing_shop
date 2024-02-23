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
                                <ul class="rating_star ul_li">
                                    <li><i class="fas fa-star"></i>></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                </ul>
                                <span class="review_value">3 Rating(s)</span>
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
                        <div class="details_information_tab">
                            <ul class="tabs_nav nav ul_li" role=tablist>
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab"
                                        type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                                        Description
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button"
                                        role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                        Additional information
                                    </button>
                                </li>

                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                                        aria-controls="reviews_tab" aria-selected="false">
                                        Reviews({{ $product_reviews_count }})
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                        tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                        justo
                                        gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                    </p>
                                    <p class="mb-0">
                                        Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis
                                        fermentum
                                        turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce
                                        aliquam,
                                        purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi
                                        non
                                        neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et
                                        placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras
                                        neque
                                        metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                                        imperdiet
                                        ligula euismod eget.
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                                    <p>
                                        Return into stiff sections the bedding was hardly able to cover it and seemed ready
                                        to slide
                                        off any moment. His many legs, pitifully thin compared with the size of the rest of
                                        him,
                                        waved about helplessly as he looked what's happened to me he thought It wasn't a
                                        dream. His
                                        room, a proper human room although a little too small
                                    </p>

                                    <div class="additional_info_list">
                                        <h4 class="info_title">Additional Info</h4>
                                        <ul class="ul_li_block">
                                            <li>No Side Effects</li>
                                            <li>Made in USA</li>
                                        </ul>
                                    </div>

                                    <div class="additional_info_list">
                                        <h4 class="info_title">Product Features Info</h4>
                                        <ul class="ul_li_block">
                                            <li>Compatible for indoor and outdoor use</li>
                                            <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                            <li>Rust-resistant frame</li>
                                            <li>Durable UV and weather-resistant construction</li>
                                            <li>Shell seat features water draining recess</li>
                                            <li>Shell and base are stackable for transport</li>
                                            <li>Choice of monochrome finishes and colourways</li>
                                            <li>Designed by Nagi</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                                    <!-- Review Component Start
                                                ================================================== -->
                                    @include('frontend.components.product_review')
                                    <!-- Review Component End
                                                ================================================== -->
                                </div>
                            </div>
                        </div>
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
