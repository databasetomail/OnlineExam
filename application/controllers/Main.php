<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_Model');
    }

    public function index() {
        $this->load->view('homepage');
    }

    public function student_login() {
        $this->load->view('student_login');
    }

    public function student_password_reset() {
        $this->load->view('student_password_reset');
    }

    public function student_password_reset_confirm() {
        $this->load->helper('url');
        $email = $this->input->post('email');

        $student_data = $this->Main_Model->select_student_id_by_email_id($email);

        if ($student_data->num_rows() > 0) {
            $student_data = $student_data->result();
            $student_data = $student_data[0];
            $this->Main_Model->reset_password($student_data);
            $sucess_data = array();
            $sucess_data['password_reset_success'] = "Password has been reset and sent to Email ID: " . "<strong>" . $email . "</strong>";
            $this->session->set_userdata($sucess_data);
            redirect('main/student_password_reset');
        }
        $error_data = array();
        $error_data['password_reset_error'] = "The email id you entered not found on our database";
        $this->session->set_userdata($error_data);
        redirect('main/student_password_reset');
    }

    public function teacher_login() {
        $this->load->view('teacher_login');
    }

    public function teacher_password_reset() {
        $this->load->view('teacher_password_reset');
    }

    public function teacher_password_reset_confirm() {
        $this->load->helper('url');
        $email = $this->input->post('email');

        $teacher_data = $this->Main_Model->select_teacher_id_by_email_id($email);

        if ($teacher_data->num_rows() > 0) {
            $teacher_data = $teacher_data->result();
            $teacher_data = $teacher_data[0];
            $this->Main_Model->reset_password_teacher($teacher_data);
            $sucess_data = array();
            $sucess_data['password_reset_success'] = "Password has been reset and sent to Email ID: " . "<strong>" . $email . "</strong>";
            $this->session->set_userdata($sucess_data);
            redirect('main/teacher_password_reset');
        }
        $error_data = array();
        $error_data['password_reset_error'] = "The email id you entered not found on our database";
        $this->session->set_userdata($error_data);
        redirect('main/teacher_password_reset');
    }

    public function student_registration() {
        $this->load->view('student/registration');
    }

    public function student_registration_confirm() {
        $student_id = $this->Main_Model->get_last_student_id();
        if ($student_id != "") {
            $reg_no = '2017' . $student_id->student_id + 1;
        } else {
            $reg_no = 20171;
        }

        $this->load->helper('string');
        $password = random_string('alnum', 16);
        $email = $this->input->post('email');

        $data = array();
        $data['student_name'] = $this->input->post('student_name');
        $student_name = $this->input->post('student_name');
        $data['f_name'] = $this->input->post('f_name');
        $data['m_name'] = $this->input->post('m_name');
        $data['dob'] = $this->input->post('dob');
        $data['gender'] = $this->input->post('gender');
        $data['pre_add'] = $this->input->post('pre_add');
        $data['religion'] = $this->input->post('religion');
        $data['per_add'] = $this->input->post('per_add');
        $data['reg_no'] = $reg_no;
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($password);
        $data['mobile'] = $this->input->post('mobile');

        $config = array(
            'upload_path' => APPPATH . '../Uploaded_Files/User_Photos/',
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "1000KB",
            'file_name' => "User_" . $reg_no,
            'width' => 160,
            'height' => 180,
        );


        if (empty($_FILES['photo']['name'])) {
            $data['photo'] = 'No_Photo.jpg';
            $this->Main_Model->registration_confirm_info($data);
            $this->Main_Model->student_reg_success_email($reg_no, $student_name, $email, $password);
            $sdata = array();
            $sdata['student_reg_succ_msg'] = "শিক্ষাথীর তথ্য সফলভাবে সংরক্ষিত হয়েছে! লগইন তথ্য আপনার ই-মেইলে প্রেরণ করা হয়েছে।";
            $this->session->set_userdata($sdata);

            redirect('main/student_login');
        } else {
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('student/registration', $error);
            } else {
                $upload_data = $this->upload->data();

                $data['photo'] = $upload_data['file_name'];

                $this->Main_Model->registration_confirm_info($data);
                $this->Main_Model->student_reg_success_email($reg_no, $student_name, $email, $password);
                $sdata = array();
                $sdata['student_reg_succ_msg'] = "শিক্ষাথীর তথ্য সফলভাবে সংরক্ষিত হয়েছে! লগইন তথ্য আপনার ই-মেইলে প্রেরণ করা হয়েছে।";
                $this->session->set_userdata($sdata);

                redirect('main/student_login');
            }
        }
    }

    public function student_login_check() {
        $reg_no = $this->input->post('reg_no');
        $password = md5($this->input->post('password'));

        $result = $this->Main_Model->student_login_check_info($reg_no, $password);

        $sdata = array();
        if ($result) {
            $sdata['student_id'] = $result->student_id;
            $sdata['student_name'] = $result->student_name;
            $sdata['reg_no'] = $result->reg_no;
            $this->session->set_userdata($sdata);
            redirect('student');
        } else {
            $sdata['exception'] = "রেজিস্ট্রেশন নম্বর অথবা পাস্ওয়ার্ড ভুল হয়েছে! দয়াকরে পুনরায় চেষ্টা করুন।";
            $this->session->set_userdata($sdata);
            redirect('main/student_login');
        }
    }

    public function teacher_registration() {
        $this->load->view('teacher/registration');
    }

    public function teacher_registration_confirm() {
        $teacher_id = $this->Main_Model->get_last_teacher_id();
        if ($teacher_id != "") {
            $examiner_id = '2020' . $teacher_id->teacher_id + 1;
        } else {
            $examiner_id = 20201;
        }

        $this->load->helper('string');
        $password = random_string('alnum', 16);
        $email = $this->input->post('email');

        $data = array();
        $data['examiner_name'] = $this->input->post('examiner_name');
        $examiner_name = $this->input->post('examiner_name');
        $data['f_name'] = $this->input->post('f_name');
        $data['m_name'] = $this->input->post('m_name');
        $data['dob'] = $this->input->post('dob');
        $data['gender'] = $this->input->post('gender');
        $data['pre_add'] = $this->input->post('pre_add');
        $data['religion'] = $this->input->post('religion');
        $data['per_add'] = $this->input->post('per_add');
        $data['examiner_id'] = $examiner_id;
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($password);
        $data['mobile'] = $this->input->post('mobile');

        $config = array(
            'upload_path' => APPPATH . '../Uploaded_Files/User_Photos/',
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "1000KB",
            'file_name' => "Teacher_" . $examiner_id,
            'width' => 160,
            'height' => 180,
        );
        
        if (empty($_FILES['photo']['name'])) {
            $data['photo'] = 'No_Photo';
            $this->Main_Model->teacher_registration_confirm_info($data);
            $this->Main_Model->teacher_reg_success_email($examiner_id, $examiner_name, $email, $password);
            $sdata = array();
            $sdata['teacher_reg_succ_msg'] = "তথ্য সফলভাবে সংরক্ষিত হয়েছে! লগইন তথ্য আপনার ই-মেইলে প্রেরণ করা হয়েছে।";
            $this->session->set_userdata($sdata);

            redirect('main/teacher_login');
        }
        else {

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('teacher/registration', $error);
        } else {
            $upload_data = $this->upload->data();

            $data['photo'] = $upload_data['file_name'];

            $this->Main_Model->teacher_registration_confirm_info($data);
            $this->Main_Model->teacher_reg_success_email($examiner_id, $examiner_name, $email, $password);
            $sdata = array();
            $sdata['teacher_reg_succ_msg'] = "তথ্য সফলভাবে সংরক্ষিত হয়েছে! লগইন তথ্য আপনার ই-মেইলে প্রেরণ করা হয়েছে।";
            $this->session->set_userdata($sdata);

            redirect('main/teacher_login');
        }
    }
    }

    public function teacher_login_check() {
        $examiner_id = $this->input->post('examiner_id');
        $mobile = $this->input->post('mobile');
        $password = md5($this->input->post('password'));

        $result = $this->Main_Model->teacher_login_check_info($examiner_id, $mobile, $password);

        $sdata = array();
        if ($result) {
            $sdata['teacher_id'] = $result->teacher_id;
            $sdata['examiner_id'] = $result->examiner_id;
            $sdata['examiner_name'] = $result->examiner_name;
            $this->session->set_userdata($sdata);
            redirect('teacher');
        } else {
            $sdata['exception'] = "ইউজার আইডি অথবা পাস্ওয়ার্ড ভুল হয়েছে! দয়াকরে পুনরায় চেষ্টা করুন।";
            $this->session->set_userdata($sdata);
            redirect('main/teacher_login');
        }
    }

}
