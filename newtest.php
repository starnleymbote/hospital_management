<?php
	require('connection.php');
	$view_amount = "SELECT amount_remaining FROM drug_record WHERE drug_code='PM03ALB003' AND hospital_id = 'HDK5289/20' ";
     $query_update = mysqli_query($connect , $view_amount);
     $result = mysqli_fetch_array($query_update);
     echo $result[0];


      $amount = $result[0] - 1200;
     // echo "string".$amount_rem;
     echo "the balnce is ".$amount;

     //$update_hospital_drugs = "UPDATE `drug_record` SET amount_remaining=$amount WHERE drug_code='$value' AND hospital_id = 'A585H'";
?>