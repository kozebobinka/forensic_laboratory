<?
class Dashboard_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->site, TRUE);
	}

	public function update_record($table, $data)
	{	
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
	}

	public function get_menu()
	{	
		$this->db->select('id');
		$this->db->select('name');
		$this->db->select('link');
		$this->db->where('parent', -1);
		$this->db->order_by('prior');
		$common = $this->db->get('menu')->result();
		
		$this->db->select('id');
		$this->db->select('name');
		$this->db->select('prior');
		$this->db->where('parent', 0);
		$this->db->order_by('prior');
		$menu = $this->db->get('menu')->result();
		
		$submenu = FALSE;
		foreach ($menu as $topmenu) {
			$this->db->select('id');
			$this->db->select('name');
			$this->db->select('link');
			$this->db->select('prior');
			$this->db->where('parent', $topmenu->id);
			$this->db->order_by('prior');
		$submenu[$topmenu->id] = $this->db->get('menu')->result();
		}
		
		$result['menu']		= $menu;
		$result['submenu']	= $submenu;
		$result['common']	= $common;
		
		return $result;
	}
}
