
<?php
  

//error_reporting(0);
require 'connection.php';
session_start();

$username = $_SESSION['user_name'];
$pass = $_SESSION['password'];
$sql="SELECT hospital_id FROM user_login WHERE email='$username' AND password='$pass'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['hospid'] = $row[0];




?>

