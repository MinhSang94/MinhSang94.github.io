<?php 
	session_start();
	if (isset($_SESSION["userName"])) {
		//get session
		echo "SESSION ALREADY EXISTS. SESSION value: " . $_SESSION["userName"]."<br/>";
	} else {
		//set session
		$_SESSION["userName"] = "Minh Sang";
		echo "SESSION CREATEED. SESSION value: " . $_SESSION["userName"]."<br/>";
	}
	//remove all session variables
	session_unset();
	//destroy session
	session_destroy();
	echo "SESSION WAS DESTROYED";