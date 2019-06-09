<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_model extends CI_Model {

        public function __construct() {

                $this->load->database();
        }

        public function save_url($data) {

                $query = $this->db->insert('upload', array('user_id' => $data['user_id'], 'url' => $data['url']));
                return true;
        }

        public function get_my_images($user_id) {

                $query = $this->db->query("SELECT * from upload WHERE user_id = " . $user_id);
                return $query->result_array();
        }

}