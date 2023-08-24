<?php
session_start();

if(isset($_SESSION["userid"]) || isset($_COOKIE['user'])) { 
  require_once('function.php');
  $dashboard=new connect_DB();


  $username = $u_user = $u_pass = "";
  if (isset($_SESSION["username"])) {
    $username  = $_SESSION['username'];
  }
  if (isset($_COOKIE['user'])) {
    $username  = $_COOKIE['user'];
  } 

  $query="SELECT*FROM users  WHERE Username='$username'";

      $result= $dashboard->runBaseQuery($query);

      foreach ($result as $k => $v) 
      {
        $u_user = $result[$k]['Username'];
        $u_pass = $result[$k]['Password'];
      }



?> 


<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

   
    <title>Dashboard</title>
    <style>

 
  </style>

  </head>
  <body style="background-color:#e2e2e2">


    
<div class="container-fluid">
<div class="container">
  <div class="row" style="min-height: 100vh;">
    <div class="col-md-12">

      
	<div class="card p-4 mt-4">
      <h1 class="display-2">Sup, <strong><?php echo $u_user;?>?</strong></h1>
      <h2 class="fs-1">Welcome to your dashboard</h2>

	<div>
		<a href="logout.php" class="btn btn-danger">
        Logout
      </a>
    </div>
	 
  </div>
 
</div>

</div>

  </body>
</html>

<?php } else{
   header('location:login/logout.php');
  } 
?>

