<?php
	// $starttime = microtime(true);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once(dirname(__FILE__) . '/lib/misa/MiSa.php');
	MiSa::app(require_once('config/application.php'))->run();
	// $endtime = microtime(true);
	// echo $endtime - $starttime;