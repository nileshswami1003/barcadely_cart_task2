$(document).ready(function () {
    
    fetchCategories();


    // Event delegation for dynamically added list items
    $('#dataList').on('click', 'li', function () {
        var categoryId = $(this).data('id');
        fetchProductsByCategory(categoryId);
    });

    // Event delegation for dynamically added "Add to Cart" buttons
    $('#productContainer').on('click', '.addToCartBtn', function () {
        var productId = $(this).data('id');
        addToCart(productId);
        updateTotalCountDisplay();
    });

    $('#totalCartCount').text(getTotalProductCount());

    // Function to update the total count in the specified <span> tag
    function updateTotalCountDisplay() {
        var totalProductCount = getTotalProductCount();
        $('#totalCartCount').text(totalProductCount);
    }

    function fetchProductsByCategory(categoryId) {
        $.ajax({
            url: './js/ajax/fetch_products_by_category.php', 
            method: 'GET',
            data: { categoryId: categoryId },
            dataType: 'json',
            success: function (data) {
                displayProducts(data);
            },
            error: function (error) {
                console.error('Error fetching products:', error);
            }
        });
    }

    function displayProducts(data) {
        var productContainer = $('#productContainer');

        // Clear existing product cards
        productContainer.empty();

        // Iterate through the data and append product details to the container
        
        data.forEach(function (product) {
            var card = $('<div class="col mb-4">');
            card.append($('<div class="card">'));
            // card.append($('<img src="uploads'+product.prod_img+'" alt="product-img" class="card-img-top" alt="...">'));
            card.append($('<img src="uploads/product-img.jpg" alt="product-img" class="card-img-top" alt="...">'));
            card.append($('<div class="card-body">'));
            card.append($('<h3 class="card-title">').text(product.prod_name));
            card.append($('<p>').text('Price: $' + product.prod_price));
           // Add "Add to Cart" button with data-id attribute
           var addToCartBtn = $('<button class="btn btn-dark btn-block addToCartBtn">Add to Cart</button>').data('id', product.prod_id);
           card.append(addToCartBtn);

            productContainer.append(card);
        });
    }

    function fetchCategories() {
        $.ajax({
            url: './js/ajax/fetch_category_list.php', 
            method: 'GET',
            dataType: 'json',  // Specify JSON data type
            success: function (data) {
                // Handle the data received from the server
                displayCategories(data);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function displayCategories(data) {
        var dataList = $('#dataList');

        // Clear existing list items
        dataList.empty();

        // Iterate through the data and append to the list
        data.forEach(function (item) {
            var listItem = $('<li class="list-group-item" style="cursor:pointer;">').text(item.cat_name).data('id', item.cat_id);
            dataList.append(listItem);
        });
    }

    function addToCart(productId) {
        // Retrieve existing cart items from local storage
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product is already in the cart
        var existingItemIndex = cartItems.findIndex(item => item.productId === productId);

        if (existingItemIndex !== -1) {
            // If the product is already in the cart, increase the count
            cartItems[existingItemIndex].count++;
            console.log('Product is already in the cart. Product ID:', productId);
        } else {
            // If the product is not in the cart, add it
            cartItems.push({ productId: productId, count: 1 });
            localStorage.setItem('cart', JSON.stringify(cartItems));

            console.log('Product added to cart. Product ID:', productId);
        }

        // Store the updated cart items back in local storage
        localStorage.setItem('cart', JSON.stringify(cartItems));
    }

    // Function to calculate the total count of all products in the cart
    function getTotalProductCount() {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var totalCount = 0;

        // Sum the counts of all products in the cart
        cartItems.forEach(function (item) {
            totalCount += item.count;
        });
        // console.log('Total Product Count in Cart:', totalCount);
        return totalCount;
    }





});
