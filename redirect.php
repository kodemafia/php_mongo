<?php
include('include/config_mysql.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
//echo $user;
//echo $pass;
$user = mysql_real_escape_string($user); //User Name sent from Form
$pass = mysql_real_escape_string($pass); // Password sent from Form

$sel=mysql_query("SELECT * 
FROM  `user_info` 
WHERE firstname =  '$user'
AND password =  '$pass' AND status='1'");

$row=mysql_num_rows($sel);
echo $row;
  

  if($row==1)
  {

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("user");
//session_register("pass"); 
  	//$row1=mysql_fetch_array($sel);

     session_start();
  	$_SESSION['login_user']=$user;
  	
  	
//header("location:index1.php");
  header('location:calender.php');
}
else {
header('location:index.php?id=2');

}
?>