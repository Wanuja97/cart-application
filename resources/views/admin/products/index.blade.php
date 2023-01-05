@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('admin/dashboard')}}">{{ __('Dashboard') }}</a></div>

                <div class="card-body">
                    View Products
                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Available Qty</th>
                                <th scope="col">Last Stock Update</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            
                            @foreach($products as $item)
                            <tr>
                            <td>{{$item->product_name}}</td>
                            <td> <img src="{{asset($item->image)}}" alt="" style="width:150px;height:100px;"></td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->available_qty}}</td>
                            @if($item->created_at == NULL)
                                <span class="text-danger">No Date Set</span>
                            @else
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                
                            @endif
                            
                            <td><a href="{{url('admin/product/delete',$item->id)}}" onclick="return confirm('Are you sure to Delete')"> Delete</a></td>
                            <td><a href="{{url('admin/product/edit',$item->id)}}"> Edit</a></td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                        </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
