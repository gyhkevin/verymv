<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends CI_Controller
{
    private $view_path = 'admin';
    private $page_path = 'Admin';
    
    function __construct() {
        parent::__construct();
    }
    public function index() {
        session_start();
        $this->load->helper('url');
        // $_SESSION['admin'] = 'kevin';
        // 如果找不到管理员的session，则自动跳转到登陆页面
        if(!empty($_SESSION['admin'])){
            $this->load->view($this->view_path);
        }else{
            $this->load->view('login');
        }
    }
    // 登陆页面
    public function login(){
        // 获取登陆信息
        $user = $_POST['user_name'];
        $password = $_POST['password'];
        // 存储session值
        $_SESSION['admin'] = $user;
        
    }
}
