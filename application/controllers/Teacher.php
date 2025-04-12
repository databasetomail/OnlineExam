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

    public function teacher_profile() {
        $teacher_id = $this->session->userdata('teacher_id');
        $data = array();
        $data['academic_profile'] = $this->Teacher_Model->select_examiner_aca_info_by_id($teacher_id);
        $this->load->view('teacher/teacher_profile', $data);
    }

    public function notice_board() {
        $teacher_id = $this->session->userdata('teacher_id');
        $notice_data = array();
        $notice_data['all_notice_data'] = $this->Teacher_Model->show_all_notices_by_teacher_id($teacher_id);
        $this->load->view('teacher/notice_board', $notice_data);
    }

    public function notice_data() {
        $data['notice_detials'] = $this->input->post('notice_detials');
        $data['notice_type'] = $this->input->post('notice_type');
        $data['upload_by'] = $this->session->userdata('teacher_id');

        $config = array(
            'upload_path' => APPPATH . '../Uploaded_Files/Notice_Files/',
            'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|xml",
            'overwrite' => TRUE,
            'max_size' => "2000KB",
            'file_name' => uniqid("Notice_", FALSE),
        );

        if (empty($_FILES['upload_file']['name'])) {
            $data['upload_file'] = '404.jpg';
            $this->Teacher_Model->save_notice_data($data);
            redirect('teacher/notice_board');
        } else {
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('upload_file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('teacher/notice_board', $error);
            } else {
                $upload_data = $this->upload->data();
                $data['upload_file'] = $upload_data['file_name'];
                $this->Teacher_Model->save_notice_data($data);
                redirect('teacher/notice_board');
            }
        }
    }

    public function delete_notice($notice_id, $upload_file) {
        $this->Teacher_Model->delete_notice_by_id($notice_id, $upload_file);
        $data = array();
        $data['delete_success'] = "This Notice deleted successfully with uploaded files.";
        redirect('teacher/notice_board', $data);
    }

    public function result() {
        $teacher_id = $this->session->userdata('teacher_id');
        $data = array();
        $data['set_data'] = $this->Teacher_Model->get_set_data_by_teacher_id($teacher_id);

        $this->load->view('teacher/teacher_view_result', $data);
    }
    
    public function full_result_by_set($set_id) {
        ini_set("memory_limit","-1");
        $data = array();
        $data['result_data'] = $this->Teacher_Model->set_result_by_set_id($set_id);
        
//        echo "<pre>";
//        print_r($data);
//        exit();
        $this->load->view('teacher/set_result_show', $data);
    }

    public function teacher_settings() {
        $this->load->view('teacher/teacher_password_change');
    }

    public function password_change() {

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        if ($password1 == $password2) {
            $password = md5($password1);
            $this->Teacher_Model->password_change_confirm($password);
            $sdata = array();
            $sdata['message'] = "পাসওয়ার্ড পরিবর্তন হয়েছে।";
            $this->session->set_userdata($sdata);
            redirect('teacher/teacher_setting');
        } else {
            $sdata = array();
            $sdata['message'] = "দয়া করে একই পাসওয়ার্ডপ্রেদান করুন।";
            $this->session->set_userdata($sdata);
            redirect('teacher/teacher_setting');
        }
    }

    public function dictionary() {
        $this->load->view('teacher/dictionary');
    }

    public function logout() {
        $this->session->unset_userdata('teacher_id');
        $this->session->unset_userdata('examiner_name');
        $sdata = array();
        $sdata['exception'] = "সফলভাবে লগআউট হয়েছে!";
        $this->session->set_userdata($sdata);
        redirect('main/teacher_login');
    }

}
