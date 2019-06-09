<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


    public function __construct() {

		parent::__construct();
		$this->load->model('user_model', '', TRUE);
		$this->load->model('submission_model', '', TRUE);
		$this->load->model('event_model', '', TRUE);

		if ($this->session->userdata('user')->user_type != 1) {

		    redirect('/');
		}
    }	

	public function index() {

		$query = $this->db->query("SELECT * FROM (SELECT * FROM `match` LEFT JOIN (SELECT id AS s_id, user_name AS s_name, email AS s_email FROM `user`) AS student ON `match`.student_id = student.s_id) AS `match` LEFT JOIN (SELECT id AS h_id, user_name AS h_name, email AS h_email FROM `user`) AS helper ON `match`.helper_id = helper.h_id");
		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/match_list.php', array('matchs' => $query->result()));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function create_match ($id=FALSE) {

		if ($id) {

			if ($this->form_validation->run('create_match')) {

				$data = array (
					'student_id' => $this->input->post('student_id'),
					'helper_id' => $this->input->post('helper_id'),
					'm_description' => $this->input->post('m_description'),
					'm_status' => $this->input->post('m_status'),
					'ccapoint' => $this->input->post('ccapoint')
				);

				$this->db->where('id', $id);
				$this->db->update('match', $data);
				$this->session->set_tempdata('alert', 'Update Successfully');
				redirect('admin');
			}

			$query = $this->db->query("select * from `match` where id=" . $id);
			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_match.php', array('id' => $id, 'students' => $this->user_model->get_students(), 'helpers' => $this->user_model->get_helpers(), 'match' => $query->result()));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		} else {

			if ($this->form_validation->run('create_match')) {

				$data = array (
					'student_id' => $this->input->post('student_id'),
					'helper_id' => $this->input->post('helper_id'),
					'm_description' => $this->input->post('m_description'),
					'm_status' => $this->input->post('m_status'),
					'ccapoint' => $this->input->post('ccapoint')
				);

				$this->db->insert('match', $data);
				$this->session->set_tempdata('alert', 'Create Successfully');
				redirect('admin');
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_match.php', array('students' => $this->user_model->get_students(), 'helpers' => $this->user_model->get_helpers() ));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		}
	}

	public function delete_match ($id) {

		$this->db->delete('match', array('id' => $id));
		$this->session->set_tempdata('alert', 'Delete Successfully');
		redirect('admin');
	}

	public function remark () {

		$s_id = $this->input->post('s_id');
		$data = array('s_remark' => $this->input->post('s_remark'), 's_status' => 0);

		$this->db->where('id', $s_id);
		$this->db->update('submission', $data);

		$this->session->set_tempdata('alert', 'Remark Successfully');
		redirect('admin/view_submission');
	}

	public function view_submission() {

		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/view_submission.php', array('submissions' => $this->submission_model->get_all()));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function compose_submission($s_id = FALSE) {

		$this->form_validation->set_message('submission_date','Date error');

		if ( !$s_id ) {
			if (isset($_FILES['s_attachment']))
				$target_file = basename($_FILES["s_attachment"]["name"]);
			else
				$target_file = '';

			if ($this->form_validation->run('compose_submission') == FALSE) {

			} else {

				if ($target_file) {

			        $config['upload_path']          = './uploads/';
			        $config['allowed_types']        = 'txt|csv|doc|pdf';
			        $config['max_size']             = 100;
			        $config['max_width']            = 1024;
			        $config['max_height']           = 768;

			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('s_attachment')) {

							$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
							$this->load->view('admin/compose_submission.php', array('user' => $this->session->userdata('user'), 'students' => $this->user_model->get_students(), 'error' => $this->upload->display_errors()));
							$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
			                return;
			        }
			    }

				$this->submission_model->save_submission($target_file);
				$this->session->set_tempdata('alert', 'Create Successfully');
				redirect('admin/compose_submission');
				return;
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/compose_submission.php', array('user' => $this->session->userdata('user'), 'students' => $this->user_model->get_students(), 'error' => ''));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		} else {

			if (isset($_FILES['s_attachment']))
				$target_file = basename($_FILES["s_attachment"]["name"]);
			else
				$target_file = '';

			if ($this->form_validation->run('compose_submission_update') == FALSE) {

			} else {

				if ($target_file) {

			        $config['upload_path']          = './uploads/';
			        $config['allowed_types']        = 'txt|csv|doc|pdf|docs';
			        $config['max_size']             = 100;
			        $config['max_width']            = 1024;
			        $config['max_height']           = 768;

			        $this->load->library('upload', $config);

			        if (!$this->upload->do_upload('s_attachment')) {

						$target_file = '';
			        }
			    }

				$this->submission_model->update_submission($s_id, $target_file);
				$this->session->set_tempdata('alert', 'Update Successfully');
				redirect('admin/view_submission');
				return;
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/compose_submission.php', array('submission' => $this->submission_model->get_by_id($s_id),'user' => $this->session->userdata('user'), 'students' => $this->user_model->get_students(), 'error' => '', 's_id' => $s_id));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		}
	}

	public function view_event() {

		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/view_event.php', array('events' => $this->event_model->get_all()));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function view_helper() {

		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/view_helper.php', array('helpers' => $this->user_model->get_helper()));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function view_user() {

		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/view_user.php', array('users' => $this->user_model->get_user()));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function create_user($id=FALSE) {

		if ( !$id ) {

			if ($this->form_validation->run('register')) {

				$data = array(
			        'email' => $this->input->post('email'),
			        'user_name' => $this->input->post('user_name'),
			        'password' => hash('md5', $this->input->post('password')),
			        'user_type' => $this->input->post('user_type')
				);

				if ($this->input->post('password') == $this->input->post('password_confirm')) {

					$this->db->insert('user', $data);
					$this->session->set_tempdata('alert', 'Create Successfully');
					redirect('admin/create_user');
				} else {

					$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
					$this->load->view('admin/create_user.php', array('error' => 'Wrong Password Confrimation'));
					$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
					return;
				}
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_user.php', array('error' => ''));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		} else {

			if ($this->form_validation->run('update_user')) {

				if ($this->input->post('password') != '') {

					if ($this->input->post('password') == $this->input->post('password_confirm')) {

						$data = array(
					        'email' => $this->input->post('email'),
					        'user_name' => $this->input->post('user_name'),
					        'user_type' => $this->input->post('user_type'),
					        'password' => hash('md5', $this->input->post('password'))
						);

		                $this->db->where('id', $id);
		                $this->db->update('user', $data);

		                $this->session->set_tempdata('alert', 'Update Successfully');
						redirect('admin/view_user');
					} else {

						$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
						$this->load->view('admin/create_user.php', array('id' => $id,'error' => 'Wrong Password Confrimation', 's_user' => $this->user_model->get_by_id($id)));
						$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
						return;
					}
				} else {

					$data = array(
				        'email' => $this->input->post('email'),
				        'user_name' => $this->input->post('user_name'),
				        'user_type' => $this->input->post('user_type')
					);

	                $this->db->where('id', $id);
	                $this->db->update('user', $data);

	                $this->session->set_tempdata('alert', 'Update Successfully');
	                redirect('admin/view_user');
				}
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_user.php', array('id' => $id, 'error' => '', 's_user' => $this->user_model->get_by_id($id)));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		}
	}

	public function delete_user ($id) {
		
		$this->user_model->delete_user($id);
		$this->session->set_tempdata('alert', 'Delete Successfully');
		redirect('admin/view_user');
	}

	public function view_event_students($e_id) {

		$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
		$this->load->view('admin/view_event_students.php', array('e_id' => $e_id, 'students' => $this->event_model->get_event_students($e_id)));
		$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	}

	public function create_event($e_id=FALSE) {

		if ( !$e_id ) {
			if ($this->form_validation->run('create_event') && isset($_FILES['e_image'])) {

				$target_file = basename($_FILES["e_image"]["name"]);

				if ($target_file) {

			        $config['upload_path']          = './uploads/';
			        $config['allowed_types']        = 'jpg|jpeg|bmp|gif|png|JPG|PNG|GIF|BMP|JPEG';
			        $config['max_size']             = 1000;
			        $config['max_width']            = 1024;
			        $config['max_height']           = 768;

			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('e_image')) {

							$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
							$this->load->view('admin/create_event.php', array('user' => $this->session->userdata('user'), 'error' => $this->upload->display_errors()));
							$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
			                return;
			        }

					$this->event_model->save_event($target_file);
					$this->session->set_tempdata('alert', 'Create Successfully');
					redirect('admin/create_event');
					return;
			    } else {

					$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
					$this->load->view('admin/create_event.php', array('user' => $this->session->userdata('user'), 'error' => 'Choose image file.'));
					$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
	                return;
			    }
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_event.php', array('user' => $this->session->userdata('user'), 'error' => ''));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));

		} else {

			if ($this->form_validation->run('create_event')) {

				if (isset($_FILES['e_image']))
					$target_file = basename($_FILES["e_image"]["name"]);
				else
					$target_file = '';

				if ($target_file != '') {

			        $config['upload_path']          = './uploads/';
			        $config['allowed_types']        = 'jpg|jpeg|bmp|gif|png|JPG|PNG|GIF|BMP|JPEG';
			        $config['max_size']             = 1000;
			        $config['max_width']            = 1024;
			        $config['max_height']           = 768;

			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('e_image')) {

							$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
							$this->load->view('admin/create_event.php', array('event' => $this->event_model->get_by_id($e_id), 'e_id' => $e_id, 'user' => $this->session->userdata('user'), 'error' => $this->upload->display_errors()));
							$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
			                return;
			        }

					$this->event_model->update_event($e_id, $target_file);
					$this->session->set_tempdata('alert', 'Update Successfully');
					redirect('admin/view_event');
					return;
			    }

				$this->event_model->update_event($e_id, $target_file);
				$this->session->set_tempdata('alert', 'Update Successfully');
				redirect('admin/view_event');
				return;
			}

			$this->load->view('admin/header.php', array('user' => $this->session->userdata('user')));
			$this->load->view('admin/create_event.php', array('event' => $this->event_model->get_by_id($e_id), 'e_id' => $e_id, 'user' => $this->session->userdata('user'), 'error' => ''));
			$this->load->view('admin/footer.php', array('user' => $this->session->userdata('user')));
		}
	}

	public function delete_event ($id) {
		
		$this->event_model->delete_event($id);
		$this->session->set_tempdata('alert', 'Delete Successfully');
		redirect('admin/view_event');
	}

	public function delete_submission ($id) {
		
		$this->submission_model->delete_submission($id);
		$this->session->set_tempdata('alert', 'Delete Successfully');
		redirect('admin/view_submission');
	}

	public function check_submission ($id) {

		$this->submission_model->check_submission($id);

		$query = $this->db->query("SELECT * FROM (SELECT s_student FROM submission WHERE id = " . $id . ") AS submission LEFT JOIN `user` ON submission.s_student = `user`.id");
		$s_email = $query->result()[0]->email;

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'weeliangk@gmail.com',
			'smtp_pass' => 'Here put your password'
		);

		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');

		$this->email->from('your email address', 'Admin');
		$this->email->to($s_email);
		$this->email->subject('Hello.');
		$this->email->message('Your submission have been allowed.');

		$this->email->send();

		$this->session->set_tempdata('alert', 'Approved Successfully');
		redirect('admin/view_submission');
	}

	public function send_mail() {
		
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'your email address',
			'smtp_pass' => 'password'
		);

		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');

		$this->email->from('your email address', 'name');
		$this->email->to('');
		$this->email->subject('');
		$this->email->message('');

		$this->email->send();

	}

	public function cca_point() {
		
		$id = $this->input->post('m_id');
		$ccapoint = $this->input->post('ccapoint');
		$this->db->update('match', array('ccapoint' => $ccapoint), array('id' => $id));

		$this->session->set_tempdata('alert', 'CCA Point Successfully');
		redirect('admin');
	}

}
