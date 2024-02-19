$(document).ready(function (){

    // console.log('Cart Items:', cartItems);
    getCartData();

    function getCartItems(){
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var productIds = [];

        // Extract product IDs from cart items
        cartItems.forEach(function (item) {
            productIds.push(item.productId);
        });

        return productIds;
    }

    function getCartData(){
        var cartItems = getCartItems();

        $.ajax({
            url: './js/ajax/fetch_cart_products.php',
            method: 'POST',
            data: { cartItems: cartItems },
            dataType: 'json',
            success: function (data) {
                console.log('Product details for cart items:', data);
                // Handle the retrieved product details as needed
                displayProductDetailsInTable(data);
            },
            error: function (error) {
                console.error('Error fetching product details:', error);
            }
        });
    }

    // Function to display product details in an HTML table
    function displayProductDetailsInTable(data) {
        var tableBody = $('#productTableBody');
        tableBody.empty();
        var cartTotal=0;
        // Iterate through the retrieved product details and append rows to the table
        data.forEach(function (product) {
            cartTotal = cartTotal+product.prod_price*getProductCountInCart(product.prod_id);
            console.log("cart total : "+cartTotal);

            var row = $('<tr [data-id="' + product.prod_id + '"]>');
            row.append($('<td>').text(product.prod_id));
            row.append($('<td>').text(product.prod_name));
            row.append($('<td>').text('$' + product.prod_price));
            row.append($('<td>').text('Total : $'+(product.prod_price*getProductCountInCart(product.prod_id))));
            row.append($('<td>').text(product.prod_img));
            // product specific count
            row.append($('<td class="count-cell">').text(getProductCountInCart(product.prod_id)));
            // Add plus and minus buttons
            var plusButton = $('<button class="modifyCountBtn">+</button>').data('id', product.prod_id);
            var minusButton = $('<button class="modifyCountBtn">-</button>').data('id', product.prod_id);
            
            // Handle click events for plus and minus buttons
            plusButton.on('click', function () {
                modifyProductCount($(this).data('id'), 1); // Increase count by 1
                // modifyProductPrice($(this).data('id'), product.prod_price);
            });

            minusButton.on('click', function () {
                modifyProductCount($(this).data('id'), -1); // Decrease count by 1
            });

            row.append($('<td>').append(plusButton).append(minusButton));
            tableBody.append(row);
        });
    }

    // Function to modify the product count in the cart
    function modifyProductCount(productId, delta) {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        // var item = cartItems.find(item => item.productId === productId);
        var itemIndex = cartItems.findIndex(item => item.productId === productId);

        if (itemIndex !== -1) {
            // Update the count by the specified delta value
            cartItems[itemIndex].count += delta;
    
            if (cartItems[itemIndex].count <= 0) {
                // Remove the item from the cart if the count is zero or negative
                cartItems.splice(itemIndex, 1);

                $('tr[data-id="' + productId + '"]').remove();

            } else {
                // Update the displayed count in the HTML table
                var countCell = $('tr').find('[data-id="' + productId + '"]').prev();
                countCell.text(cartItems[itemIndex].count);

            }
    
            localStorage.setItem('cart', JSON.stringify(cartItems));
    
            // Optionally: Update total count display or perform other actions
            updateTotalCountDisplay(); //available in index.js
            // $('#productTableBody').empty();
            getCartData();
        }
    }

    $('#totalCartCount').text(getTotalProductCount());

    // Function to update the total count in the specified <span> tag
    function updateTotalCountDisplay() {
        var totalProductCount = getTotalProductCount();
        $('#totalCartCount').text(totalProductCount);
    }   

    // Function to calculate the total count of all products in the cart
    function getTotalProductCount() {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var totalCount = 0;

        // Sum the counts of all products in the cart
        cartItems.forEach(function (item) {
            totalCount += item.count;
        });
        console.log('Total Product Count in Cart:', totalCount);
        return totalCount;
    }

    // Function to get product count in the cart for a given product ID
    function getProductCountInCart(productId) {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var item = cartItems.find(item => item.productId === productId);
        return item ? item.count : 0;
    }

    

});
