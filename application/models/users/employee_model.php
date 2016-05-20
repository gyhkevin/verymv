<?php
/**
* 
*/
class Employee_Model extends CI_Model
{
	// 表名称
	public $table_name = 'employee';
	public $dept_table_name = 'department';

	// 构造函数中实例化数据库对象
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// 查询方法
	public function get($id = 0)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);

		if ($id > 0)
		{
			$this->db->where('id', $id);
		}

		return $this->db->get();
	}

	public function total()
	{
		return $this->db->count_all($this->table_name);
	}

	public function get_with_dept($limit = NULL, $offset = NULL)
	{
		$this->db->select('e.*, d.string');
		$this->db->from("{$this->table_name} AS e");
		$this->db->join("{$this->dept_table_name} AS d", 'e.department_id=d.id', 'LEFT');

		if ($limit != NULL || $offset != NULL)
		{
			$this->db->limit($limit, $offset);
		}

		return $this->db->get();
	}

	public function add($arr)
	{
		$this->db->insert($this->table_name, $arr);
		return $this->db->affected_rows();
	}

	public function update($id = 0, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data);
		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->delete($this->table_name, array('id', $id));
	}
}