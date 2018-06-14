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
                        <div class="topicplaceholder topicheaderplaceholder topiccollective">Topic</div>
                        <div class="topicplaceholder topiclabel topiccollective">Category</div>
                        <div class="topicplaceholder topicposts topiccollective">Replies</div>
                        <div class="topicplaceholder topicviews topiccollective">Views</div></a>
                        <div class="topicplaceholder topiclastuserplaceholder topiccollective">Author<br></div>
                    </div>
                
    <?php
	
    require_once('dbcon.php');
    
    $stmt = $link->prepare("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 0,25");
    $stmt->execute();
    $stmt->bind_result($id, $headline, $label, $content, $replies, $views, $date, $name, $puserid, $auserid, $aavatarurl);

    while($stmt->fetch()){
        
      ?>
        <div class="post1">
            <a class="postlink" href="viewcount.php?url=forumpost.php&id=<?echo "$id"?>">
            <div style="background-image: url(<?=$aavatarurl?>)" class="topicavatar topicavatar2 topiccollective">
            </div>
            <div class="topicheader topiccollective"><?php echo $headline; ?></div>
            <div class="topiclabel topiccollective"><?php echo $label; ?></div>
            <div class="topicposts topiccollective"><?php echo $replies; ?></div>
            <div class="topicviews topiccollective"><?php echo $views; ?></div>
                <div class="topiclastuserposts topiccollective"><?php echo $date; ?><br><a class="profilelink" href="userpage.php?id=<?echo "$puserid"?>"><?php echo $name; ?></div>
            </a>
        </div><?php
    }

                if ($result = $link->query("SELECT post_id, post_headline, post_label, post_content, post_replies, post_views, post_date, post_name, post_user_id, avatar_user_id, avatar_url FROM forum_post JOIN users_avatar WHERE post_user_id = avatar_user_id ORDER BY post_id DESC LIMIT 0,25")) {

                $row_cnt = $result->num_rows;
                
                if($row_cnt < '25'){
                    $result->close();
                    $link->close();
                    echo "
                    </div>
                    </div>
                    </div>";
                    require('contentright.php');
                    require('footer.php');
                    echo "
                    </div>
                    </body>
                    </html>";
                    die();
                }
                echo '<div class="topicnoshadow"><a class="profilelink nextpagebtn" href="forumpage.php?pageid=2">Next Page</a></div>';
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