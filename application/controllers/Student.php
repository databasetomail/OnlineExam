<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
        $student_id = $this->session->userdata('student_id');
        $this->session->userdata('student_name');
        $this->session->userdata('reg_no');

        if ($student_id == NULL) {
            redirect('main', 'refresh');
        }
    }

    public function index() {
        $this->load->view('student/dashboard');
    }

    public function academic_profile() {
        $student_id = $this->session->userdata('student_id');
        $data = array();
        $data['academic_profile'] = $this->Student_Model->select_stu_aca_info_by_id($student_id);
        $this->load->view('student/academic_profile', $data);
    }

    public function question_paper() {
        $data = array();
        $data['set_details'] = $this->Student_Model->select_question_set();

//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->load->view('question/question_paper', $data);
    }

    public function all_question_by_id($set_id) {
        $data = array();
        $data['set_details'] = $this->Question_Model->select_set_details_by_id($set_id);
        $data['question_array'] = $this->Question_Model->select_question_details_by_id($set_id);
        $this->load->view('question/answer_sheet', $data);
    }

    public function student_result_calculation() {
        $data = $this->Question_Model->student_exam_data();

        $set_id = $data['set_id'];
        $exm_id = $data['exm_id'];
        $student_id = $student_id = $this->session->userdata('student_id');

        $sdata = array();
        $sdata['exam_end_succ_msg'] = "পরীক্ষায় অংশগ্রহন করার জন্য আপনাকে ধন্যবাদ।";
        $this->session->set_userdata($sdata);
        $data['result_data'] = $this->Question_Model->get_result_data($student_id, $set_id, $exm_id);
        $this->session->set_userdata($data);
        redirect('student/student_result');
    }

    public function student_result() {
        $data['result_data'] = $this->session->userdata('result_data');

        if ($data['result_data'] != null) {
//            echo "true";
//            echo '<pre>';
//            print_r($data);
//            exit();
            $this->load->view('student/student_result', $data);
        } else {
            redirect('student/all_result');
        }
    }

    public function all_result() {
        $student_id = $this->session->userdata('student_id');
        $data = array();
        $data['result_array'] = $this->Question_Model->exam_result_data($student_id);
        $this->load->view('student/all_result', $data);
    }

    public function exam_result_details_by_id($set_id, $exam_id) {
        $data = array();
        $data['question_data'] = $this->Question_Model->select_question_details_by_id($set_id);
        $data['user_answer_data'] = $this->Question_Model->single_result($exam_id);

        $this->load->view('student/result_sheet_single', $data);
    }

    public function notice_board() {
        $notice_data = array();
        $notice_data['all_notice_data'] = $this->Student_Model->show_all_notices();
//        echo '<pre>';
//        print_r($notice_data);
//        exit();
        $this->load->view('student/notice_board', $notice_data);
    }

    public function student_help() {
        $this->load->view('student/student_help');
    }

    public function help() {
        $message = array();
        $message['student_id'] = $this->session->userdata('student_id');
        $message['subject'] = $this->input->post('subject');
        $message['message_details'] = $this->input->post('message_details');
        $this->Student_Model->sent_help_data($message);
        $sdata = array();
        $sdata['sent_message_data'] = "আপনার বার্তাটি সংশ্লিষ্ট কর্তৃপক্ষের নিকট পাঠানো হয়েছে।";
        $this->session->set_userdata($sdata);
        $this->load->view('student/student_help');
    }

    public function student_setting() {
        $this->load->view('student/student_password_change');
    }

    public function password_change() {

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        if ($password1 == $password2) {
            $password = md5($password1);
            $this->Student_Model->password_change_confirm($password);
            $sdata = array();
            $sdata['message'] = "পাসওয়ার্ড পরিবর্তন হয়েছে।";
            $this->session->set_userdata($sdata);
            redirect('student/student_setting');
        } else {
            $sdata = array();
            $sdata['message'] = "দয়া করে একই পাসওয়ার্ডপ্রেদান করুন।";
            $this->session->set_userdata($sdata);
            redirect('student/student_setting');
        }
    }

    public function logout() {
        $this->session->unset_userdata('student_id');
        $this->session->unset_userdata('student_name');
        $this->session->unset_userdata('reg_no');
        $sdata = array();
        $sdata['exception'] = "সফলভাবে লগআউট হয়েছে!";
        $this->session->set_userdata($sdata);
        redirect('main/student_login');
    }

}
