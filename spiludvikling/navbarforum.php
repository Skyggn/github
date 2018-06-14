<?php
    if(isset($_SESSION['cid'])){
		echo '
            <div class="navbar colorscheme1">
                <a class="navbutton"  href="pleaselogout.php"><div class="navreply">New Topic</div></a>
                <div class="navleft"></div>                
                <a class="navbutton"  href="index.php"><div class="navforum navactive">Forum</div></a>
                <div class="navmiddle"></div>
                <a class="navbutton"  href="jobs.php"><div class="navjobs">Jobs</div></a>
                <div class="navright"></div>
            </div>';
	}
	if(isset($_SESSION['uid'])){
		echo '
            <div class="navbar colorscheme1">
                <a class="navbutton"  href="createtopic.php?='?><?php echo $_SESSION['uid']?>"<?php echo '><div class="navreply">New Topic</div></a>
                <div class="navleft"></div>                
                <a class="navbutton"  href="index.php"><div class="navforum navactive">Forum</div></a>
                <div class="navmiddle"></div>
                <a class="navbutton"  href="jobs.php"><div class="navjobs">Jobs</div></a>
                <div class="navright"></div>
            </div>';
	} if(empty($_SESSION['uid']) AND empty($_SESSION['cid'])) {
		echo '
            <div class="navbar colorscheme1">
                <a class="navbutton"  href="login.php"><div class="navreply">New Topic</div></a>
                <div class="navleft"></div>                
                <a class="navbutton"  href="index.php"><div class="navforum navactive">Forum</div></a>
                <div class="navmiddle"></div>
                <a class="navbutton"  href="jobs.php"><div class="navjobs">Jobs</div></a>
                <div class="navright"></div>
            </div>';
	}
?>  