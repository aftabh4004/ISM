<?php
	session_start();
	include("connection.php");
	$_SESSION['gen_pass'] = "";
	$mgs = '';
	$pmgs = '';
	
//Random Password Generated
function password_generate($chars) 
{
	$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
	return substr(str_shuffle($data), 0, $chars);
}
if(isset($_POST['update'])){
	header("location:change-pass.php");
}
	
if(isset($_POST['reset'])){
	$username = $_POST['username'];
	$mobile_no = $_POST['mobile_no']; 
	
	//echo "$mobile_no";
	 
	$user_search = " SELECT * FROM users WHERE username = '$username' ";
	$query = mysqli_query($conn, $user_search);
	
	$user_count = mysqli_num_rows($query);
	if($user_count){
		$user_pass = mysqli_fetch_assoc($query);
		$_SESSION['username'] = $username;
		
		$db_mob = $user_pass['mobile_no'];
		
		if($mobile_no === $db_mob){
            $gen_pass = password_generate(8);
			//echo "You Successfully reset your password. Your new password is:  ";
			//echo $gen_pass;
			$_SESSION['gen_pass'] = $gen_pass;
			
			// Convert to hash password
			$hash_pass = password_hash($gen_pass, PASSWORD_DEFAULT);
			
			//Random Password store in database I mean Update. 
			$sql = "UPDATE users SET password ='$hash_pass' WHERE username = '$username' ";

			if (mysqli_query($conn, $sql)) {
				$mgs = "Password Reset Successfully";
                $pmgs = "Your Reset Password is";
                //$mgs = "Now You can create New Password"; 
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
		else{
			$mgs = "Invalid Mobile Number";
		}
	}
	else{
		$mgs = "Invalid User Name";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>reset-password</title>
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    include('common/header.php');
?>
	<div class="container">
        <div class="form">
            <h1>Reset Password</h1>
            <hr>
            <h2 style="background-color:#FFF; text-align:center"><b style="color:#F00;"><?php echo $mgs;?></b></h2>
                <div class="clearfix">
                    <label style="background-color:#0F0">
                    	<span>
                        	<?php echo $pmgs;?>
                            	
                            <b style=" background:#FF0;color:#F00; font-size:24px;">
								<?php echo $_SESSION['gen_pass']?>
                       		 </b>
                        </span>	
                    </label>
                </div>
            <form action="" method="post">
                
                    <label><b>User Name</b></label>
                    <input type="text" placeholder="Enter Username" name="username">
        
                    <label><b>Mobile Number</b></label>
                    <input type="text" placeholder="Enter Mobile Number" name="mobile_no">

					
                    <div class="clearfix">
                        <button type="submit" name="reset" class="resetbtn">Reset</button>
                        <button type="submit" name="update" class="loginbtn">Change Password</button>
                    </div>
			</form>
    	</div>
    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>

</body>

</html>
