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
}
