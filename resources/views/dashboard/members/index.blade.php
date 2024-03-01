@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <!-- Member adding form part start
                                ================================================== -->
        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Style</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Position"
                                    name="position">
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label">Image</label>
                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Enter image</label>
                            </div>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-4">
                                <label class="form-label">Enter Priority</label>
                                <select class="form-control form-control-lg default-select" name="priority">
                                    <option value="">Chosee an option</option>
                                    <option value="1">Head</option>
                                    <option value="2">Managment</option>
                                    <option value="3">Worker</option>
                                </select>
                                @error('priority')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Add Members</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Member adding form part end
                                ================================================== -->
        <!-- Member List table part start
                                ================================================== -->
        <div class="col-xl-8 col-lg-8 pb-4">
            <div class="card">
                <div class="card-body">
                    <!-- Slick Slider Start
                                            ================================================== -->
                    <div class="one-time">
                        <div class="text-center">
                            <h4 class="card-title">Higher Members List</h4>
                            <hr>
                            <!-- Higher member table start
                                                    ================================================== -->
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($members as $member)
                                        @if ($member->priority == 1)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td><span class="badge badge-primary light">{{ $member->position }}</span>
                                                </td>
                                                <td>
                                                    @if ($member->image)
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                            alt="img">
                                                    @else
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                            alt="img">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('members.edit', $member) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <form action="{{ route('members.destroy', $member) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <h4 class="text-center">Noting Added Yet</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Higher member table end
                                                    ================================================== -->
                        </div>
                        <div class="text-center">
                            <h4 class="card-title">Management</h4>
                            <hr>
                            <!-- Management member table start
                                                    ================================================== -->
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($members as $member)
                                        @if ($member->priority == 2)
                                            <tr>
                                                <td>
                                                    {{ $member->name }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary light">{{ $member->position }}</span>
                                                </td>
                                                <td>
                                                    @if ($member->image)
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                            alt="img">
                                                    @else
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                            alt="img">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('members.edit', $member) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <form action="{{ route('members.destroy', $member) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <h4 class="text-center">Noting Added Yet</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Management member table end
                                                    ================================================== -->
                        </div>
                        <div class="text-center">
                            <h4 class="card-title">Workers</h4>
                            <hr>
                            <!-- Workers member table start
                                                    ================================================== -->
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($members as $member)
                                        @if ($member->priority == 3)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td><span class="badge badge-primary light">{{ $member->position }}</span>
                                                </td>
                                                <td>
                                                    @if ($member->image)
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('uploads/members_photos') }}/{{ $member->image }}"
                                                            alt="img">
                                                    @else
                                                        <img style="height: 80px; width:80px;"
                                                            class="rounded-circle mx-auto"
                                                            src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                                            alt="img">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('members.edit', $member) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <form action="{{ route('members.destroy', $member) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <h4 class="text-center">Noting Added Yet</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Workers member table end
                                                    ================================================== -->
                        </div>
                    </div>
                    <!-- Slick Slider Button
                                            ================================================== -->
                    <div class="row text-center">
                        <div class="col-lg-6">
                            <button class="btn btn-sm btn-primary go-left">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-sm btn-primary go-right">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Member List table part end
                                ================================================== -->
    </div>
@endsection

<!-- Member Adding Alert
================================================== -->
@if (session('add_mamber'))
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
                title: "{{ session('add_mamber') }}"
            });
        </script>
    @endsection
@endif

<!-- Member Deleteing Alert
================================================== -->
@if (session('delete_mamber'))
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
                title: "{{ session('delete_mamber') }}"
            });
        </script>
    @endsection
@endif

<!-- Member Updating Alert
================================================== -->
@if (session('update_mamber'))
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
                title: "{{ session('update_mamber') }}"
            });
        </script>
    @endsection
@endif


<!-- Slider resources start
================================================== -->
@push('slickCSS')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

@push('slickJS')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.one-time').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '.go-left',
            nextArrow: '.go-right',
        });
    </script>
@endpush
<!-- Slider resources end
================================================== -->
