<?php
session_start();
require_once('connect.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password !== $confirm_password) {
  echo "Passwords do not match.";
  exit();
}

$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($conn, $query);

if($result) {
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $email;
  header("Location: profile.php");
} else {
  echo "Error: " . mysqli_error($conn);
}
?>
