<?php

//echo "welcome to admin page";
// require('connection.php');

// if (isset($_POST['submit']))
// {
//   $mail=$_POST['email'];
//   $pass=$_POST['pass'];
//   $_SESSION['usename']=$mail;

//     $adminlogin ="SELECT * FROM login WHERE username='$mail' ";
//     $query=mysqli_query($connect,$adminlogin);
    
//     $rows=mysqli_num_rows($query);

//  if ( !empty($rows)) 
//    {
//        while ($results=mysqli_fetch_array($query))
//       {
//           $dbusermail = $results[0];
//           $dbpassword = $results[1];
//      //    echo "$dbusername";
//    		// echo "$dbpassword";
//        }  


//        if($mail==$dbusermail && ($pass==$dbpassword))
//       {
//          header('location:admin.php');

//       }

//       else if ($mail==$dbusermail && ($pass!==$dbpassword)) 
//       {

//       	   header('location:login.php');
//         echo "you password or username is incorrect";
//       	# code...
//       }

//       else if ($mail==!$dbusermail && ($pass==$dbpassword)) 
//       {

//       	   header('location:login.php');
//         echo "you password or username is incorrect";
//       	# code...
//       } 

// else 
//       {

//       	   header('location:login.php');
//         echo "you password or username is incorrect";
//       	# code...
//       }

      
      

      
//    }

















    // if (!empty($rows)) 
    // {
    //  while ($results=mysql_fetch_array($query)) 
    //  {
    //  	  $dbusermail = $results[0];
    //       $dbpassword = $results[1];
    //  }

    //  if ($mail==$dbusermail && $pass==$dbpassword) 
    //  {
    //  	header('location:admin.php');
    //  }

    //  else if ($mail==$dbusermail && $pass!==$dbpassword) 
    //  {
    //  	header('location:userauthentication.php')
    //  }

    //  else if ($mail!==$dbusermail && $pass==$dbpassword) 
    //  {
    //  	header('location:userauthentication.php')
    //  }
    	
    // 	else  ($mail!==$dbusermail && $pass!==$dbpassword) 
    //  {
    //  	header('location:userauthentication.php')
    //  }
    	
    	
    // }
}
?>