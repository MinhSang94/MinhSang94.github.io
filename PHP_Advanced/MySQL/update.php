<!DOCTYPE html>
<html>
<head>
	<title>DEMO MYSQL</title>
</head>
<body>
	<?php
		//Create connect to database
		$conn = mysqli_connect('mysql.hostinger.vn', 'u979673765_root', 'icub4ucm', 'u979673765_test') or die("Can not connect to database");
		$userID = 0;
		$userName = "";
		$email = "";
		$message = "";
		//Execute if isset user_id
		if (isset($_GET['user_id'])) {
			$user_id = $_GET['user_id'];
			$sql = "SELECT * FROM user WHERE user_id = $user_id";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$userID = $row['user_id'];
			$userName = $row['user_name'];
			$email = $row['email'];
		}
		//Execute update user data if btn update was clicked 
		if (isset($_POST['btnSubmit'])) {
			if (!empty($_POST['userName'])) {
				if (!empty($_POST['email'])) {
					$userID = $_POST['userID'];
					$userName = $_POST['userName'];
					$email = $_POST['email'];
					$sqlUpdate = "UPDATE user SET user_name = '$userName' , email = '$email' WHERE user_id = $userID";
					$result = mysqli_query($conn, $sqlUpdate);
					//Return user info page
					echo "<script>window.location.assign('mysql.php');</script>";
				} else {
					$message = "Email is empty!";
				}
			} else {
				$message = "User name is empty!";
			}
		}
	?>
	<form action="update.php" method="post" id="updateForm">
		<input type="hidden" name="userID" value="<?=$userID?>" readonly/>
		<span>USER NAME:</span><input type="text" name="userName" id="userName" value="<?=$userName?>" /><br/><br/>
		<span>EMAIL:</span><input type="email" name="email" id="email" value="<?=$email?>"/><br/><br/>
		<input type="submit" name="btnSubmit" value="UPDATE">
		<input type="reset" name="btnReset">
		<span><?=$message?></span>
	</form>
</body>
</html>