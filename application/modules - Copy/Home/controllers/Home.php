<?php 
class Home extends MY_Controller
{
	public $data;
	public $user;
	function __construct()
         {
              parent::__construct();
              
         }

	public function index()
	{


		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		$data['user'] = $this->ion_auth->user();
		$this->template->title('Home Page')	   
		               ->build('home_v', $this->data);

              
	  }
	
	 	
	}
	public function view_user($id){
	$this->data['message'] = 'Message';
    $this->data['user'] = $this->ion_auth->get_users($id);
    
    //print_r($user);
    
    //$this->data['first_name'] = $user->row()->first_name;

	$this->template->title('Home Page')	   
		           ->build('user_v', $this->data);
	}
}