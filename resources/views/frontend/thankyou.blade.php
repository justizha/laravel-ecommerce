@extends('layouts.app')

@section('title','Thank You For Shopping')
    
@section('content')
{{-- <div class="d flex justify-content-center">
    <div class="py-5 pyt-5">
        <div class="col-sm-10">
            <div class="container">
                <div class="card text-center">
                    <div class="card-header">
                        Featured
                    </div>
                        <div class="card-body">
                            <img src="/img/Screenshot_14-removebg-preview.png" width="420px" alt="logo" srcset="">
                            <p class="card-text">Thank You For Shopping</p>
                            <a href="{{ url('collections') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            ©Alfath Izha Barikallah
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="mt-5">
    <div class="container w-50">
        <div class="card text-center">
            <div class="card-body">
                <h1>Thank you For Using Lara Shop</h1>
                <img src="/img/Screenshot_14-removebg-preview.png" width="420px" alt="logo" srcset="">
                <p class="card-text">Don't Forget To Give Us Feedback !</p>
                <a href="{{ url('collections') }}" class="btn btn-primary">Go Somewhere...</a>
            </div>
        </div>
    </div>
</div>

@endsection