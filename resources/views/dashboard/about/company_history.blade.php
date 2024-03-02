@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company History</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('add_history') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>History Heading</label>
                            <div class="form-group">
                                <input type="text" class="form-control input-default" name="history_heading"
                                    @if ($company_history) value ="{{ $company_history->history_heading }}" @endif
                                    placeholder="Enter History Heading">
                            </div>
                            @error('history_heading')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label>History Paragraph</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" style="resize: none;" name="history_paragraph"
                                    placeholder="Enter History Heading">@if ($company_history){{ $company_history->history_paragraph }}@endif</textarea>
                            </div>
                            @error('history_paragraph')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label>Company Image</label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @if ($company_history)
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update History</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Add History</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company History</h4>
                </div>
                @if ($company_history)
                    <div class="card-body">
                        <h3>History Heading</h3>
                        <hr>
                        <p class="mb-4">{{ $company_history->history_heading }}</p>
                        <h3>History Heading</h3>
                        <hr>
                        <p>{{ $company_history->history_paragraph }}</p>
                        <h3>History Image</h3>
                        <hr>
                        <img style="width: 250px; height: 250px;" class="rounded" src="{{ asset('uploads/company_photos') }}/{{ $company_history->image }}" alt="img">
                    </div>
                @else
                    <div class="card-body text-center">
                        <h3>No history Added Yet</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
