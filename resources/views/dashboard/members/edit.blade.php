@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Member</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Name"
                                    name="name" value="{{ $member->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control input-rounded" placeholder="Enter Position"
                                    name="position" value="{{ $member->position }}">
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4 d-flex justify-content-between align-items-center">
                                <label class="form-label">Previous Image : </label>
                                <img class="rounded-circle" style="height:100px; width:100px;"
                                    src="{{ asset('uploads/members_photos') }}/{{ $member->image }}" alt="img">
                            </div>
                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Enter New image</label>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Enter Priority</label>
                                <select class="form-control form-control-lg default-select" name="priority">
                                    <option>Chosee an option</option>
                                    <option @if ($member->priority == 1) selected @endif value="1">Head</option>
                                    <option @if ($member->priority == 2) selected @endif value="2">Managment
                                    </option>
                                    <option @if ($member->priority == 3) selected @endif value="3">Worker</option>
                                </select>
                                @error('priority')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
