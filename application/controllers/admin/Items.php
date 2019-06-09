<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_admin();
        $this->load->model('common_model');
        $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Items';
        $data['items'] = $this->common_model->get_all_items();
        $data['main_content'] = $this->load->view('admin/items/all_items', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new item
    public function add()
    {   
        if ($_POST) {
            
            $data = array(
                'title' => $_POST['title'],
                'summary' => $_POST['summary'],
                'category_id' => $_POST['category'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            $id = $this->common_model->insert($data, 'items');

            //-- image upload code
            if(!empty($_FILES['photo']['name'] )){
                $up_load = $this->common_model->upload_image('1200');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $data_img = $this->security->xss_clean($data_img);
                $this->common_model->edit_option($data_img, $id, 'items'); 
            }

            $this->session->set_flashdata('msg', 'Item added Successfully');
            redirect(base_url('admin/items'));
        }
            
        $data = array();
        $data['page_title'] = 'Items';
        $data['categories'] = $this->common_model->get_categories();
        $data['main_content'] = $this->load->view('admin/items/add_item', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    //-- edit item
    public function edit($id)
    {
        if ($_POST) {

            $data = array(
                'title' => $_POST['title'],
                'summary' => $_POST['summary'],
                'category_id' => $_POST['category'],
                'description' => $_POST['description'],
                'status' => $_POST['status']
            );

            $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $id, 'items');

            //-- image upload code
            if(!empty($_FILES['photo']['name'] )){
                $up_load = $this->common_model->upload_image('1200');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $data_img = $this->security->xss_clean($data_img);
                $this->common_model->edit_option($data_img, $id, 'items'); 
            }

            $this->session->set_flashdata('msg', 'Item edited Successfully');
            redirect(base_url('admin/items'));

        }

        $data['item'] = $this->common_model->get_item_by_id($id, 'items');
        $data['categories'] = $this->common_model->get_categories();
        $data['main_content'] = $this->load->view('admin/items/edit_item', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active item
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'items');
        $this->session->set_flashdata('msg', 'Item active Successfully');
        redirect(base_url('admin/items'));
    }

    //-- deactive item
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'items');
        $this->session->set_flashdata('msg', 'Item deactive Successfully');
        redirect(base_url('admin/items'));
    }

    //-- delete item
    public function delete($id)
    {
        $this->common_model->delete($id,'items'); 
        $this->session->set_flashdata('msg', 'Item deleted Successfully');
        redirect(base_url('admin/items'));
    }



}