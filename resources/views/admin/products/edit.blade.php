@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form action="{{ url('admin/product/update/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$item->image}}">
                        <div class="col">
                            <label for="pname">Product name:</label><br>
                            <input class="form-control" type="text" id="pname" name="pname" placeholder="Enter product name" value="{{$item->product_name}}"><br>
                        </div>
                        <div class="col">
                            <label for="description">Description:</label><br>
                            <input class="form-control" type="text" id="description" name="description" placeholder="Enter product description" value="{{$item->description}}"><br>
                        </div>
                        <div class="col">
                            <label for="price">Price:</label><br>
                            <input class="form-control" type="number" min="0.00" step="0.01" id="price" name="price" placeholder="Enter product price" value="{{$item->price}}"><br>
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity:</label><br>
                            <input class="form-control" type="number" id="quantity" name="available_qty" placeholder="Enter quantity" value="{{$item->available_qty}}"><br><br>
                        </div>

                        <div class="col">
                        <div class="row d-flex flex-wrap">
                            <div class="col">
                                <label for="inputProductImage">Product Image</label>
                                <input class="form-control" type="file" name="image" id="inputProductImage" value="{{$item->image}}">
                            </div>
                            <div class="col">
                                <img src="{{asset($item->image)}}" alt="Category image" style="width:150px; height:120px">
                            </div>
                        </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection