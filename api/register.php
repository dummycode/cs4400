<?php
  $server = "127.0.0.1";
  $username = "root";
  $password = "password";
  $db = "bcn_museums";

  // Create connection
  $conn = mysqli_connect($server, $username, $password, $db);
  if (!$conn) {
    echo "Failed to connect to database";
  }

  $email = $_POST['email'];
  $password = $_POST['password'];
  $card_number = $_POST['card_number'];
  $exp_month = $_POST['exp_month'];
  $exp_year = $_POST['exp_year'];
  $security_number = $_POST['security_number'];

  $sql = "INSERT INTO User (id, email, password) VALUES (null, '" . $_POST['email'] . "', '" . $_POST['password'] . "')";
  if (mysqli_query($conn, $sql)) {
    echo "Good";
    setcookie('token', 'test', time() + (30), "/");
    header("Location: ../index.php");
    die();
  } else {
    echo "Failed query<br>" . mysqli_error($conn);
  }
?>
