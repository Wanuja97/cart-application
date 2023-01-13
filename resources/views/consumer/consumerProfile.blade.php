@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="card p-4">
    <p class="d-flex justify-content-center">Shipping Details</p>
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <div class="row">
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
@endsection