<?php session_start(); ?><!doctype html>
<html>
<head>
    <title>DK Gamedeveloper Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/faviconns.ico" type="image/x-icon">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
    <!-- Container Starts -->
    <div class="containeruser colorscheme1">
        <?php require('header.php');?>
        <?php require('navbarprofile.php');?>
        <div class="contentleftuser">
            <div class="forum">
                <div class="topic">
                    <?php
	
    require_once('dbcon.php');
    
    if(empty($_SESSION['uid'])){
    
    $uid = $_GET['id'];
    $stmt = $link->prepare("SELECT user_name, user_email, user_posts, user_created, user_rank, avatar_url FROM users JOIN users_avatar 
    WHERE $uid = user_id AND $uid = avatar_user_id ");
    $stmt->execute();
    $stmt->bind_result($uname, $email, $upost, $uage, $urank, $aavatarurl);


    while($stmt->fetch()){
        
      ?><div class="userpagecontainer">
            <p class="usertitle">Username:</p>
            <p class="usertitle">User Posts:</p>
            <p class="usertitle">User Created:</p><br>
            <div class="userpagename fontecho"><?php echo $uname; ?></div>
            <div class="userpageposts fontecho"><?php echo $upost; ?></div>
            <div class="userpageage fontecho"><?php echo $uage; ?></div>
                <br>
                <hr>
            <div class="avatarbox">
                <p class="usertitle userank">User Rank:</p><br>
                <div class="userpageage fontecho"><?php echo $urank; ?></div><br>
                <img class="userpageavatar" src="<?php echo $aavatarurl?>"></img>
            </div>
                    <hr>
                </div>
                    
            <?php
    }
?><?php
    echo '
    </div>
    </div>
    </div>'?>
    <?php
    echo '</div>         
          </body>
          </html> 
         ';    
	die();
    }
    else{
                    
    $uid = $_GET['id'];
    $uidses = $_SESSION['uid'];

    $stmt = $link->prepare("SELECT user_name, user_email, user_posts, user_created, user_rank, avatar_url FROM users JOIN users_avatar 
    WHERE $uid = user_id AND $uid = avatar_user_id");
    $stmt->execute();
    $stmt->bind_result($uname, $email, $upost, $uage, $urank, $aavatarurl);


    while($stmt->fetch()){
        
      ?><div class="userpagecontainer">
            <p class="usertitle">Username:</p>
            <p class="usertitle">User posts:</p>
            <p class="usertitle">User created:</p><br>
            <div class="userpagename fontecho"><?php echo $uname; ?></div>
            <div class="userpageposts fontecho"><?php echo $upost; ?></div>
            <div class="userpageage fontecho"><?php echo $uage; ?></div>
                <br>
                <hr>
            <div class="avatarbox">
                <p class="usertitle userank">User Rank:</p><br>
                <div class="userpageage fontecho"><?php echo $urank; ?></div><br>
                <img class="userpageavatar" src="<?php echo $aavatarurl?>"></img>
            </div>
        <?php
    }
    }
                ?>
                <?php
    $uid = $_GET['id'];
    $uidses = $_SESSION['uid'];
                
	if(empty($_SESSION['uid'])){
	} else {
        if($uid == $uidses){
		echo '<hr>
                <div class="uploadcontainer">
                        <div class="">
                            <form class="" action="avatarupload.php" method="post" enctype="multipart/form-data">
                            <p class="uploadavatarinput">Upload Avatar</p>
    	                   <input class="" type="file" name="fileToUpload" id="fileToUpload">
                            <br>
    	                   <input type="submit" value="Upload Avatar" name="submit">
	                       </form>
                        </div>
                    </div>
                    <hr>
             ';
            }else{
            echo '<hr>';
        }
    }
$stmt->close();
$link->close();
                ?>
                </div>
                </div>
            </div>
        </div>   
    </div>         
</body>
</html>