<?php session_start(); ?><!doctype html>
<head>
    <title>DK Gamedeveloper Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/faviconns.ico" type="image/x-icon">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>
            <div class="container colorscheme1">
            <?php require('header.php');?>
            <?php require('navbarlogreg.php');?>
                <h1 class="logh1">Please login with your company's name and password.</h1>
                <p class="subh1">Don't have a company account? Register <a href="createcompany.php">here</a>!</p>
                <p class="subsubh1">You can find forum login <a href="login.php">here</a>.</p>
<?php
                if(filter_input(INPUT_POST, 'submit')){

	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');

	require_once('dbcon.php');
	$sql = 'SELECT company_id, company_pwhash FROM jobs_companies WHERE company_name=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) { }
	
	if (password_verify($pw, $pwhash)){
		$_SESSION['cid'] = $uid;
		$_SESSION['username'] = $un;
        echo "<script> window.location.assign('companypage.php?cid=$uid'); </script>";

		
	}
	else{
		echo '<p class="loginerror">Company e-mail not found or password wrong.</p>';
	}
}
	
?>
                <div class="logincontainer">
                <form class="" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <fieldset class="logfield">
	                   <input class="logun" name="un" type="text"     placeholder="Company Name" required />
	                   <input class="logpw" name="pw" type="password" placeholder="Password"   required />
                    <p></p>
	                   <input class="logbtn" name="submit" type="submit" value="Login" />
                    </fieldset>
                </form>
                </div>
                <?php require('footer.php');?> 
            </div>
        </div>
</body>
