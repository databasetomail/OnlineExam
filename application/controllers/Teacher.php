<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $teacher_id = $this->session->userdata('teacher_id');
        $this->session->userdata('examiner_id');
        $this->session->userdata('examiner_name');

        if ($teacher_id == NULL) {
            redirect('main', 'refresh');
        }
    }

    public function index() {
        $this->load->view('teacher/dashboard');
    }

    public function logout() {
        $this->session->unset_userdata('teacher_id');
        $this->session->unset_userdata('examiner_name');
        $sdata = array();
        $sdata['message'] = "You are successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect('main/teacher_login');
    }

}
