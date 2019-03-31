<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!isset($this->session->site)) {
			redirect('');
		}
		$this->load->model('dashboard_model');
	}
	
	public function index()
	{
		
		$data['editor'] = '';
		$data['right_content'] = '';
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function phrases()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('text', 'text', 'trim|required');
		
		if ($this->form_validation->run()) {
			$this->dashboard_model->update_record('texts', $this->input->post());
			$this->session->set_flashdata('msg', 'Данные успешно изменены');
			redirect('dashboard/phrases');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->get('texts')->result();
		
		$data['editor'] = 'phrases';
		$data['right_content'] = $this->load->view('editors/phrases', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function whys()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'descriptoion', 'trim|required');
		$this->form_validation->set_rules('link', 'link', 'trim');
		
		if ($this->form_validation->run()) {
			$this->dashboard_model->update_record('whys', $this->input->post());
			$this->session->set_flashdata('msg', 'Данные успешно изменены');
			redirect('dashboard/whys');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->get('whys')->result();
		
		$data['editor'] = 'whys';
		$data['right_content'] = $this->load->view('editors/whys', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function partners()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'descriptoion', 'trim|required');
		$this->form_validation->set_rules('link', 'link', 'trim');
		
		if ($this->form_validation->run()) {
			$this->dashboard_model->update_record('partners', $this->input->post());
			$this->session->set_flashdata('msg', 'Данные успешно изменены');
			redirect('dashboard/partners');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->get('partners')->result();
		
		$data['editor'] = 'partners';
		$data['right_content'] = $this->load->view('editors/partners', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function admin()
	{
		$this->form_validation->set_rules('login', 'login', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		
		if ($this->form_validation->run()) {
			$new_data = $this->input->post();
			$new_data['password'] = md5($new_data['password']);
			$new_data['id'] = 1;
			$this->dashboard_model->update_record('admin', $new_data);
			$this->session->set_flashdata('msg', 'Данные успешно изменены');
			redirect('dashboard/admin');
		}
		 
		$data_r = $this->dashboard_model->db->get('admin')->row();
		
		$data['editor'] = 'admin';
		$data['right_content'] = $this->load->view('editors/admin', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
}
