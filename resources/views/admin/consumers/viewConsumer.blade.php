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
    <div class="purchases">
    <?php



foreach($orders as $order){
    ?>
    <p>{{ date('M j, Y', strtotime($order->created_at))}}</p>
    <!-- <pre>{{$order}}</pre> -->
    <?php
    $total = 0;
        foreach($order->orderItems as $orderItem) {
            $total += $orderItem->item_price * $orderItem->quantity;
            ?>
            <p>Item Name: {{$orderItem->product->product_name}} <br> 
            Unit Price: {{$orderItem->item_price}} <br>
            Quantity : {{$orderItem->quantity}} <br>
            Item Name: {{$orderItem->product->description}}</p>
            <!-- <p>{{$orderItem->product}}</p> -->
            <!-- {{$total}} -->
            
            <?php
        }                
    ?>
        Total: {{$total}}
        <hr>
    
    <?php
}
?>
    </div>
@endsection