<?
class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function chesk_user($in)
	{	
		$this->db = $this->load->database($in['site'], TRUE);
		
		$this->db->select('login');
		$this->db->from('admin');
		$this->db->where('login', $in['login']);
		$this->db->where('password', md5($in['password']));
		$query = $this->db->get();
		
		return $query->row_array();
	}
}
