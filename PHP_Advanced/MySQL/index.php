<!DOCTYPE html>
<html>
<head>
	<title>DEMO MYSQL</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php
		// require_once('GetData.php');
		// $getdata = new GetData;
		// $data = array('userName'=>'user', 'email'=>'email', 'password'=>'password', 'birthdate'=>'birthdate');
		// $result = $getdata->insertUser($data);
		// echo $result;
		// echo strlen(sha1(md5(sha1("1asdfjhsalkfjhdsaksadfasdfasdfasdfsdfasdf"))));
	?>
	<form action="#" method="post">
		<p><span>User Name: </span><input type="text" name="userName" id="userName"/></p>
		<p><span>Email: </span><input type="text" name="email" id="email"/></p>
		<p><span>Birth date: </span><input type="text" name="birthDate" id="birthDate" value="2017/02/17"/></p>
		<p id="error"></p>
		<input type="submit" name="btnCreate" value="CREATE USER" id="btnCreate"/>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnCreate').click(function(e) {
				e.preventDefault();
				var userName = $('#userName').val();
				var email = $('#email').val();
				var birthDate = $('#birthDate').val();
				if (userName.length > 0 && email.length > 0 && birthDate.lenth > 0) {

				} else {
					$('#error').html("User info is empty");
				}
			});
		});
	</script>
</body>
</html>
