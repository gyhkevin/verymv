<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Verymv extends CI_Controller
{
	private $view_path = 'home';
	private $page_path = 'Verymv';
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('url');
		$data['menu'] = array(
			'home' => array('', 'HOME'),
			'photo' => array('photo','PHOTOGRAPY'),
			'video' => array('video','VIDEO')
		 );
		$data['page_path'] = $this->page_path;
		$this->load->view($this->view_path, $data);
	}

	public function add()
	{
		var_dump($this->input->post());
	}
}