<?php
class User_model extends CI_Model {

        public $user_name;
        public $password;
        public $user_type;
        public $email;

        public function get_user () {

                $query = $this->db->query("SELECT * from user WHERE user_type != 1");
                return $query->result();
        }

        public function get_helper () {

                $query = $this->db->query("SELECT * from user LEFT JOIN (SELECT id AS m_id, helper_id, m_status, m_description from `match` WHERE student_id = " . $this->session->userdata('user')->id . ") as `match` on user.id = `match`.helper_id WHERE user_type = 3 AND id != " . $this->session->userdata('user')->id);
                return $query->result();
        }

        public function get_students () {

                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('user_type !=', '1');
                $query = $this->db->get();
                return $query->result();
        }

        public function get_helpers () {

                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('user_type =', 3);
                $query = $this->db->get();
                return $query->result();
        }

        public function delete_user ($id) {

                $this->db->delete('user', array('id' => $id));
        }

        public function get_by_id ($id) {

                $query = $this->db->where('id', $id)->get('user');
                return $query->result();
        }

}

?>