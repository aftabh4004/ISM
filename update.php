<?php
	include("connection.php");
    session_start();
if(!$_SESSION['username']){
		header('location:login.php');
	}

    
	$mgs = '';
	
	$id = $_GET['sno'];
	$show_query = "SELECT * FROM posts WHERE sno = '$id' ";
	$show_data = mysqli_query($conn, $show_query);
	$arr_data = mysqli_fetch_array($show_data);
	
if(isset($_POST['update'])){
    $sno = $_GET['sno'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $school = $_POST['school'];
    $interest = $_POST['interest'];
    $guide = $_POST['guide'];
	$ptitle1 = $_POST['ptitle1'] ;
    $plink1 = $_POST['plink1'] ;

    $ptitle2 = $_POST['ptitle2'] ;
    $plink2 = $_POST['plink2'] ;

    $ptitle3 = $_POST['ptitle3'] ;
    $plink3 = $_POST['plink3'] ;

    
	
    
    $update = "UPDATE posts SET sno = $sno, name = '$name', username = '$username' , school = '$school', area = '$interest' , guide = '$guide', paper1t = '$ptitle1' , paper1l = '$plink1',  paper2t = '$ptitle2' , paper2l = '$plink2', paper3t = '$ptitle3', paper3l = '$plink3'  WHERE sno = $sno"; 
	$query = mysqli_query($conn, $update);
	if($query){
		header('location:profile.php');
		$mgs = 'Updated..............';
	}
	else{
		$mgs = 'Not Updated..............';
		

	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Blog/update</title>
	<link rel="stylesheet" href="css/style.css">
    <script src="js/form_validation.js"  type="text/javascript"></script>
</head>

<body>
	<!-- Include Header -->
	<?php include('common/header.php'); ?>
    <h2>Update Profile</h2>
  
    <div class="contact_div">
    
        <div class="contact-container">
              <form action="" method="post" onsubmit="return validation()">
              <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter name" value="<?php echo $arr_data['name']; ?>">
                </div>

                <div>
                    <label for="name">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your Username" value="<?php echo $arr_data['username']; ?>">
                </div>

                <div>
                    <label for="school">Department/School</label>
                    <input type="text" id="school" name="school" placeholder="Enter Department" value="<?php echo $arr_data['school']; ?>">
                </div>

                <div>
                    <label for="interest">Area of interest</label>
                    <input type="text" id="interest" name="interest" placeholder="Your feild" value="<?php echo $arr_data['area']; ?>">
                </div>

                <div>
                 <label for="guide">Guide</label>
                 <input type="text" id="guide" name="guide" placeholder="Your Guide" value="<?php echo $arr_data['guide']; ?>">
                </div>

                 
                 <h3>Last 3 Paper published</h3>
                 <div>
                    <h4>Papaer 1</h4>
                    <label for="ptitle1">Paper Title</label>
                    <input type="text" id="ptitle1" name="ptitle1" placeholder="Title" value="<?php echo $arr_data['paper1t']; ?>">
                </div>

                
                <label for="plink1">link</label>
                 <input type="text" id="plink1" name="plink1" placeholder="link" value="<?php echo $arr_data['paper1l']; ?>">
                 <div>
                    <h4>Papaer 2</h4>
                    <label for="ptitle2">Paper Title</label>
                    <input type="text" id="ptitle2" name="ptitle2" placeholder="Title" value="<?php echo $arr_data['paper2t']; ?>">
                 </div>

                 <label for="plink2">link</label>
                 <input type="text" id="plink2" name="plink2" placeholder="link" value="<?php echo $arr_data['paper2l']; ?>">


                 <div>
                    <h4>Papaer 3</h4>
                    <label for="ptitle3">Paper Title</label>
                    <input type="text" id="ptitle3" name="ptitle3" placeholder="Title" value="<?php echo $arr_data['paper3t']; ?>">
                 </div>

                 <label for="plink3">link</label>
                 <input type="text" id="plink3" name="plink3" placeholder="link" value="<?php echo $arr_data['paper3l']; ?>">
               
                 
                <input type="submit" name="update" value="Update">
            
              </form>
        </div>
    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>
    
</body>
</html>
