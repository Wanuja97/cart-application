@extends('layouts.app')

@section('content')
    <div>
        <h5>View All Consumers</h5>
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
                            <td><a href="{{url('admin/consumer/view',$user->id)}}"> View</a></td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                        </table>
    </div>
@endsection