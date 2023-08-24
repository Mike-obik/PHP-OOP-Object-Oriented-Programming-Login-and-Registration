<?php
session_start();
$_SESSION["userid"] = "";

if(isset($_COOKIE['user']))
{
 setcookie ("user","",time()- (90 * 365 * 24 * 60 * 60), "/");
 setcookie("user", "");
}
session_destroy();
header("Location:login.php");
?> 