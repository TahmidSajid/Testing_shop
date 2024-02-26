@extends('layouts.dashboard')
@section('content')
<div class="col-xl-6 col-lg-6 offset-lg-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Service</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('services.update',$service) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>Service Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control input-default" name="service_name"
                            placeholder="Enter Service name" value="{{ $service->service_name }}">
                    </div>
                    @error('service_name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <label>Service Details</label>
                    <div class="form-group">
                        <textarea class="form-control" rows="10" style="resize: none;" name="service_detail"
                            placeholder="Enter Service Detail">{{ $service->service_detail }}</textarea>
                    </div>
                    @error('service_detail')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <label>Service Icon</label>
                    <div class="form-group">
                        <input class="form-control form-control-material d-none" type="text"
                            id="icon-input" name="service_icon" value="{{ $service->service_icon }}" readonly style="background: transparent">
                        <p class="text-center">
                            <i class="{{ $service->service_icon }}" style="font-size: 35px" id="icon-show"></i>
                        </p>
                        @error('service_icon')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update Service</button>
                    </div>
                </form>
                <h5 class="mt-4">Select Icon From here:</h5>
                <div class="all-icons mt-4" style="overflow-y: scroll; height:300px">

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
