<?php
	require_once('Log.php');
	$logFile = new Log();
	$logFile->setLogFile('log.txt');
	$logFile->writeLog("Enter");
	$message = $logFile->readLog();
	echo "File content:<br/>";
	echo $message;