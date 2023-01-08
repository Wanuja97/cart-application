@extends('layouts.app')

@section('content')
<div id="cart">
    <h2>Cart</h2>
    <ul id="cart-items"></ul>
    <h3>Summary</h3>
    <p>Total <span id="total"></span></p>
    <button>Checkout</button>
</div>
@endsection

@section('script')
<script type="text/javascript">
    // retrieve cart items once when page loads
    // window.onload = function() {
    //     displayCart();
    // }

    displayCart();

    // Add an item to cart
    function addToCart(id, name, price, quantity, image) {
        // console.log("Image" + image);

        // check if the cart is stored in the local storage
        if (localStorage.getItem('cart') === null) {
            // if cart is not available, create an empty array
            var cart = [];
        } else {
            // if cart is availble in local storage . ge the cart
            var cart = JSON.parse(localStorage.getItem('cart'));
        }
        var itemExists = false;
        // If item exists
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].id === id) {
                cart[i].quantity = quantity;
                itemExists = true;
                break;
            }
        }

        // If item does not exists
        if (!itemExists) {
            // Add the item to the cart
            cart.push({
                'id': id,
                'name': name,
                'price': price,
                'quantity': quantity,
                'image': image
            });
        }


        // Storing new cart in local storage
        localStorage.setItem('cart', JSON.stringify(cart));

    }

    // Remove an item from the cart
    function removeFromCart(id) {
        console.log("Delete btn pressed");
        // Get the cart from the session
        var cart = JSON.parse(localStorage.getItem('cart'));

        // Find the item in the cart
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].id == id) {
                // Remove the item from the cart
                cart.splice(i, 1);
                break;
            }
        }

        // Store the updated cart in the session
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Displaying the cart
    function displayCart() {
        // retrieving the data items from the local storage
        var cart = JSON.parse(localStorage.getItem('cart'));

        // if cart is empty
        if (cart === null || cart.length === 0) {
            document.getElementById('cart-items').innerHTML = 'The cart is empty';
            document.getElementById('total').innerHTML = '$ 0.00';
        }
        // if cart is not empty
        else {
            var html = '';
            for (var i = 0; i < cart.length; i++) {
                console.log(cart[i].image);


                html += '<li?> <img src="' + cart[i].image + '"' + 'alt="" style="width:150px;height:150px;">' + cart[i].name + ' (' + cart[i].quantity + ' x $' + cart[i].price + ') <button class="remove-from-cart" data-id="' + cart[i].id + '">Remove</button></li> <br>' + '<input type="number" value="1" min="1" max="' + cart[i].available_qty + '" class="product-quantity"> <br> <button class="add-to-cart" data-id="' + cart[i].id + '" data-name="' + cart[i].name + '" data-price="' + cart[i].price + '" data-image="' + cart[i].image + '" >Update Cart</button>';
            }
            document.getElementById('cart-items').innerHTML = html;

            // calculating total cost
            var total_cost = 0;
            for (var i = 0; i < cart.length; i++) {
                var item_cost = 0;
                item_cost = cart[i].price * cart[i].quantity;
                total_cost += item_cost;
            }
            var costtext = item_cost;
            document.getElementById('total').innerHTML = '$ '+ costtext;

        }

        console.log(JSON.stringify(cart));
    }

    // event listeners for the "add to cart" button
    var addToCartButtons = document.getElementsByClassName('add-to-cart');
    for (var i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener('click', function() {
            // console.log("add item");
            // Get the product details
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var price = this.getAttribute('data-price');
            var quantity = this.parentElement.getElementsByClassName('product-quantity')[0].value;
            var image = this.getAttribute('data-image');
            // Add the item to the cart
            addToCart(id, name, price, quantity, image);

            // Display the cart
            displayCart();
        });
    }

    // Add event listeners for the "Remove" buttons
    var removeFromCartButtons = document.getElementsByClassName('remove-from-cart');
    for (var i = 0; i < removeFromCartButtons.length; i++) {
        removeFromCartButtons[i].addEventListener('click', function() {
            // Get the product ID
            var id = this.getAttribute('data-id');

            // Remove the item from the cart
            removeFromCart(id);

            // Display the cart
            displayCart();
        });
    }
</script>
@endsection