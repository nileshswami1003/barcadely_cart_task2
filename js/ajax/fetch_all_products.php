<?php

include '../../db.php';

// Fetch all products data from the database
$query = "SELECT * FROM products";
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
    echo json_encode(array('error' => 'No products found in the database'));
}

// Close the database connection
$conn->close();
?>
