<?php
    session_start();
    include("connection.php");
	$mgs = '';
    $sno = 0;

if(isset($_POST['add'])){
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

    $filename = $_FILES["filename"]["name"];
    $tempname = $_FILES["filename"]["tmp_name"];    
    $folder = "profile_pic/".$filename;
    move_uploaded_file($tempname, $folder);
	
    if(0){
			$mgs = "Title already exists !!! Please Choose different Title";            
    }
    else{
            $n=10;

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
        
            // $insertquery = "INSERT INTO posts (title, tagline, slug, content, author, filename) VALUES ('$title','$tagline','$slug', '$content', '$author', '$filename' )";

            $insertquery = "INSERT INTO posts (name, username, school, area, guide, paper1t, paper1l, paper2t, paper2l, paper3t, paper3l, filename) VALUES ('$name', '$username', '$school', '$interest', '$guide', '$ptitle1', '$plink1 ', '$ptitle2', '$plink2 ', '$ptitle3', '$plink3', '$filename')";
            $iquery = mysqli_query($conn, $insertquery);

            if($iquery){
					$mgs = "Added  Successfully.  !!!";
				   	header("location:profile.php");
            }
            else{
				$mgs = "Data not Inserted ";
           
            }
       // }
        //else{
		//	$mgs = "Passwords does not matched ";
        //}
    }
}
?>




<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Blog/add</title>
	<link rel="stylesheet" href="css/style.css"> 
    <script src="js/form_validation.js"  type="text/javascript"></script>
</head>

<body>
	<!-- Include Header -->
	<?php include('common/header.php'); ?>
    
   <h2>Create Your Profile</h2>
    
    <div class="contact_div" id="add_post">
    
        <div class="contact-container">
              <form action="" method="post" enctype="multipart/form-data" onsubmit="return validation()" class=
              "form_div">
                <div>
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name" placeholder="Enter name">
                </div>

                <div>
                    <label for="name">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Your Username">
                </div>

                <div>
                    <label for="school">Department/School</label><br>
                    <input type="text" id="school" name="school" placeholder="Enter Department">
                </div>

                <div>
                    <label for="interest">Area of interest</label><br>
                    <input type="text" id="interest" name="interest" placeholder="Your feild">
                </div>

                <div>
                 <label for="guide">Guide</label><br>
                 <input type="text" id="guide" name="guide" placeholder="Your Guide">
                </div>

                 
                 <h3>Last 3 Paper published</h3>
                 <div>
                    <h4>Papaer 1</h4><br>
                    <label for="ptitle1">Paper Title</label><br>
                    <input type="text" id="ptitle1" name="ptitle1" placeholder="Title">
                </div>

                
                <label for="plink1">link</label><br>
                 <input type="text" id="plink1" name="plink1" placeholder="link">
                 <div>
                    <h4>Papaer 2</h4><br>
                    <label for="ptitle2">Paper Title</label><br>
                    <input type="text" id="ptitle2" name="ptitle2" placeholder="Title">
                 </div>

                 <label for="plink2">link</label><br>
                 <input type="text" id="plink2" name="plink2" placeholder="link">


                 <div>
                    <h4>Papaer 3</h4><br>
                    <label for="ptitle3">Paper Title</label><br>
                    <input type="text" id="ptitle3" name="ptitle3" placeholder="Title">
                 </div>

                 <label for="plink3">link</label><br>
                 <input type="text" id="plink3" name="plink3" placeholder="link">
                 <div>

                 <h4>Profile photo</h4><br>
                 <input type="file" name="filename" value="" style="margin:2px; padding:8px"/>
                </div>
                 
                

                <input type="submit" name="add" value="Submit">
            
              </form>
        </div>
    </div>
 
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>
    
    
</body>
</html>
