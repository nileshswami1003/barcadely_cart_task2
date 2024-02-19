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

<div class="container-fluid">
    <div class="row mt-2" id="checkOut">
        <div class="offset-2 col-md-8">
            <div class="card">
                <form action="" method="post" id="checkoutForm">
                    <div class="card-header">
                        <h3 class="text-center">Checkout Here</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Email id</label>
                            <input type="text" name="email" id="email" class="form-control" readonly value="<?php if($_SESSION['user_email']) echo $_SESSION['user_email'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Card holder name</label>
                            <input type="text" name="cname" id="cname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Card number</label>
                            <input type="text" name="cnum" id="cnum" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">CVV</label>
                            <input type="text" name="cvv" id="cvv" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Expiry date</label>
                            <input type="text" name="exdate" id="exdate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Total Payable Amount</label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" name="cdate" id="cdate" class="form-control" readonly>
                        </div>
                        <input type="submit" value="Pay Now" name="btnPay" id="btnPay" class="btn btn-success btn-block btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="js/index.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>
