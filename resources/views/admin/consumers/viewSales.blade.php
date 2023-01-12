@extends('layouts.app')

@section('content')
<div>
    <h5>Purchase History</h5>

    <?php
        foreach($sales as $order){
            ?>
            <p>Date: {{ date('M j, Y', strtotime($order->created_at))}} <br>
                Customer Id: {{$order->user->id}} <br>
                Customer Name: {{$order->user->first_name }} {{$order->user->last_name }} <br>
                
            </p>
            <?php
            $total = 0;
                foreach($order->orderItems as $orderItem) {
                    $total += ($orderItem->item_price) * ($orderItem->quantity);
                    ?>
                    <p>Item Name: {{$orderItem->product->product_name}} <br> 
                    Unit Price: {{$orderItem->item_price}} <br>
                    Quantity : {{$orderItem->quantity}} <br>
                    Item Name: {{$orderItem->product->description}}
                    <!-- Total : {{$total}}</p> -->
                    
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