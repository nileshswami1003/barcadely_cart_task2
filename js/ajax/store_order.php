<?php
session_start();
header('Content-Type: application/json');
include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get cart data from the AJAX request
    $cartData = $_POST['cartData'];
    $userid = $_SESSION['user_id'];
    // Check connection
    if ($conn->connect_error) {
        $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
    } else {
        // Iterate through cart data and store in the order table
        foreach ($cartData as $item) {
            $productId = $item['productId'];
            $count = $item['count'];

            // Insert into the order table (adjust table and column names)
            $insertQuery = "INSERT INTO order_details (user_id, ord_date, prod_id, prod_count) VALUES ('$userid','".date('d-m-Y')."','$productId', '$count')";

            if ($conn->query($insertQuery) !== TRUE) {
                $response = ['success' => false, 'message' => 'Error storing order: ' . $conn->error];
                $conn->close();
                echo json_encode($response);
                exit();
            }
        }

        // Successful order creation
        $response = ['success' => true, 'message' => 'Order stored successfully'];
        $conn->close();
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

echo json_encode($response);
?>
