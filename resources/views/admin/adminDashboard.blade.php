@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Admin Dashboard
                    <br><br>
                    <a href="{{route('add.product')}}"> Add New Product
                    </a>
                    <br><br>
                    <a href="{{route('view.products')}}"> View Products
                    </a>
                    <br><br>
                    <a href="{{route('view.consumers')}}"> View Customers
                    </a>
                    <br><br>
                    <a href="{{route('view.sales')}}"> Sales History
                    </a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
