<?php
	if (isset($_FILES["fileUpload"]["name"])) {
		$message = '';
		$maxFileSize = 10485760;
		$imageDir = "uploads/";
		$file = $imageDir.basename($_FILES["fileUpload"]["name"]);
		$fileTemp = $_FILES["fileUpload"]["tmp_name"];
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		if ($fileType == 'exe') {
			$message = "Do not upload file *.exe";
		} elseif (filesize($fileTemp) > $maxFileSize) {		//Check if file size is larger than max file size
			$message = "File is lagrer 5Mb.";
		} elseif (file_exists($file)){						//Check if file already exists
			$message = "File already exists.";
		} elseif (is_uploaded_file($fileTemp)) {			//Check if can upload file						
			if (move_uploaded_file($fileTemp, $file)) {		//Check if file was uploaded
				$message = "Uploaded.";
			} else {
				$message = "Upload fail.";
			}
		}
	} else {
		$message = "No file choosen.";
	}
	//Send response to client
	die($message);
	