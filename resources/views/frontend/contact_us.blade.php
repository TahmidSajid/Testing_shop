@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb_section - start
        ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
        ================================================== -->

        <!-- contact_section - start
        ================================================== -->
        <div class="map_section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
                allowfullscreen>
            </iframe>
        </div>
        <!-- contact_section - end
        ================================================== -->

        <!-- contact_section - start
        ================================================== -->
        <section class="contact_section section_space">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="contact_info_wrap">
                            <h3 class="contact_title">Address <span>Information</span></h3>
                            <div class="decoration_image">
                                <img src="{{ asset('frontend-assets') }}/images/leaf.png" alt="image_not_found">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                            <div class="row">
                                @forelse ($branches as $branch)
                                    <div class="col col-md-6 mb-4">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">{{ $branch->branch_name }}</h4>
                                            <ul class="ul_li_block">
                                                <li>{{ $branch->address }}</li>
                                                <li>Open Closes {{ $branch->time }} </li>
                                                <li>{{ $branch->email }}</li>
                                                <li>{{ $branch->phone_number }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-6">
                        <div class="contact_info_wrap">
                            <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                            <div class="decoration_image">
                                <img src="{{ asset('frontend-assets') }}/images/leaf.png" alt="image_not_found">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                            <form action="{{ route('contact_form') }}" method="POST">
                                @csrf
                                <div class="form_item">
                                    <input id="contact-form-name" type="text" name="contact_name"
                                        placeholder="Your Name">
                                </div>
                                <div class="row">
                                    <div class="col col-md-6 col-sm-6">
                                        <div class="form_item">
                                            <input id="contact-form-email" type="email" name="contact_email"
                                                placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col col-md-6 col-sm-6">
                                        <div class="form_item">
                                            <input type="text" name="contact_subject" placeholder="Your Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form_item">
                                    <textarea id="contact-form-message" name="contact_message" placeholder="Message"></textarea>
                                </div>
                                <div id="form-msg"></div>
                                <button type="submit" class="btn btn_dark">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact_section - end
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
@endsection

@section('alert')
    @if (session('email_sent'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('email_sent') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
