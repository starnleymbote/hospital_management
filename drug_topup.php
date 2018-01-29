<?php
  session_start();

  if (empty($_SESSION['usermail'])) 
  {
    header('location:login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/fonts/glyphicons-halflings-regular.ttf">
    <script src="bootstrap/js/jquery-1.12.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="w3css/e-drugs.css">
    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="admin_tag">E-DRUG MANAGEMENT SYSTEM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="admin.php"><i class="fa fa-dashboard" id="admin"></i>Admin's Panel</a></li>
            <li><a href="register_hospital.php"><i class="fa fa-edit"></i>Register Hospital</a></li>
            <li><a href="register_users.php"><i class="fa fa-edit"></i>Register Users</a></li>
            <li><a href="drug_update.php"><i class="fa fa-font"></i>Update drugs</a></li>
            <li><a href="charts.php"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i>View Records<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="drug_list.php"><i class="fa fa-user"></i>Drug List</a></li>
                <li><a href="hospital_list.php"><i class="fa fa-plus"></i>Hospital List</a></li>
                <li class="active"><a href="#"><i class="fa fa-plus"></i>Drug Record</a></li>

              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>Manage Records<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="manage_users.php"><i class="fa fa-user"></i>Manage Users</a></li>
                <li><a href="add_drug.php"><i class="fa fa-plus"></i>Add Drugs</a></li>
                <li><a href="disease.php"><i class="fa fa-plus"></i>Add Disease</a></li>
                 <li><a href="add_drug2_hospital.php">Save Drugs</a></li>
                
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">3 New Messages</li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                <li class="divider"></li>
                <li><a href="#">View All</a></li>
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
              <?php
              require('connection.php');
                $view = "SELECT * FROM adminlogin";
                        $query=mysqli_query($connect,$view);
                              while ($result=mysqli_fetch_array($query)) 
                                {
                                  if ($result > 0)
                                  {
                                    echo "
                                   $result[0]"; 
                                  }

                                  else
                                  {

                                    echo "There are no any records";
                                  }
                        
                                }
                                  mysqli_close($connect);
               ?>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
       
      <div class="container">
      <div class="row">
          <div class="col-sm-2">
	           <?php
	           		require('connection.php');
	           		// session_start(); //starting the session

					$drug_code = $_GET['drug_code'];
					$hospital_code = $_SESSION['hospital_code'];

					$select_hospital_name = "SELECT Hospital_name FROM hospital_registration WHERE hospital_id = '$hospital_code' ";
					$query = mysqli_query($connect , $select_hospital_name);
					$response = mysqli_fetch_assoc($query);
					$hospital_name = $response['Hospital_name']; 

					$select_drug_name = "SELECT drug_name FROM drug WHERE drug_code = '$drug_code' ";
					$query2 = mysqli_query($connect , $select_drug_name);
					$response2 = mysqli_fetch_assoc($query2);
					$drug_name = $response2['drug_name']; 

					$select_drug_current_amount = "SELECT amount_remaining FROM drug_record WHERE drug_code = '$drug_code' AND hospital_id = '$hospital_code' ";
					$query3 = mysqli_query($connect,$select_drug_current_amount);
					$response3 = mysqli_fetch_assoc($query3);
					$current_amount = $response3['amount_remaining'];

          $_GET['hospital_id'] = $hospital_code;
          $_GET['drug_id'] = $drug_code;

					
				?>
          </div>
          <div class="col-sm-6">
            <form method="POST" action="">
              <div class="login-wrapper">
                    <div class="box">
                        <div class="content-wrap">
                        <star id="star">Add a drug for :</star><br/><br/>
                          <star id="star">Hospital Name: </star><input class="form-control" type="text"  value=<?php echo $hospital_name;?> disabled ><br/><br/>

                           <star id="star">Drug Name : </star><input class="form-control" value=<?php echo $drug_name;?> disabled ><br/>

                           <star id="star">Current Drug Amount : </star><input class="form-control" value=<?php echo $current_amount;?> disabled><br/>

                           <star id="star">Update Drug Amount :</star><input class="form-control" type="text" placeholder="Update Amount" name="drug_update" required><br/>
                            <div class="action">

                            <button class="btn btn-success signup" name="update" id="userbtn">Update</button>
                            </div>              
                        </div>
                    </div>
              </div>
           </form>
          </div>
      <div class="col-sm-4">
        <?php

            require('connection.php');

            $drug_code = $_GET['drug_id'];
            $hospital_code = $_GET['hospital_id'];

            if (isset($_POST['update'])) 
            {
                $drug_update=$_POST['drug_update'];

                $new_drug_amount = $current_amount + $drug_update;

               $amount_update = "UPDATE `drug_record` SET `delivered_amount`='$drug_update',`amount_remaining`= '$new_drug_amount' WHERE drug_code='$drug_code' AND hospital_id='$hospital_code'";

                $query_drug_amount = mysqli_query($connect,$amount_update);

                if ($query_drug_amount)
                 {
                    echo $drug_name." has been updated to the new amount ".$amount_update;
                 }

                 else
                 {
                   echo "Drug update failed".mysqli_error($connect);
                 }
            }



        ?>
        
      </div>
        
      </div>
        
      </div>
     

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>