<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct() {

		parent::__construct();
		$this->load->model('user_model', '', TRUE);

		if ($this->session->has_userdata('is_login') == FALSE) {

		    redirect('auth');
		}
		
    }

	public function index() {
		$this->load->view('home_page');
	}
}
