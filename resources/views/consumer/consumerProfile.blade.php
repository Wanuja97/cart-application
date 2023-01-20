@extends('layouts.app')
@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')

<div class="container d-flex flex-row flex-wrap col">
    <div class="col">
        <div class="col-md-10">
            <h2>Sales History</h2>
            <table class="table table-striped table-hover table-bordered" id="orders_table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Items</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{ date('M j, Y', strtotime($order->created_at))}}
                        </td>
                        <td>
                            <?php
                            $total = 0;
                            foreach ($order->orderItems as $orderItem) {
                                $total += ($orderItem->item_price) * ($orderItem->quantity);
                            ?>
                                <p>{{$orderItem->product->product_name}} ({{$orderItem->product->description}}) <br>
                                    <b>$ {{$orderItem->item_price}} X {{$orderItem->quantity}} </b>
                                    <br>
                                </p>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <b>$ {{$total}}</b>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="">
        <h2>Shipping Details</h2>
        <hr>
        <div class="container d-flex flex-row justify-content-center align-items-left">
            <div class="col">
                <!-- <p class="d-flex justify-content-center">Shipping Details</p> -->
                <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$user->id}}">
                    <div class="row flex-wrap">
                        <div class="col">
                            <label for="fname">First name:</label><br>
                            <input class="form-control" type="text" id="pname" name="fname" placeholder="Enter first name" value="{{$user->first_name}}" required><br>
                        </div>
                        <div class="col">
                            <label for="lname">Last name:</label><br>
                            <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter last name" value="{{$user->last_name}}" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="email">Email:</label><br>
                            <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" disabled><br>
                        </div>
                        <div class="col">
                            <label for="zcode">Zip code:</label><br>
                            <input class="form-control" type="text" id="zcode" name="zcode" placeholder="Enter zip code" value="{{$user->zip_code}}" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="street">Street:</label><br>
                            <input class="form-control" type="text" id="street" name="street" placeholder="Enter street name" value="{{$user->street}}" required><br>
                        </div>
                        <div class="col">
                            <label for="city">City:</label><br>
                            <input class="form-control" type="text" id="city" name="city" placeholder="Enter city name" value="{{$user->city}}" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="country">Country:</label><br>
                            <input class="form-control" type="text" id="country" name="country" placeholder="Enter country" value="{{$user->country}}" required><br>
                        </div>
                        <div class="col">
                            <label for="telephone">Mobile No:</label><br>
                            <input class="form-control" type="text" id="telephone" name="telephone" placeholder="Enter phone number" value="{{$user->telephone}}" required><br>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="Update Details">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#orders_table').DataTable();
    });
</script>
@endsection