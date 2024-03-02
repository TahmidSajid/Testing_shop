@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Branch</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('branch.update',$branch) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label class="form-label">Branch Name</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Branch Name"
                                    name="branch_name" value="{{ $branch->branch_name }}">
                                @error('branch_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Branch Address</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Branch Address"
                                    name="address" value="{{ $branch->address }}">
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
                                            <input type="text" class="form-control" name="from" value="{{ $from }}"> <span
                                                class="input-group-append"><span class="input-group-text"><i
                                                        class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">To</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="to" value="{{ $to }}"> <span
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
                                    name="email" value="{{ $branch->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Contact Number"
                                    name="phone_number" value="{{ $branch->phone_number }}">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update Branch</button>
                            </div>
                        </form>
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
