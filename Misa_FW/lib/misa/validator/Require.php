<?php
	/**
	* 
	*/
	class MisaValidatorRequire extends MisaValidatorBase
	{
		
		function validate()
		{
			if (!isset($this->value) || $this->value === null || trim($this->value) === '') {
				$this->setError('Field "'. $this->config['label'] . '" is empty.');
			}
		}
	}