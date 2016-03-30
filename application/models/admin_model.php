<?php
/**
* 
*/
class Admin_Model extends CI_Model
{
	public $table_name = 'manager';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select()
	{
		$this->db->select('*');
		$this->db->from($this->table_name);

		return $this->db->get()->result();
	}
}