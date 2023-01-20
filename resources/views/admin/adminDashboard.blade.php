@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="col tiles-section">
                        <a href="{{route('add.product')}}">
                            <div class="tile purple">
                                <h3 class="title">Add New Product</h3>
                            </div>
                        </a>
                        <a href="{{route('view.products')}}">
                            <div class="tile red">
                                <h3 class="title">View Products</h3>
                            </div>
                        </a>
                        <a href="{{route('view.consumers')}}">
                            <div class="tile orange">
                                <h3 class="title">View Customers</h3>
                            </div>
                        </a>
                        <a href="{{route('view.sales')}}">
                            <div class="tile green">
                                <h3 class="title">Sales History</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection