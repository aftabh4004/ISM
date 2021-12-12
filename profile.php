<?php include('connection.php'); 
$username = "";
session_start();
if(!$_SESSION['username']){
		header('location:login.php');
	}
    else
        $username = $_SESSION['username'];
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Blog</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">

    <style>
        table {
		width:100%;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        }
        th{
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
            
        }
        td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        }

        tr:nth-child(odd) {
        background-color: #dddddd;
        }
        .button{
        border: none;
        color: white;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
        .button_edit{
            background-color: #3333ff;
        }
        .button_delete{
            background-color: #cc0000; 
        }
        .button_add{
            background-color:#33cc33;
        }
    </style>

</head>

<body>
	<!-- Include Header -->
	<?php //include('common/header.php'); ?>
    <div class="top">
    <h1>
    <a href="index.php"> SCIS Lab Members</a>
    </h1>
    </div>
    <div class="navbar">
        <ul>
        <li><a href="profile.php">My Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a><span style="color:#FF0;"><?php echo $_SESSION['username']?></span></a></li>
        </ul>
    </div>
    
    
  
     <!-- Include Middle -->
     <div class="max-width-1 m-auto"><hr></div>
    <div class="home-articles max-width-1 m-auto font2">
        
        <div class="row">
       
       
        <div class="home-articles max-width-1 m-auto font2" id="post_content">
        <h1 style="color:#C39; text-align:center;">Your Profile</h1>
        <?php
			$Show = mysqli_query($conn, "SELECT * FROM posts WHERE username = '$username'");
			while($r = mysqli_fetch_array($Show)){ ?> 
			 <a href="update.php?sno=<?php echo $r['sno']; ?>"><button class="button button_edit">Update Profile</button></a>
		
        <div class="home-article">
            <div class="home-article-img">
            <td><img src="profile_pic/<?php echo $r['filename'];?>" /></td>
            </div>
            <div class="home-article-content font1">
            	
                <a href="post.php">
                    <h2 style="color:#C39"><?php echo $r['name']; ?></h2>
                </a>
                <p>Schoo/Department:<span><?php echo $r['school']; ?></span></p>
                <p>Working in the feild:<span><?php echo $r['area']; ?></span></p>
                <p>Under the guidence of:<span><?php echo $r['guide']; ?></span></p>
                <h4>Paper published</h4>

                <h5>Paper 1</h5>
                <p>Title:<span><?php echo $r['paper1t']; ?></span></p>
                <p>Link:<span><a href = "<?php echo $r['paper1l']; ?>"><?php echo $r['paper1l']; ?></a></span></p>

                
              
                <h5>Paper 2</h5>
                <p>Title:<span><?php echo $r['paper2t']; ?></span></p>
                <p>Link:<span><a href = "<?php echo $r['paper1l']; ?>"><?php echo $r['paper1l']; ?></a></span></p>

                
                <h5>Paper 3</h5>
                <p>Title:<span><?php echo $r['paper2t']; ?></span></p>
                <p>Link:<span><a href = "<?php echo $r['paper2l']; ?>"><?php echo $r['paper2l']; ?></a></span></p>
               

            </div>
        </div>
        <?php } ?>

    </div>
        
    </div>
    </div>
     <!-- <div class="contact_div">
        <table id="post">
            <tr>
                <th colspan="2"><a href="eit.php"><button class="button button_add">Add profile</button></a></th>
                
                
                
            </tr>
            <tr>
                <th>Serial No</th>
                <th>Title</th>
                <th>Tagline</th>
                <th>Date/Time</th>
                <th>Profile Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
             <?php
			$Show = mysqli_query($conn, "SELECT * FROM posts order by date");
			while($r = mysqli_fetch_array($Show)){ ?> 
            <tr>
                <td><?php echo $r['sno']; ?></td>
                <td><?php echo $r['title']; ?></td>
                <td><?php echo $r['tagline']; ?></td>
                <td><?php echo $r['date']; ?></td>
                <td><img src="profile_pic/<?php echo $r['filename'];?>" style="width:100px; height:100;" /></td>
                
                <td><a href="update.php?sno=<?php echo $r['sno']; ?>"><button class="button button_edit">Update</button></a></td>
                <td><a href="delete.php?sno=<?php echo $r['sno']; ?>"><button class="button button_delete">Delete</button></a></td>
            </tr>
            <?php } ?>
           
        </table>
 
    </div> -->
    
    <!-- Ajax code for Searching  -->
    <script>
		function search_data(search){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (xhttp.readyState == 4 && xhttp.status == 200){
                    document.getElementById('post').innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "search_dash_post.php?query=" + search, true);
            xhttp.send();
        }

	</script>
    
    
    <!-- Include Foooter -->
    <?php include('common/footer.php'); ?>
    
</body>
</html>
