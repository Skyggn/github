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
            <div class="forum compexplpadtop">
                <div class="">
                    <?php
	$cid = $_GET['cid'];
                    
    require_once('dbcon.php');
    
    if(empty($_SESSION['uid'])){
    
    $stmt = $link->prepare("
    SELECT company_name, company_email, company_adress, company_url, company_cvr, company_logo_url, company_bio, company_verification 
    FROM jobs_companies
    WHERE $cid = company_id");
    $stmt->execute();
    $stmt->bind_result($cun, $ce, $cadress, $curl, $ccvr, $clurl, $cbio, $cveri);


    while($stmt->fetch()){
        
      ?><div class="companypagecontainer">
            <div class="logobox">
                <img class="compexplimg comppagestyle" src="<?php echo $clurl?>"></img>
            </div>
            <?php
                
	if(empty($_SESSION['cid'])){
        echo '<hr>';
	} else {
        $cidses = $_SESSION['cid'];
        if($cid == $cidses){
		echo '
                <div class="uploadcontainer">
                        <div class="">
                            <form class="" action="uploadlogo.php" method="post" enctype="multipart/form-data">
                            <p class="uploadavatarinput">Upload Avatar</p>
    	                   <input class="" type="file" name="fileToUpload" id="fileToUpload">
                            <br>
    	                   <input type="submit" value="Upload Logo" name="submit">
	                       </form>
                        </div>
                    </div>
                    <hr>
             ';
            }else{
        }
    }
                ?>
            <p class="comexpl comppagestyle compexplpadtop">Company Name</p>
            <div class="comppagestyle"><?php echo $cun; ?></div>
            <p class="comexpl comppagestyle">Company E-Mail</p>
            <div class="comppagestyle"><?php echo $ce; ?></div>
            <p class="comexpl comppagestyle">Company Adress</p>
            <div class="comppagestyle"><?php echo $cadress; ?></div>
            <p class="comexpl comppagestyle">Company CVR</p>
            <div class="comppagestyle"><?php echo $ccvr; ?></div>
            <p class="comexpl comppagestyle compweblink">Company Website</p>
            <div class="comppagestyle compexplpadbot"><a target="_blank" href="<?php echo $curl; ?>"><?php echo $curl; ?></a></div>
                    <hr>
            <p class="comexpl comppagestyle compexplpadtop">Company Biography</p>
            <div class="comexplbio comppagestyle compexplpadbot"><?php echo $cbio; ?></div>
            <hr>
            <p class="comexpl comppagestyle compexplpadtop">Verification</p>
            <div class="comppagestyle compexplpadbot $cveri"><?php echo $cveri; ?></div>
        </div><?php
    }
    $stmt->close();
    $link->close();
?><?php
    echo '
    </div>
    </div>
    </div>'?>
        <?php require('contentright.php');?>
        <?php require('footer.php');?>
    <?php
    echo '</div>         
          </body>
          </html> 
         ';    
	die();
    }
    else{
                    
    $cid = $_GET['cid'];
    $uidses = $_SESSION['uid'];

    $stmt = $link->prepare("
    SELECT company_name, company_email, company_adress, company_url, company_cvr, company_logo_url, company_bio, company_verification 
    FROM jobs_companies
    WHERE $cid = company_id");
    $stmt->execute();
    $stmt->bind_result($cun, $ce, $cadress, $curl, $ccvr, $clurl, $cbio, $cveri);


    while($stmt->fetch()){
        
      ?><div class="companypagecontainer">
            <div class="logobox">
                <img class="compexplimg comppagestyle" src="<?php echo $clurl?>"></img>
            </div>
            <hr>
            <p class="comexpl comppagestyle compexplpadtop">Company Name</p>
            <div class="comppagestyle"><?php echo $cun; ?></div>
            <p class="comexpl comppagestyle">Company E-Mail</p>
            <div class="comppagestyle"><?php echo $ce; ?></div>
            <p class="comexpl comppagestyle">Company Adress</p>
            <div class="comppagestyle"><?php echo $cadress; ?></div>
            <p class="comexpl comppagestyle">Company CVR</p>
            <div class="comppagestyle"><?php echo $ccvr; ?></div>
            <p class="comexpl comppagestyle compweblink">Company Website</p>
            <div class="comppagestyle compexplpadbot"><a target="_blank" href="<?php echo $curl; ?>"><?php echo $curl; ?></a></div>
                    <hr>
            <p class="comexpl comppagestyle compexplpadtop">Company Biography</p>
            <div class="comexplbio comppagestyle compexplpadbot"><?php echo $cbio; ?></div>
            <hr>
            <p class="comexpl comppagestyle compexplpadtop">Verification</p>
            <div class="comppagestyle compexplpadbot $cveri"><?php echo $cveri; ?></div>
        </div><?php
    }
    }
                ?>
                </div>
            </div>
        </div>
        <?php require('footer.php');?>       
    </div>         
</body>
</html>