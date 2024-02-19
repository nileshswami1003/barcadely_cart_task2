<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: sign_in.php");
    exit();
}

// Access user information from the session
$userID = $_SESSION['user_id'];
$email = $_SESSION['user_email'];

// Your dashboard page logic here
// ...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<?php
include 'navbar.php';
?>
<!-- <h2>Dashbord</h2> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-3 mt-2">
            <ul class="list-group" id="dataList">
                <!-- category list goes here dynamically -->
            </ul>
        </div>
        <div class="col-9">
            <div class="row row-cols-1 row-cols-md-2" id="productContainer">
                <!-- product list goes here -->
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="js/index.js"></script>
</body>
</html>
