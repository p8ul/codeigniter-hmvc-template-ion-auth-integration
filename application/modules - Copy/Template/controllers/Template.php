<?php
class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
	}
	function admin_template($data = NULL)
	{
		$data['articles'] = $this->article_model->get_all();

		$this->load->view('Template/admin_template_v',$data);
	}
	
}