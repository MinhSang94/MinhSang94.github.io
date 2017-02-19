<!DOCTYPE html>
<html>
<head>
	<title>SESSION DB READ</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<form>
		<p><span>Session ID</span><input type="text" name="sessionName" id="sessionName"/></p>
		<p><input type="submit" name="btnRead" value="btnRead" id="btnRead" /></p>
		<p id="error"></p>
	</form>
	<p id="sessionVal"></p>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnRead').click(function(e) {
				e.preventDefault();
				var formData;
				var sessionName = $('#sessionName').val();
				if (sessionName.length > 0) {
					var pattern = /^([0-9a-zA-Z])*$/;
					if (pattern.test(sessionName)) {
						formData = new FormData();
						formData.append('sessionName', sessionName);
						$.ajax({
							url: 'read_session.php',
							type: 'POST',
							data: formData,
							processData: false,
							contentType: false,
							success: function(res){
								$('#error').html(res);
							}
						});
					} else {
						$('#error').html("Session ID only have alphabet and number");
					}
				} else {
					$('#error').html("Session ID is empty");
				}
			});
		});
	</script>
</body>
</html>