<?php
session_start();

if (isset($_POST['login'])) {

  include('../partials/connect.php');



  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * from customers Where username='$email'";
  $results = $connect->query($sql);
  $final = $results->fetch_assoc();

  $_SESSION['email'] = $final['username'];
  $_SESSION['password'] = $final['password'];
  $_SESSION['username'] = $final['username'];
  $_SESSION['customerid'] = $final['id'];

  if (password_verify($password, $final['password'])) {
    header('location: ../cart.php');
  } else {

    echo "<script> alert('Credentials are wrong');
        window.location.href='../customerforms.php';
        </script>";
  }
}
?>