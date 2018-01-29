<?php
	// require('connection.php');

 //  if (isset($_POST['submit']))
 //   {
 //      $mail = $_POST['username'];
 //      $password = $_POST['password'];

 //      $user_login = "SELECT * FROM user_login WHERE email = '$mail' AND password='$password'";
 //      $query = mysqli_query($connect, $user_login);

 //      $row = mysqli_num_rows($query);

 //      if (!empty($row))
 //       {
    
 //            while ($results=mysqli_fetch_array($query))
 //             {
 //                $dbusermail = $results[0];
 //                $dbpassword = $results[1];


 //                if ($dbusermail == $mail)
 //              {
 //                  if ($dbpassword == $password) 
 //                  {
 //                    echo "Welcome after succesfully login into the system";
 //                  }
 //              }

 //              if ($dbusermail == $mail)
 //              {
 //                  if ($dbpassword !== $password) 
 //                  {
 //                    echo "Error in login in......wrong password but correct username";
 //                  }

 //              }

 //              if ($dbusermail !== $mail)
 //              {
 //                  if  ($dbpassword == $password)
 //                  {
 //                    echo "Error in login in......wrong user mail but correct password";
 //                  }
 //              }

 //              if ($dbusermail !== $mail)
 //               {
 //                  if ($dbpassword !== $password)
 //                   {
 //                      echo "Error wrong user login...........wrong password but correct password";
 //                   }
 //               }

              

 //             } 

 //       }

 //       else
 //       {
 //          echo "Wrong login details..........................................................please check your login details and try again to login into the system";
 //       }
 //   }




error_reporting(0);
require 'connection.php';
session_start();
$user= $_POST["email"];
$pass=$_POST["password"];

$_SESSION['user_name'] = $user;
$_SESSION['password'] = $pass;

$sql="SELECT * FROM user_login WHERE email='$user' AND password='$pass'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);
if($count>=1)
{ 

  $_SESSION['name']=$row['name'];
  echo "success";
} 
else
{
  echo "failure";
}




?>