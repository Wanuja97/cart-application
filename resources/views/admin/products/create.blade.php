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
                        <label for="pname">Product name:</label><br>
                        <input type="text" id="pname" name="pname" placeholder="Enter product name" required><br>

                        <label for="description">Description:</label><br>
                        <input type="text" id="description" name="description" placeholder="Enter product description" required><br>

                        <label for="price">Price:</label><br>
                        <input type="number" min="0.00" step="0.01" id="price" name="price" placeholder="Enter product price" required><br>
                        
                        <label for="quantity">Quantity:</label><br>
                        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required><br>

                        <label for="inputProductImage" class="form-label">Category Image</label>
                        <input type="file" name="image" id="inputProductImage" required>

                        <input type="submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection