<?php
	class AdminControllerBase extends MisaController
	{
		public $allowAccessAction = array();
		public function __construct()
		{
			parent::__construct();
		}

		public function init()
		{
			MisaSession::start();
			if ($this->authentication()) {
				$this->setGlobal();
			}
		}

		public function setGlobal()
		{

		}

		private function authentication()
		{
			if (in_array(Misa::$action, $this->allowAccessAction)) {
				return true;
			}
			if (MisaUser::logged()) {
				if ($this->authorization()) {
					return true;
				} else {
					$this->redirect(Misa::$baseUrl . '/../');
				}
			} else {
				$this->redirect(Misa::$baseUrl . '/login');
				return false;
			}
		}

		private function authorization()
		{
			$user = User::model()->find('id = :id', array(':id' => MisaUser::getId()));
			if ($user !== false && $user->id !== '') {
				if ($user->roles == 1) {
					return true;
				}
			}
			return true;
		}
	}