<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
    }	
    
	public function index()
	{
		$this->load->view('auth/register');
	}

	public function register () {

		if ($this->form_validation->run('register') == FALSE) {

		    $this->load->view('auth/register');
		} else {

			$data = array(
		        'email' => $this->input->post('email'),
		        'user_name' => $this->input->post('user_name'),
		        'password' => hash('md5', $this->input->post('password')),
		        'user_type' => 2
			);

			if ($this->input->post('password') == $this->input->post('password_confirm')) {

				$this->db->insert('user', $data);
				$this->session->set_userdata('user', (object) $data);
				redirect('');
			} else {

				$this->load->view('auth/register');
			}
		}

	}
}
