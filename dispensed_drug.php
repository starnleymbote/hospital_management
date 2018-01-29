<?php
  session_start();
	require('connection.php');

	if (isset($_POST['submit']))
	 {
		$date = $_POST['date'];
		$patient_no = $_POST['patients_no'];
		$patient_name = $_POST['p_name'];
		$patient_age = $_POST['p_age'];
		$patient_address = $_POST['p_address'];
    $disease_id = $_POST['selected'];

     $_SESSION['id'] = $disease_id;    
		//$insert = "INSERT INTO patientDetails (name,patientId,age,address) VALUES ('$patient_name','$patient_no','$patient_age','$patient_address')";

		//$query = mysqli_query($connect, $insert);

    //retriving drugs for a specific disease that has been selected
   $retrieve = "SELECT * FROM drug_disease WHERE disease_id='$disease_id";
   $query2 = mysqli_query($connect,$retrieve);

   while ($fetch = mysqli_fetch_array($query2))
        {
          echo "<input type='checkbox' name='disease' value='$fetch[0]'>$fetch[1]";
        }

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
                    <h2>".$patient_name."'s were successfully Saved</h2>
                  </header>
                  
            </div>
          </body>
        </html>";
        header("refresh:2; url='index.php'");
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
            <h2>".$patient_name."was not registered</h2>
          </header>
          
    </div>
  </body>
</html>".mysqli_error($connect);
header("refresh:100;url='index.php'");
 	}
  }
		

	 
?>