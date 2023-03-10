@extends('layouts.app')
@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h5>Sales History</h5>
            <table id="table_id" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Items</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($sales as $order)

                    <tr>
                        <td>
                            {{ date('M j, Y', strtotime($order->created_at))}}
                        </td>
                        <td>
                            {{$order->user->first_name }} {{$order->user->last_name }}
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
</div>
@endsection

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection