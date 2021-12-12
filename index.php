<?php include('connection.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SCIS</title>
	<link rel="stylesheet" href="css/style.css">
    
   
    
</head>

<body>
	<!-- Include Header -->
	<?php //include('common/header.php'); ?>
    <div class="top">
    <h1>
        <a style="text-decoration: none;" href="index.php"> SCIS Lab Members</a>
      
    </h1>
    </div>
    <div class="navbar">
        <ul>
        <li><a href="profile.php">My Profile</a></li>
            <li><a href="login.php">login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </div>
    
    <div class="hero_section">
         <div class="hero_text">
            <h1>Welcome to SCIS Lab</h1>
          
                     
            <div>
                <form action="">
                 <input type="text" id="search" name="search" style="text-align:center; font-size:24px; border-radius:100px;" placeholder="Find your peers" onkeyup="search_data(this.value)" onMouseMove="">
                </form>
            </div>
            <a href="#search" class="btn_dark">Search</a> 
        </div> 
       
       
    </div>
            
	
  <div class="home-articles max-width-1 m-auto font2" id="post_content">
        <h1 style="color:BLACK; text-align:center;">Scholar's profiles</h1>
        <?php
			$Show = mysqli_query($conn, "SELECT * FROM posts order by date");
			while($r = mysqli_fetch_array($Show)){ ?> 
			
		
        <div class="home-article">
            <div class="home-article-img">
                <img src="profile_pic/<?php echo $r['filename'];?>" style="width:75px; height:75px;" />     
            </div>
            <div class="home-article-content font1" style="margin:0; padding:15px">   
                <a href="post.php">
                    <h2 style="color:#C39; margin:0; padding:0 " ><?php echo $r['name']; ?></h2>
                    <h3 style="color:#C3C; margin-top:0">Department : <?php echo $r['school']; ?></h3>
                </a>
            	
                <!-- <p style="color:#00F; font-style:italic; margin:0;">Author Name:<span style="color:#3F6"><?php echo $r['author']; ?></span></p>
                <p>Date/Time: <span><?php echo $r['date']; ?></span></p>
                <div>Post By: <span style="color:#F90;">Admin</span></div>
                <i><?php echo $r['content'];?></i>     -->
            </div>
        </div>
        <?php } ?>

    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?> -->
    
    <!-- Ajax code for Searching  -->
     <script>
		function search_data(search){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (xhttp.readyState == 4 && xhttp.status == 200){
                    document.getElementById('post_content').innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "search_home_post.php?query=" + search, true);
            xhttp.send();
        }

	</script>
    
</body>
</html>
