<!DOCTYPE html>
<html>
<head>
  <title>Profile update</title>
</head>
<body>


    <?php
    $link = mysqli_connect("localhost", "root", "", "e_drug1");

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     // Attempt update query execution

    $sql = "UPDATE adminlogin SET username='peterparker_new@mail.com' WHERE password='12345'";

    if(mysqli_query($link, $sql)){

        echo "Records were updated successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    // Close connection

    mysqli_close($link);

    ?>



</body>
</html>