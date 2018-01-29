<?php
  session_start();

  // $hosi_code = $_SESSION['coded'];
  // if (empty($_SESSION['hosp_id']))
  // {
  //   //header('location:user_login.php');

  // }

  // else
  // {
  //   $hospital_identity = $_SESSION['hosp_id']; 
  // }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Nyeri County E-Drug System</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="assets/js/modernizr.js"></script>
     
        <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  } );
  </script>




  <script type="text/javascript">
function display_c(){
var refresh=100; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date()
document.getElementById('ct').innerHTML = x;
tt=display_c();
}
</script>
  </head>

  <body   onload=display_ct();>

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
          <a class="navbar-brand" >Nyeri County E-Drug System.</a>
         
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="user_login.php">LOGOUT</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

  <div id="headerwrap">
      <div class="container">
      <div class="row">
      <div class="container-fluid">
    <div class="row">
  <div class="col-sm-2">
  <span id='ct' ></span>
  




  </div>

  <div class="col-sm-4">
    <form method="POST" action="index.php">
                        
                        <set >Today's Date:</set><input type="date" id="datepicker"  name='date' class="form-control" required placeholder="<?php echo date('d/m/Y'); ?>">   <br/><br/>

                         <set id="setters">Patient No :</set><input type="text" name="patients_no" placeholder="Enter Patient's Id Here" class="form-control" required> 
          
                       <br/><br/>
                       <set id="setters">Patient's Name :</set><input type="text" name="p_name" placeholder="Enter Patient's Name Here" class="form-control" required> 
                      
                       <br/><br/>
                        <set id="setters">Patient's Age:</set><input type="text" name="p_age" placeholder="Enter Patient's Age" class="form-control" required>
                    
                         <br/><br/>
                        <set id="setters">Address:</set><input type="text" name="p_address" placeholder="Enter Patient's Address" class="form-control" required> <br/><br/>

                        <?php
                            require('connection.php');
                            
                            $view = "SELECT * FROM disease";

                            $query=mysqli_query($connect,$view);

                            echo "<form method='POST' action='testchart.php'>";
                            echo "<fieldset>";
                            echo "<div class='form-control>
                            <set id='setters'>Patient's Disease <br/></set>
                            <select name='selected' id='drop' >";

                            while ($result=mysqli_fetch_array($query)) 
                              {

                                if ($result > 0)
                                {
                    
                                echo "
                                  <option value='$result[0]' id>$result[1]</option>
                                  ";
                                }

                                else
                                {

                                  echo "There are no any records";
                                }
                                
                                
                  }

                  echo "</select> </div><br/><br/>";
                    ?>
                        
                       <input  type="submit" value="Save" name="submit" class="btn btn-success">
                       <input type="reset" value="Reset" class="btn btn-success">
            </form>
  </div>

  <div class="col-sm-4">
    <?php
          require('connection.php');

          if (isset($_POST['submit']))
           {
            //$date = $_POST['date'];
            $patient_no = $_POST['patients_no'];
            $patient_name = $_POST['p_name'];
            $patient_age = $_POST['p_age'];
            $patient_address = $_POST['p_address'];
            $disease_id = $_POST['selected'];

            $_SESSION['dis_id'] = $disease_id;
            echo "<form method='POST' action='testchart.php'>";      
            //retriving drugs for a specific disease that has been selected........$disease_id
           $select = "SELECT drug_disease.drug_code,drug.drug_name FROM drug_disease inner join drug where drug.drug_code = drug_disease.drug_code and drug_disease.disease_id='$disease_id'";

            $query1 = mysqli_query($connect,$select);
            while ($result1 = mysqli_fetch_array($query1))
            {
                echo "<div class='checkbox inline'>";
                echo "<input type ='checkbox' name='drugs1[]' value='$result1[0]'>$result1[1]";
                // echo "<input type='number' name='amount[]' value='' >";
                echo "<hr/></div>";
            }
            echo "<input type='submit' value='Save Details' name='send'>";
            echo "</form>";
          

        if (isset($_POST['send']))
         {
           $p_drugs=$_POST['drugs1[]'];
           // $p_drug_Amount=$_POST['amount[]'];

           $insert = "INSERT INTO patientDetails (name,patientId,age,address) VALUES ('$patient_name','$patient_no','$patient_age','$patient_address')";

          $query = mysqli_query($connect, $insert);

           
           // foreach ($p_drugs as $value)
           // {

           //  $view_amount = "SELECT * FROM drug_record WHERE drug_code='$value' AND hospital_id = '$hospital_identity' ";
           //  $query = mysqli_query($connect , $view_amount);
           //  $result = mysqli_fetch_array($query);
  
           // $amount_rem = $result[2];


           //   $insert_patient_drugs = "INSERT INTO dispensed_drug (drug_code,drug_amount,hospital_id,disease_code) VALUES ('$value','$p_drug_Amount','$hosi_code','$disease_id')";
           //   $query_insert = mysqli_query($connect,$insert_patient_drugs);

           //   $amount = $amount_rem - $p_drug_Amount;

           //    $update_hospital_drugs = "UPDATE `drug_record` SET amount_remaining=$amount WHERE drug_code='ch12' AND hospital_id = 'HDK5289/20'";
           // }

           if ($query && $query_insert)
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
                            <h2>".$patient_name." has been successfully Saved</h2>
                          </header>
                          
                    </div>
                  </body>
                </html>";
                header("refresh:20; url='index.php'");
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
                    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700'  rel='stylesheet' type='text/css'>
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
              header("refresh:2;url='index.php'");
                }
         }

            
           }
            

   
?>
  </div>

  <div class="col-sm-2">
    
  </div>
</div>

      </div>
      </div>

        </div>

          
      </div>
    </div>
   </div> 
      </div><!-- /row -->
      </div> <!-- /container -->
  </div><!-- /headerwrap -->
   
     <div id="footerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>About</h4>
          <div class="hline-w">

          </div>
          <p>The System is developed and maintained by <br/>
            the 3 TechGurus</p>
        </div>
        <div class="col-lg-4">
          <h4>Social Links</h4>
          <div class="hline-w"></div>
          <p>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-tumblr"></i></a>
          </p>
        </div>
        <div class="col-lg-4">
          <h4>Address</h4>
          <div class="hline-w"></div>
          <p>
            PO BOX, 987,<br/>
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
