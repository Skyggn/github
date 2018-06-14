<?php session_start(); ?><!doctype html>
<html>
<head>
    <title>DK Gamedeveloper Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/faviconns.ico" type="image/x-icon">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
<div class="container">
<?php 
    require_once('dbcon.php');
    
    $savedpostid = isset($_GET['pid']) ? $_GET['pid'] : '';
    $savedurl = isset($_GET['url']) ? $_GET['url'] : '';
    
    $sql2 = 'UPDATE jobs_postings SET jobpost_views = jobpost_views + 1 WHERE jobpost_id = '.$savedpostid.'';
		if ($link->query($sql2) === TRUE) {
		}
    echo "<script> window.location.assign('".$savedurl."?pid=".$savedpostid."'); </script>";
        
        

    $link->close();
?>
</div>
    </body>
</html>
