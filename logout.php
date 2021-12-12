<?php
    session_start();
    session_destroy();
	setcookie('user_cookie', '', time()-86400); //User_cookie destroy
	setcookie('pass_cookie', '', time()-86400); //Pass_cookie destroy
    header('location:index.php');
?>
