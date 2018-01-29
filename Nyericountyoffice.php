<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <title>Nyeri County Health System</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <script src="assets/js/modernizr.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Nyeri County E-DMS</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="Nyericountyoffice.php">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="user_login.hml">LOGOUT</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	
	
	

	 
	<!-- *****************************************************************************************************************
	 TESTIMONIALS
	 ***************************************************************************************************************** -->
	 <div id="twrap">
	 	<div class="container centered">
	 		<div class="row">
	 			<div class="col-lg-8 col-lg-offset-2">
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
      echo "<input class='btn btn-default primaryAction' type='submit' name='submit' value='submit' id='submit_btn'>
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
 

	 			</div>
	 		</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/twrap -->
	 
	<!-- *****************************************************************************************************************
	 OUR CLIENTS
	 ***************************************************************************************************************** -->
	 <div id="cwrap">
		 <div class="container">
		 	<div class="row centered">
			 	
		 	</div><! --/row -->
		 </div><! --/container -->
	 </div><! --/cwrap -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Nyeri County is located in Central and constitutes
6 constituencies (Tetu, Kieni, Mathira, Othaya,
Mukurwe-ini and Nyeri town)<br/>
Location: <br/>Located in central Kenya, it borders
Kirinyaga and Meru to the East, Laikipia to the North,
Nyandarua to the west and Muranga to the South.
Area (Km 2):<br/> 3,337 Km 2<br/>
Doctor to Population Ratio:<br/> 1:5,000</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="http://www.facebook.com/peter kimeli.16" target="_blank"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>ADDRESS</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				P.O BOX 987-<br/>
		 				23890, Nyeri,<br/>
		 				Kenya.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
  </body>
</html>
