<?php
class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$data['content_view'] = 'dashboard/dashboard_v1';
		$this->template->admin_template($data);
	}
}