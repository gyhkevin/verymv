<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates and open the template
 * in the editor.
 */
class Employee extends CI_Controller
{
	private $page_path = 'users/employee';

	private $view_path = 'users/employee';

	private $model_path = 'users/employee_model';
	private $dept_model_path = 'users/department_model';

	function __construct()
	{
		parent::__construct ();
	}

	public function index($page = 0)
	{
		$this->load->model($this->model_path);
		$this->load->library('pagination');
		$this->load->helper('url');

		// $page_url = sprintf(
  //           '%s/index/%s/%s/%s/{$per_page}/%s/%s/%s',
  //           $this->page_path, $status, $sort_filed, $sort_mode, $from_date, $end_date, $keyword
  //       );

		// $config['base_url'] = site_url("{$page_path}/index");
		// $config['total_rows'] = $this->employee_model->total();
		// $config['per_page'] = 20;
		// $this->pagination->initialize($config);

		$data['gotdata'] = $this->employee_model->get()->result();
		$data['page_path'] = $this->page_path;

		// 把菜单中的值存放到session，以便直接拿数据，无需重复定义。

		$this->load->view("{$this->view_path}/list", $data);
	}

	public function add()
	{
		$this->load->helper('url');
		$this->load->model($this->dept_model_path);

		$result = $this->department_model->get()->result();
		$gotdata = array();
		foreach ($result as $key => $value)
		{
			$gotdata[$value->id] = array('id' => $value->id, 'pid' => $value->pid, 'name' => $value->name);
		}

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->_tree($gotdata);

		$this->load->view("{$this->view_path}/add", $data);
	}

	public function edit($id = 0)
	{
		$this->load->helper('url');
		$this->load->model(array($this->model_path, $this->dept_model_path));

		$result = $this->department_model->get()->result();
		$gotdata = array();
		foreach ($result as $key => $value)
		{
			$gotdata[$value->id] = array('id' => $value->id, 'pid' => $value->pid, 'name' => $value->name);
		}

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->_tree($gotdata);
		$data['info'] = $this->employee_model->get($id)->row();

		$this->load->view("{$this->view_path}/edit", $data);
	}

	//----------------------------------------------------------------------------
	
	public function add_reco()
	{
		$this->load->model($this->model_path);
		
		$pge_name = $this->input->post('user_name');
		$pge_department = $this->input->post('department_id');
		$pge_sex = $this->input->post('user_sex');
		$pge_phone = $this->input->post('user_phone');
		$pge_status = $this->input->post('user_status');
		$pge_birthday = $this->input->post('user_birthday');

		$data = array('name' => $pge_name, 'department_id' => $pge_department, 'sex' => $pge_sex, 'phone' => $pge_phone, 'birthday' => $pge_birthday, 'create_time' => time(), 'status' => $pge_status);
		$insert_id = $this->employee_model->add($data);

		if ($insert_id > 0)
		{
			$this->index();
		}
	}

	public function edit_reco($id = 0)
	{
		$this->load->model($this->model_path);
		
		$pge_name = $this->input->post('user_name');
		$pge_department = $this->input->post('department_id');
		$pge_sex = $this->input->post('user_sex');
		$pge_phone = $this->input->post('user_phone');
		$pge_status = $this->input->post('user_status');
		$pge_birthday = $this->input->post('user_birthday');

		$data = array('name' => $pge_name, 'department_id' => $pge_department, 'sex' => $pge_sex, 'phone' => $pge_phone, 'birthday' => $pge_birthday, 'create_time' => time(), 'status' => $pge_status);
		$update_id = $this->employee_model->update($id, $data);

		if ($update_id > 0)
		{
			$this->index();
		}
	}

	public function del_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$this->employee_model->delete($id);

		$this->index();
	}

	//----------------------------------------------------------------------------
	
	private function _tree($items)
	{
		$tree = array();
		foreach($items as $item)
		{
			if(isset($items[$item['pid']]))
			{
				$items[$item['pid']]['son'][] = &$items[$item['id']];
			}
			else
			{
				$tree[] = &$items[$item['id']];
			}
		}
		return $tree;
	}
}
