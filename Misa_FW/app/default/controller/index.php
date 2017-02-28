<?php
	class DefaultControllerIndex extends MisaController
	{
		public function index()
		{
			$this->view->setSmartyInfo($this->getParentDir(dirname(__FILE__)));
			$this->view->render('index.tpl');
		}
		 public function error($param = null)
		{
         
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