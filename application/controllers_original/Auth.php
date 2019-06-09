<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('common_model');
    }


    public function index(){
        $data = array();
        $data['page'] = 'Auth';
        $this->load->view('auth/login', $data);
    }


    public function log(){

        if($_POST){ 
            $query = $this->login_model->validate_user();
            
            //-- if valid
            if($query){
                $data = array();
                foreach($query as $row){
                    $data = array(
                        'id' => $row->id,
                        'name' => $row->first_name,
                        'email' =>$row->email,
                        'role' =>$row->role,
                        'is_login' => TRUE
                    );
                    $this->session->set_userdata($data);
                    if ($row->role == 'admin') {
                        $url = base_url('admin/dashboard');
                    } else {
                        $url = base_url('editor');
                    }
                }
                echo json_encode(array('st'=>1,'url'=> $url)); //--success
            }else{
                echo json_encode(array('st'=>0)); //-- error
            }
            
        }else{
            $this->load->view('auth',$data);
        }
    }


    
    function logout(){
        $this->session->sess_destroy();
        $data = array();
        $data['page'] = 'logout';
        $this->load->view('auth/login', $data);
    }

    function register(){
        $data = array();
        $data['page'] = 'Auth';
        $this->load->view('auth/register', $data);
    }

    //-- add new user by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'mobile' => '',
                'country' => '',
                'status' => 0,
                'role' => 'user',
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
            $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
                $user_id = $this->common_model->insert($data, 'user');
            
                if ($this->input->post('role') == "user") {
                    $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'user_id' => $user_id,
                            'action' => $value
                        ); 
                       $role_data = $this->security->xss_clean($role_data);
                       $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'User added Successfully');
                redirect(base_url('auth'));
            } else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('auth/register'));
            }
            
            
            

        }
    }
}