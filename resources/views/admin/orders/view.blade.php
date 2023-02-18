@extends('layouts.admin')

@section('title','My Orders Details')
    
@section('content')


    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i>  Order Detail
                            <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-warning float-end">Back</a>
                        </h4>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Detail</h5>
                                <hr>
                                <h6>Order Id: {{ $orders->id }}</h6>
                                <h6>Tracking Id/No.: {{ $orders->tracking_no }} }}</h6>
                                <h6>Ordered Date: {{ $orders->created_at->format('d-m-y h:i A ') }}</h6>
                                <h6>Payment mode {{ $orders->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span class="text-uppercase">{{ $orders->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Detail</h5>
                                <hr>
                                <h6>Fullname: {{ $orders->fullname }}</h6>
                                <h6>Email id: {{ $orders->email }}</h6>
                                <h6>Phone: {{ $orders->phone }}</h6>
                                <h6>Pin code: {{ $orders->pincode }}</h6>
                                <h6>Address : {{ $orders->address }}</h6>
                            </div>
                        </div>

                        <br>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($orders->orderDetail as $orderDetail)
                                            <tr>
                                                <td width="10%">{{ $orderDetail->id }}</td>
                                                <td width="10%">
                                                    @if ($orderDetail->product->productImages)
                                                        <img src="{{ asset($orderDetail->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                                        @else
                                                        <img src="" style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                    
                                                    
                                                </td>
                                                <td>
                                                    {{ $orderDetail->product->name }}
                                                    @if ($orderDetail->productColor)
                                                        <br>
                                                        @if ($orderDetail->productColor->color)
                                                        <span>Color : {{ $orderDetail->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td width="10%">${{ $orderDetail->price }}</td>
                                                <td width="10%">{{ $orderDetail->quantity }}</td>
                                                <td width="10%" class="fw-bold">${{ $orderDetail->quantity * $orderDetail->price}}</td>  
                                            </tr>
                                            @php
                                                $totalPrice += $orderDetail->quantity * $orderDetail->price;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="fw-bold">Total amount:</td>
                                            <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    
@endsection