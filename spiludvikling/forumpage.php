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
        <?php require('navbarforum.php');?>
        <div class="contentleft">   
            <div class="forum">
                <div class="topic">
                    <div class="post1 colorscheme2">
                        <div class="topicplaceholder topicavatar topiccollective"></div>
                        <div class="topicplaceholder topicheaderplaceholder topiccollective">Headline</div>
                        <div class="topicplaceholder topiclabel topiccollective">Labels</div>
                        <div class="topicplaceholder topicposts topiccollective">Replies</div>
                        <div class="topicplaceholder topicviews topiccollective">Views</div></a>
                        <div class="topicplaceholder topiclastuserplaceholder topiccollective">Last Post<br></div>
                    </div>
                
    <?php
    
    $currentpage = $_GET['pageid'];
    $pagenumber = 1;
	
    require_once('dbcon.php');
    
    $cmd = filter_input(INPUT_POST, 'cmd');
    $date = filter_input(INPUT_POST, 'date');
    $name = filter_input(INPUT_POST, 'name');
    $content = filter_input(INPUT_POST, 'content');
    $headline = filter_input(INPUT_POST, 'headline');
    $views = filter_input(INPUT_POST, 'views');
    $replies = filter_input(INPUT_POST, 'replies');
    $label = filter_input(INPUT_POST, 'label');
    $puserid = filter_input(INPUT_POST, 'puserid');
    $auserid = filter_input(INPUT_POST, 'auserid');
    $aavatarurl = filter_input(INPUT_POST, 'aavatarurl');
    $cpage = $_GET['pageid'];
                
        if($currentpage == 0){
            echo "<script> window.location.assign('index.php'); </script>";
	}   if($currentpage >= 5){
            echo "<script> window.location.assign('index.php'); </script>";
	}
        else {
        if ($cpage == 2){
            $stmt = $link->prepare("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 25 OFFSET 25");
       }else{
        if ($cpage == 3){
            $stmt = $link->prepare("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 25 OFFSET 50");    
       }else {
        if ($cpage == 4){
            $stmt = $link->prepare("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 25 OFFSET 75");    
       }else {
            die();
        }
    }
    }
        }
    $stmt->execute();
    $stmt->bind_result($id, $headline, $label, $content, $replies, $views, $date, $name, $puserid, $auserid, $aavatarurl);

    while($stmt->fetch()){
        
      ?>
        <div class="post1">
            <a href="viewcount.php?url=forumpost.php&id=<?echo "$id"?>">
            <div class="topicavatar topiccollective">
            <img class="avatarimg" src="<?=$aavatarurl?>" />
            </div>
            <div class="topicheader topiccollective"><?php echo $headline; ?></div>
            <div class="topiclabel topiccollective"><?php echo $label; ?></div>
            <div class="topicposts topiccollective"><?php echo $replies; ?></div>
            <div class="topicviews topiccollective"><?php echo $views; ?></div>
                <div class="topiclastuserposts topiccollective"><?php echo $date; ?><br><a class="profilelink" href="userpage.php?id=<?echo "$puserid"?>"><?php echo $name; ?></div>
            </a>
        </div>
            <?php
    }

                if ($result = $link->query("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 25 OFFSET 25")) {

                $row_cnt = $result->num_rows;
                
                if($row_cnt < '25'){
                    $result->close();
                    $link->close();
                    if($currentpage == '2'){
                        echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn2" href="index.php">Previous Page</a></div>';
                    }if($currentpage > '2'){
                        echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn2" href="forumpage.php?pageid='.--$currentpage.'">Previous Page</a></div>';
                    }
                    echo '
                    </div>
                    </div>
                    </div>';
                    require('contentright.php');
                    require('footer.php');
                    echo '
                    </div>
                    </body>
                    </html>';
                    die();
                }
                echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn" href="forumpage.php?pageid=3">Next Page</a></div>';
                    $result->close();
                    $link->close();
                }
                if ($result = $link->query("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 25 OFFSET 50")) {

                $row_cnt = $result->num_rows;
                
                if($row_cnt < '25'){
                    $result->close();
                    $link->close();
                    if($currentpage == '2'){
                        echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn2" href="index.php">Previous Page</a></div>';
                    }if($currentpage > '2'){
                        echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn2" href="forumpage.php?pageid='.--$currentpage.'">Previous Page</a></div>';
                    }
                    echo '
                    </div>
                    </div>
                    </div>';
                    require('contentright.php');
                    require('footer.php');
                    echo '
                    </div>
                    </body>
                    </html>';
                    die();
                }
                echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn" href="forumpage.php?pageid=3">Next Page</a></div>';
                    $result->close();
                    $link->close();
                }
    ?>
            </div>
            </div>
            </div>
        <?php require('contentright.php');?> 
        <?php require('footer.php');?>
        </div>
    
            
</body>
</html>