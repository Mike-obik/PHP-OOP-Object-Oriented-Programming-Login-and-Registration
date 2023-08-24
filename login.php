<?php
session_start();

require_once('function.php');
$log=new connect_DB();

if(isset($_SESSION["userid"]) || isset($_COOKIE['user'])) { 
  $username = $u_user = $u_pass = "";
  if (isset($_SESSION["username"])) {
    $username  = $_SESSION['username'];
  }
  if (isset($_COOKIE['user'])) {
    $username  = $_COOKIE['user'];
  }

  $query="SELECT*FROM users  WHERE Username='$username'";

      $result= $log->runBaseQuery($query);

      foreach ($result as $k => $v) 
      {
        $u_user = $result[$k]['Username'];
        $u_pass = $result[$k]['Password'];
      }
}

if(isset($_POST['signin']))
{

$username=$_POST['username'];
$pasword=sha1($_POST['password']);

$return=$log->signin($username,$pasword);
$num=mysqli_fetch_array($return);
if($num>0)
{
  $_SESSION['userid']=$num['id'];
  $_SESSION['username']=$username;


      if(!empty($_POST["remember"])) {

        setcookie ("user",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60), "/");

        setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60), "/");

      } else {

        if(isset($_COOKIE["user"])) {

          setcookie ("user","");

        }

        if(isset($_COOKIE["userpassword"])) {
          setcookie ("userpassword","");
          setcookie ("userpassword","");

        }

      }

echo "<script>window.location.href='dashboard.php'</script>";
}
else
{

echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>";
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
   
    <title>Login</title>
    <style>
	body{
		background-image:url('img/bg1.jpg');
	}
	
  </style>

  </head>
  <body>


  
<div class="container-fluid  ">
  <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4 p-5 bg-dark opacity-75 text-white fw-bolder border">

      <form action="" method="post" id="login" autocomplete="off">
        <div class="form-row">

          <h3> OOP PHP Login</h3>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="bi-person-fill fs-5"></i></span>
              </div>
              <input name="username" type="text" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3 w-100">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="bi-lock-fill fs-5"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1">
            </div>
          </div>

          <div class="col-6">
            <div class="form-group form-check text-left">
                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>  class="form-check-input" 
                id="remember_me">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

          </div>
          <div class="col-sm-12 pt-3 text-right">
               <p>Not registered? <a href="register.php">Register</a></p>
          </div>

          <div class="col-12">
            <button class="btn btn-primary" type="submit"  name="signin">Login</button>
          </div>

           
        </div>
       
       
      </form>
        
    </div>
  </div>
</div>
    
   

  </body>
</html>

