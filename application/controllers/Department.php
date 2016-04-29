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

	public function insert()
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    $data['title'] = 'Create a news item';

	    $this->form_validation->set_rules('title', 'Title', 'required');
	    $this->form_validation->set_rules('text', 'Text', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/header', $data);
	        $this->load->view('news/create');
	        $this->load->view('templates/footer');

	    }
	    else
	    {
	        $this->news_model->set_news();
	        $this->load->view('news/success');
	    }
	}
}