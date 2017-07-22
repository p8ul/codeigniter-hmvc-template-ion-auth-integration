<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
         {
              parent::__construct();
              $this->template
              ->set_partial('top', 'partials/header.php');
         }

	public function index()
	{
		$this->template->title(' Leaving Certificate ')
					   ->set_layout('default')
		               ->build('welcome_message', array('message' => 'Hi there!'));
              
		$this->load->view('welcome_message');
	}
}
