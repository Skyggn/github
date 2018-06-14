<?php
	if(empty($_SESSION['cid'])){
		echo '
            <div class="navbar colorscheme1">
                <a class="navbutton"  href="companylogin.php"><div class="navreply">New Posting</div></a>
                <div class="navleft"></div>                
                <a class="navbutton"  href="index.php"><div class="navforum navactive">Forum</div></a>
                <div class="navmiddle"></div>
                <a class="navbutton"  href="jobs.php"><div class="navjobs">Jobs</div></a>
                <div class="navright"></div>
            </div>';
	} else {
		echo '
            <div class="navbar colorscheme1">
                <a class="navbutton"  href="createjobposting.php?cpid='?><?php echo $_SESSION['cid']?>"<?php echo '><div class="navreply">New Posting</div></a>
                <div class="navleft"></div>                
                <a class="navbutton"  href="index.php"><div class="navforum navactive">Forum</div></a>
                <div class="navmiddle"></div>
                <a class="navbutton"  href="jobs.php"><div class="navjobs">Jobs</div></a>
                <div class="navright"></div>
            </div>';
	}
?>  