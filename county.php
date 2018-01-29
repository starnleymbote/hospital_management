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
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
            <li ><a href="admin.php"><i class="fa fa-dashboard" id="admin"></i>Admin's Panel</a></li>
            <li><a href="register_hospital.php"><i class="fa fa-edit"></i>Register Hospital</a></li>
            <li><a href="register_users.php"><i class="fa fa-edit"></i>Register Users</a></li>
            <li><a href="drug_update.php"><i class="fa fa-font"></i>Update drugs</a></li>
            <li class="active"><a href="#"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i>View Records<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="drug_list.php"><i class="fa fa-user"></i>Drug List</a></li>
                <li><a href="hospital_list.php"><i class="fa fa-plus"></i>Hospital List</a></li>
                <li class="active"><a href="drug_record.php"><i class="fa fa-plus"></i>Drug Record</a></li>
              </ul>
            </li>
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>Manage Records<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="manage_users.php"><i class="fa fa-user"></i>Manage Users</a></li>
                <li><a href="add_drug.php"><i class="fa fa-plus"></i>Add Drugs</a></li>
                <li><a href="disease.php"><i class="fa fa-plus"></i>Add Disease</a></li>
                <li><a href="#">Last Item</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">3</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">3 New Messages</li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">Peter Kimeli:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">Stanley:</span>
                    <span class="message">Tell me sir i will answer you...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">Susan:</span>
                    <span class="message">to ypour Speak team </span>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Peter Stan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
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

      <?php

        /* Your Database Name */
        $DB_NAME = 'e_drug1';

        /* Database Host */
        $DB_HOST = 'localhost';

        /* Your Database User Name and Passowrd */
        $DB_USER = 'root';
        //$DB_PASS = '123456';
        $DB_PASS = '';
          /* Establish the database connection */
          $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

          if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
          }


        $view = "SELECT * FROM hospital_registration";

        $query = mysqli_query($mysqli,$view);

        echo "<form method='POST' action=''>";
        echo "<fieldset>";
        echo "<legend id='tagname'>HOSPITAL LISTS </legend>
          <select name='selected' >";
        while ($result=mysqli_fetch_array($query)) 
          {

            if ($result > 0)
            {
              
            echo "
              <option value='$result[0]' id='dropdownHospital'>$result[1]</option>
              ";
             
            }

            else
            {

              echo "There are no any records";
            }
  
          }
      echo "</select>     <br/><br/>";
      echo "<input class="btn btn-default primaryAction" type='submit' name='submit' value='submit' id='submit_btn'>
            </fieldset>
            </form></div>";

            if (isset($_POST['submit']))
            {

              $hospital_code = $_POST['selected'];
              
              $select_hospital_name = "SELECT hospital_name FROM hospital_registration WHERE hospital_id = '$hospital_code'";
              $query_name = mysqli_query($mysqli,$select_hospital_name);

              $name = mysqli_fetch_assoc($query_name);
              $hospital_name = $name['hospital_name'];
              
              echo "<center>$hospital_name drug distribution</center>";


           /* select all the weekly tasks from the table googlechart */
           // The original code for selecting the array
          //$result = $mysqli->query("SELECT * FROM drug_record WHERE hospital_id = '$hospital_code' ");
          $result = $mysqli->query("SELECT * FROM drug_record INNER JOIN drug WHERE drug_record.drug_code = drug.drug_code AND hospital_id='$hospital_code'");
          $rows = array();
          $table = array();
          $table['cols'] = array(


            array('label' => 'drug_name', 'type' => 'string'),
            array('label' => 'amount_remaining', 'type' => 'number'),
            array('label' => 'delivered_amount', 'type' => 'number')

        );
            /* Extract the information from $result */
            foreach($result as $r) {

              $temp = array();

              // The following line will be used to slice the Pie chart

              $temp[] = array('v' => (string) $r['drug_name']); 

              // Values of the each slice

              $temp[] = array('v' => (int) $r['amount_remaining']);
              $temp[] = array('v' => (int) $r['delivered_amount']); 
          
               
              $rows[] = array('c' => $temp);
            }

        $table['rows'] = $rows;

        // convert data into JSON format
        $jsonTable = json_encode($table);
        //echo $jsonTable;
      }


?>

    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Correlation Between Drugs Amount  Remaining,Drugs Amount Used and The Drug Code',
          is3D: 'true',
           vAxis : {title:'Drug Amount'},
           hAxis :{title:'Drug Name'},
          width: 1100,
          height: 600
        };
      
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
