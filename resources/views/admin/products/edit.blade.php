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
                        <label for="pname">Product name:</label><br>
                        <input type="text" id="pname" name="pname" placeholder="Enter product name" value="{{$item->product_name}}"><br>

                        <label for="description">Description:</label><br>
                        <input type="text" id="description" name="description" placeholder="Enter product description" value="{{$item->description}}"><br>

                        <label for="price">Price:</label><br>
                        <input type="number" min="0.00" step="0.01" id="price" name="price" placeholder="Enter product price" value="{{$item->price}}"><br>

                        <label for="quantity">Quantity:</label><br>
                        <input type="number" id="quantity" name="available_qty" placeholder="Enter quantity" value="{{$item->available_qty}}"><br><br>

                        <label for="inputProductImage">Product Image</label>
                        <input type="file" name="image" id="inputProductImage" value="{{$item->image}}">

                        <div>
                            <img src="{{asset($item->image)}}" alt="Category image" style="width:400px; height:300px">
                        </div>
                        <br> <br>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection