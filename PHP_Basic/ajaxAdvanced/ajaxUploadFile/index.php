<!DOCTYPE html>
<html>
<head>
	<title>AJAX UPLOADFILES</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<form action="execute_upload.php" method="post" enctype="multipart/form-data" id="formUpload">
			<span>Choose upload file&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="file" name="fileUpload" id="fileUpload"/><br/><br/>
			<input type="submit" name="btnUpload" id="btnUpload" value="Upload" />
			<a href="uploads">Click herre to go to upload folder</a><br/>
			<p id="progress">0%</p>
			<p id="message"></p>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			var uploadFiles = $("#fileUpload")[0];
			var file;
			var formData;
  			$("#btnUpload").click(function(e) {
  				//Set no event when btnUpload was clicked
  				e.preventDefault();
  				//Check if upload file is not empty
  				if (uploadFiles.files.length > 0) {
  					//Get file to upload
					file = uploadFiles.files;
					//Check if file size is larger than post size
					if (file[0].size <= 10485760) {
						//Add data to formdata
						formData = new FormData();
						formData.append("fileUpload", file[0]);
						//Send data to server
		  				$.ajax({
		  					url: 'execute_upload.php',
		  					type: "POST",
		  					data: formData,
		  					processData: false,
		  					contentType: false,
		  					success: function(res) {
		  						$('#message').html("Message: " + res);
		  					},
		  					xhr: function() {
		    					var xhr = new window.XMLHttpRequest();
		    					xhr.upload.addEventListener("progress", function(evt) {
		      					if (evt.lengthComputable) {
		        					var percentComplete = evt.loaded / evt.total;
							        percentComplete = parseInt(percentComplete * 100, 10);
							        $('#progress').html("Progress: " + percentComplete + "%");
		      					}
		    					}, false);
		    					return xhr;
		  					}
		  				});
					} else {
						$('#message').html("Message:  POST Content-Length of file exceeds the limit of 8388608 bytes");
					}
				} else {
					$('#message').html("No image selected");
				}
  			});
		});
	</script>
</body>
</html>