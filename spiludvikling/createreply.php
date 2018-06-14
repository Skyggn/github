<?php session_start(); ?><!doctype html>
<?php $savedpostid = isset($_GET['id']) ? $_GET['id'] : '';?>
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
        <?php require('navbartopics.php');?>
        <div class="contentleft">
                 <div class="companypagecontainer">
                    <div class="logobox">
                    <p class="createtopicmsg">Create Reply</p>
                    <hr>
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
                            <textarea class="posttextarea postall" maxlength="1000" class="userInput" required name="rcontent" placeholder="Write your reply here..."></textarea><br />
                            <input class="createbtn" type="submit" name="submitpost" value="Post Reply">
                            <input type="hidden" name="postid" value="<?php echo $savedpostid; ?>">
                        </form>
                    </div>
                     <hr>
                </div>
<?php
            
    require_once('dbcon.php');
                  
    $cmd = filter_input(INPUT_POST, 'submitpost');
    $ruser = $_SESSION['username'];
    $rcontent = filter_input(INPUT_POST, 'rcontent');
    $ruserid = $_SESSION['uid'];
    $rpostid = filter_input(INPUT_POST, 'postid')
            or die('');
	
    if($cmd){
        $sql = ('INSERT INTO forum_replies (reply_user, reply_user_id, reply_post_id, reply_user_reply) VALUES (?, ?, ?, ?)');
        $stmt = $link->prepare($sql);
        $stmt->bind_param('siis', $ruser, $ruserid, $rpostid, $rcontent);
        $stmt->execute();
    
        $sql2 = 'UPDATE forum_post SET post_replies = post_replies + 1 WHERE post_id = '.$rpostid.'';
		if ($link->query($sql2) === TRUE) {
		}
        
        echo "<script> window.location.assign('forumpost.php?id=$rpostid'); </script>";
        
        $stmt->close();
        $link->close();
    }
?>
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</htm