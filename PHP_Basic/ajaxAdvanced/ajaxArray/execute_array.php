<?php
	//Get request from client
	$jsonEncode = $_GET['data'];
	//Convert json to array
	$data = json_decode($jsonEncode, true);
	$sum = 0;
	$multi = 1;
	//Validate data is array
	if (is_array($data)) {
		//Calculate sum of array
		for ($i = 0; $i < count($data); $i++) {
			$sum += (int)$data[$i];
			$multi *= (int)$data[$i];
		}
	}
	$result = array('sum' => $sum, 'multi' => $multi);
	//Convert array to json and send response to client
	die (json_encode($result));