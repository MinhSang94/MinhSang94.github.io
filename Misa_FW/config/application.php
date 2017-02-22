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
							'connectionString' => 'mysql:host=localhost;dbname=demo_sql;charset=utf8',
							'emulatePrepare' =>true,
							'username' => 'root',
							'password' => '',
							'charset' => 'utf8'
						),
				'routers' => array('tin-tuc' => 'news'),
				'recordPerPage' =>20
	);