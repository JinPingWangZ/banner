<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }

    public function save_banner($data) {

        if ($data['banner_id'] == '0') {
            $query = $this->db->insert('banner', array('user_id' => $data['user_id'], 'banner_title' => $data['banner_title'], 'banner_content' => $data['banner_content'], 'slide_transition' => $data['slide_transition'], 'banner_background' => $data['banner_background'], 'sort_num' => $data['sort_num'], 'preview_image' => $data['preview_image'], 'banner_width' => $data['banner_width'], 'banner_height' => $data['banner_height'], 'banner_url' => $data['banner_url'], 'banner_loop' => $data['banner_loop'], 'banner_type' => $data['banner_type']));
            return true;
        } else {
            $this->db->update('banner', array('banner_content' => $data['banner_content'], 'slide_transition' => $data['slide_transition'], 'banner_title' => $data['banner_title'], 'banner_background' => $data['banner_background'], 'sort_num' => $data['sort_num'], 'preview_image' => $data['preview_image'], 'banner_width' => $data['banner_width'], 'banner_height' => $data['banner_height'], 'banner_anchor' => $data['banner_anchor'], 'banner_url' => $data['banner_url'], 'banner_loop' => $data['banner_loop'], 'banner_type' => $data['banner_type'] ), array('id' => $data['banner_id']));
            return true;
        }
    }

    public function get_selected_banner($user_id, $selected_banner_id) {

        $query = $this->db->query("SELECT * from banner WHERE user_id = " . $user_id . " AND id = " . $selected_banner_id);
        return $query->result();
    }

    public function get_my_banners($user_id) {

        $query = $this->db->query("SELECT * from banner WHERE user_id = " . $user_id . " AND banner_type = 'banner'" );
        return $query->result_array();
    }

    public function delete_banner($banner_id) {

        $query = $this->db->query("DELETE FROM banner WHERE id=" . $banner_id);
        return true;
    }

    public function rename_banner($data) {

        $this->db->update('banner', array('banner_title' => $data['banner_title']), array('id' => $data['banner_id']));
        return true;
    }

    public function get_templates() {
        $template_type = $this->input->post('template_type');
        $template_search_category = $this->input->post('template_search_category');
        $template_width = explode('x', $template_search_category)[0];
        $template_height = explode('x', $template_search_category)[1];
        $this->db->select('id, banner_title, preview_image');
        $this->db->where('banner_type',$template_type);
        $this->db->where('banner_width',$template_width);
        $this->db->where('banner_height',$template_height);
        return $this->db->get('banner')->result_array();
    }

}