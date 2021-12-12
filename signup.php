<?php
    session_start();

    include("connection.php");
	$mgs = '';
    
if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);  
	
    $pass = password_hash($password, PASSWORD_DEFAULT);

    $userquery = "SELECT * FROM users WHERE username = '$username'";
	
    $query = mysqli_query($conn, $userquery);

    $usercount = mysqli_num_rows($query);

    if($usercount>0){
			$mgs = "User Name already exists !!! Please Choose different Username";            
    }
    else{
        if($password === $confirm_password){
            $insertquery = "INSERT INTO users (username, name,  password, mobile_no) VALUES ('$username', '$name', '$pass','$mobile_no')";

            $iquery = mysqli_query($conn, $insertquery);

            if($iquery){
					$mgs = "You have been Register Successfully. Please Login !!!";
                    header("location:edit.php");
				   
            }
            else{
				$mgs = "Data not Inserted ";
           
            }
        }
        else{
			$mgs = "Passwords does not matched ";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>registation-form</title>
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php
    	include('common/header.php');
	?>
	<div class="container" style="margin:0px">
    
        <div class="form"  >
            <h1>Registration Form</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"  >
            		
            <label style="background-color:#F33"><b style="color:#00F; font-size:20px"><?php echo $mgs; ?></b></label>
                	<hr>
                    <div>
                    <label><b>Username</b></label><br>
                    <input type="text" placeholder="Enter Username" name="username" required style="margin:2px; padding:8px">
                    </div>
                    <div>
                    <label><b>Name</b></label><br>
                    <input style="margin:2px; padding: 8px" type="text" placeholder="Enter Username" name="name" required>
                    </div>
                    <div>
                    <label><b>Password</b></label><br>
                    <input style="margin:2px; padding:8px; width:50%"  type="password" placeholder="Enter Password" name="password" required>
                    </div>
                    <div>
                    <label><b>Confirm Password</b></label><br>
                    <input style="margin:2px; padding:8px; width:50%" type="password" placeholder="Confirm Password" name="confirm_password" required>
                    </div>
                    <div>
                    <label><b>Mobile Number</b></label><br>
                    <input style="margin:2px; padding:8px"  type="text" placeholder="Enter Mobile Number" name="mobile_no" required>
                    </div>
                    <p>Forgot Password <a href="reset-pass.php">Click here</a>.</p>
        
                    <div class="clearfix">
                        
                        <button type="submit" name="signup" class="signupbtn">Sign Up</button>
                    </div>
		
			</form>
    	</div>
    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>

</body>

</html>
