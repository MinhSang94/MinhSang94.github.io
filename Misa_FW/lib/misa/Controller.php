<?php
	/**
	* 
	*/
	class MisaController
	{
		public $view;

		public function __construct()
		{
			$this->view = new MisaView();
		}

		public function redirect($url)
		{
			header('location:' . $url);
		}

		public function getParentDir($url)
		{
			$urlArray = explode("\\", $url);
			array_pop($urlArray);
			return implode('\\', $urlArray);
		}
	}