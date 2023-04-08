<?php
session_start();
require_once('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['username'] = $row['username'];
  $_SESSION['email'] = $row['email'];
  header("Location: profile.php");
} else {
  echo "Incorrect username or password.";
}
?>
