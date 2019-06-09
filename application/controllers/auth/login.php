<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

            parent::__construct();
            $this->load->model('user_model');
    }
    
	public function index() {

		$this->load->view('auth/login', array('error' => ''));
	}

    public function login(){

    		if ($this->form_validation->run('login') == FALSE) {

    			$this->load->view('auth/login');
    		} else {

	    		$input = array(
	    			'email' => $this->input->post('email'),
	    			'password' => $this->input->post('password')
	    		);

    			$query = $this->db->get_where('user', array('email' => $input['email']), 1);

    			if ($query->num_rows() >= 1) {

	    			foreach ($query->result() as $row) {
						$user_data = $row;
					}
					
					if ($user_data->password == hash('md5', $input['password'])) {
			            $this->session->set_userdata('user', $user_data);

			            $this->session->set_tempdata('alert', 'Login Successfully');
			            redirect('/');
			        } else {
			        	$this->load->view('auth/login', array('error_password' => 'Password incorrect'));
			        }

    			} else {

	    			$this->load->view('auth/login', array('error_email' => 'Invalid Email'));
    			}
    		}
    }
}
