<?php
	/**
		* Funtion readFile
		* @param {string} $fileName
		* @return {string} $message
	*/
	function myReadFile($fileName)
	{
		$message = "";
		//Open file uploaded use SplFileObject
		$myFile = new SplFileObject($fileName);
		//Read file opened
		while (!$myFile->eof()) {
			$message .= "<p>".$myFile->fgets()."</p>";
		}
		//Close file opened
		$myFile = null;
		return $message;
	}

	function main()
	{
		$message = "";
		//Get diectory url to stored file
		$fileDir = 'uploads/';
		//Get url to upload file
		$fileName = $fileDir.basename($_FILES['fileUpload']['name']);
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
		if ($fileType != "txt") {
			$message = "Only read file *.txt";
		} elseif (!file_exists($fileName)) {	//Check if file already exists
			//Check if can upload file
			if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
				//Check if file was uploaded
				if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $fileName)) {
					$message = "<p>Done.</p>";
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
	}
	main();