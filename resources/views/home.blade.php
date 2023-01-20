@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mr-8 p-8">
        <div class="col-md-12">
            <div class="d-flex flex-column flex-wrap">
                <div class="row">
                    <form action="{{route('search.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                            <div class="input-group">
                                <input type="search" id="keyword" name="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div>

                </div>
                <div class=" d-flex flex-row flex-wrap justify-content-center">


                    @foreach($products as $item)
                    @if($item->available_qty > 0)

                    <div class="card p-4 m-4">
                        <!-- {{$item->image}} -->
                        <img class="img-responsive img-fluid" src="{{asset($item->image)}}" alt="" style="width:150px;height:150px;">
                        <span>{{$item->product_name}}</span>
                        <span>{{$item->description}}</span>
                        <span>{{$item->price}}</span>
                        <span>{{$item->available_qty}}</span>
                        <a href="{{ url('add-to-cart/'.$item->id) }}" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</a>
                        <!-- <div>
                                    <button class="add-to-cart" data-id="{{$item->id}}" data-name="{{$item->product_name}}" data-price="{{$item->price}}" data-image="{{$item->image}}">Add to cart</button><br>
                                    <span>Quantity: </span><input type="number" value="1" min="1" max="{{$item->available_qty}}" class="product-quantity">
                                </div> -->
                    </div>

                    @endif

                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection