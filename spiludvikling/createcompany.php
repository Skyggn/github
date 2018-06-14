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
            <div class="forum compexplpadtop">
                <div class="">
                <div class="companypagecontainer">
            <h1 class="logh1">Create a new company profile.</h1>
                <p class="subh1">Already have a company profile? Login <a class="loginhere" href="companylogin.php">here</a>!</p>
<?php

if(filter_input(INPUT_POST, 'submit')){

	$cn = filter_input(INPUT_POST, 'cn')
		or die('Missing/illegal username parameter');
    
    $ce = filter_input(INPUT_POST, 'ce')
		or die('Missing/illegal email parameter');
    
    $cpw = filter_input(INPUT_POST, 'cpw')
		or die('Missing/illegal password parameter');
    
    $cpw = password_hash($cpw, PASSWORD_DEFAULT);
    
    $cad = filter_input(INPUT_POST, 'cad')
		or die('Missing/illegal adress parameter');
    
    $cweb = filter_input(INPUT_POST, 'cweb')
		or die('Missing/illegal url parameter');
    
    $ccvr = filter_input(INPUT_POST, 'ccvr')
		or die('Missing/illegal cvr parameter');
    /*
    $clurl = filter_input(INPUT_POST, 'clurl')
		or die('Missing/illegal img url parameter');*/
    
    $cbio = filter_input(INPUT_POST, 'cbio')
		or die('Missing/illegal bio parameter');
    $cveri = 'Pending';
	
	require_once('dbcon.php');
	$sql = 'INSERT INTO jobs_companies (company_name, company_email, company_pwhash, company_adress, company_url, company_cvr, company_bio, company_verification) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('sssssiss', $cn, $ce, $cpw, $cad, $cweb, $ccvr, $cbio, $cveri);
	$stmt->execute();
    
	if($stmt->affected_rows > 0){
        $newid = mysqli_insert_id($link)
        or die('No new id created');
        $_SESSION['cid'] = $newid;
		$_SESSION['username'] = $cn;
        echo "<script> window.location.assign('companypage.php?cid=$newid'); </script>";
	}
	else {
		echo '<h1 class="subh1">Company name already exists</h1>';
	}
	
}
?>
                <div class="compcreatecontainer">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	                   <fieldset class="logfield">
                           
    	                   <input class="comptext"      name="cn"      type="text"      placeholder="Company Name" required />
                           <input class="comptext"      name="ce"      type="email"     placeholder="Company E-Mail"   required />
    	                   <input class="comptext"      name="cpw"     type="password"  placeholder="Company Password"   required />
                           <input class="comptext"      name="cad"     type="text"      placeholder="Company Adress" required />
                           <input class="comptext"      name="cweb"    type="text"      placeholder="Company Website" required />
                           <input class="compnumb"      name="ccvr"    type="number"    placeholder="Company CVR" maxlength="10" required />
                           <p>Company Biography</p>
                        <textarea class="comptextarea"  name="cbio"    type="text"      maxlength="1000" required></textarea>
                           <p>You can upload your logo on your company page.</p>
                           <!--<input class="comptext"      name="clurl"   type="text"      placeholder="Company Logo URL" required />-->
                        <p></p>
    	               <input class="logbtn" name="submit" type="submit" value="Register" />
	                   </fieldset>
                    </form>
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