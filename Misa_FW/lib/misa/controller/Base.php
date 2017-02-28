<?php
	/**
	* 
	*/
	class MisaControllerBase
	{
		public static $module;
		public static $controller;
		public static $action;
		public static $param;
		public static $config;
		public static $baseUrl;
		public static $resourceUrl;

		function __construct($configParam)
		{
			MisaControllerBase::$config = $configParam;
			MisaControllerBase::$baseUrl = $this->getBaseUrl();
			MisaControllerBase::$resourceUrl = MisaControllerBase::$baseUrl . DIRECTORY_SEPARATOR . MisaControllerBase::$config['resourceFolder'];
			spl_autoload_register('self::autoload');
		}

		private function getBaseUrl()
		{
			$currentPath = $_SERVER['PHP_SELF'];
			$pathInfo = pathinfo($currentPath);
			$pathInfo = ($pathInfo['dirname'] !== '/') ? $pathInfo['dirname'] : '';
			$hostName = $_SERVER['HTTP_HOST'];
			$protocol = (strpos($_SERVER['SERVER_PROTOCOL'], 'https') === false) ? 'http://' : 'https://';
			$protocol = strtolower($protocol);
			return $protocol . $hostName . $pathInfo;
		}
		private function findFilePath($className)
		{
			$filePath = '';
			$startPos = 0;
			$endPos;
			for ($i = 0; $i < strlen($className); $i++) {
				$temp = ord($className[$i]);
				if ($temp >=65 && $temp <= 90) {
					$endPos = $i;
					if ($i !== 0) {
						$filePath .= MisaControllerBase::$config['ds'].substr($className, $startPos, $endPos - $startPos);
					}
					$startPos = $i;
				}
			}
			$filePath .= MisaControllerBase::$config['ds'].substr($className, $startPos);
			$filePath = ltrim($filePath, MisaControllerBase::$config['ds']).'.php';
			return $filePath;
		}

		private function autoload($className)
		{
			$file = $this->findFilePath($className);
			$file = strtolower($file);
			$fileAppDir = 'app' . MisaControllerBase::$config['ds'] . $file;
			$fileLibDir = 'lib' . MisaControllerBase::$config['ds'] . $file;
			$fileModelDir = 'model' . MisaControllerBase::$config['ds'] . $file;
			if (file_exists($fileAppDir)) {
				require_once($fileAppDir);
			} elseif (file_exists($fileLibDir)) {
				require_once($fileLibDir);
			} elseif (file_exists($fileModelDir)) {
				require_once($fileModelDir);
			} elseif (file_exists($file)) {
				require_once($file);
			}
		}

		public function run()
		{
			$module = MisaControllerBase::$config['defaultModule'];
			$controller = MisaControllerBase::$config['defaultController'];
			$action = MisaControllerBase::$config['defaultAction'];
			$param = array();
			if (isset($_GET['router'])) {
				$routers = rtrim($_GET['router'], '/\\');
				$routers = strtolower($routers);
				unset($_GET['router']);
				foreach (MisaControllerBase::$config['routers'] as $key => $value) {
					$key = str_replace('/', '\/', $key);
					if (preg_match('/^'.$key.'/', $routers, $match)) {
						$routers = str_replace($match[0], $value, $routers);
						break;
					}
					if ($routers == $value) {
						$routers = 'index/errors';
						$param['code'] = 404;
						$param['message'] = 'Page Not Found';
						break;
					}
				}
				$routers = explode('/', $routers);
				if ($routers[0] != '' && is_dir('app' . MisaControllerBase::$config['ds'] . str_replace('-', '', $routers[0]))) {
					$module = str_replace('-','',$routers[0]);
					array_shift($routers);
				}
				if (isset($routers[0])) {
					$filePath = 'app' . MisaControllerBase::$config['ds'] . strtolower($module) . MisaControllerBase::$config['ds'] . 'controller'. MisaControllerBase::$config['ds']  . $controller. MisaControllerBase::$config['ds']  . str_replace('-', '', $routers[0]) . '.php';
					if (file_exists($filePath)) {
						$controler = str_replace('-', '', $routers[0]);
						array_shift($routers);
					}
				}
				if (isset($routers[0])) {
					$class = ucfirst($module).'Controller'.ucfirst($controller);
					if (method_exists($class, str_replace('-', '', $routers[0]))) {
						$action = str_replace('-', '', $routers[0]);
						array_shift($routers);
					}
				}
				if (isset($routers[0])) {
					$param = $routers;
				}
			}
			MisaControllerBase::$module = $module;
			MisaControllerBase::$controller = $controller;
			MisaControllerBase::$action = $action;
			MisaControllerBase::$param = $param;
			if ($module != MisaControllerBase::$config['defaultModule']) {
				MisaControllerBase::$baseUrl .= MisaControllerBase::$config['ds'] . $module;
			}
			$class = ucfirst($module).'Controller'.ucfirst($controller);
			$controller = new $class();
			if (method_exists($controller, 'init')) {
				$controller->init();
			}
			$controller->$action($param);
		}

		public static function app($configParam)
		{
			return new self($configParam);
		}
	}