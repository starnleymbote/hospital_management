<?php
require('connection.php');
if (isset($_POST['submit'])) 
{
	$hospitalId=$_POST['HospitalId'];
	$hospitalName=$_POST['HospitalName'];
	
	
$insertion="INSERT INTO hospital_registration(Hospital_id,Hospital_name) VALUES ('$hospitalId','$hospitalName')";

	$query=mysqli_query($connect, $insertion);
	if ($query) 
	{
		echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>  
        <meta name='description' content='>
        <meta name='author' content='templatemo'>
        <!-- 
        Visual Admin Template
        http://www.templatemo.com/preview/templatemo_455_visual_admin
        -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
      <link href='css/font-awesome.min.css' rel='stylesheet'>
      <link href='css/bootstrap.min.css' rel='stylesheet'>
      <link href='css/templatemo-style.css' rel='stylesheet'>
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
      <![endif]-->
  </head>
  <body class='light-gray-bg'>
    <div class='templatemo-content-widget templatemo-login-widget white-bg'>
      <header class='text-center'>
            <img src='images/success.png' height='100' width='100'>
            <h2>".$hospitalName."hospital was successfully registered</h2>
          </header>
          
    </div>
  </body>
</html>";
header("refresh:2; url='register_hospital.php'");
	}

	else
	{
		    echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>  
        <meta name='description' content='>
        <meta name='author' content='templatemo'>
        <!-- 
        Visual Admin Template
        http://www.templatemo.com/preview/templatemo_455_visual_admin
        -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
      <link href='css/font-awesome.min.css' rel='stylesheet'>
      <link href='css/bootstrap.min.css' rel='stylesheet'>
      <link href='css/templatemo-style.css' rel='stylesheet'>
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
      <![endif]-->
  </head>
  <body class='light-gray-bg'>
    <div class='templatemo-content-widget templatemo-login-widget white-bg'>
      <header class='text-center'>
            <img src='images/logo.jpg' height='100' width='100'>
            <h2>".$hospitalName."was not registered</h2>
          </header>
          
    </div>
  </body>
</html>".mysqli_error($connect);
header("refresh:3;url='register_hospital.php'");
	}
}

?>