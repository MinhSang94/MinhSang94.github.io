<!DOCTYPE html>
<html>
<head>
	<title>DEMO PHP FORM</title>
</head>
<body>
<?php
	$numberA = 0;
	$numberB = 0;
	$is_sum =true;
	if (isset($_GET['numberA'])) {
		$numberA = $_GET['numberA'];
		if (!is_numeric($numberA)) {
			$is_sum = false;
		}
	}
	if (isset($_GET['numberB'])) {
		$numberB = $_GET['numberB'];
		if (!is_numeric($numberB)) {
			$is_sum = false;
		}
	}
	if (isset($_GET['btnSubmit']) && $is_sum) {
		$sum = $numberA + $numberB;
	}
?>
	<form method='get' action='#'>
		<table>
			<tr>
				<td>Số A:</td>
				<td><input type="text" name="numberA" value="<?= $numberA?>">
				</td>
			</tr>
			<tr>
				<td>Số B:</td>
				<td><input type="text" name="numberB" value="<?= $numberB?>">
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="btnSubmit" value="SUM"></td>
				<td>
					<?php 
						if ($is_sum) {
							if (isset($_GET['btnSubmit'])) {
								echo $sum;
							} else {
								echo 0;
							}
						} else {
							echo "Input number is not a number";
						}
					?>	
				</td>
			</tr>
		</table>
	</form> 
</body>
</html>