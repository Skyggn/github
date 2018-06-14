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
                    <?php
	
    require_once('dbcon.php');
    
    $postid = isset($_GET['pid']) ? $_GET['pid'] : '';

    $stmt = $link->prepare("
    SELECT 1t.jobpost_id, 1t.jobpost_company, 1t.jobpost_headline, 1t.jobpost_content, 1t.jobpost_company_id,
           2t.company_id, 2t.company_logo_url
    FROM jobs_postings 1t 
    INNER JOIN jobs_companies 2t 
    WHERE 1t.jobpost_id = $postid 
    AND 2t.company_id = 1t.jobpost_company_id");
            
    $stmt->execute();
    $stmt->bind_result($fppid, $name, $headline, $content, $puserid, $auid, $aurl);

    while($stmt->fetch()){
        
      ?><div class="forumpost">
            <div class="forumpostleft forumpostall">
                <a href="companypage.php?cid=<?php echo "$auid"?>" class="avatarlink"><img class="forumpostavatar2" src="<?echo "$aurl"?>"></a>
                <a class="" href="companypage.php?cid=<?echo "$puserid"?>">
                    <div class="profilelink"><?php echo $name; ?></div>
                </a>
            </div>
            <div class="forumpostcontent forumpostall">
                <div class="fpchead"><?php echo $headline; ?></div>
                <hr>
                <div class="fpccontent"><?php echo $content; ?></div>
            </div>
            <?php if(isset($_SESSION['cid'])){
                $currentcid = $_SESSION['cid'];
                if($currentcid == $puserid){
                    echo '
            <div class="topicnoshadow"><a class="profilelink editbtn" href="deletecpost.php?pid='.$postid.'">Delete</a></div>
            <div class="topicnoshadow"><a class="profilelink editbtn" href="editcpost.php?id='.$postid.'&cpe='.$content.'">Edit</a></div>
                            ';     
                }
	}
        ?>
        </div>
        <hr>
<?php
    }   
    $stmt->close();
    $link->close();
    ?>
        </div>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>       
    </div>
            
</body>
</html>