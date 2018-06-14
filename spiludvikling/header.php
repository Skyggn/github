<div class="headerlogo colorscheme2">
    <a href="index.php"><img class="headerlogoimg" src="images/site_logo_alt.png"></a>
    <?php
    if(isset($_SESSION['cid'])){
		echo '
            <div class="headerlogoleft">
            
            </div>
            <div class="loginregister">
               <a href="companypage.php?cid='.$_SESSION['cid'].'"<b>'.$_SESSION['username'].'</b></a>, nice to see you! 
                <a href="logout.php" class="logoutbtn">Logout</a>
            </div>';
	} 
     if(isset($_SESSION['uid'])){
		echo 
            '
            <div class="headerlogoleft">
            
            </div>
            <div class="loginregister">
                Hello <a href="userpage.php?id='.$_SESSION['uid'].'"<b>'.$_SESSION['username'].'</b></a>, nice to see you! 
                <a href="logout.php" class="logoutbtn">Logout</a>
            </div>';
	} if(empty($_SESSION['uid']) AND empty($_SESSION['cid'])){
		echo '
            <div class="headerlogoleft">
            
            </div>
            <div class="loginregister">
                <a href="login.php" class="">Login</a> /
                <a href="register.php" class="">Register</a>
            </div>';
	}
    
?>   
</div>