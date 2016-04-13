<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates and open the template
 * in the editor.
 */
class Admin extends CI_Controller {
	private $view_path = 'admin';
	private $model_path = 'admin_model';
	public $page_path = 'Admin';
	function __construct() {
		parent::__construct ();
		session_start ();
	}
	public function index() {
		$this->load->helper ( 'url' );
		// $_SESSION['admin'] = 'kevin';
		// 如果找不到管理员的session，则自动跳转到登陆页面
		$data ['page_path'] = $this->page_path;
		$data ['theme_path'] = $this->config->item ( 'theme_path' );
		if (! empty ( $_SESSION ['admin'] )) {
			$this->load->view ( $this->view_path, $data );
		} else {
			$this->load->view ( 'login', $data );
		}
	}
	// 登陆页面
	public function login() {
		$data ['page_path'] = $this->page_path;
		$this->load->view ( 'login', $data );
	}
	public function auth() {
		// 获取登陆信息
		$user = $_POST ['user_name'];
		$password = md5 ( $_POST ['password'] );
		
		// 查询数据
		$this->load->model ( $this->model_path );
		$data = $this->admin_model->select ();
		if (! empty ( $data )) {
			foreach ( $data as $value ) {
				if ($value->user_name === $user && $value->password === $password) {
					// 存储session值
					$_SESSION ['admin'] = $user;
					// 返回json数据
					exit ( '{"state":1,"info":"登录成功！"}' );
				} else {
					// 返回json数据
					exit ( '{"state":0,"info":"用户不存在！"}' );
				}
			}
		} else {
			exit ( '{"state":2,"info":"登录失败！用户名或密码错误！"}' );
		}
		
	}
}
