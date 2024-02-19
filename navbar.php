<?php
// Start a session if one is not already active
if (session_status() == PHP_SESSION_NONE) {
  session_start();
} else {

if (!isset($_SESSION['user_id'])) {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    Shopping Cart Application
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_up.php">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_in.php">Signin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart <span id="totalCartCount">0</span></a>
      </li>
    </ul>
  </div>
</nav>
<?php
} else {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboad.php">
    Shopping Cart Application
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboad.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_out.php">Signout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">My Cart <span id="totalCartCount">0</span></a>
      </li>
    </ul>
  </div>
</nav>
<?php
} }
?>
