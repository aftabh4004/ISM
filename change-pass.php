<?php
	session_start();
if(!$_SESSION['username']){
		header('location:reset-pass.php');
	}

	include("connection.php");
	$mgs = '';
	
if(isset($_POST['update'])){
	$username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password']; 
	 $_SESSION['new-pass'] = $new_password;
	
	$new_pass_hash = password_hash($new_password, PASSWORD_DEFAULT);
	 
	$user_search = " SELECT * FROM users WHERE username = '$username' ";
	$query = mysqli_query($conn, $user_search);
	
	$user_count = mysqli_num_rows($query);
	if($user_count){
		$user_pass = mysqli_fetch_assoc($query);
		
		$db_pass = $user_pass['password'];
		//echo "$db_pass";
		$_SESSION['username'] = $user_pass['username'];
		
		$pass_decode = password_verify($current_password, $db_pass);
		//echo "$user_search";
		
		if($pass_decode){
            
            $sql = "UPDATE users SET password ='$new_pass_hash' WHERE username = '$username' ";

			if (mysqli_query($conn, $sql)) {
				//echo "Password Change successfully";
					session_destroy();
					$mgs = 'Password Change successfully Go to login';
				//header("location:success.php");
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}		
		}
		else{
			$mgs = 'Incorrect Password !!!';
		}
	}
	else{
		$mgs = 'Invalid User Name Please check it !!!';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>change-password</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_login.css">

</head>
<body>
<?php
    include('common/header.php');
?>
	<div class="container">
        <div class="form">
            <h1>Change Password</h1>
            <hr>
            <form action="" method="post">
                    <h2 style="background-color:#FFF; text-align:center"><b style="color:#F00;"><?php echo $mgs;?></b></h2>
                    <label><b>User Name</b></label>
					<input type="text" placeholder="Enter User Name" name="username" required>
                  
                    <label><b>Current Password</b></label>
                    <input type="text" placeholder="Enter Current Password" name="current_password" required>

                    <label><b>New Password</b></label>
                    <input type="text" placeholder="Enter New Password" name="new_password" required>
                    
                    <div class="clearfix">
                        
						<button type="submit" name="update" class="resetbtn">Change Password</button>
						<a href="login.php"><button type="button" class="loginbtn">Log In</button></a>
                    </div>
			</form>
    	</div>
    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>

</body>

</html>
