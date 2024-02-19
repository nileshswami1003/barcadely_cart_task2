<?php

include '../../db.php';

// Get product IDs from the AJAX request
$cartItems = $_POST['cartItems'];

// Fetch product details from the database for the given product IDs
$query = "SELECT * FROM products WHERE prod_id IN (" . implode(',', $cartItems) . ")";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = array();

    // Fetch product data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert the array to JSON and send it to the client
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'No product details found for the given product IDs'));
}

// Close the database connection
$conn->close();
?>
