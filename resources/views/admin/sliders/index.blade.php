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
                        Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-sm btn-primary text-white float-end">Add slider</a>
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-striped table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            <img src="{{ asset("$slider->image") }}" style="width: 144px; height:144px;" alt="slider">
                                        </td>
                                        <td>{{ $slider->status ? 'Hidden':'Vissible'}}</td>
                                        <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('are u usre want to delete this data ?')" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="6">No Slider Has been Listed</td>
                                    @endforelse
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection