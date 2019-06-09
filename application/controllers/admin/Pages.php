<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_admin();
    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function blank(){
        $data = array();
        $data['page_title'] = 'Pages';
        $data['main_content'] = $this->load->view('admin/pages/blank', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function profile(){
        $data = array();
        $data['page_title'] = 'Pages';
        $data['main_content'] = $this->load->view('admin/pages/profile', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function invoice(){
        $data = array();
        $data['page_title'] = 'Pages';
        $data['main_content'] = $this->load->view('admin/pages/invoice', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function login(){
        $data = array();
        $data['page_title'] = 'Pages';
        $this->load->view('admin/pages/login', $data);
    }

    public function register(){
        $data = array();
        $data['page_title'] = 'Pages';
        $this->load->view('admin/pages/register', $data);
    }

    public function recover(){
        $data = array();
        $data['page_title'] = 'Pages';
        $this->load->view('admin/pages/recover', $data);
    }

    public function lockscreen(){
        $data = array();
        $data['page_title'] = 'Pages';
        $this->load->view('admin/pages/lockscreen', $data);
    }

    public function error(){
        $data = array();
        $data['page_title'] = 'Pages';
        $this->load->view('admin/pages/error', $data);
    }

    


}