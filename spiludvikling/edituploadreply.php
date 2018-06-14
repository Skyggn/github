<?php
            
    require_once('dbcon.php');
                  
    $cmd = filter_input(INPUT_POST, 'submitpost');
    $rcontent = filter_input(INPUT_POST, 'rcontent');
    $savedreplyid = filter_input(INPUT_POST, 'replyid');
    $savedpostid = filter_input(INPUT_POST, 'postid');
	
    if($cmd){
        $sql = "UPDATE forum_replies SET reply_user_reply = '$rcontent' WHERE '$savedpostid' = reply_post_id AND reply_id = $savedreplyid";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('forumpost.php?id=$savedpostid'); </script>";
		}
		else {
			echo "An error has occured.";
		}
        
        $stmt->close();
        $link->close();
    }
?>