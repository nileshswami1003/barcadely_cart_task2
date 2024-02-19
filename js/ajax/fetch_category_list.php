<?php

include '../../db.php';


// Fetch data from the database
$query = 'SELECT * FROM product_categories';
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = array();

    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert the array to JSON and send it to the client
    echo json_encode($data);
} else {
    echo 'No data found';
}

// Close the database connection
$conn->close();

?>