@extends('layouts.app')

@section('content')
<h2>Checkout</h2>
<div>
    <p>Shipping Details</p>
    @if(($user->first_name === null && $user->last_name === null) || $user->zip_code === null || $user->street === null || $user->city === null || $user->country === null)
    <p><b>Please complete your shipping details</b></p>
    <a href="{{route('consumer.profile')}}">Update Shipping Details</a>
    @else
    <div>
        <p>{{$user->first_name}} {{$user->last_name}}, {{$user->street}}, {{$user->city}}, {{$user->country}}, {{$user->zip_code}}</p>
        <button><a href="{{route('consumer.profile')}}">Change Shipping Details</a></button>
    </div>
    @endif
    <!-- <p><b>{{$user->id}}</b></p> -->
    <!-- Card Numeber   |   cardholders Name    |   MM/YY   CVV -->
</div>
<div>
    <p>Add Payment method</p>
    <form action="{{route('payment')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}">
        <label for="cno">First name:</label><br>
        <input type="text" id="cno" name="cno" placeholder="Card Number" required><br>

        <label for="cname">Cardholder's Name:</label><br>
        <input type="text" id="cname" name="cname" placeholder="Cardholder's Name" required><br>

        <label for="month">MM</label>
        <select name="month" id="month">
            <option value="01">January (01)</option>
            <option value="02">February (02)</option>
            <option value="03">March (03)</option>
            <option value="04">April (04)</option>
            <option value="05">May (05)</option>
            <option value="06">June (06)</option>
            <option value="07">July (07)</option>
            <option value="08">August (08)</option>
            <option value="09">September (09)</option>
            <option value="10">October (10)</option>
            <option value="11">November (11)</option>
            <option value="12">December (12)</option>
        </select>

        <label for="year">YY</label>
        <select name="year" id="year">
            @for($i=23; $i<=50; $i++)
            <option value="20"+{{$i}}>20{{$i}}</option>
            @endfor
        </select>

        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" placeholder="CVV" required><br>

        <input type="submit" value="Place Order">
    </form>
</div>
<div>
<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                        {{ $details['image'] }}
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">{{ $details['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            
        </tr>
        </tfoot>
    </table>
</div>
@endsection