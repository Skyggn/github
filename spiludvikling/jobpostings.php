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
            <div class="forum">
                <div class="topic">
                    <div class="post1 colorscheme2">
                        <div class="compplaceholder complogoplaceholder compcollective"></div>
                        <div class="compplaceholder compname2placeholder   compcollective">Job Posting</div>
                        <div class="compplaceholder compviews  compcollective">Views</div>
                        <div class="compplaceholder compveri  compcollective compcreatedplaceholder">Posting Created<br></div>
                    </div>
                
    <?php
	
    require_once('dbcon.php');
    
    $stmt = $link->prepare("
    SELECT jobpost_id, jobpost_date, jobpost_company, jobpost_headline, jobpost_content, jobpost_views, jobpost_company_id, company_logo_url
    FROM jobs_postings
    JOIN jobs_companies
    WHERE jobpost_company_id=company_id
    ORDER BY jobpost_id 
    DESC");
    $stmt->execute();
    $stmt->bind_result($id, $date, $name, $headline, $content, $views, $cid, $clurl);

    while($stmt->fetch()){
        
      ?>
        <div class="post1">
            <div class="complogo compcollective">
            <a class="hiddenresponsive" href="companypage.php?cid=<?echo "$cid"?>" ><img class="avatarimg" src="<?=$clurl?>" /></a>
            </div>
            <a class="postlink" href="viewcountjob.php?url=companypost.php&pid=<?echo "$id"?>">
            <div class="compname2    compcollective"><?php echo $headline; ?></div>
            <div class="compviews    compcollective"><?php echo $views; ?></div>
            <div class="complengthcreated    compcollective compcreated"><?php echo $date; ?><br></a><a class="profilelink" href="companypage.php?cid=<?echo "$cid"?>"><?php echo $name; ?></div>
            </a>
        </div><?php
    }
    ?><?php
    if(isset($_SESSION['cid'])){
		echo '
        <div class="topicnoshadow"><a class="profilelink cpostbtn" href="createjobposting.php?cpid='.$cid.'">Create Job Posting</a></div>
';
	}
	if(isset($_SESSION['uid'])){
		echo '
        <div class="topicnoshadow"><a class="profilelink cpostbtn" href="pleaselogout2.php">Create Job Posting</a></div>
';
	} if(empty($_SESSION['uid']) AND empty($_SESSION['cid'])) {
		echo '
        <div class="topicnoshadow"><a class="profilelink cpostbtn" href="companylogin.php">Create Job Posting</a></div>
';
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