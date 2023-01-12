@extends('layouts.app')

@section('content')
    <div>

        First Name : {{$consumer->first_name}} <br>
        Last Name : {{$consumer->last_name}} <br>
        Email : {{$consumer->email}} <br>
        Zip Code : {{$consumer->zip_code}} <br>
        Street : {{$consumer->street}} <br>
        Country : {{$consumer->country}} <br>
        Telephone : {{$consumer->telephone}}
    </div>
@endsection