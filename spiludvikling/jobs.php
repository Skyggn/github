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
        <?php require('navbarjobs.php');?>
            <div class="contentleft">
               <a class="viewregpostfont" href="jobpostings.php"> <div class="viewregpost">
                    <div class="">View Job Postings
                    </div></a>
                </div>
                <div class="">
                    <a class="viewregpostfont" href="companies.php"><div class="viewregpost viewregpost2">
                        <div class="">View Companies
                        </div></a>
                    </div>
                    <?php
    
    
    if(isset($_SESSION['cid'])){
        $cpid = $_SESSION['cid'];
		echo '
        <div class="">
                        <a class="viewregpostfont" href="createjobposting.php?cpid='.$cpid.'"><div class="viewregpost">
                            Create Job Posting
                        </div></a>
                    </div>
        <div class="">
                        <a class="viewregpostfont" href="companypage.php?cid='.$cpid.'"><div class="viewregpost">
                            View Company Profile
                        </div></a>
                    </div>
</a>
';
	}
	if(isset($_SESSION['uid'])){
		echo '
        <div class="">
                        <a class="viewregpostfont" href="pleaselogout3.php"><div class="viewregpost">
                            Register Company
                        </div></a>
                    </div>
';
	} if(empty($_SESSION['uid']) AND empty($_SESSION['cid'])) {
		echo '
        <div class="">
                        <a class="viewregpostfont" href="createcompany.php"><div class="viewregpost">
                            Register Company
                        </div></a>
                    </div>
        <div class="">
                        <a class="viewregpostfont" href="companylogin.php"><div class="viewregpost">
                            Login Company
                        </div></a>
                    </div>
';
	}
?>
                </div>
            </div> 
        <?php require('contentright.php');?> 
        <?php require('footer.php');?>
    </div>
            
</body>
</html>