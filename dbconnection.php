<?php 

function connect()
{
 	 $conn = new mysqli("localhost","Ramim","1234","wtm"); // host, user, user pass, database name.
	 if($conn->connect_errno)
	 {
	 	die ("Connection failed due to ". $conn->connect_error);
	 }
	 
	 

	 return $conn;
	}
?>