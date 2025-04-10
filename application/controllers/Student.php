<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
        $student_id = $this->session->userdata('student_id');
        $this->session->userdata('student_name');
        $this->session->userdata('roll_no');
        $this->session->userdata('reg_no');

        if ($student_id == NULL) {
            redirect('main', 'refresh');
        }
    }

    public function index() {
        $this->load->view('student/dashboard');
    }

    public function academic_profile($student_id) {
        $data = array();
        $data['academic_profile'] = $this->Student_Model->select_stu_aca_info_by_id($student_id);
        $this->load->view('student/academic_profile', $data);
    }

    public function question_paper() {
        $data = array();
        $data['set_details'] = $this->Student_Model->select_question_set();

        $data['question_detail'] = $this->Student_Model->select_question_details_by_id();

//        echo '<pre>';
//        print_r($data);
//        exit;

        $this->load->view('question/question_paper', $data);
    }

    public function logout() {
        $this->session->unset_userdata('student_id');
        $this->session->unset_userdata('student_name');
        $this->session->unset_userdata('roll_no');
        $this->session->unset_userdata('reg_no');
        $sdata = array();
        $sdata['message'] = "You are successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect('main/student_login');
    }

}
