<?php
            
    require_once('dbcon.php');
                  
    $rcontent = filter_input(INPUT_POST, 'rcontent');
    $rpostid = filter_input(INPUT_POST, 'postid');
	
        $sql = "UPDATE jobs_postings SET jobpost_content = '$rcontent' WHERE '$rpostid' = jobpost_id";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('companypost.php?pid=$rpostid'); </script>";
		}
		else {
			echo "An error has occured.";
		}
        
        $link->close();
?>