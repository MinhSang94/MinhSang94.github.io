<!DOCTYPE html>
<html>
<head>
	<title>DEMO MYSQL</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php
	$message = "";
	$userName = "";
	$email = "";
	//Create connect to database
	$conn = mysqli_connect('mysql.hostinger.vn', 'u979673765_root', 'icub4ucm', 'u979673765_test') or die("Can not connect to database");
	//Execute insert user when btnSubmit was clicked
	if (isset($_POST['btnSubmit'])) {
		if (!empty($_POST['userName'])) {
			if (!empty($_POST['email'])) {
				$userName = $_POST['userName'];
				$email = $_POST['email'];
				$sqlInsert = "INSERT INTO user(user_name, email) VALUES('$userName', '$email')";
				$result = mysqli_query($conn, $sqlInsert);
				if ($result) {
					$message = "User info added!";
				}
			} else {
				$massage = "Email is empty!";
			}
		} else {
			$message = "User name is empty!";
		}
	}
	//Execute delete user
	if (isset($_GET['deleteID'])) {
		$deleteID = $_GET['deleteID'];
		$sqlDelete = "DELETE FROM user WHERE user_id = $deleteID";
		$result = mysqli_query($conn, $sqlDelete); 
	}
	//Get all of user from database
	$sql = "SELECT * FROM user";
	$result = mysqli_query($conn, $sql);
?>
	<form action="mysql.php" method="post" id="addForm">
		<span>USER NAME:</span><input type="text" name="userName" id="userName" value="<?=$userName?>" /><br/><br/>
		<span>EMAIL:</span><input type="email" name="email" id="email" value="<?=$email?>"/><br/><br/>
		<input type="submit" name="btnSubmit" value="INSERT">
		<input type="reset" name="btnReset">
	</form>
	<span id="message"><?=$message?></span>
	<?php
		//Check if user data is empty
		if (mysqli_num_rows($result) == 0) {
			echo "<span> User is empty!</span>";
		} else {
	?>
		<table style="border: 1px solid #000;">
			<tr>
				<td style="border: 1px solid #000; text-align: center; width: 30px;">ID</td>
				<td style="border: 1px solid #000; text-align: center; width: 150px;">USER NAME</td>
				<td style="border: 1px solid #000; text-align: center; width: 250px;">EMAIL</td>
				<td style="border: 1px solid #000; text-align: center; width: 50px;">DELETE</td>
			</tr>
			<?php
				//Show all user data
				while ($row = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td style="border: 1px solid #000; text-align: center; width: 30px;"><?php echo $row['user_id'];?></td>
						<td style="border: 1px solid #000; width: 150px; padding-left: 10px;"><a href="update.php?user_id=<?php echo $row['user_id']?>"><?php echo $row['user_name'];?></a></td>
						<td style="border: 1px solid #000; width: 250px; padding-left: 10px;"><?php echo $row['email'];?></td>
						<td style="border: 1px solid #000; text-align: center; width: 50px;"><a href="mysql.php?deleteID=<?php echo $row['user_id'];?>">DELETE</a></td>
					</tr>
					<?php
				}
			?>
		</table>
	<?php		
		}
	?>
</body>
</html>