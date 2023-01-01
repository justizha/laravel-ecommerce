@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-sm btn-reddit text-white float-end">Back</a>
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                            <form action="{{ url('admin/sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" id="" class="form-control"  rows="3">{{ $slider->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset($slider->image) }}" alt=""  width="244px">
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <br>
                                    <input type="checkbox" name="status" class="form-check-primary" {{ $slider->status == '1' ? 'checked':''}} > 
                                    <small><p class="class="text-muted fs-6"">Checked is hidden Uncheck is Vissible</p></small>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection