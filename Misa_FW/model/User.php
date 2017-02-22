<?php
	/**
	* 
	*/
	class User extends MisaModel
	{
		
		public function __construct($scenario = null)
		{
			$this->scenario = $scenario;
			parent::__construct('user');
		}

		public function maps()
		{
			return array(
				'user_id' => array('user_id'),
				'user_name' => array('user_name'),
				'email' => array('email')
			);
		}

		public function rules()
		{
			return null;
		}

		public function beforeInsert()
		{

		}
		
		public function beforeUpdate()
		{

		}

	}