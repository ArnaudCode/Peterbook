<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->database();
		$this->load->model('login');
		$this->load->helper('url');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p class="form_error">', '</p>');

		$this->form_validation->set_rules('email',  '"Email"',  'trim|required|min_length[3]|max_length[256]');
		$this->form_validation->set_rules('password', '"Password"', 'trim|required|min_length[3]|max_length[256]');

		$valide = false;

		if($this->form_validation->run())
		{
			$return = $this->login->connectUser($this->input->post('email'),
												$this->input->post('password'));

			$this->session->set_userdata('email', $return[0]->email);
		}

		if(!empty($this->session->userdata('email')))
		{
			redirect('/home/');
		}

		if($valide == false)
		{
			$this->layout->setTitre('Welcome on Peterbook.');
			$this->layout->views('headerIndex')
						->view('index');	
		}
	}
	
}