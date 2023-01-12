@extends('layouts.app')

@section('content')
<div>
    <a href="{{route('purchase.history')}}">Purchase history</a>
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <label for="fname">First name:</label><br>
        <input type="text" id="pname" name="fname" placeholder="Enter first name" value="{{$user->first_name}}" required><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Enter last name" value="{{$user->last_name}}" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{$user->email}}" disabled><br>

        <label for="zcode">Zip code:</label><br>
        <input type="text" id="zcode" name="zcode" placeholder="Enter zip code" value="{{$user->zip_code}}" required><br>

        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street" placeholder="Enter street name" value="{{$user->street}}" required><br>

        <label for="city">Street:</label><br>
        <input type="text" id="city" name="city" placeholder="Enter city name" value="{{$user->city}}" required><br>

        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country" placeholder="Enter country" value="{{$user->country}}" required><br>

        <label for="telephone">Mobile No:</label><br>
        <input type="text" id="telephone" name="telephone" placeholder="Enter phone number" value="{{$user->telephone}}" required><br>

        <input type="submit" value="Update Details">
    </form>
</div>
@endsection
