<?php
  session_start();

  $hosi_code = $_SESSION['coded'];
  $hospital_identity = $_SESSION['hosp_id'];
  $disease_id =$_SESSION['dis_id'];
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

  <!-- *****************************************************************************************************************
   HEADERWRAP
   ***************************************************************************************************************** -->
  <div id="headerwrap">
      <div class="container">
      <div class="row">
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-8">


      <?php  
            require('connection.php');
              // session_start();
             if (isset($_POST['Save']))
             {
             $p_drugs = $_POST['amount'];
             $mimi = $_SESSION['wewe'];

             foreach ($p_drugs as $value)
           {

            $view_amount = "SELECT * FROM drug_record WHERE drug_code='$value' AND hospital_id = '$hospital_identity' ";
            $query = mysqli_query($connect , $view_amount);
            $result = mysqli_fetch_array($query);
  
           $amount_rem = $result[2];


             // $insert_patient_drugs = "INSERT INTO dispensed_drug (drug_code,drug_amount,hospital_id,disease_code) VALUES ('$value','$p_drug_Amount','$hosi_code','$disease_id')";
             // $query_insert = mysqli_query($connect,$insert_patient_drugs);

             // $amount = $amount_rem - $p_drug_Amount;

              // $update_hospital_drugs = "UPDATE `drug_record` SET amount_remaining=$amount WHERE drug_code='ch12' AND hospital_id = '$hospital_identity'";
           }
              
            
               foreach (array_combine($mimi, $p_drugs) as $value => $key)
               {
                    $view_amount = "SELECT amount_remaining FROM drug_record WHERE drug_code='$value' AND hospital_id = '$hospital_identity' ";
                    $query_update = mysqli_query($connect , $view_amount);
                    $result = mysqli_fetch_array($query_update);
          
                   $amount_rem = $result[2];
                   $amount = $amount_rem - $key;

                   $update_hospital_drugs = "UPDATE `drug_record` SET amount_remaining=$amount WHERE drug_code='$value' AND hospital_id = '$hospital_identity'";
                
                  $insert_patient_drugs = "INSERT INTO dispensed_drug (drug_code,drug_amount,hospital_id,disease_code) VALUES ('$value','$key','$hospital_identity','$disease_id')";
                      $query_insert = mysqli_query($connect,$insert_patient_drugs);
               }

               if ($query_update && $query_insert)
               {
                 echo "Success ";
               }

               else
               {
                echo "error in saving the drug".mysqli_error($connect);
               }
      
          
}

?>

<!-- the code for tab ends at this point -->

      </div>
      <div class="col-lg-2">
        peter
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
