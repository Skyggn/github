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
    <div class="container colorscheme1">
        <?php require('header.php');?>
        <?php require('navbarcreate.php');?>
        <div class="contentleft">
            <div class="companypagecontainer">
            <div class="logobox">
                    <p class="createtopicmsg">Create Topic</p>
                    <hr>
                    <div class="formstyling">
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
                            <input class="posttopic postall" type="text" maxlength="80" name="headline" required placeholder="Topic.."><br>
                            <p class="slctcat">Select Category</p>
                            <select class="postlabel postall" name="label">
                                <option name ="dicussion" value="discussion">Discussion</option>
                                <option name ="showcase" value="showcase">Showcase</option>
                                <option name ="sitecontent" value="sitecontent">Sitecontent</option>
                                <option name ="offtopic" value="offtopic">Off-Topic</option>
                            </select><br>
                            <textarea class="posttextarea postall" maxlength="1000" class="userInput" required name="content" placeholder=""></textarea><br>
                            <input class="createbtn" type="submit" name="submitpost" value="Create Topic">
                        </form>
                    </div>
                <hr>
                <div class="containerform formstyling">

                
                
                <?php
    
    require_once('dbcon.php');
                  
    $cmd = filter_input(INPUT_POST, 'submitpost');
    $name = $_SESSION['username'];
    $headline = filter_input(INPUT_POST, 'headline');
    $label = filter_input(INPUT_POST, 'label');
    $content = filter_input(INPUT_POST, 'content');
    $userid = $_SESSION['uid'];
	
    if($cmd){
        $sql = ('INSERT INTO forum_post (post_name, post_headline, post_label, post_content, post_user_id) VALUES (?, ?, ?, ?, ?)');
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ssssi', $name, $headline, $label, $content, $userid);
        $stmt->execute();
        
        $newid = mysqli_insert_id($link);
    
        $sql2 = 'UPDATE users SET user_posts = user_posts + 1 WHERE user_id = '.$userid.'';
		if ($link->query($sql2) === TRUE) {
        
            echo "<script> window.location.assign('forumpost.php?id=$newid'); </script>";
        
            $stmt->close();
            $link->close();
        }
    }
?> 
                </div>
                </div>
            </div>
        
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</html>