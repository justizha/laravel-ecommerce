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
                        Add Slider
                        <a href="{{ url('admin/colors') }}" class="btn btn-sm btn-reddit text-white float-end">Back</a>
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                            <form action="{{ url('admin/sliders/create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" id="" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <br>
                                    <input type="checkbox" name="status" class="form-check-primary"> 
                                    <small><p class="class="text-muted fs-6"">Checked is hidden Uncheck is Vissible</p></small>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection