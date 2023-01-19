@extends('layouts.app')
@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5>Purchase History</h5>
            <table id="table_id">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                        <td>Mexico</td>
                    </tr>
                    <tr>
                        <td>Ernst Handel</td>
                        <td>Roland Mendel</td>
                        <td>Austria</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>Helen Bennett</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Yoshi Tannamuri</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Giovanni Rovelli</td>
                        <td>Italy</td>
                    </tr>
                </tbody>


            </table>
            <?php
            foreach ($sales as $order) {
            ?>
                <p>Date: {{ date('M j, Y', strtotime($order->created_at))}} <br>
                    Customer Id: {{$order->user->id}} <br>
                    Customer Name: {{$order->user->first_name }} {{$order->user->last_name }} <br>

                </p>
                <?php
                $total = 0;
                foreach ($order->orderItems as $orderItem) {
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