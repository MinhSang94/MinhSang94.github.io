<!DOCTYPE html>
<html>
<head>
	<title>PHP UPLOAD FILE</title>
</head>
<body>
<?php
	$message = "";
	$imageFile = '';
	$maxFileSize = 5000000;
	//Check if button upload was clicked
	if (isset($_POST['btnUpload'])) {
		//Create directory to stored file
		$imageDir = "uploads/";
		//Create url to upload file
		$imageFile = $imageDir.basename($_FILES["fileUpload"]["name"]);
		//Create file temp to execute upload file
		$imageFileTemp = $_FILES["fileUpload"]["tmp_name"];
		$check = getimagesize($imageFileTemp);
		//Check if file is an image
		if (!$check) {
			$message = "File is not an image.";
		} elseif (file_exists($imageFile)) { 						//Check if file already exists
			$message = "File already exists.";
		} elseif (filesize($imageFileTemp) > $maxFileSize){			//Check if file size is larger than max file size
			$message = "File is lagrer 5Mb.";
		} elseif (is_uploaded_file($imageFileTemp)) {				//Check if can upload file
			if (move_uploaded_file($imageFileTemp, $imageFile)) {	//Check if move upload file complete
				$message = "Uploaded.";
			} else {
				$message = "Upload fail.";
			}
		}
	}
?>
	<form action="#" method="post" enctype="multipart/form-data">
		<span>Choose an image: </span><input type="FILE" name="fileUpload"/><br/><br/>
		<input type="submit" name="btnUpload" value="Upload" /><br/><br/>
		<img src="<?= $imageFile?>" style="width: 100px; height: 100px;" /><br/>
		<p style="color: red;"><?= $message ?></p>
		<a href="uploads">Click herre to go to upload folder</a>
	</form>
</body>
</html>