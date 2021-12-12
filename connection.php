<?php
	$servername = "localhost";
	$username = "root";
	$userpassword = "";
	$dbname = "ism";
	
	$conn = mysqli_connect($servername, $username, $userpassword, $dbname);
	
	if($conn){
		//echo 'Connection Successfull';
	}
	else{
		die("Connection failed because".mysqli_connect_error());
		echo "<script>alert('Does not Connect to data base')</script>";
	}
	
?>