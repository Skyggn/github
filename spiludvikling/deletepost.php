<?php
            
    require_once('dbcon.php');

    $savedpostid = isset($_GET['pid']) ? $_GET['pid'] : '';
	
        $sql = "DELETE FROM forum_post WHERE post_id = $savedpostid";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('index.php'); </script>";
		}
		else {
			echo "An error has occured.";
		}
        
        $stmt->close();
        $link->close();
?>