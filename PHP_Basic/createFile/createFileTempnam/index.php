<!DOCTYPE html>
<html>
<head>
	<title>CREATE FILE</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<form action="execute_creat_file.php" method="post">
		<p><span>File name: </span><input type="text" name="fileName" id="fileName"></p>
		<p>File content</p>
		<p><textarea name="fileContent" id="fileContent"></textarea></p>
		<p><input type="submit" name="btnCreate" id="btnCreate" value="CREATE"><input type="button" name="btnFolder" id="btnFolder" value="Move to folder"></p>
		<p id="error"></p>
		<p id="messageFileName"></p>
		<p id="messageFileContent"></p>
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnCreate').click(function(e) {
				e.preventDefault();
				var formData;
				var fileName = $('#fileName').val();
				var fileContent = $('#fileContent').val();
				if (fileName.length > 0) {
					var pattern = /^([0-9a-zA-Z])*$/;
					if (pattern.test(fileName) && pattern.test(fileContent)) {
						formData = new FormData();
						formData.append('fileName', fileName);
						formData.append('fileContent', fileContent);
						$.ajax({
							url: 'http://msblog.esy.es/phpBasic/createFile/createFileTempnam/execute_create_file.php',
							type: 'post',
							data: formData,
							contentType: false,
							processData: false,
							success: function(res){
								$('#error').html(res);
								$('#messageFileName').html(fileName);
								$('#messageFileContent').html(fileContent);
							}
						});
					} else {
						$('#error').html("File name and fileContent maybe XSS");
					}
				} else {
					$('#error').html("File name is empty");
				}
			});
			$('#btnFolder').click(function() {
				location.href='temp/';
			});
		});
	</script>
</body>
</html>