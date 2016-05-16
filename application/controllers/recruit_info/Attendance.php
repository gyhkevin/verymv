<?php
/**
* 
*/
class Attendance extends CI_Controller
{
	private $page_path = 'recruit_info/attendance';

	private $view_path = 'recruit_info/attendance';

	private $model_path = 'recruit_info/attendance_model';
	private $user_model_path = 'users/employee_model';

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model($this->model_path);
		$this->load->helper('url');

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $this->attendance_model->get()->result();

		$this->load->view("{$this->view_path}/list", $data);
	}

	public function add()
	{
		$this->load->helper('url');
		$this->load->model($this->user_model_path);

		$result = $this->employee_model->get()->result();
		
		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $result;

		$this->load->view("{$this->view_path}/add", $data);
	}

	public function edit($id = 0)
	{
		$this->load->helper('url');
		$this->load->model(array($this->model_path, $this->user_model_path));

		$result = $this->employee_model->get()->result();

		$data['page_path'] = $this->page_path;
		$data['gotdata'] = $result;
		$data['info'] = $this->attendance_model->get($id)->row();

		$this->load->view("{$this->view_path}/edit", $data);
	}

	//----------------------------------------------------------------------------
	
	public function add_reco()
	{
		$this->load->model($this->model_path);

		$data = array(
			'employee_id' => $this->input->post('employee_id'),
			'salary_level' => $this->input->post('salary_level'),
			'salary_pay' => $this->input->post('salary_pay'),
			'other_pay' => $this->input->post('other_pay'),
			'real_pay' => $this->input->post('real_pay'),
			'status' => $this->input->post('status'),
			'remark' => $this->input->post('remark')
		);
		$insert_id = $this->attendance_model->add($data);

		if ($insert_id > 0)
		{
			$this->index();
		}
	}

	public function edit_reco($id = 0)
	{
		$this->load->model($this->model_path);
		
		$data = array(
			'employee_id' => $this->input->post('employee_id'),
			'salary_level' => $this->input->post('salary_level'),
			'salary_pay' => $this->input->post('salary_pay'),
			'other_pay' => $this->input->post('other_pay'),
			'real_pay' => $this->input->post('real_pay'),
			'status' => $this->input->post('status'),
			'remark' => $this->input->post('remark')
		);
		$update_id = $this->attendance_model->update($id, $data);

		if ($update_id > 0)
		{
			$this->index();
		}
	}

	public function del_reco($id = 0)
	{
		$this->load->model($this->model_path);

		$this->attendance_model->delete($id);

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