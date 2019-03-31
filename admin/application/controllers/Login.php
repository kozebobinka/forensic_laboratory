<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	
	public function index()
	{
		if (isset($this->session->site)) {
			redirect('dashboard');
		}
		
		$data['site'] = substr($_SERVER['SERVER_NAME'], 0, strpos($_SERVER['SERVER_NAME'], '.'));

		$this->form_validation->set_rules('site', 'сайт', 'required');
		$this->form_validation->set_rules('login', 'логин', 'required');
		$this->form_validation->set_rules('password', 'пароль', 'required');
		
		if ( ($this->form_validation->run()) and ($user = $this->login_model->chesk_user($this->input->post())) ) {
			$this->session->set_userdata(array('site' => $data['site']));
			redirect('dashboard');
		}
		
		$this->load->load_template('login', $data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
