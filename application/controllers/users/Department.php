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

	public function index($per_page = '')
	{
		$this->load->model($this->model_path);
		$this->load->library('pagination');
		$this->load->helper('url');

		$total = $this->department_model->total();

		$config['base_url'] = site_url("users/department/index");
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="am-active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = FALSE;
		$config['uri_segment'] = 4;
		$config['prev_link'] = FALSE;

		$this->pagination->initialize($config);

		$data['page_path'] = $this->page_path;
		$data['total'] = $total;
		$data['gotdata'] = $this->department_model->get(0, 10, $per_page)->result();

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
		$options = $this->getChildren($this->_tree($gotdata));

		$data['page_path'] = $this->page_path;
		$data['options'] = $options;

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
		$options = $this->getChildren($this->_tree($gotdata));

		$data['page_path'] = $this->page_path;
		$data['options'] = $options;
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
	
	private function _tree($data)
	{
		$tree = array();
		foreach($data as $item)
		{
			if(isset($data[$item['pid']]))
			{
				$data[$item['pid']]['son'][] = &$data[$item['id']];
			}
			else
			{
				$tree[] = &$data[$item['id']];
			}
		}
		return $tree;
	}

	private function getChildren($option, $deep = 0)
	{
		$data = array();
		foreach($option as $row) {
	        $data[] = array("id"=>$row['id'], "name"=>$row['name'],"pid"=>$row['pid'],'deep'=>$deep);
	        if (isset($row['son'])) {
	            $data = array_merge($data, $this->getChildren($row['son'], $deep+1));
	        }
	    }
	    return $data;
	}
}