<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_admin();
    }
    
    public function index(){
        $data = array();
        $data['page_title'] = 'Table';
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function basic(){
        $data = array();
        $data['page_title'] = 'Basic Table';
        $data['main_content'] = $this->load->view('admin/table/basic', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function layout(){
        $data = array();
        $data['page_title'] = 'layout Table';
        $data['main_content'] = $this->load->view('admin/table/layout', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function datatable(){
        $data = array();
        $data['page_title'] = 'Datatable';
        $data['main_content'] = $this->load->view('admin/table/datatable', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function editable(){
        $data = array();
        $data['page_title'] = 'Editable';
        $data['main_content'] = $this->load->view('admin/table/editable', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

}