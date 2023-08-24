<?php
include_once('function.php');

$check_data=new connect_DB();

if(isset($_POST['username']))
{
 $username= $_POST["username"];		

	$sql=$check_data->usernameavailblty($username);
	$num=mysqli_num_rows($sql);

 if($num>0)
 {
  echo "<span class='text-danger'>
  Username Already Taken, Please Choose Another One
  </span>";
 }
 else
 {
  echo "<span class='text-success'>
  Congrates, it is Available
  </span>";
 }
 exit();
}

if(isset($_POST['email']))
{
 $email= $_POST["email"];
    
	$sql_Email=$check_data->uemailavailblty($email);

	$num2=mysqli_num_rows($sql_Email);

 if($num2>0)
 {
  echo "<span class='text-danger'>
  Email Already Taken, Please Choose Another One
  </span>";
 }
 else
 {
  echo "Congrates, it is Available";
 }
 exit();
}
?>