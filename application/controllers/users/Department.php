<?php
/**
* 
*/
class Department extends CI_Controller
{
	private $page_path = 'users/department';

	private $view_path = 'users/department';

	private $model_path = 'users/department_model';

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model($this->model_path);
		$this->load->helper('url');

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->department_model->get()->result();

		$this->load->view("{$this->view_path}/list", $data);
	}

	public function add()
	{
		$this->load->helper('url');
		$this->load->model($this->model_path);

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
		$this->load->model($this->model_path);

		$result = $this->department_model->get()->result();
		$gotdata = array();
		foreach ($result as $key => $value)
		{
			$gotdata[$value->id] = array('id' => $value->id, 'pid' => $value->pid, 'name' => $value->name);
		}

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->_tree($gotdata);
		$data['info'] = $this->department_model->get($id)->row();

		$this->load->view("{$this->view_path}/edit", $data);
	}

	//----------------------------------------------------------------------------
	
	public function add_reco()
	{
		$this->load->model($this->model_path);
		
		$pge_name = $this->input->post('department_name');
		$pge_pid = $this->input->post('department_path');

		if ($pge_pid != 0)
		{
			$gotdata = $this->department_model->get($pge_pid)->row();
			$path = $gotdata->path;
			$string = $gotdata->string . '/' . $pge_name;
		}
		else
		{
			$path = 0;
			$string = $pge_name;
		}

		$data = array('name' => $pge_name, 'pid' => $pge_pid, 'path' => $path, 'string' => $string);
		$insert_id = $this->department_model->add($data);

		if ($pge_pid != 0)
		{
			$this->department_model->update($insert_id, array('path' => $gotdata->path . '/' . $insert_id));
		}

		if ($insert_id > 0)
		{
			$this->index();
		}
	}

	public function edit_reco($id = 0)
	{
		$this->load->model($this->model_path);
		
		$pge_name = $this->input->post('department_name');
		$pge_pid = $this->input->post('department_path');

		if ($pge_pid != 0)
		{
			$gotdata = $this->department_model->get($pge_pid)->row();
			$string = $gotdata->string . '/' . $pge_name;
		}
		else
		{
			$path = 0;
			$string = $pge_name;
		}

		$data = array('name' => $pge_name, 'pid' => $pge_pid, 'path' => $path, 'string' => $string);
		$update_id = $this->department_model->update($id, $data);

		if ($update_id > 0)
		{
			$this->index();
		}
	}

	public function del_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$this->department_model->delete($id);

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