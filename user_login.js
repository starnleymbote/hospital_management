$(document).ready(function(){
	$('#user_login').on('submit', function(event){
            event.preventDefault();
            var email = $('#username').val();
             var password = $('#password').val();
             $.ajax({
                url:"userauth.php",
                type:"POST",
                data: {email:email,password:password},
                cache: false,
                beforeSend : function()
                { 
                 
                   $("#submit").val("logging in...please wait");
                   $("#loading").show();
                   
                  
                },
                success: function(data)

                {
                  var result=$.trim(data);
                  
                  if(result=='success')
                  {
                    //alert('You have successfully login ! Press ok to continue.');
                    $("body").load("index.php");
                    $("#login-error").fadeOut(3000);


                  }
                  else
                  {
                    alert("the username and password did not match the current records");
                    $("#submit").val("try again?...");
                    document.getElementById("login-error").innerHTML="<span class='text-danger'>INVALID USERNAME/PASSOWRD <br />please try again</span>";
                    $("#login-error").fadeOut(3000);
                    $("#login-error").fadeIn(3000);

                  }
                  $("#loading").fadeOut(3000);
                  
                }
              });
        });
	
});