@extends('layouts.app')

@section('content')
<div class="container">
    <div id="cart">
        
        @if(count((array) session('cart')) == 0)
        <div class="text-align-center">
        <p>Cart is empty</p>
        <a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Continue Shopping</a>
        </div>
        @endif
        
        @if(count((array) session('cart')) > 0)
        <h2>Cart</h2>
        <a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Continue Shopping</a>
        <table id="cart" class="table table-hover table-condensed table-bordered col-md-12">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" class="text-center">Subtotal</th>
                    <th scope="col"></th>
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
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset($details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <p>{{ $details['name'] }}</p>
                                <p></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>

                <tr>
                    
                    <td colspan="3" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                    @if(count((array) session('cart')) > 0)
                    <td class="hidden-xs text-center"><a href="{{ route('cart.checkout') }}" class="btn btn-warning">Proceed to checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></a></td>
                    @endif
                    
                </tr>
            </tfoot>
        </table>
        @endif


    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $('.update-cart').on('click', function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ url('update-cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Are you sure")) {
            $.ajax({
                url: "{{ url('remove-from-cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection