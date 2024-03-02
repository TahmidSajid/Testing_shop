@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb_section - start
                                ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                                ================================================== -->


    <!-- about_section - start
                                ================================================== -->
    <section class="about_section section_space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-6 order-last">
                    <div class="about_image">
                        <img src="{{ asset('uploads/company_photos') }}/{{ $history->image }}" alt="image_not_found">
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="about_content">
                        <h2 class="about_small_title text-uppercase">Comnay History</h2>
                        <h3 class="about_title">{{ $history->history_heading }}</h3>
                        <p>{{ $history->history_paragraph }}</p>
                        <ul class="counter_wrap ul_li">
                            <li>
                                <span class="counter_count">12</span>
                                <small>Years Experience</small>
                            </li>
                            <li>
                                @if ($total_happy_customers >= 1000)
                                    <span><strong class="counter_count">{{ $total_happy_customers / 1000 }}</strong>K</span>
                                    <small>Happy Customers</small>
                                @else
                                    <span><strong class="counter_count">{{ $total_happy_customers }}</strong></span>
                                    <small>Happy Customers</small>
                                @endif
                            </li>
                            <li>
                                <span><strong class="counter_count">{{ $satisfaction_percentage }}</strong>%</span>
                                <small>Clients Satisfaction</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about_section - end
                                ================================================== -->


    <!-- service_section - start
                                ================================================== -->
    <section class="service_section bg_gray section_space">
        <div class="container">
            <div class="row justify-content-center">
                @forelse ($services as $service)
                    <div class="col col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="service_boxed">
                            <div class="item_icon">
                                <i class="{{ $service->service_icon }}"></i>
                                <i class="{{ $service->service_icon }}"></i>
                            </div>
                            <h3 class="item_title">{{ $service->service_name }}</h3>
                            <p>{{ $service->service_detail }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- service_section - end
                                ================================================== -->


    <!-- team_section - start
                                ================================================== -->
    <section class="team_section section_space">
        <div class="container">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <div class="team_section_title text-center">
                        <h2 class="title_text">Meet Our Members</h2>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col col-lg-12 col-md-12 col-sm-12 mt-4">
                    <div class="team_section_title text-center mt-4">
                        <h2 class="title_text">Heads</h2>
                        <hr style="height: 4px ; width: 320px" class="mx-auto">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="multiple-items">
                    @foreach ($members as $member)
                        @if ($member->priority == 1)
                            <div class="col col-lg-3 col-md-4 col-sm-6">
                                <div class="team_item">
                                    <div class="team_image">
                                        @if ($member->image)
                                            <img src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                alt="image_not_found">
                                        @else
                                            <img src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                alt="image_not_found">
                                        @endif

                                    </div>
                                    <div class="team_content">
                                        <h3 class="team_member_name">{{ $member->name }}</h3>
                                        <span class="team_member_title">{{ $member->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- team_section - end
                                ================================================== -->


    <!-- team_section - start
                                ================================================== -->
    <section class="team_section section_space">
        <div class="container">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <div class="team_section_title text-center mt-4">
                        <h2 class="title_text">Managments</h2>
                        <hr style="height: 4px ; width: 320px" class="mx-auto">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="multiple-items">
                    @foreach ($members as $member)
                        @if ($member->priority == 2)
                            <div class="col col-lg-3 col-md-4 col-sm-6">
                                <div class="team_item">
                                    <div class="team_image">
                                        @if ($member->image)
                                            <img src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                alt="image_not_found">
                                        @else
                                            <img src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                alt="image_not_found">
                                        @endif

                                    </div>
                                    <div class="team_content">
                                        <h3 class="team_member_name">{{ $member->name }}</h3>
                                        <span class="team_member_title">{{ $member->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- team_section - end
                                                    ================================================== -->

    <!-- team_section - start
                            ================================================== -->
    <section class="team_section section_space">
        <div class="container">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <div class="team_section_title text-center mt-4">
                        <h2 class="title_text">Workers</h2>
                        <hr style="height: 4px ; width: 320px" class="mx-auto">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="multiple-items">
                    @foreach ($members as $member)
                        @if ($member->priority == 3)
                            <div class="col col-lg-3 col-md-4 col-sm-6">
                                <div class="team_item">
                                    <div class="team_image">
                                        @if ($member->image)
                                            <img src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                alt="image_not_found">
                                        @else
                                            <img src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                alt="image_not_found">
                                        @endif

                                    </div>
                                    <div class="team_content">
                                        <h3 class="team_member_name">{{ $member->name }}</h3>
                                        <span class="team_member_title">{{ $member->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- team_section - end
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
@endsection


<!-- Counter Js resource
================================================== -->

@push('counterJs')
    <script src="{{ asset('frontend-assets/js/counterup.js') }}"></script>
    <script>
        $('.counter_count').counterUp({
            delay: 10,
            time: 2000
        });
    </script>
@endpush


<!-- Slider resources start
================================================== -->
@push('slickCSS')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

@push('slickJS')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.multiple-items').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
@endpush
<!-- Slider resources end
================================================== -->
