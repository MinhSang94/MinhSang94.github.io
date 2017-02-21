<?php
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

		public function __construct()
		{
			$title = isset(MiSa::$config['name']) ? MiSa::$config['name'] : '';
			$this->setTitle($title);
			$this->setLayout(MiSa::$config['defaultTemplate']);
		}

		public function render($name)
		{
			$this->placeholder = $name;
			require ('app/' . strtolower(MiSa::$module) . '/view/layout/' . $this->layout . '.php');
		}

		public function renderPartital($name)
		{
			$names = explode('/', $name);
			if (count($names) == 1) {
				$name = strtolower(MiSa::$controller) .'/'. $name;
			}
			require ('app/' . strtolower(MiSa::$module) . '/view/' . $name . '.php');
		}

		public function placeholder()
		{
			$names = explode('/', $this->placeholder);
			if (count($names) == 1) {
				$this->placeholder = strtolower(MiSa::$controller) .'/'. $this->placeholder;
			}
			require ('app/' . strtolower(MiSa::$module) . '/view/' . $this->placeholder . '.php');
		}

		public function setTitle($param)
		{
			$this->title = $param;
		}

		public function getTitle()
		{
			return $this->title;
		}

		public function setImage($param)
		{
			$this->image = $param;
		}

		public function getImage()
		{
			return $this->image;
		}

		public function setKeywords($param)
		{
			$this->keywords = $param;
		}

		public function getKeywords()
		{
			return $this->keywords;
		}

		public function setDescription($param)
		{
			$this->description = $param;
		}

		public function getDescription()
		{
			return $this->description;
		}

		public function setPublished($param)
		{
			$this->published = $param;
		}

		public function getPublished()
		{
			return $this->published;
		}

		public function setModified($param)
		{
			$this->modified = $param;
		}

		public function getModified()
		{
			return $this->modified;
		}

		public function setLayout($param)
		{
			$this->layout = $param;
		}

		public function getLayout()
		{
			return $this->layout;
		}

		public function setBreadcrumb($param)
		{
			$this->breadcrumb = $param;
		}

		public function getBreadcrumb()
		{
			return $this->breadcrumb;
		}
	}