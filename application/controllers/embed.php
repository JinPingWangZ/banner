<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Embed extends CI_Controller {

    public function __construct() {

		parent::__construct();
		$this->load->model('banner_model', '', TRUE);
    }

	public function get_selected_banner() {

		echo json_encode($this->banner_model->get_selected_banner($_GET['user_id'], $_GET['banner_id']));
	}
}
