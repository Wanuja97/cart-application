@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex flex-column flex-wrap">
            <h5>Search Results for: <span class="">{{$searchTerm}}</span></h5>
                <div class=" d-flex flex-row flex-wrap justify-content-flex-start">
                    @if(count($products) < 1) <p>No results found</p>
                        @else
                        @foreach ($products as $item)
                        
                        <div class="card p-4 m-4">
                            <img src="{{asset($item->image)}}" alt="" style="width:150px;height:150px;">
                            <span>{{$item->product_name}}</span>
                            <span>{{$item->description}}</span>
                            <span>{{$item->price}}</span>
                            <!-- <span>{{$item->available_qty}}</span> -->
                            <div>
                                <button class="btn btn-warning add-to-cart" data-id="{{$item->id}}" data-name="{{$item->product_name}}" data-price="{{$item->price}}" data-image="{{$item->image}}">Add to cart</button><br>
                                <!-- <span>Quantity: </span><input type="number" value="1" min="1" max="{{$item->available_qty}}" class="product-quantity"> -->
                            </div>
                            @endforeach
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection