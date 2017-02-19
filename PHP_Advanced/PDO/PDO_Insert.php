<?php
	try {
		$conn = new PDO('mysql:host=localhost;dbname=demo_sql', 'root','');
		if (!$conn) {
			echo "Fail";
		} else {
			//Unnamed Placeholder
			$stmtUnnamed = $conn->prepare("INSERT INTO user(user_name, email) VALUES(?, ?)");
			$stmtUnnamed->bindParam(1, $userName);
			$stmtUnnamed->bindParam(2, $email);
			//Named Placeholder
			$stmtNamed = $conn->prepare("INSERT INTO user(user_name,email) VALUES(:userName, :email)");
			$stmtNamed->bindParam(':userName', $userName);
			$stmtNamed->bindParam(':email', $email);

			$userName = 'minhsang7';
			$email = 'dominhsang94@gmail.com';
			$stmtUnnamed->execute();
			$stmtNamed->execute();

			$dataUnnamed = array('minhsang8', 'dominhsang94@gmail.com');
			$dataNamed = array('userName'=>'minhsang8', 'email'=>'dominhsang94@gmail.com');
			$stmtUnnamed->execute($dataUnnamed);
			$stmtNamed->execute($dataNamed);
		}
	} catch (PDOException $e) {
		echo "PDO ERROR: ".$e->getMessage();
	}
