@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb_section - start
    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>Login/Register</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->

    <!-- register_section - start
    ================================================== -->
    <section class="register_section section_space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('user_account_verify') }}" method="POST">
                        @csrf
                        <div class="form_item_wrap">
                            <h3 class="input_title">OTP verify*</h3>
                            <div class="form_item">
                                <label for="username_input"><i class="fas fa-user"></i></label>
                                <input id="username_input" type="text" name="OTP" placeholder="OTP">
                            </div>
                        </div>
                        <div class="form_item_wrap">
                            <button type="submit" class="btn btn_primary">OTP Verify</button>
                        </div>
                        @if (session('OTP_sent'))
                        <p class="txt-success">{{ session('OTP_sent') }}</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
