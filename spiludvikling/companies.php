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
        <?php require('navbarjobscomp.php');?>
        <div class="contentleft">   
            <div class="forum">
                <div class="topic">
                    <div class="post1 colorscheme2">
                        <div class="compplaceholder compslogoplaceholder compcollective"></div>
                        <div class="compplaceholder compsnameplaceholder   compcollective">Company Name</div>
                        <div class="compplaceholder compscvr  compcollective">CVR</div>
                        <div class="compplaceholder compsveri  compcollective">Verification</div>
                    </div>
                
    <?php
	
    require_once('dbcon.php');
    
    $stmt = $link->prepare("
    SELECT company_id, company_name, company_cvr, company_logo_url, company_verification
    FROM jobs_companies
    ORDER BY company_id ASC 
    LIMIT 0,25");
    $stmt->execute();
    $stmt->bind_result($cid, $cname, $ccvr, $clurl, $cveri);

    while($stmt->fetch()){
        
      ?>
        <div class="post1">
            <div class="complogo compcollective">
            <a href="companypage.php?cid=<?echo "$cid"?>" ><img class="avatarimg" src="<?=$clurl?>" /></a>
            </div>
            <a class="postlink" href="companypage.php?cid=<?echo "$cid"?>">
            <div class="compsname    compscollective"><?php echo $cname; ?></div>
            <div class="compscvr     compscollective"><?php echo $ccvr; ?></div>
            <div class="compsveri    compscollective"><?php echo $cveri; ?></div></a>
        </div><?php
    }
    ?></div>
            </div>
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    
            
        
    </div>
            
</body>
</html>