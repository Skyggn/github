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
        <?php require('navbarjobback.php');?>
        <div class="contentleft">
            <div class="companypagecontainer">
            <div class="logobox">
            <div class="">
                <div class="">
                    <div class="formstyling">
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
                            <input class="posttopic postall" type="text" name="headline" required placeholder="Hiring what..."><br />
                            <textarea class="posttextarea postall" maxlength="1000" class="userInput" required name="content" placeholder="Write your post here..."></textarea><br />
                            <input class="createbtn" type="submit" name="submitpost" value="Create Job Posting">
                        </form>
                    </div>
                <div class="containerform formstyling">

                
                
                <?php
    
    require_once('dbcon.php');
                  
    $cmd = filter_input(INPUT_POST, 'submitpost');
    $name = $_SESSION['username'];
    $headline = filter_input(INPUT_POST, 'headline');
    $content = filter_input(INPUT_POST, 'content');
    $companyid = $_SESSION['cid'];
	
    if($cmd){
        $sql = ('INSERT INTO jobs_postings (jobpost_company, jobpost_headline, jobpost_content, jobpost_company_id) VALUES (?, ?, ?, ?)');
        $stmt = $link->prepare($sql);
        $stmt->bind_param('sssi', $name, $headline, $content, $companyid);
        $stmt->execute();
    
    $newid = mysqli_insert_id($link);
        echo "<script> window.location.assign('companypost.php?pid=$newid'); </script>";
        
        $stmt->close();
        $link->close();
    }
?> 
                    </div>
                    </div>
                </div>
                </div>
            </div>
        
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</html>