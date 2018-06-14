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
                <h1 class="logh1">Create a new account.</h1>
                <p class="subh1">Already have an account? Login <a href="login.php">here</a>!</p>
<?php

if(filter_input(INPUT_POST, 'submit')){

    $aurl = 'images/avatar/standard.png';
    
    
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');

	$pw = password_hash($pw, PASSWORD_DEFAULT);
    
    $ue = filter_input(INPUT_POST, 'ue')
		or die('Missing/illegal pw parameter');
    $urank = 'Member';
	
//	echo 'Opretter bruger<br>'.$un.' : '.$pw;
	
	require_once('dbcon.php');
	$sql = 'INSERT INTO users (user_name, user_pwhash, user_email, user_rank) VALUES (?, ?, ?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ssss', $un, $pw, $ue, $urank);
	$stmt->execute();
    
    if(mysqli_num_rows($sql)>=1)
           {
           }
    
    $auid = $link->insert_id;
    
    $sql2 = 'INSERT INTO users_avatar (avatar_url, avatar_user_id) VALUES (?, ?)';
	$stmt = $link->prepare($sql2);
	$stmt->bind_param('si', $aurl, $auid);
    $stmt->execute();
    
	if($stmt->affected_rows > 0){
		echo "<script> window.location.assign('login.php'); </script>";
            die();
	}
	else {
		echo '<h1 class="subh1">Name already exists</h1>';
	}
	
}
?>
                <div class="logincontainer">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	                   <fieldset class="logfield">
    	               <input class="logun" name="un" type="text"     placeholder="Username" required />
    	               <input class="logpw" name="pw" type="password" placeholder="Password"   required />
                        <input class="logun" name="ue" type="email" placeholder="E-Mail"   required />
                        <p></p>
    	               <input class="logbtn" name="submit" type="submit" value="Register" />
	                   </fieldset>
                    </form>
                </div>
    <?php require('footer.php');?> 
            </div>
</body>
</html>