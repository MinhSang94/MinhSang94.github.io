<?php
	/**
	* 
	*/
	class MisaController
	{
		public $view;

		public function __construct()
		{
			$this->view = new MisaView;
		}
		public function redirect($url)
		{
			header('location:' . $url);
		}
	}