<?php
	$connect=mysqli_connect('localhost','root','','e_drug1');

	if ($connect) 
	{
		echo "";
	}

	else
	{
		echo "Connection error".mysqli_connect_error($connect);
	}
	
?>