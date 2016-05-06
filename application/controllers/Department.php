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
		session_start();
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view($this->view_path);
	}
	
}