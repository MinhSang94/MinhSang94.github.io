<?php
	class AdminControllerIndex extends AdminControllerBase
	{
		public function init()
		{
			$this->view->setSmartyInfo($this->getParentDir(dirname(__FILE__)));
			$this->allowAccessAction = array('login');
			$this->view->setParam('error', '');
			parent::init();
		}
		public function index()
		{
			$user = new User('user');
			$this->view->setParam('usersInfo', $user->findAll());
			$this->view->render('index.tpl');
		}
		public function login()
		{
			if (MisaUser::logged() === false) {
				if(isset($_POST['user'])) {
		        	$user = new User('login');
		        	$user->load($_POST['user']);
		        	if ($user->validate() && $user->login()) {
		        		$this->redirect(Misa::$baseUrl);
		        		return;
		        	} else {
		        		$this->view->setParam('error', 'Your user or password are incorrect.');
		        	}
		        }
				$this->view->render('login.tpl');
			} else {
				$this->redirect(Misa::$baseUrl);
			}

	    }
	     
	    public function about()
	    {
	    	$this->view->message = "Wellcome to MiSa Framework!";
	        $this->view->render('about');

	    }
	     
	    public function contact()
	    {
	        echo 'This is contact page!';
	    }
	}