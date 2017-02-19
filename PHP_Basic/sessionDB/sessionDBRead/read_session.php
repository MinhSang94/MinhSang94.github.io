<?php
	require_once('session.php');
	session_start();
	$sessionName = $_POST['sessionName'];
	$sessionName = trim($sessionName);
	if (isset($_SESSION[$sessionName])) {
		echo $_SESSION[$sessionName];
	} else {
		echo "SESSION IS NOT SET";
	}