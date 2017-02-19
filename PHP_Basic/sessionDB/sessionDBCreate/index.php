<!DOCTYPE html>
<html>
<head>
	<title>SESSION DB</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<form action="createSession.php" method="post">
		<p><span>Session ID</span><input type="text" name="sessionName" id="sessionName"/></p>
		<p><span>Session value</span><input type="text" name="sessionVal" id="sessionVal"/></p>
		<p><input type="submit" name="btnCreate" value="Create" id="btnCreate" /></p>
		<p id="error"></p>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			var formData;
			$('#btnCreate').click(function(e){
				e.preventDefault();
				var sessionName = $('#sessionName').val();
				var sessionVal = $('#sessionVal').val();
				if (sessionName.length > 0 && sessionVal.length > 0) {
					var pattern = /^([0-9a-zA-Z])*$/;
					if (pattern.test(sessionName) && pattern.test(sessionVal)) {
						formData = new FormData();
						formData.append('sessionName', sessionName);
						formData.append('sessionVal', sessionVal);
						$.ajax({
							url: 'createSession.php',
							type: 'POST',
							data: formData,
							processData: false,
							contentType: false,
							success: function(res){
								$('#error').html(res);
							}
						});
					} else {
						$('#error').html("Session ID and session value only have alphabet and number");
					}
				} else {
					$('#error').html("Session ID and session value is  empty");
				}
			});
		});
	</script>
</body>
</html>