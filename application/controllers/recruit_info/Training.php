<?php
/**
* 
*/
class Training extends CI_Controller
{
	private $page_path = 'recruit_info/training';

	private $view_path = 'recruit_info/training';

	private $model_path = 'recruit_info/training_model';
	private $dept_model_path = 'users/department_model';

	function __construct()
	{
		parent::__construct();
	}

	public function index($per_page = '')
	{
		$this->load->model($this->model_path);
		$this->load->library('pagination');
		$this->load->helper('url');

		$total = $this->training_model->total();

		$config['base_url'] = site_url("recruit_info/training/index");
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
		$data['gotdata'] = $this->training_model->get(0, 10, $per_page)->result();

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
		$this->load->model($this->model_path);

		$data['page_path'] = $this->page_path;
		$data['info'] = $this->training_model->get($id)->row();

		$this->load->view("{$this->view_path}/edit", $data);
	}

	//----------------------------------------------------------------------------
	
	public function add_reco()
	{
		$this->load->model($this->model_path);

		$data = array(
			'name' => $this->input->post('name'),
			'lecturer' => $this->input->post('lecturer'),
			'budget' => $this->input->post('budget'),
			'attend_number' => $this->input->post('attend_number'),
			'attend_person' => $this->input->post('attend_person'),
			'attend_address' => $this->input->post('attend_address'),
			'type' => $this->input->post('type'),
			'remark' => $this->input->post('remark')
		);
		$insert_id = $this->training_model->add($data);

		if ($insert_id > 0)
		{
			$this->index();
		}
	}

	public function edit_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$data = array(
			'name' => $this->input->post('name'),
			'lecturer' => $this->input->post('lecturer'),
			'budget' => $this->input->post('budget'),
			'attend_number' => $this->input->post('attend_number'),
			'attend_person' => $this->input->post('attend_person'),
			'attend_address' => $this->input->post('attend_address'),
			'type' => $this->input->post('type'),
			'remark' => $this->input->post('remark')
		);

		$update_id = $this->training_model->update($id, $data);

		if ($update_id > 0)
		{
			$this->index();
		}
	}

	public function del_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$this->training_model->delete($id);

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