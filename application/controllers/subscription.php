<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		
		$this->load->database();
		$this->load->model('subscription_model');
		$this->load->model('login');

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p class="form_error">', '</p>');

		$this->form_validation->set_rules('firstname',  '"Username"',  'trim|required|min_length[3]|max_length[256]|alpha_dash');
		$this->form_validation->set_rules('password', '"Password"', 'trim|required|min_length[3]|max_length[256]');
		$this->form_validation->set_rules('email', '"Email"', 'trim|required|min_length[3]|max_length[256]');
		$this->form_validation->set_rules('firstname', '"Firstname"', 'trim|required|min_length[3]|max_length[256]');
		$this->form_validation->set_rules('lastname', '"Lastname"', 'trim|required|min_length[3]|max_length[256]');

		if($this->form_validation->run() && $this->input->post('email') == $this->input->post('email2'))
		{
			$return = $this->subscription_model->createUser($this->input->post('email'),
				$this->input->post('password'),
				$this->input->post('firstname'),
				$this->input->post('lastname'));

			$connected = $this->login->connectUser($this->input->post('email'),
				$this->input->post('password'));

			if(!empty($connected))
			{
				$this->session->set_userdata('email', $connected[0]->email);
				$this->session->set_userdata('firstname', $connected[0]->firstname);
				$this->session->set_userdata('lastname', $connected[0]->lastname);
				$this->session->set_userdata('picture', $connected[0]->picture);
			}

			if(!empty($this->session->userdata('email')))
			{
				redirect('/home/');
			}
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors() . '<p class="form_error">The "Emails" can be differents.</p>');
		}
		
		redirect('/index/');
	}
}