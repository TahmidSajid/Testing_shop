@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb_section - start
                                        ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                                        ================================================== -->

    <!-- account_section - start
                                        ================================================== -->
    <section class="account_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 account_menu">
                    <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">Account Dashboard </button>
                        <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Acount Details</button>
                        <button class="nav-link text-start w-100" id="v-pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-password" type="button" role="tab"
                            aria-controls="v-pills-password" aria-selected="false">Change Password</button>
                        <button class="nav-link text-start w-100" id="v-pills-address-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                            aria-selected="false">Change Address</button>
                        <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages" type="button" role="tab"
                            aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                        <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <h5>Welcome to Account {{ auth()->user()->name }}</h5>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <h5 class="text-center pb-3">Account Details</h5>
                            @if ($status === 'verified')
                                <form class="row g-3 p-2" action="{{ route('update_details') }}" method="POST">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputnamel4" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputnamel4"
                                            value="{{ auth()->user()->name }}" name="name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4"
                                            value="{{ auth()->user()->email }}" name="email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Number</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->number }}"
                                            name="phone_number">
                                            @error('phone_number')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary active">Update</button>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3 p-2" action="{{ route('update_verify') }}" method="POST">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputnamel4" class="form-label">OTP</label>
                                        <input type="text" class="form-control" id="inputnamel4" name="otp"
                                            placeholder="otp sent to your previous email : {{ auth()->user()->email }}">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary active">Update</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab">
                            <h5 class="text-center pb-3">Password Change</h5>
                            <form class="row g-3 p-2">
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Old Password</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary active">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                            aria-labelledby="v-pills-address-tab">
                            <h5 class="text-center pb-3">Password Change</h5>
                            <form class="row g-3 p-2">
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">New Address</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary active">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <h5 class="text-center pb-3">Your Orders</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Delivery Charge</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>#120</td>
                                    <td>52500</td>
                                    <td>200</td>
                                    <td>100</td>
                                    <td>52400</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Download Invoice</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- account_section - end
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


@if (session('details_update'))
    @section('alert')
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('details_update') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endsection
@endif

@if (session('invalid_otp'))
    @section('alert')
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ session('invalid_otp') }}",
            });
        </script>
    @endsection
@endif

@if (session('verification_successfull'))
    @section('alert')
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('verification_successfull') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endsection
@endif
