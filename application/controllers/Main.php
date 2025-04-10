<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $this->load->view('homepage');
    }

    public function student_login() {
        $this->load->view('student_login');
    }

    public function teacher_login() {
        $this->load->view('teacher_login');
    }

    public function student_registration() {
        $this->load->view('student/registration');
    }

    public function student_registration_confirm() {
        $this->Main_Model->registration_confirm_info();
        $sdata = array();
        $sdata['student_reg_succ_msg'] = "Student Information Successfully Saved !";
        $this->session->set_userdata($sdata);
        redirect('main/student_login');
    }

    public function student_login_check() {
        $reg_no = $this->input->post('reg_no');
        $roll_no = $this->input->post('roll_no');
        $password = md5($this->input->post('password'));

        $result = $this->Main_Model->student_login_check_info($reg_no, $roll_no, $password);

        $sdata = array();
        if ($result) {
            $sdata['student_id'] = $result->student_id;
            $sdata['student_name'] = $result->student_name;
            $sdata['roll_no'] = $result->roll_no;
            $sdata['reg_no'] = $result->reg_no;
            $this->session->set_userdata($sdata);
            redirect('student');
        } else {
            $sdata['exception'] = "User Id Or Password Invalid! Please try again.";
            $this->session->set_userdata($sdata);
            redirect('main/student_login');
        }

        function question() {
            $this->load->view('student/question_paper');
        }

    }

    public function teacher_registration() {
        $this->load->view('teacher/registration');
    }

    public function teacher_registration_confirm() {
        $this->Main_Model->teacher_registration_confirm_info();
        $sdata = array();
        $sdata['message'] = "Examiner Info Successfully Saved !";
        $this->session->set_userdata($sdata);
        redirect('main/teacher_registration');
    }

    public function teacher_login_check() {
        $examiner_id = $this->input->post('examiner_id');
        $examiner_mobile = $this->input->post('examiner_mobile');
        $password = md5($this->input->post('password'));

        $result = $this->Main_Model->teacher_login_check_info($examiner_id, $examiner_mobile, $password);

        $sdata = array();
        if ($result) {
            $sdata['teacher_id'] = $result->teacher_id;
            $sdata['examiner_id'] = $result->examiner_id;
            $sdata['examiner_name'] = $result->examiner_name;
            $this->session->set_userdata($sdata);
            redirect('teacher');
        } else {
            $sdata['exception'] = "User Id Or Password Invalid! Please try again.";
            $this->session->set_userdata($sdata);
            redirect('main/teacher_login');
        }
    }

    function question() {
        $this->load->view('student/question_paper');
    }

}

?>
