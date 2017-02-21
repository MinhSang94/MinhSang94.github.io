<?php
	class DefaultControllerIndex extends DefaultControllerBase
	{
		public function index()
		{
			$this->view->message = 'Hello';
			$this->view->website = 'https://www.facebook.com';
			$this->view->setTitle('Wellcome! - MiSa Framework');
			$this->view->render('index');
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