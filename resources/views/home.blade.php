@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Consumer View') }}</div>
                
                <form action="{{route('search.product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="text" id="keyword" name="keyword" placeholder="Search Product"><br>
                        <input type="submit" value="Search">
                    </form>
                Current logged user id: {{ Auth::user()->id }}
                <div class="card-body col-md-8">

                
                    <ul id="product-list">
                    @foreach($products as $item)
                        @if($item->available_qty > 0)
                        <li>
                            <div class="card">
                                <!-- {{$item->image}} -->
                                <img src="{{asset($item->image)}}" alt="" style="width:150px;height:150px;">
                                <span>{{$item->product_name}}</span>
                                <span>{{$item->description}}</span>
                                <span>{{$item->price}}</span>
                                <span>{{$item->available_qty}}</span>
                                <a href="{{ url('add-to-cart/'.$item->id) }}">Add to cart</a>
                                <!-- <div>
                                    <button class="add-to-cart" data-id="{{$item->id}}" data-name="{{$item->product_name}}" data-price="{{$item->price}}" data-image="{{$item->image}}">Add to cart</button><br>
                                    <span>Quantity: </span><input type="number" value="1" min="1" max="{{$item->available_qty}}" class="product-quantity">
                                </div> -->
                            </div>
                        </li>
                        @endif
                    </ul>
                    <br>
                    @endforeach                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

