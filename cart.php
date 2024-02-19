<?php
// Start a session if one is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<?php
include 'navbar.php';
?>

<div class="jumbotron text-center">
    <h1 class="display-4">Your, cart!</h1>
    <h3 id="cartTotal"> </h3>
    <?php
    if (!isset($_SESSION['user_id'])) {
    ?>
        <!-- <form action="" method="post"> -->
            <a class="btn btn-primary btn-lg" href="sign_in.php" role="button">Checkout</a>
        <!-- </form> -->
    <?php
    } else {
    ?>
        <!-- <form action="" method="post"> -->
            <a class="btn btn-primary btn-lg" href="checkout.php" role="button">Checkout</a>
        <!-- </form> -->
    <?php
    }
    ?>
</div>

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 mt-2" id="productContainer">

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="js/index.js"></script>
<script src="js/cart.js"></script>
</body>
</html>
