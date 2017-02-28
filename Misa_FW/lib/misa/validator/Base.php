<?php
	/**
	* 
	*/
	class MisaValidatorBase
	{
		public $errors = array();
		public $attr = null;
		public $value = null;
		public $config = array();

		public function __construct($attr, $value, $config)
		{
			$this->attr = $attr;
			$this->value = $value;
			$this->config = $config;	
		}

		public function beforeValidator()
		{
			if (isset($this->config['allowEmpty']) && $this->config['allowEmpty'] && trim($this->value) != '') {
				return true;
			}
			return false;
		}

		public function setError($error)
		{
			if (isset($this->config['message'])) {
				$this->error[$this->attr] = $message = str_replace('{attr}', $this->config['label'], $this->config['message']);
			} else {
				$this->errors[$this->attr] = $error;
			}
		}
	}