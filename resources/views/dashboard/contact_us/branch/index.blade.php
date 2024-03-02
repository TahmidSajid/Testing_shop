@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <!-- Branch adding form part start
                            ================================================== -->
        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Branch</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('branch.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label">Branch Name</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Branch Name"
                                    name="branch_name">
                                @error('branch_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Branch Address</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Branch Address"
                                    name="address">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label w-100 text-center">Open hours</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">From</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="from"> <span
                                                class="input-group-append"><span class="input-group-text"><i
                                                        class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">To</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="to"> <span
                                                class="input-group-append"><span class="input-group-text"><i
                                                        class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                @error('from')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('to')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Contact Email</label>
                                <input type="mail" class="form-control input-rounded" placeholder="Enter Contact Email"
                                    name="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Contact Number</label>
                                <input type="mail" class="form-control input-rounded" placeholder="Enter Contact Number"
                                    name="phone_number">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Add Branch</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Branch adding form part end
                            ================================================== -->
        <div class="col-lg-8">
            <div class="row">
                <!-- page sub structure
                                            ================================================== -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Branches</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse ($branches as $branch)
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="pb-4 text-center">{{ $branch->branch_name }}</h3>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>
                                                            <b>
                                                                Address:
                                                            </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>{{ $branch->address }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>
                                                            <b>
                                                                Time:
                                                            </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>{{ $branch->time }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>
                                                            <b>
                                                                Email:
                                                            </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>{{ $branch->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>
                                                            <b>
                                                                Phone Number:
                                                            </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>{{ $branch->phone_number }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <div class="row">
                                                    <div class="col-lg-6 text-center">
                                                        <form action="{{ route('branch.destroy', $branch) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger rounded-circle text-center"
                                                                type="submit"
                                                                style="height: 50px !important; width: 50px !important;"><i
                                                                    class="fas fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-6 text-center">
                                                        <a class="btn btn-sm btn-primary rounded-circle text-center align-middle"
                                                            style="height: 50px !important; width: 50px !important;"
                                                            href="{{ route('branch.edit', $branch) }}"><i
                                                                class="fas fa-pencil-alt mt-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h3 class="mx-auto">No branch added yet</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('dateCss')
    <!-- Clockpicker -->
    <link href="{{ asset('dashboard-assets') }}/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('dashboard-assets') }}/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
@endpush

@push('dateJs')
    <!-- Required vendors -->
    <script src="{{ asset('dashboard-assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/js/custom.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/js/deznav-init.js"></script>
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('dashboard-assets') }}/vendor/moment/moment.min.js"></script>
    <!-- clockpicker -->
    <script src="{{ asset('dashboard-assets') }}/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('dashboard-assets') }}/js/plugins-init/clock-picker-init.js"></script>
@endpush

@if (session('add'))
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
                title: "{{ session('add') }}"
            });
        </script>
    @endsection
@endif

@if (session('deleted'))
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
                icon: "error",
                title: "{{ session('deleted') }}"
            });
        </script>
    @endsection
@endif

@if (session('updated'))
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
                title: "{{ session('updated') }}"
            });
        </script>
    @endsection
@endif
