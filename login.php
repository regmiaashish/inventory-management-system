<?php
include "dbconnect.php";
session_start();
$name=$_POST['username'];
$password=$_POST['password'];
$query="SELECT  * FROM `signup` WHERE username='$name' and password_hash='$password'";

$result=mysqli_query($con,$query);
if($row=mysqli_fetch_array($result)){
	$_SESSION['username']=$name;
	header("location:menu.php");
}
else{
	die("login failed");
}

?>