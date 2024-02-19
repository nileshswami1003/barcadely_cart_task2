<?php
header('Content-Type: application/json');
include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check connection
    if ($conn->connect_error) {
        $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
    } else {
        // Escape user input to prevent SQL injection
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        // Hash the password (use a strong hashing algorithm)
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $insertQuery = "INSERT INTO users (user_email, user_pass) VALUES ('$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            // Successful sign-up
            $response = ['success' => true, 'message' => 'Sign-up successful'];
        } else {
            // Sign-up failed
            $response = ['success' => false, 'message' => 'Error during sign-up: ' . $conn->error];
        }

        // Close the database connection
        $conn->close();
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

echo json_encode($response);
?>
