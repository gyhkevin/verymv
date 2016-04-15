<?php
/**
* 
*/
class Department extends CI_Controller
{
	private $view_path = 'department';
	private $model_path = 'department_model';
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('url');
		$data ['admin_path'] = C_ADMIN;
		$data ['department_path'] = C_DEPARTMENT;
		$this->load->view($this->view_path, $data);
	}
}