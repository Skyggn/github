<?php
            
    require_once('dbcon.php');

    $replyid = isset($_GET['rid']) ? $_GET['rid'] : '';
    $savedpostid = isset($_GET['pid']) ? $_GET['pid'] : '';
	
        $sql = "DELETE FROM forum_replies WHERE reply_id = $replyid";
		if ($link->query($sql) === TRUE) {
            
            $sql2 = 'UPDATE forum_post SET post_replies = post_replies - 1 WHERE post_id = '.$savedpostid.'';
		if ($link->query($sql2) === TRUE) {
            echo "<script> window.location.assign('forumpost.php?id=$savedpostid'); </script>";
		      }
			
		}
		else {
			echo "An error has occured.";
		}
        
        $stmt->close();
        $link->close();
?>