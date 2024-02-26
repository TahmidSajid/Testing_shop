@extends('layouts.dashboard')
@section('content')
    <!-- page main structure
        ================================================== -->
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <!-- page sub structure
                        ================================================== -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Service</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('services.store') }}" method="POST">
                                    @csrf
                                    <label>Service Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-default" name="service_name"
                                            placeholder="Enter Service name">
                                    </div>
                                    @error('service_name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Service Details</label>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="10" style="resize: none;" name="service_detail"
                                            placeholder="Enter Service Detail"></textarea>
                                    </div>
                                    @error('service_detail')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Service Details</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-material d-none" type="text"
                                            id="icon-input" name="service_icon" readonly style="background: transparent">
                                        <p class="text-center">
                                            <i class="" style="font-size: 35px" id="icon-show"></i>
                                        </p>
                                        @error('service_icon')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Add Service</button>
                                    </div>
                                </form>
                                <h5 class="mt-4">Select Icon From here:</h5>
                                <div class="all-icons mt-4" style="overflow-y: scroll; height:300px">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- page main structure
                ================================================== -->
        <div class="col-lg-8">
            <div class="row">

                <!-- page sub structure
                        ================================================== -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse ($services as $service)
                                    <div class="col-lg-4 text-center">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="pb-4">{{ $service->service_name }}</h3>
                                                <i class="{{ $service->service_icon }} pb-4" style="font-size: 35px"></i>
                                                <p>{{ $service->service_detail }}</p>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form action="{{ route('services.destroy', $service) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger rounded-circle text-center"
                                                                type="submit"
                                                                style="height: 50px !important; width: 50px !important;"><i
                                                                    class="fas fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-sm btn-primary rounded-circle text-center align-middle"
                                                            style="height: 50px !important; width: 50px !important;" href="{{ route('services.edit',$service) }}"><i
                                                                class="fas fa-pencil-alt mt-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h3 class="mx-auto">No service added yet</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!-- Icon selecting CSS
================================================== -->
@push('selectIconCss')
    <style>
        .btn-icons {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 60px;
            width: 60px;
            text-align: center;
            padding-top: 18px;
            border-radius: 50%;
            font-size: 25px;
            margin-bottom: 15px;
            margin-left: 8px;
            transition: 0.3s ease-in-out;
        }

        .btn-animation {
            box-shadow: 0 !important;
            background-color: gray !important;
        }
    </style>
@endpush

<!-- Icon selecting Js
================================================== -->
@push('selectIconJs')
    <script type="module">
        import data from "{{ asset('dashboard-assets/js/font.json') }}" assert {
            type: 'json'
        };
        console.log(data.Icons)
        var icons = data.Icons;
        var icon_div = document.querySelector('.all-icons')
        var icon_input = document.querySelector('#icon-input')
        var icon_show = document.querySelector('#icon-show')
        console.log(icon_input)
        console.log(icon_div);




        icons.forEach((x) => {
            var icn = document.createElement('i');
            icon_div.appendChild(icn);
            icn.setAttribute('class', x);
            icn.classList.add("btn-icons")
            icn.addEventListener('click', function() {
                icon_input.setAttribute('value', x)
                icon_show.setAttribute('class', x)
                icn.classList.add('class', 'btn-animation')
                setTimeout(function() {
                    icn.classList.remove('class', 'btn-animation')
                }, 800)
            });
        })
    </script>
@endpush


<!-- Service adding alert
================================================== -->
@if (session('added'))
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
                title: "{{ session('added') }}"
            });
        </script>
    @endsection
@endif


<!-- Service deleting alert
================================================== -->
@if (session('delete'))
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
                title: "{{ session('delete') }}"
            });
        </script>
    @endsection
@endif

<!-- Service updating alert
================================================== -->
@if (session('update'))
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
                title: "{{ session('update') }}"
            });
        </script>
    @endsection
@endif
