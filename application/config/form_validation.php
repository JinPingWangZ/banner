<?php
$config = array(
        'create_match' => array(
                array(
                        'field' => 'student_id',
                        'label' => 'Student ID',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'helper_id',
                        'label' => 'Helper ID',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'm_description',
                        'label' => 'Description',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'm_status',
                        'label' => 'Status',
                        'rules' => 'required'
                )
        ),
        'update_user' => array(
                array(
                        'field' => 'user_name',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
        ),
        'register' => array(
                array(
                        'field' => 'user_name',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password_confirm',
                        'label' => 'Password Confirmation',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
        ),
        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                )
        ),
        'compose_submission' => array(
                array(
                        'field' => 's_type',
                        'label' => 'Submissin Type',
                        'rules' => 'required'
                ),
                array(
                        'field' => 's_student',
                        'label' => 'Student',
                        'rules' => 'required'
                ),
                array(
                        'field' => 's_date',
                        'label' => 'Date Time',
                        'rules' => 'required|submission_date'
                ),
                array(
                        'field' => 's_description',
                        'label' => 'Submission Description',
                        'rules' => 'required'
                )
        ),
        'compose_submission_update' => array(
                array(
                        'field' => 's_type',
                        'label' => 'Submissin Type',
                        'rules' => 'required'
                ),
                array(
                        'field' => 's_student',
                        'label' => 'Student',
                        'rules' => 'required'
                ),
                array(
                        'field' => 's_date',
                        'label' => 'Date Time',
                        'rules' => 'required'
                ),
                array(
                        'field' => 's_description',
                        'label' => 'Submission Description',
                        'rules' => 'required'
                )
        ),
        'create_event' => array(
                array(
                        'field' => 'e_name',
                        'label' => 'Event Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'e_description',
                        'label' => 'Event Description',
                        'rules' => 'required'
                )
        )
);

function submission_date($date) {

        if ($date >= date('Y-m-d')) {
                return true;
        } else {
                return false;
        }
}

?>