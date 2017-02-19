<?php
	require_once('session.php');
	$sessionName = $_POST['sessionName'];
	$sessionVal = $_POST['sessionVal'];
	session_start();
	$sessionName = trim($sessionName);
	$sessionVal = trim($sessionVal);
	$_SESSION[$sessionName] = $sessionVal;
	if (isset($_SESSION[$sessionName])) {
		echo "Created";
	} else {
		echo "Created fail.";
	}
