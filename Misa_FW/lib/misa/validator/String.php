<?php
	/**
	* 
	*/
	class MisaValidatorString extends MisaValidatorBase
	{
		public function validate()
		{
			if (isset($this->config['pattern']) && !preg_match($this->config['pattern'], $this->value)) {
				$this->setError('Field "' . $this->config['label'] . '" is invalid!');
			}
			if (function_exists('mb_strlen') && isset($this->config['encoding'])) {
				$length = mb_strlen($this->value, $this->config['endcoding']);
			} else {
				$length = strlen($this->value);
			}
			if (isset($this->config['minlength']) && $length < $this->config['minlength']) {
				$this->setError('Field "' . $this->config['label'] . '" is too short (minimum is ' . $this->config['minlength']);
			}
			if (isset($this->config['maxlength']) && $length > $this->config['maxlength']) {
				$this->setError('Field "' . $this->config['label'] . '" is too long (maximun is' . $this->config['maxlength']);
			}
			if (isset($this->config['length']) && $length != $this->config['length']) {
				$this->setError('Field "' . $this->config['label'] . '" is of the wrong length should be ' . $this->config['length'] . 'characters');
			}
		}
	}