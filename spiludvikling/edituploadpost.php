<?php
            
    require_once('dbcon.php');
                  
    $cmd = filter_input(INPUT_POST, 'submitpost');
    $rcontent = filter_input(INPUT_POST, 'rcontent');
    $rpostid = filter_input(INPUT_POST, 'postid');
	
    if($cmd){
        $sql = "UPDATE forum_post SET post_content = '$rcontent' WHERE '$rpostid' = post_id";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('forumpost.php?id=$rpostid'); </script>";
		}
		else {
			echo "An error has occured.";
		}
        
        $stmt->close();
        $link->close();
    }
?>