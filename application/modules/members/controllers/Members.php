<?php
class Members extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	function index($data = NULL)
	{
		$this->data['members'] = $this->member_model->get_all();

		 $this->template->title('Add Member')	   
		               ->build('list', $this->data);
	}
	function create()
	{
		$this->data['title'] = "Add member";
         
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
        	echo 'not authenticated';
            redirect('auth', 'refresh');
        }
        
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        

        if ($this->form_validation->run() == true)
        {
        	echo 'authenticated';
            $email    = strtolower($this->input->post('email'));
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $middle_name = $this->input->post('middle_name');
            $dob = $this->input->post('dob');
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            $district = $this->input->post('district');
            $membership = $this->input->post('membership');
            $baptism_date = $this->input->post('baptism_date');
            $confirmation_date = $this->input->post('confirmation_date');
            $marital_status = $this->input->post('marital_status');
            $death_date = $this->input->post('death_date');

            $detail = array(
			'first_name'=> $first_name, 
			'last_name' => $last_name,
			'middle_name'=>$middle_name,
			'dob'=>$dob,
			'phone'=>$phone,
			'gender'=>$gender,
			'district'=>$district,
			'membership'=>$membership,
			'baptism_date'=>$baptism_date,
			'confirmation_date'=>$confirmation_date,
			'marital_status'=>$marital_status,
			'death_date'=>$death_date);
		$insert_id = $this->member_model->insert($detail, FALSE);
		if($insert_id){
			$this->data['message'] = 'Member added successfully';
			die();
		}else
		{
			$this->data['message'] = 'Error adding member';
			header('HTTP/1.1 500 Internal Server Error');
           header('Content-Type: application/json; charset=UTF-8');
           die(json_encode(array('message'=> $message,'code'=>1337)));
		}

        }

		$this->data['message'] = '';
		

		 $this->template->title('Add Member')	   
		               ->build('create', $this->data);
	}
	
}