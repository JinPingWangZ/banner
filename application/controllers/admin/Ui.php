<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ui extends CI_Controller {

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

    public function cards(){
        $data = array();
        $data['page_title'] = 'cards';
        $data['main_content'] = $this->load->view('admin/ui/cards', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function buttons(){
        $data = array();
        $data['page_title'] = 'buttons';
        $data['main_content'] = $this->load->view('admin/ui/buttons', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function modals(){
        $data = array();
        $data['page_title'] = 'modals';
        $data['main_content'] = $this->load->view('admin/ui/modals', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function tooltip(){
        $data = array();
        $data['page_title'] = 'tooltip';
        $data['main_content'] = $this->load->view('admin/ui/tooltip', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function sweet_alert(){
        $data = array();
        $data['page_title'] = 'Sweet Alert';
        $data['main_content'] = $this->load->view('admin/ui/sweet_alert', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function notification(){
        $data = array();
        $data['page_title'] = 'Notification';
        $data['main_content'] = $this->load->view('admin/ui/notification', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function timeline(){
        $data = array();
        $data['page_title'] = 'Timeline';
        $data['main_content'] = $this->load->view('admin/ui/timeline', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function typography(){
        $data = array();
        $data['page_title'] = 'Typography';
        $data['main_content'] = $this->load->view('admin/ui/typography', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function tabs(){
        $data = array();
        $data['page_title'] = 'Tabs';
        $data['main_content'] = $this->load->view('admin/ui/tab', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function bootstrap_ui(){
        $data = array();
        $data['page_title'] = 'Bootstrap_ui';
        $data['main_content'] = $this->load->view('admin/ui/Bootstrap_ui', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    public function google_map(){
        $data = array();
        $data['page_title'] = 'google_map';
        $data['main_content'] = $this->load->view('admin/ui/google_map', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function vector_map(){
        $data = array();
        $data['page_title'] = 'vector_map';
        $data['main_content'] = $this->load->view('admin/ui/vector_map', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function widget(){
        $data = array();
        $data['page_title'] = 'widget';
        $data['main_content'] = $this->load->view('admin/ui/widget', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function morris_chart(){
        $data = array();
        $data['page_title'] = 'morris_chart';
        $data['main_content'] = $this->load->view('admin/ui/morris_chart', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function js_chart(){
        $data = array();
        $data['page_title'] = 'js_chart';
        $data['main_content'] = $this->load->view('admin/ui/js_chart', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function calender(){
        $data = array();
        $data['page_title'] = 'Calender';
        $data['main_content'] = $this->load->view('admin/ui/calender', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function contact(){
        $data = array();
        $data['page_title'] = 'Contact';
        $data['main_content'] = $this->load->view('admin/ui/contact', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function mail(){
        $data = array();
        $data['page_title'] = 'Mail';
        $data['main_content'] = $this->load->view('admin/ui/mailbox', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    


}