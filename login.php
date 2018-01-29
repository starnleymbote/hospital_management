<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/styles.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery-1.12.3.min.js"></script>
  <link rel="stylesheet" href="w3css/w3.css">
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="may.css"> -->

    
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <center><h1> Admin</h1></center>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
		<form method="POST" action="adminauth.php">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			            
			               Username: <input class="form-control" type="text" placeholder="E-mail" name="email" required><br/>
			                Password: <input class="form-control" type="password" placeholder="Password" name="pass" required><br/>
			                <div class="action">
			                    <button class="btn btn-warning signup" name="submit" value="" style="width: 100px;height: 40px">Login</button>

			                </div> 
			                             
			            </div>
			        </div>

		
			    </div>
			  </div>
			</form>
		</div>
	</div>
   

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
