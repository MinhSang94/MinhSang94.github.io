<?php
	/**
	* 
	*/
	class MisaValidatorNumber extends MisaValidatorString
	{
		private $pattern = '/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/';
		private $integerPattern = '/^\s*[+-]?\d+\s*$/';

		function validate()
		{
			parent::validate();
			$pattern = isset($this->config['pattern']) ? $this->config['pattern'] : $this->pattern;
			$integerPattern = isset($this->config['integerPattern']) ? $this->confgi['integerPattern'] : $this->integerPattern;
			if (!is_numeric($this->value)) {
				$this->setError('Field "' . $this->config['label'] . '" must be a number.');
				return;
			}
			if (isset($this->config['integerOnly']) && $this->config['integerOnly']) {
				if (!preg_match($integerPattern, $this->value)) {
					$this->setError('Field "' . $this->config['label'] . '" must be an integer.');
				}
			} else {
				if (!preg_match($pattern, $this->value)) {
					$this->setError('Field "' . $this->config['label'] . '" must be a number.');
				}
			}

		}
	}