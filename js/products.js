$(document).ready(function () {
    // Function to fetch all products data
    function getAllProducts() {
        $.ajax({
            url: './js/ajax/fetch_all_products.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('All products data:', data);
                displayProductCards(data);
            },
            error: function (error) {
                console.error('Error fetching products:', error);
            }
        });
    }

    // Function to display product cards
    function displayProductCards(products) {
        var container = $('#productContainer');
        container.empty();

        // Iterate through the products and generate HTML for each card
        products.forEach(function (product) {
            var card = $('<div class="col mb-4">');
            card.append($('<div class="card">'));
            card.append($('<img class="card-img-top" src="uploads/product-img.jpg" alt="' + product.name + '">'));
            card.append($('<div class="card-body">'));
            card.find('.card-body').append($('<h5 class="card-title">' + product.prod_name + '</h5>'));
            card.find('.card-body').append($('<p class="card-text">$' + product.prod_price + '</p>'));
            card.find('.card-body').append($('<button class="btn btn-primary addToCartBtn" data-id="' + product.prod_id + '">Add to Cart</button>'));

            container.append(card);
        });
    }

    // Event delegation for dynamically added "Add to Cart" buttons
    $('#productContainer').on('click', '.addToCartBtn', function () {
        var productId = $(this).data('id');
        addToCart(productId);
        updateTotalCountDisplay(); // Update total count immediately after adding a product
    });

    // Call the function to fetch all products data when the page loads
    getAllProducts();
});
