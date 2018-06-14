<?php session_start(); ?><!doctype html>
<?php $savedpostid = isset($_GET['id']) ? $_GET['id'] : '';
      $cpe = isset($_GET['cpe']) ? $_GET['cpe'] : '';?>
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
                    <p class="createtopicmsg">Edit Post</p>
                    <hr>
                        <form action="edituploadpost.php" method="post"> 
                            <textarea class="posttextarea postall" maxlength="1000" class="userInput" required name="rcontent"><?php echo "$cpe";?></textarea><br />
                            <input class="createbtn" type="submit" name="submitpost" value="Finish Editing">
                            <input type="hidden" name="postid" value="<?php echo $savedpostid; ?>">
                        </form>
                        <a href="forumpost.php?id=<? echo $savedpostid?>"><button class="createbtn createbtncancel">Cancel</button></a>
                    </div>
                     <hr>
                </div>
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</htm