<?php

$server="localhost";
$username="root";
$password="";
$db="ncc_2080";
try{
    $con=new PDO("mysql:host=$server;dbname=$db",$username,$password);
     //creating the prepared statement
 	//binding  parameters
 	//executing query
 	$username="textuser";
 	$password="12234";
 	$Status="active";
 	$query=$con->prepare("INSERT INTO `signup`( `Name`, `Status`, `password`) VALUES (?,?,?)");
 	$query->bindParam(1,$username);
 	$query->bindParam(2, $Status );
    $query->bindParam(3,$password);
    $query->execute();
    }
    catch(Exception $ex){
    	die($ex->getMessage());
    }
    

?>