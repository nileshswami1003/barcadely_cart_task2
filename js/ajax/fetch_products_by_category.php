<?php

include '../../db.php';

// Get the category ID from the AJAX request
$categoryId = $_GET['categoryId'];

// Fetch products from the database based on the category
$query = "SELECT * FROM products WHERE prod_cat = $categoryId";
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
    echo json_encode(array('error' => 'No products found for the selected category'));
}

// Close the database connection
$conn->close();



?>