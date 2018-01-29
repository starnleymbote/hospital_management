<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="stylesheet"href="bootstrap\css\bootstrap.min.css">
      <script src="bootstrap\js\jquery-1.12.3.min.js"></script>
      <script src="bootstrap\js\bootstrap.min.js "></script>
      <link rel="stylesheet" type="text/css" href="w3css/e_drugs.css">
      <link rel="stylesheet" type="text/css" href="w3css/w3.css">
      <style type="text/css">
  
  img#loading{
    display: none;
  }
</style>
<script>
function validateForm() {
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>
</head>
<body>
<div class="container-fluid">
  <div class="page-header">
      <center>
       <strong>
          <h2 id="title">E-DRUG MANAGEMENT SYSTEM</h2>
        </strong>
      <center>
  </div>

  <center>
            <h1>
                 <strong id="title">User Login</strong>
            </h1>
    </center>

    <div class="row">
      <div class="col-sm-4">
        
      </div>

      <div class="col-sm-4">
        <form method="POST" id="user_login" action="userauth.php">
        <div class="login-wrapper">
              <div class="box">
                  <div class="content-wrap">
                  <div id="login-error"></div>
                     Email: <input class="form-control" type="email" placeholder="Enter your email" name="username" id="username" required><br/>
                      Password: <input class="form-control" type="password" id="password" placeholder="********" name="password" required><br/>
                      <div class="action">
                          <input class="btn btn-success signup" type="submit" name="submit" value="submit" id="submit">
                          <img id="loading" src="Preloader_2.gif">
                      </div>              
                  </div>
              </div>
        </div>
      </form>
      </div>

      <div class="col-sm-4">
      	
      </div>

    </div>

</div>
<script type="text/javascript" src="user_login.js"></script>
</body>
</html>





