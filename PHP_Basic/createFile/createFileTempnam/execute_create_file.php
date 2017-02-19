<?php
	header("Access-Control-Allow-Origin: *");
	$fileName = $_POST['fileName'];
	$message = $_POST['fileContent'];
	$fileTemp = tempnam('temp/', 'tmp');
	$myFile = fopen($fileTemp, "w");
	fwrite($myFile, $message);
	fclose($myFile);
	rename($fileTemp, 'temp/'.$fileName.'.txt');
	die("Complete.");
?>