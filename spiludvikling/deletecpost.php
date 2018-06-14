<?php
            
    require_once('dbcon.php');

    $savedpostid = isset($_GET['pid']) ? $_GET['pid'] : '';
	
        $sql = "DELETE FROM jobs_postings WHERE jobpost_id = $savedpostid";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('jobpostings.php'); </script>";
		}
		else {
			echo "An error has occured.";
		}
        
        $link->close();
?>