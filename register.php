<?php
require_once('function.php');

$reg=new connect_DB();
if(isset($_POST['submit']))
{

$fullname=$_POST['fullname'];
$username=$_POST['username'];
$useremail=$_POST['email'];
$pasword=sha1($_POST['password']);

$sql=$reg->registration($fullname,$username,$useremail,$pasword);
  if($sql)
  {
 
  echo "<script>
	  alert('You have Registered successfully.');
	  </script>";
	  
  echo "<script>
	  window.location.href='login.php'
	  </script>";
  }
  else
  {
  
    echo "<script>
		alert('Something is not right. Please can you try again?');
		</script>";
	
    echo "<script>
		window.location.href='register.php'
		</script>";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>OOP PHP Registration</title>
  
  <style>
	body{
		background-image:url('img/bg1.jpg');
	}
	
  </style>

  <script>


function check_username()
{
 var user_name=document.getElementById( "username" ).value;
  
 if(user_name)
 {
    $.ajax({
    type: 'post',
    url: 'validate.php',
    data: {
     username:user_name,
    },
    success: function (response) {
     $( '#name_status' ).html(response);
     if(response=="Congrates, it is Available") 
     {
      $(".form-group span").addClass("text-success");
      return true;  
     }
     else
     {
      return false; 
     }
    }
    });
 }

 else
 {
  $('#name_status').html("");
  return false;
 }
}

function check_email()
{
 var useremail=document.getElementById( "email" ).value;
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'validate.php',
  data: {
   email:useremail,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="Congrates, it is Available") 
   {
    $(".form-group span").addClass("text-success");
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function check_everything()
{
 var namehtml=document.getElementById("name_status").innerHTML;
 var emailhtml=document.getElementById("email_status").innerHTML;

 if((namehtml && emailhtml)=="Congrates, it is Available")
 {
  $(".form-group span").addClass("text-success");
  return true;
 }
 else
 {
  return false;
 }
}

</script>
  </head>
  <body>

    <div class="container p-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 border p-5 bg-dark opacity-75 text-white fw-bolder">
          <form action="" method="post" id="login" onsubmit="return check_everything();">
          <h3> OOP PHP Registration</h3>

            <div class="form-group">
              <label for="fullname">Full Name</label>
              <input name="fullname" type="text"  class="form-control" 
              id="fullname" placeholder="" required="true">
            </div>

            <div class="form-group">
               <label for="username">User Name</label>
               <input type="text" id="username" name="username" onkeyup="check_username()" class="form-control"  required="true">
               <span id="name_status"></span>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" onkeyup="check_email()" placeholder="" class="form-control" required="true">
              <span id="email_status"></span>
            </div>

             
            <div class="form-group">
              <label for="password">Password</label>

               <input type="password"  id="password" name="password" placeholder="" class="form-control"  required="true">

             
             
            </div>
           
            <div class="col-sm-12 text-right mt-2">
               <button class="btn btn-primary" type="submit" id="submit" name="submit">Register</button>
            </div>

            <div class="col-md-12 text-right mt-2">
               <p>Already registered? <a href="login.php">Login</a></p>
            </div>


          </form>
        </div>
      </div>
    </div>
    
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
   
  </body>
</html>
