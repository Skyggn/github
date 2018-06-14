<?php session_start(); ?>
<!doctype html>
<html>
<head>
        <title>DK Gamedeveloper Community</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>

<body>

<?php
$userid = $_SESSION['uid'];
$target_dir = "images/avatar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$target_file = $target_dir . uniqid().'.'.$imageFileType;	
	
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script> window.location.assign('userpage.php?id=$userid'); </script>";
    echo "Wrong file!";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		
		require_once('dbcon.php');
		
        $sql = "UPDATE users_avatar SET avatar_url = '$target_file' WHERE '$userid' = avatar_user_id";
		if ($link->query($sql) === TRUE) {
        
			echo "<script> window.location.assign('userpage.php?id=$userid'); </script>";
		}
		else {
			echo "An error has occured.";
		}
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</body>
</html>