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
        <?php require('navbartopics.php');?>
        <div class="contentleft">
                    <?php
	
    require_once('dbcon.php');
    
    $postid = isset($_GET['id']) ? $_GET['id'] : '';

    $stmt = $link->prepare("SELECT fp.post_id, fp.post_headline, fp.post_label, fp.post_content, fp.post_name, fp.post_user_id, ua.avatar_user_id, ua.avatar_url FROM forum_post fp INNER JOIN users_avatar ua WHERE fp.post_id = $postid AND fp.post_user_id = ua.avatar_user_id");
            
    $stmt->execute();
    $stmt->bind_result($fppid, $headline, $label, $content, $name, $puserid, $auid, $aurl);

    while($stmt->fetch()){
        
      ?><div class="forumpost">
            <div class="forumpostleft forumpostall">
                <a href="userpage.php?id=<?php echo "$auid"?>" class="avatarlink"><img class="forumpostavatar" src="<?echo "$aurl"?>"></a>
                <a class="" href="userpage.php?id=<?echo "$puserid"?>">
                    <div class="profilelink"><?php echo $name; ?></div>
                </a>
            </div>
            <div class="forumpostcontent forumpostall">
                <div class="fpchead"><?php echo $headline; ?></div>
                <div class="fpclabel"><?php echo $label; ?></div>
                <hr>
                <div class="fpccontent"><?php echo $content; ?></div>
                <?php
                if(isset($_SESSION['uid'])){
                $currentuid = $_SESSION['uid'];
                if($currentuid == $puserid){
                    echo '
            <div class="topicnoshadow"><a class="profilelink editbtn" href="deletepost.php?pid='.$postid.'">Delete</a></div>
            <div class="topicnoshadow"><a class="profilelink editbtn" href="editpost.php?id='.$postid.'&cpe='.$content.'">Edit</a></div>
                            ';     
                }
	}
        ?>
            </div>
            <hr>
        </div>
            <?php
    }
    ?>
        <?php
	
    require_once('dbcon.php');
            
    $stmt2 = $link->prepare("SELECT
                            t1.reply_id, t1.reply_user, t1.reply_user_id, t1.reply_user_reply, t2.avatar_user_id, t2.avatar_url
                            FROM forum_replies t1
                            JOIN users_avatar t2
                            ON t1.reply_user_id=t2.avatar_user_id
                            WHERE reply_post_id = '$postid'
                            ORDER BY t1.reply_id ASC");
    $stmt2->execute();
    $stmt2->bind_result($replyid, $ruser, $ruserid, $rusercontent, $rauid, $raurl);

    while($stmt2->fetch()){
        
        ?>
        
      <div class="forumpost">
            <div class="forumpostleft forumpostall">
                <a href="userpage.php?id=<?php echo "$ruserid"?>" class="avatarlink"><img class="forumpostavatar" src="<?echo "$raurl"?>"></a>
                <a href="userpage.php?id=<?php echo "$ruserid"?>" class="avatarlink"></a>
                <a class="" href="userpage.php?id=<?echo "$ruserid"?>">
                    <div class="profilelink"><?php echo $ruser; ?></div>
                </a>
            </div>
            <div class="forumpostcontent forumpostall">
                <div class="fpccontent"><?php echo $rusercontent; ?></div><br>
                <?php
                if(isset($_SESSION['uid'])){
                $currentuid = $_SESSION['uid'];
                if($currentuid == $ruserid){
                    echo '
            <div class="topicnoshadow"><a class="profilelink editbtn" href="deletereply.php?rid='.$replyid.'&pid='.$postid.'">Delete</a></div>
            <div class="topicnoshadow"><a class="profilelink editbtn" href="editreply.php?id='.$replyid.'&pid='.$postid.'&rpe='.$rusercontent.'">Edit</a></div>
                            ';     
                }
	}
        ?>
            </div>
        <hr>
        </div>
    
            <?php
    }
    $stmt->close();
    $link->close();
    ?>
        <?php
    if(isset($_SESSION['cid'])){
		echo '
        <div class="topicnoshadow"><a class="profilelink replybtn" href="pleaselogout.php">Reply</a></div>
';
	}
	if(isset($_SESSION['uid'])){
		echo '
        <div class="topicnoshadow"><a class="profilelink replybtn" href="createreply.php?id='.$postid.'">Reply</a></div>
';
	} if(empty($_SESSION['uid']) AND empty($_SESSION['cid'])) {
		echo '
        <div class="topicnoshadow"><a class="profilelink replybtn" href="login.php">Reply</a></div>
';
	}
?> 
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</html>