<?php 
	$listUsername = Array('dominhsang', 'dominhsang1994', 'dominhsang94');
	$username = $_POST['username'];
	for ($i = 0; $i < count($listUsername); $i++) { 
		if ($username == $listUsername[$i]) {
			echo 'Username already exits';
			break;
		}else if ($i == (count($listUsername) - 1)) {
			echo 'You can use that username';
		}
	}
?>