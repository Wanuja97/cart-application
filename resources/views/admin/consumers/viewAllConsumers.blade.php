@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">{{ __('Customer Details') }}</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Registered Date</th>
                    <!--<th scope="col">Price</th>
                                <th scope="col">Available Qty</th>
                                <th scope="col">Last Stock Update</th>-->
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($consumers as $user)
                <tr>
                    <td>{{$user->first_name }} {{$user->last_name}}</td>
                    <td>{{$user->country }}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td><a class="btn btn-info" href="{{url('admin/consumer/view',$user->id)}}"> View More</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection