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
                            Products
                            <a href="{{ url('admin/products/creates') }}" class="btn btn-sm btn-primary text-white float-end">Add Product</a>
                        </h3>
                    </div>
                        <div class="card-body">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category->name }}
                                            
                                                @else
                                                No Category
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->status == '1' ?'Hidden':'Vissible' }}</td>
                                        <td>
                                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are u Sure Want to Delete This Product?')" class="btn btn-danger btn-sm ">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Product Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
@endsection