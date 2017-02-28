<?php
	return array(
				'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
				'ds' => DIRECTORY_SEPARATOR,
				'resourceFolder' => 'public',
				'name' => 'MiSa - Framework for beginer',
				'sourceLanguage' =>'vi',
				'language' => 'vi',
				'defaultModule' => 'Default',
				'defaultController' => 'index',
				'defaultAction' => 'index',
				'defaultTemplate' => 'main',
				'db' => array(
							'connectionString' => 'mysql:host=localhost;dbname=ms_demo_fw;charset=utf8',
							'emulatePrepare' =>true,
							'username' => 'root',
							'password' => '',
							'charset' => 'utf8'
						),
				'smarty' =>array(
							'debugging' =>false,
							'caching' => false,
						),
				'routers' => array('tin-tuc' => 'news'),
				'recordPerPage' =>20
	);