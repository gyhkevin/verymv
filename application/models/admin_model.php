<?php
/**
* 
*/
class Admin_Model extends CI_Model
{
	// 表名称
	public $table_name = 'manager';
	// 构造函数中实例化数据库对象
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// 查询方法
	public function select()
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		// 将查询到的数据返回
		return $this->db->get()->result();
	}
}