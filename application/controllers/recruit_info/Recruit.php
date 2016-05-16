<?php
/**
* 
*/
class Recruit extends CI_Controller
{
	private $page_path = 'recruit_info/recruit';

	private $view_path = 'recruit_info/recruit';

	private $model_path = 'recruit_info/recruit_model';
	private $dept_model_path = 'users/department_model';

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model($this->model_path);
		$this->load->helper('url');

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->recruit_model->get()->result();

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
		$data['info'] = $this->recruit_model->get($id)->row();

		$this->load->view("{$this->view_path}/edit", $data);
	}

	//----------------------------------------------------------------------------
	
	public function add_reco()
	{
		$this->load->model($this->model_path);

		$data = array(
			'title' => $this->input->post('title'),
			'title_sub' => $this->input->post('title_sub'),
			'department_id' => $this->input->post('department_id'),
			'sex' => $this->input->post('sex'),
			'limit_year' => $this->input->post('limit_year'),
			'limit_old' => $this->input->post('limit_old'),
			'salary_level' => $this->input->post('salary_level'),
			'number' => $this->input->post('number'),
			'type' => $this->input->post('type'),
			'title_desc' => $this->input->post('title_desc')
		);
		$insert_id = $this->recruit_model->add($data);

		if ($insert_id > 0)
		{
			$this->index();
		}
	}

	public function edit_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$data = array(
			'title' => $this->input->post('title'),
			'title_sub' => $this->input->post('title_sub'),
			'department_id' => $this->input->post('department_id'),
			'sex' => $this->input->post('sex'),
			'limit_year' => $this->input->post('limit_year'),
			'limit_old' => $this->input->post('limit_old'),
			'salary_level' => $this->input->post('salary_level'),
			'number' => $this->input->post('number'),
			'type' => $this->input->post('type'),
			'title_desc' => $this->input->post('title_desc')
		);

		$update_id = $this->recruit_model->update($id, $data);

		if ($update_id > 0)
		{
			$this->index();
		}
	}

	public function del_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$this->recruit_model->delete($id);

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