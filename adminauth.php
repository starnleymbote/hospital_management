<?php
session_start();
require('connection.php');
if (isset($_POST['submit']))
 {

  $mail=$_POST['email'];
  $pass=$_POST['pass'];
  $_SESSION['usename']=$mail;
    
    $adminlogin ="SELECT * FROM adminlogin WHERE username='$mail'";
    $query=mysqli_query($connect,$adminlogin);
    
   $rows=mysqli_num_rows($query);
   if (!empty($rows)) 
   {
       while ($results=mysqli_fetch_array($query))
      {
          $dbusermail = $results[0];
          $dbpassword = $results[1];

          $_SESSION['usermail'] = $dbusermail;

       }  

       if (($dbusermail !== $mail) && ($dbpassword !== $pass))
       {
         header('location:errorhandle.php');
       }

       else if (($dbusermail !== $mail) && ($dbpassword == $pass))
       {
           header('location:errorhandle.php');
       }
       
       else if (($dbusermail == $mail) && ($dbpassword !== $pass))
       {
           header('location:errorhandle.php');
       }

       else
       {
          //header('location:admin.php');
        header('location:admin.php');
       }
      
    }
}

 ?>
