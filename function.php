<?php
date_default_timezone_set("Africa/Lagos");
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'sample_php_web_project_oop');
class connect_DB
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;

if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}


public function usernameavailblty($username) {
	$result =mysqli_query($this->dbh,"SELECT Username FROM users WHERE Username='$username'");
	return $result;
}


public function uemailavailblty($email) {
	$result =mysqli_query($this->dbh,"SELECT UserEmail FROM users WHERE UserEmail='$email'");
	return $result;
}


public function registration($fullname,$username,$useremail,$pasword)
{
$return=mysqli_query($this->dbh,"insert into users(FullName,Username,UserEmail,Password) values('$fullname','$username','$useremail','$pasword')");
return $return;
}



public function signin($username,$pasword)
	{
	$result=mysqli_query($this->dbh,"select id,FullName from users where Username='$username' and Password='$pasword'");
	return $result;
	}

    function runBaseQuery($query) {
                $result = mysqli_query($this->dbh, $query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }       
                if(!empty($resultset)){
                return $resultset;
                }
    }
    
    function numRows($query) {
        $result  = mysqli_query($this->dbh, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;   
    }
    
    function executeQuery($query) {
        $result  = mysqli_query($this->dbh, $query);
        return $result; 
    }




    




}
?>