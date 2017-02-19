<?php
	$fileName = htmlentities($_POST['fileName']);
	$content = htmlentities($_POST['fileContent']);
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=".$fileName.".csv");
	$data = explode(" ", $content);
	$csvFile = fopen("php://output", "w");
	foreach ($data as $line) {
		fputcsv($csvFile, explode(' ', $line));
	}
	fclose($csvFile);