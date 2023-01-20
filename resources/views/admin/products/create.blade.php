@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Product') }}</div>
                <div class="card-body">
                    <form action="{{route('create.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col">
                            <label for="pname">Product name:</label><br>
                            <input class="form-control" type="text" id="pname" name="pname" placeholder="Enter product name" required><br>
                        </div>
                        <div class="col">
                            <label for="description">Description:</label><br>
                            <input class="form-control" type="text" id="description" name="description" placeholder="Enter product description" required><br>
                        </div>
                        <div class="col">
                            <label for="price">Price:</label><br>
                            <input class="form-control" type="number" min="0.00" step="0.01" id="price" name="price" placeholder="Enter product price" required><br>
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity:</label><br>
                            <input class="form-control" type="number" id="quantity" name="quantity" placeholder="Enter quantity" required><br>
                        </div>
                        <div class="col">
                            <label for="inputProductImage" class="form-label">Category Image</label>
                            <input class="form-control" type="file" name="image" id="inputProductImage" required>
                        </div>
                        <div class="col" style="margin-top: 20px;">
                            <input class="btn btn-primary" type="submit" value="Add product">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection