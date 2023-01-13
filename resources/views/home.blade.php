@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex flex-column flex-wrap">
                <form class="form-inline col-md-12" action="{{route('search.product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control " type="text" id="keyword" name="keyword" placeholder="Search Product" required>
                    <input class="btn btn-outline-success " type="submit" value="Search">
                </form>
                
                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        $products
                        
                        @foreach($products as $item)
                        <div class="carousel-item active">
                            <img class="d-block w-100 " src="{{asset($item->image)}}" style="width:150px;height:150px;" alt="First slide">
                        </div>
                        @endforeach

                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->
                <div class=" d-flex flex-row flex-wrap justify-content-center">


                    @foreach($products as $item)
                    @if($item->available_qty > 0)

                    <div class="card p-4">
                        <!-- {{$item->image}} -->
                        <img src="{{asset($item->image)}}" alt="" style="width:150px;height:150px;">
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