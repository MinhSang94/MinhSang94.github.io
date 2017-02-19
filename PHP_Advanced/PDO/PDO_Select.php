<?php
	require_once('user.php');
	try {
		$conn = new PDO("mysql:host=localhost;dbname=demo_sql", 'root', '');
		if ($conn) {
			//FETCH_ASSOC
			$stmtAssoc = $conn->prepare("SELECT * FROM user WHERE user_id = :userID");
			$stmtAssoc->bindParam(':userID', $userID);
			$userID = 1;
			$stmtAssoc->execute();
			$stmtAssoc->setFetchMode(PDO::FETCH_ASSOC);
			echo "<p>FETCH_ASSOC</p>";
			while ($row = $stmtAssoc->fetch()) {
				echo "<p>".$row['user_id']."</p>";
				echo "<p>".$row['user_name']."</p>";
				echo "<p>".$row['email']."</p>";
				echo "<hr/>";
			}
			//FETCH_OBJ
			$stmtObj = $conn->prepare("SELECT * FROM user WHERE user_id = :userID");
			$stmtObj->bindParam(':userID', $userID);
			$userID = 2;
			$stmtObj->execute();
			$stmtObj->setFetchMode(PDO::FETCH_OBJ);
			echo "<p>FETCH_OBJ</p>";
			while ($obj = $stmtObj->fetch()) {
				echo "<p>".$obj->user_id."</p>";
				echo "<p>".$obj->user_name."</p>";
				echo "<p>".$obj->email."</p>";
				echo "<hr/>";
			}
			//FETCH_CLASS
			$stmtClass = $conn->prepare("SELECT * FROM user WHERE user_id = :userID");
			$stmtClass->bindParam(":userID", $userID);
			$userID = 3;
			$stmtClass->execute();
			$stmtClass->setFetchMode(PDO::FETCH_CLASS,'User');
			echo "<p>FETCH_OBJ</p>";
			while ($class = $stmtClass->fetch()) {
				echo "<p>".$class->user_id."</p>";
				echo "<p>".$class->user_name."</p>";
				echo "<p>".$class->email."</p>";
				echo "<hr/>";
			}
		} else {
			echo "Connect to database fail!";
		}
	} catch (PDOException $e) {
		echo "PDO ERROR: ".$e->getMessage();
	}