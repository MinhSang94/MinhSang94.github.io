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
				'id' => array('id'),
				'username' => array('username'),
				'password' => array('password'),
				'email' => array('email'),
				'insertBy' => array('insertBy'),
				'insertAt' => array('insertAt'),
				'updateBy' => array('updateBy'),
				'updateAt' => array('updateAt')
			);
		}

		public function rules()
		{
			return array(
					// array('id', 'number', 'integerOnly' => true),
					array('username, password', 'require'),
					// array('email', 'email')
				);
		}

		public function login()
		{
			if (isset($this->username) && isset($this->password)) {
				$model = $this->find('username = :username && password = :password', array(':username'=>$this->username, ':password'=>$this->password));
				if (isset($model->username) && isset($model->password)) {
					MisaUser::setId($model->id);
					return true;
				} else {
					return false;
				}
			}
		}
		public function beforeInsert()
		{

		}
		
		public function beforeUpdate()
		{

		}

	}