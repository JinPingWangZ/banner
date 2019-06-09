<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {

    public function __construct() {

		parent::__construct();
		$this->load->model('user_model', '', TRUE);
		$this->load->model('banner_model', '', TRUE);
		$this->load->model('upload_model', '', TRUE);

		if ($this->session->has_userdata('is_login') == FALSE) {
		    redirect('auth');
		}
    }

	public function index() {

		$this->load->view('editor/index');
	}

	public function get_selected_banner($banner_id) {

		echo json_encode($this->banner_model->get_selected_banner($this->session->userdata('id'), $banner_id));
	}

	public function get_my_banners() {

		echo json_encode($this->banner_model->get_my_banners($this->session->userdata('id')));
	}

	public function get_my_images() {

		echo json_encode($this->upload_model->get_my_images($this->session->userdata('id')));
	}

	public function save_banner() {

		$data = array(
			'banner_title' => $this->input->post('banner_title'),
			'user_id' => $this->session->userdata('id'),
			'banner_id' => $this->input->post('banner_id'),
			'banner_content' => $this->input->post('banner_content'),
			'slide_transition' => $this->input->post('slide_transition'),
			'banner_background' => $this->input->post('banner_background'),
			'sort_num' => $this->input->post('sort_num'),
			'preview_image' => $this->input->post('preview_image'),
			'banner_width' => $this->input->post('banner_width'),
			'banner_height' => $this->input->post('banner_height'),
			'banner_url' => $this->input->post('banner_url'),
			'banner_anchor' => $this->input->post('banner_anchor'),
			'banner_loop' => $this->input->post('banner_loop'),
			'banner_type' => $this->input->post('banner_type')
		);
		if ( $this->banner_model->save_banner($data) ) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	public function rename_banner() {

		$data = array(
			'banner_id' => $this->input->post('banner_id'),
			'banner_title' => $this->input->post('banner_title')
		);
		if ( $this->banner_model->rename_banner($data) ) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	public function delete_banner() {
		$banner_id = $this->input->post('banner_id');
		if ( $this->banner_model->delete_banner($banner_id) ) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	public function do_upload(){

        $config['upload_path']="./uploads/";
        $config['allowed_types']='gif|jpg|png';

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload("file") ) {

	        $data = array('upload_data' => $this->upload->data());
	        $data1 = array(
		        'imgpath' => $data['upload_data']['file_name']
	        );

	        $url = base_url() . 'uploads/' . $data['upload_data']['file_name'];

	        if ($this->upload_model->save_url(array('user_id' => $this->session->userdata('id'), 'url' => $url))) {
	        	echo $url;
	        } else {
	        	echo "failed";
	        }

        } else {

        	echo "failed";

        }
    }

    public function get_templates() {
    	echo json_encode($this->banner_model->get_templates());
    }
}
