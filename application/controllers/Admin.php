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
        session_start();
        // 如果找不到管理员的session，则自动跳转到登陆页面
        if(!empty($_SESSION['admin'])){
            $this->index();
        }else{
            $this->login();
        }
    }
    // 登陆页面
    public function login(){
        $this->load->helper('url');
        $this->load->view('login');
    }
    public function index() {
        
    }
    
}
