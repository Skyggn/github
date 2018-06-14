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
            <div class="loglogcontainer colorscheme1">
            <?php require('header.php');?>
            <?php require('navbarlogreg.php');?>
                <h1 class="logh1">Please login with your username and password.</h1>
                <p class="subh1">Don't have an account? Register <a href="register.php">here</a>!</p>
                <p class="subsubh1">You can find company login <a href="companylogin.php">here</a>.</p>
<?php
                if(filter_input(INPUT_POST, 'submit')){

	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');

	require_once('dbcon.php');
	$sql = 'SELECT user_id, user_pwhash FROM users WHERE user_name=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) { }
	
	if (password_verify($pw, $pwhash)){
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $un; 
        echo "<script> window.location.assign('index.php'); </script>";

		
	}
	else{
		echo '<p class="subh1">Username not found or password wrong.</p>';
	}
}
	
?>
                <div class="logincontainer">
                <form class="" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <fieldset class="logfield">
	                   <input class="logun" name="un" type="text"     placeholder="Username" required />
	                   <input class="logpw" name="pw" type="password" placeholder="Password"   required />
                    <p></p>
	                   <input class="logbtn" name="submit" type="submit" value="Login"/>
                    </fieldset>
                </form>
                </div>
            <?php require('footer.php');?>  
            </div>
        </div>
</body>
