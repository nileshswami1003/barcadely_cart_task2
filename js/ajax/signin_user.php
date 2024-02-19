<?php

session_start();
header('Content-Type: application/json');
include '../../db.php';


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Escape user input to prevent SQL injection
    $email = $data['email'];
    $password = $data['password'];

    // Check user credentials against the database
    $query = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Successful sign-in
        $response = ['success' => true, 'message' => 'Sign-in successful'];

        // Set session variables upon successful sign-in
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_email'] = $user['user_email'];
    } else {
        $response = ['success' => false, 'message' => 'Invalid credentials'];
    }

    // Close the database connection
    $conn->close();

} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

echo json_encode($response);
?>
