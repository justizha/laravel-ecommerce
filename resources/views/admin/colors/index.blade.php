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
                        Product-Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-sm btn-primary text-white float-end">Add Color</a>
                    </h3>
                </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Color-Name</th>
                                <th>Colors-Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($colors as $color)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status ? 'Hidden':'Vissible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are u sure Want to Delete this Data?')" class="btn btn-youtube btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="5">No Colors Has been Listed</td>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection