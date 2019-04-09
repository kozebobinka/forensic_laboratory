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
	
	public function menu()
	{
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('prior', 'prior', 'trim|required');
		$this->form_validation->set_rules('cmd', 'cmd', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$post_data = $this->input->post();
			if ($post_data['cmd'] == 'edit') {
				unset($post_data['cmd']);
				if ($post_data['id']) {
					$this->dashboard_model->update_record('menu', $post_data);
					$this->session->set_flashdata("msg", 'Данные успешно изменены');
				} else {
					unset($post_data['id']);
					$this->dashboard_model->db->insert('menu', $post_data);
					$this->session->set_flashdata("msg", 'Данные успешно добавлены');
				}
			} elseif ($post_data['cmd'] == 'delete') {
				$this->dashboard_model->db->where('id', $post_data['id'])->delete('menu');
				$this->session->set_flashdata("msg", 'Данные успешно удалены');
			}
			redirect('dashboard/menu');
		}
		
		$data_r = $this->dashboard_model->get_menu();
		
		$data['editor'] = 'menu';
		$data['right_content']  = $this->load->view('editors/menu', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function menu_page($parent_id, $id)
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim');
		$this->form_validation->set_rules('text', 'text', 'trim');
		
		if ($parent_id == 'delete') {
			$this->dashboard_model->db->where('id', $this->input->post('id'))->delete('menu');
			$this->session->set_flashdata("msg", 'Данные успешно удалены');
			redirect('dashboard/menu');
		}
		
		if ($this->form_validation->run()) {
		
			$post_data = $this->input->post();
			$post_data['parent'] = $parent_id;
			if ($id) {
				$post_data['id'] = $id;
				$this->dashboard_model->update_record('menu', $post_data);
				$this->session->set_flashdata("msg", 'Данные успешно изменены');
			} else {
				$this->dashboard_model->db->insert('menu', $post_data);
				$this->session->set_flashdata("msg", 'Данные успешно добавлены');
			}
			redirect('dashboard/menu');
		}
		
		$data_r['page'] = ($id) 
			? $this->dashboard_model->db->where('id', $id)->get('menu')->row() 
			: (object) array(
				'name' => '',
				'title' => '',
				'text' => '',
				'link' => '',
				'prior' => '',
			);
		$data_r['parent'] = $this->dashboard_model->db->where('id', $parent_id)->get('menu')->row();
		$data_r['parent_id'] = $parent_id;
		$data_r['id'] = $id;
		
		$data['editor'] = 'menu';
		$data['right_content']  = $this->load->view('editors/menu_page', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function phrases()
	{
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('text', 'text', 'trim|required');
		$this->form_validation->set_rules('cmd', 'cmd', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$post_data = $this->input->post();
			$table = $post_data['table'];
			unset($post_data['table']);
			if ($post_data['cmd'] == 'edit') {
				unset($post_data['cmd']);
				if ($post_data['id']) {
					$this->dashboard_model->update_record($table, $post_data);
					$this->session->set_flashdata("msg_$table", 'Данные успешно изменены');
				} else {
					unset($post_data['id']);
					$this->dashboard_model->db->insert($table, $post_data);
					$this->session->set_flashdata("msg_$table", 'Данные успешно добавлены');
				}
			} elseif ($post_data['cmd'] == 'delete') {
				$this->dashboard_model->db->where('id', $post_data['id'])->delete($table);
				$this->session->set_flashdata("msg_$table", 'Данные успешно удалены');
			}
			redirect('dashboard/phrases');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->get('texts')->result();
		
		$data_r_others['others']['usefuls'] = $this->dashboard_model->db->order_by('level')->order_by('prior')->get('usefuls')->result();
		$data_r_others['others']['investigations'] = $this->dashboard_model->db->order_by('prior')->get('investigations')->result();
		$data_r_others['others']['investigation_steps'] = $this->dashboard_model->db->order_by('prior')->get('investigation_steps')->result();
		$data_r_others['others']['footer'] = $this->dashboard_model->db->order_by('prior')->get('footer')->result();
		
		$data_r_others['others_header']['usefuls'] = '"Мы будем полезны"';
		$data_r_others['others_header']['investigations'] = '"Виды исследований"';
		$data_r_others['others_header']['investigation_steps'] = '"Этапы исследования"';
		$data_r_others['others_header']['footer'] = 'Футер';
		
		$data['editor'] = 'phrases';
		$data['right_content']  = $this->load->view('editors/phrases', $data_r, TRUE);
		$data['right_content'] .= $this->load->view('editors/others', $data_r_others, TRUE);
		
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
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('link', 'link', 'trim|required');
		$this->form_validation->set_rules('image', 'image', 'trim');
		$this->form_validation->set_rules('prior', 'prior', 'trim|required');
		
		if ($this->form_validation->run()) {
			$post_data = $this->input->post();
			if ($post_data['cmd'] == 'edit') {
				unset($post_data['cmd']);
				if ($post_data['id']) {
					if (!$post_data['image']) {
						unset($post_data['image']);
					}
					$this->dashboard_model->update_record('partners', $post_data);
					$this->session->set_flashdata('msg', 'Данные успешно изменены');
				} else {
					unset($post_data['id']);
					$this->dashboard_model->db->insert('partners', $post_data);
					$this->session->set_flashdata('msg', 'Данные успешно добавлены');
				}
			} elseif ($post_data['cmd'] == 'delete') {
				$this->dashboard_model->db->where('id', $post_data['id'])->delete('partners');
				$this->session->set_flashdata('msg', 'Данные успешно удалены');
			}
			redirect('dashboard/partners');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->order_by('prior')->get('partners')->result();
		
		$data['editor'] = 'partners';
		$data['right_content'] = $this->load->view('editors/partners', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function services()
	{
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('name_comment', 'name_comment', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('price_comment', 'price_comment', 'trim');
		$this->form_validation->set_rules('price', 'price', 'trim');
		$this->form_validation->set_rules('aside', 'aside', 'trim|required');
		$this->form_validation->set_rules('link', 'link', 'trim');
		
		if ($this->form_validation->run()) {
			$post_data = $this->input->post();
			if ($post_data['cmd'] == 'edit') {
				unset($post_data['cmd']);
				if ($post_data['id']) {
					$this->dashboard_model->update_record('services', $post_data);
					$this->session->set_flashdata('msg', 'Данные успешно изменены');
				} else {
					unset($post_data['id']);
					$this->dashboard_model->db->insert('services', $post_data);
					$this->session->set_flashdata('msg', 'Данные успешно добавлены');
				}
			} elseif ($post_data['cmd'] == 'delete') {
				$this->dashboard_model->db->where('id', $post_data['id'])->delete('services');
				$this->session->set_flashdata('msg', 'Данные успешно удалены');
			}
			redirect('dashboard/services');
		}
		 
		$data_r['items'] = $this->dashboard_model->db->get('services')->result();
		
		$data['editor'] = 'services';
		$data['right_content'] = $this->load->view('editors/services', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	public function admin()
	{
		$this->form_validation->set_rules('cmd', 'cmd', 'trim|required');
		
		if ($this->form_validation->run()) {
			
			$post_data = $this->input->post();
			if ($post_data['cmd'] == 'admin') {
				unset($post_data['cmd']);
				$post_data['password'] = md5($post_data['password']);
				$post_data['id'] = 1;
				$this->dashboard_model->update_record('admin', $post_data);
				$this->session->set_flashdata('msg_admin', 'Данные успешно изменены');
				redirect('dashboard/admin');
			} elseif ($post_data['cmd'] == 'main') {
				unset($post_data['cmd']);
				$this->dashboard_model->update_record('main', $post_data);
				$this->session->set_flashdata('msg_main', 'Данные успешно изменены');
				redirect('dashboard/admin');
			}
		}
		 
		$data_r['admin'] = $this->dashboard_model->db->get('admin')->row();
		$data_r['items'] = $this->dashboard_model->db->where('show_to_admin', 1)->get('main')->result();
		
		$data['editor'] = 'admin';
		$data['right_content'] = $this->load->view('editors/admin', $data_r, TRUE);
		
		$this->load->load_template('dashboard', $data);
	}
	
	// ajax
	public function partners_image()
	{	
		$uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/clients';
		if(!is_dir($uploaddir)) {
			echo "default.png";
			return FALSE;
		}
		
		move_uploaded_file( $_FILES[0]['tmp_name'], "$uploaddir/{$_FILES[0]['name']}" );
		
		echo $_FILES[0]['name'];
	}
}
