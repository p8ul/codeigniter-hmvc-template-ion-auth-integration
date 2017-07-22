<?php

class MY_Controller extends MX_Controller
{
	public $user;
	public $data;
	function __construct()
	{
	  parent::__construct();

	  // load libraries
	  $this->load->library('ion_auth');
	 
     //set default theme & layout
     $this->template->set_theme('default');     
	 $this->template->set_partial('sidebar', 'partials/sidebar.php')
	 	 ->set_partial('breadcrumb', 'partials/breadcrumb.php')
	 	 ->set_partial('footer', 'partials/footer.php')
	     ->set_partial('navbar', 'partials/navbar.php')
         ->set_partial('top', 'partials/top.php');

     // set logged in user
     if ($this->ion_auth->logged_in())
      {                  
	   $this->user = $this->ion_auth->user();
	  }
	}
}