<?php include('connection.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Blog</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<!-- Include Header -->
	<?php include('common/header.php'); ?>
   
    
    
    <div class="max-width-1 m-auto"><hr></div>
    <div class="home-articles max-width-1 m-auto font2">
        
        <div class="row">

       
        <div class="home-articles max-width-1 m-auto font2" id="post_content">
        <h1 style="color:#C39; text-align:center;">Your Profile</h1>
        <?php
			$Show = mysqli_query($conn, "SELECT * FROM posts order by date");
			while($r = mysqli_fetch_array($Show)){ ?> 
			
		
        <div class="home-article">
            <div class="home-article-img">
            <td><img src="profile_pic/<?php echo $r['filename'];?>" /></td>
            </div>
            <div class="home-article-content font1">
            	
                <a href="post.php">
                    <h2 style="color:#C39"><?php echo $r['name']; ?></h2>
                    <h3 style="color:#C3C; margin:0"> <?php echo $r['username']; ?></h3>
                </a>
                <p style=" font-style:italic; margin:0;">Department Name: <span ><?php echo $r['school']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Area of interest : <span ><?php echo $r['area']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Guide: <span ><?php echo $r['guide']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Paper1 Title: <span ><?php echo $r['paper1t']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Paper1 Link: <span ><a href = "<?php echo $r['paper1l']; ?>"><?php echo $r['paper1l']; ?></a></span></p>
                <p style=" font-style:italic; margin:0;">Paper2 Title: <span ><?php echo $r['paper2t']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Paper2 Link: <span ><a href = "<?php echo $r['paper2l']; ?>"><?php echo $r['paper2l']; ?></a></span></p>
                <p style=" font-style:italic; margin:0;">Paper3 Link: <span ><?php echo $r['paper3t']; ?></span></p>
                <p style=" font-style:italic; margin:0;">Paper3 Link: <span ><a href = "<?php echo $r['paper3l']; ?>"><?php echo $r['paper3l']; ?></a></span></p>
                <p style=" font-style:italic; margin:0;">Date and Time: <span ><?php echo $r['date']; ?></span></p>

              
              

             
         
            </div>
        </div>
        <?php } ?>

    </div>
        
    </div>
    </div>
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>
</body>
</html>
