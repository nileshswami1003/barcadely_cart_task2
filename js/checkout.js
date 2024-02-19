var totalValue = localStorage.getItem('cartTotal');
console.log(totalValue); // Output: value

$("#total").val(totalValue);

$("#cdate").val(new Date().toLocaleDateString());

$(document).ready(function () {


    if (isCartEmpty()) {
        // Redirect to a page indicating the cart is empty
        window.location.href = 'index.php';
    }

    function isCartEmpty() {
        // You may need to adjust this based on how you manage the cart data in your application
        return localStorage.getItem('cart') === null;
    }


    $('#checkoutForm').submit(function (e) {
        e.preventDefault(); 

        // Collect form data
        var formData = {
            email: $('#email').val(),
            cname: $('#cname').val(),
            cnum: $('#cnum').val(),
            cvv: $('#cvv').val(),
            exdate: $('#exdate').val(),
            total: $('#total').val(),
            cdate: $('#cdate').val()
        };

        // Send AJAX request
        $.ajax({
            url: './js/ajax/process_checkout.php', // Adjust the URL based on your server-side script
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    var cartData = JSON.parse(localStorage.getItem('cart')) || [];
                    // Send the cart data to store in the order table
                    $.ajax({
                        url: './js/ajax/store_order.php', // Adjust the URL based on your server-side script
                        method: 'POST',
                        data: { cartData: cartData },
                        dataType: 'json',
                        success: function (orderResponse) {
                            if (orderResponse.success) {
                                // Redirect to success page
                                // window.location.href = 'success.php';
                                alert("Order placed");

                                // make cart empty
                                localStorage.clear();

                                window.location.href="index.php";
                            } else {
                                alert('Failed to store order. ' + orderResponse.message);
                            }
                        },
                        error: function (orderError) {
                            console.error('Error storing order:', orderError);
                            alert('Failed to store order. Please try again.');
                        }
                    });


                    alert('Payment successful!'); // You can customize the success message
                    // Optionally, you can redirect the user to another page after successful payment
                    // window.location.href = 'success.html';
                } else {
                    alert('Payment failed. ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error during payment:', error);
                alert('Payment failed. Please try again.');
            }
        });
    });
});


