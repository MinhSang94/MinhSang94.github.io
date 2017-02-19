<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>READ FILE UPLOADED</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<form method="post" action="execute_read_file.php" name="formUpload" id="formUpload" enctype="multipart/form-data">
		<input type="FILE" name="fileUpload" id="fileUpload" />
		<input type="submit" name="btnUpload" id="btnUpload" />
	</form>
	<div id="progress"></div>
	<div id="fileContent"></div>
	<script type="text/javascript">
		$(document).ready(function() {
			var fileUpload = $("#fileUpload")[0];
			var file;
			var formData;
			$('#btnUpload').click(function(event) {
				//Set not event when button was submit
				event.preventDefault();
				//Check if file upload is not empty
				if (fileUpload.files.length > 0) {
					//Get file upload
					file = fileUpload.files;
					//Add file upload to formdata
					formData = new FormData();
					formData.append('fileUpload', file[0]);
					//Send formdata to server
					$.ajax({
						url: 'execute_read_file.php',     //url of server
						type: 'post',					  //type of method
						data: formData,					  //data
						processData: false,
						contentType: false,
						success: function(res) {		  //execute when server send response
							$('#progress').html(res);
						},
						xhr: function() {				  //execute whe file uploading
							var xhr = new window.XMLHttpRequest();
							xhr.upload.addEventListener('progess', function(evt) {
								if (evt.lengthComputable) {
									var percentComplete = evt.loaded / evt.total;
							        percentComplete = parseInt(percentComplete * 100, 10);
							        console.log(percentComplete);
							        $('#progress').html("Progress: " + percentComplete + "%");
								}
							}, false);
							return xhr;
						},
					});
				}
			});
		});
	</script>
</body>
</html>