<?php
session_start();
header('Content-Type: application/json');
include '../../db.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $cname = $_POST['cname'];
    $cnum = $_POST['cnum'];
    $cvv = $_POST['cvv'];
    $exdate = $_POST['exdate'];
    $total = $_POST['total'];
    $cdate = $_POST['cdate'];

    // Check connection
    if ($conn->connect_error) {
        $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
    } else {
        // Escape user input to prevent SQL injection
        // $email = $conn->real_escape_string($email);
        $userid = $_SESSION['user_id'];
        $cname = $conn->real_escape_string($cname);
        $cnum = $conn->real_escape_string($cnum);
        $cvv = $conn->real_escape_string($cvv);
        $exdate = $conn->real_escape_string($exdate);
        $total = $conn->real_escape_string($total);
        $cdate = $conn->real_escape_string($cdate);

        // Insert the form data into the database
        $insertQuery = "INSERT INTO payments (user_id, pay_date, pay_amt, card_no, card_cvv, card_expdt) VALUES ('$userid', '$cdate','$total', '$cnum', '$cvv', '$exdate')";

        if ($conn->query($insertQuery) === TRUE) {
            // Successful payment
            $response = ['success' => true, 'message' => 'Payment successful'];
            
        } else {
            // Payment failed
            $response = ['success' => false, 'message' => 'Error during payment: ' . $conn->error];
        }

        // Close the database connection
        $conn->close();
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

echo json_encode($response);
?>
