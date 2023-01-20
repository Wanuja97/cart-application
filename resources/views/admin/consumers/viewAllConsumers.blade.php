@extends('layouts.app')
@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">{{ __('Customer Details') }}</div>
    <div class="card-body">
        <table id="consumer_table" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Telephone</th>
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
                    <td>{{$user->email}}</td>
                    <td>{{$user->street}}, {{$user->country }}, {{$user->zip_code}}</td>
                    <td>{{$user->telephone}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td><a class="btn btn-warning" href="{{url('admin/consumer/view',$user->id)}}"> Purchase History</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection
@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#consumer_table').DataTable();
    });
</script>
@endsection