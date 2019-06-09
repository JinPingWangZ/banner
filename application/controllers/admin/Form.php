<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_admin();
    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Calender';
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function material(){
        $data = array();
        $data['page_title'] = 'material';
        $data['main_content'] = $this->load->view('admin/form/material', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function general(){
        $data = array();
        $data['page_title'] = 'general';
        $data['main_content'] = $this->load->view('admin/form/general', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function validation(){
        $data = array();
        $data['page_title'] = 'validation';
        $data['main_content'] = $this->load->view('admin/form/validation', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function addons(){
        $data = array();
        $data['page_title'] = 'addons';
        $data['main_content'] = $this->load->view('admin/form/add-ons', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


}