<?php
include_once('DeleteClass.class.php');

// create new object and establish mysql db connection
$con = new DeleteClass('localhost','root','','e_drug1');

// fetch user data
$result = $con->select_user();

// delete user record
if(isset($_GET['id']))
{
    $con->delete_user($_GET['id']);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Delete MySQL Row with Confirmation Message Example</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="path/to/bootstrap.css" type="text/css" />
    <script type="text/javascript">
    function delete_user(uid)
    {
        if (confirm('Are You Sure to Delete this Record?'))
        {
            window.location.href = 'index.php?id=' + uid;
        }
    }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table border="2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                    <th> Name</th>
                    <th>Phone Number</th>
                    <th>Email </th>
                 
                    <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
              
                foreach($result as $row) { ?>
                <tr>
                  
                    <td><?php echo $row[' username']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    <td class="text-center"><a href="javascript: delete_user(<?php echo $row['contact']; ?>)"><img src="images/delete_icon.png" alt="Delete" /></a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>