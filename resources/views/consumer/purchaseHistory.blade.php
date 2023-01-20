@extends('layouts.app')

@section('content')
<div>
    <h5>Purchase History</h5>
    <!-- {{$orders}} -->
    
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
