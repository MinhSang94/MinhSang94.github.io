<?php
	require_once('lib/smarty/Smarty.class.php');
	/**
	* 
	*/
	class MisaView
	{
		private $title;
		private $image;
		private $keywords;
		private $description;
		private $published;
		private $modified;
		private $layout;
		private $placeholder;
		private $breadcrumb;
		private $smarty;
		private $param;
		private $templatesDir;

		public function __construct()
		{
			$this->param = array();
			
		}

		public function setSmartyInfo($parentDir)
		{
			if (isset($parentDir) || !trim($parentDir) === '') {
				$configDir = $parentDir . '/view/config/';
				$templatesCDir = $parentDir . '/view/templates_c/';
				$this->templatesDir = $parentDir . '/view/templates/';
				if (!file_exists($configDir)) {
					mkdir($configDir);
				}
				if (!file_exists($templatesCDir)) {
					mkdir($templatesCDir);
				}
				if (!file_exists($this->templatesDir)) {
					mkdir($templatesDir);
				}
				$this->smarty = new Smarty;
				$this->smarty->debugging = false;
				$this->smarty->setConfigDir($configDir);
				$this->smarty->setCompileDir($templatesCDir);
				$this->smarty->setTemplateDir($this->templatesDir);
			}
		}

		public function setParam($name, $param)
		{
			$this->smarty->assign($name, $param);
		}

		public function render($name)
		{
			try {
				$this->smarty->display($name);
			} catch (Exception $e) {
				MisaLog::write($e->getMessage());
			}
		}
	}