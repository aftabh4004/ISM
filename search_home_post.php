<?php
include('connection.php');
$mgs = "";
$input= $_REQUEST["query"];
$query = "SELECT * FROM posts where name like '%$input%'";
$result = mysqli_query($conn, $query);
$input = '';
$row = mysqli_num_rows($result);

if ($row > 0){
	?>
	 <div class="home-articles max-width-1 m-auto font2" id="#search">
        <h1 style="color:#C39; text-align:center;">Scholar's profiles</h1>
     
	<?php	
    while($r = mysqli_fetch_assoc($result)){?>
      
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
            </div>
         <?php
	}
    ?>

<?php }
else{?>
	<h1 style="text-align:center"><?php echo $mgs = "Data Not Found..."; ?></h1>	
    <?php
	
}
?>

