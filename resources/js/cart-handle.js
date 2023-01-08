

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

        alert("A new item has been added to your Shopping Cart");
        


    }

    

    // Displaying the cart
    function displayCart() {
        // retrieving the data items from the local storage
        var cart = JSON.parse(localStorage.getItem('cart'));

        // if cart is empty
        if (cart === null || cart.length === 0) {
            document.getElementById('cart-items').innerHTML = 'The cart is empty';
        }
        // if cart is not empty
        else {
            var html = '';
            for (var i = 0; i < cart.length; i++) {
                console.log(cart[i].image);
                html += '<li?> <img src="' + cart[i].image + '"' +'alt="" style="width:150px;height:150px;">' + cart[i].name + ' (' + cart[i].quantity + ' x $' + cart[i].price + ') <button class="remove-from-cart" data-id="' + cart[i].id + '">Remove</button></li> <br>';
            }
            document.getElementById('cart-items').innerHTML = html;
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
            addToCart(id, name, price, quantity,image);

            // Display the cart
            displayCart();
        });
    }

