<?php
session_start();

// Check if the user is not authenticated
if (isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<?php
include 'navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="offset-2 col-8">
            <div class="card mt-3" id="">
                <form action="" method="post" id="signUpForm">
                    <div class="card-header">
                        <h3 class="text-center">Sign-up Here</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Email id</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Create Password</label>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSignup" id="btnSignup" class="btn btn-dark" value="Sign-up" onclick="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="js/index.js"></script>
<script src="js/signup.js"></script>
</body>
</html>
