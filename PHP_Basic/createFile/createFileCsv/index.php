<!DOCTYPE html>
<html>
<head>
	<title>CREATE FILE</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<form action="execute_create_file.php" method="post">
		<p><span>File name: </span><input type="text" name="fileName" id="fileName"></p>
		<p>File content</p>
		<p><textarea name="fileContent" id="fileContent"></textarea></p>
		<p><input type="submit" name="btnCreate" id="btnCreate" value="CREATE"><input type="button" name="btnFolder" id="btnFolder" value="Move to folder"></p>
		<p id="error"></p>
		<p id="messageFileName"></p>
		<p id="messageFileContent"></p>
	</form>
</body>
</html>