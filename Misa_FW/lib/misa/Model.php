<?php
	/**
	* 
	*/
	class MisaModel extends MisaDatabase
	{
		public $scenario;
		private $tableAlias;
		public $errors = array();
		public $rules;

		public function __construct($table = null)
		{
			$this->rules = $this->rules();
			parent::__construct($table);
		}

		public static function model()
		{
			return new static;
		}

		public function rules()
		{
			return array();
		}

		public function setTableAlias($tableAlias)
		{
			$this->tableAlias = $tableAlias;
		}

		public function getTableAlias()
		{
			return $this->tableAlias;
		}

		public function getLabel($attr)
		{
			return isset($this->maps[$attr]['label']) ? $this->maps[$attr]['label'] : ucwords(str_replace('_', '', $attr));
		}

		public function getError($attr)
		{
			return isset($this->errors[$attr]) ? $this->errors[$attr] : null;
		}

		public function load($data)
		{
			if ($data != null) {
				if (!is_array($data)) {
					$data = get_object_vars($data);
				} 
				foreach ($data as $key => $value) {
					$this->$key = trim($value);
				}
			}
		}
	}