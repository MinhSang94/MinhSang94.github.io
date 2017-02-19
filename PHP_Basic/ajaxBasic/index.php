<!DOCTYPE html>
<html>
<head>
	<title>AJAX ADVANCED</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<span id="info">Click the button to send request</span>
	<button name="btnClick" id="btnClick">click</button>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnClick').click(function() {
				$.get("execute_request.php", function(data, status){
		            alert("Data: " + data + "\nStatus: " + status);
		        });
			});
		});
	</script>
</body>
</html>