@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex flex-column flex-wrap">
            <h5>Search Results for: <span class="">{{$searchTerm}}</span></h5>
                <div class=" d-flex flex-row flex-wrap justify-content-flex-start">
                    @if(count($products) < 1) <p>No results found</p>
                        @else
                        @foreach ($products as $item)
                        
                    <div class="card p-4 m-4">
                        <!-- {{$item->image}} -->
                        <img class="img-responsive img-fluid product-images" src="{{asset($item->image)}}" alt="" >
                        <span><b>{{$item->product_name}}</b> ({{$item->description}})</span>
                        <span>${{$item->price}}</span>
                        <span>Available Qty: {{$item->available_qty}}</span>
                        <a href="{{ url('add-to-cart/'.$item->id) }}" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</a>
                        <!-- <div>
                                    <button class="add-to-cart" data-id="{{$item->id}}" data-name="{{$item->product_name}}" data-price="{{$item->price}}" data-image="{{$item->image}}">Add to cart</button><br>
                                    <span>Quantity: </span><input type="number" value="1" min="1" max="{{$item->available_qty}}" class="product-quantity">
                                </div> -->

                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection