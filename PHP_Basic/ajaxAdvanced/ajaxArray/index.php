<!DOCTYPE html>
<html>
<head>
	<title>AJAX ADVANCED</title>
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>
<body>
	<?php
		//Create data
		$array = array(1, 2);
		//Encode data type json
		$arrayEncode = json_encode($array);
	?>
	<p>Các phần tử trong mảng <?=implode(', ', $array)?></p>
	<p id="sum"></p>
	<p id="multi"></p>
	<script type="text/javascript">
		$(document).ready(function(){
			var data = "<?php echo $arrayEncode?>";
			$.ajax({
				url: 'execute_array.php',	//url server execute data
				type: 'GET',				//type of method
				data: {data: data},			//data send
				success: function(result) { //execute when server send response
					var arr = $.parseJSON(result);  //covert json to array
					$('#sum').html("Tổng các phần tử mảng: " + arr['sum']);
					$('#multi').html("Tích các phần tử của mảng: " + arr['multi']);
				}
			});
		});
	</script>
</body>
</html>