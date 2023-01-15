@extends('layouts.app')

@section('title','Thank You For Shopping')
    
@section('content')
<div class="py-5 pyt-5">
    <div class="col-md-12">
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

@endsection