<?php
	/**
		* Function read file
		* @param {string} $fileName
		* @return {string} $message
	*/
	function myReadFile($fileName)
	{
		//Open file uploaded
		$myfile = fopen($fileName, "r");
		//Read file opened
		while (!feof($myfile)) {
			$message .= "<p>".fgets($myfile)."</p>";
		}
		//Close file opened
		fclose($myfile);
		return $message;
	}
	$message = "";
	//Get diectory url to stored file
	$fileDir = 'uploads/';
	//Get url to upload file
	$fileName = $fileDir.basename($_FILES['fileUpload']['name']);
	$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
	if ($fileType != "txt") {
		$message = "Only read file *.txt";
	} elseif (!file_exists($fileName)) {
		//Check if can upload file
		if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
			//Check if file was uploaded
			if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $fileName)) {
				$message = "Done.";
				$message .= myReadFile($fileName);
			} else {
				$message = "Fail";
			}
		}	
	} else {
		$message = "File already exist.";
		$message .= myReadFile($fileName);
	}
	//End and send message to client
	die($message);