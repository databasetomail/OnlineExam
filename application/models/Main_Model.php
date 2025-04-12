<?php

class Main_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_Model');
    }

    public function get_last_student_id() {
        $this->db->select('student_id');
        $this->db->from('tbl_student');
        $this->db->order_by('student_id', "DESC");
        $query_result = $this->db->get();
        $student_id = $query_result->row();
        return $student_id;
    }

    public function registration_confirm_info($data) {
        $this->db->insert('tbl_student', $data);
    }

    public function student_reg_success_email($reg_no, $student_name, $email, $password) {
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('email');
        $this->email->from('databasetomail@gmail.com', 'Admin');
        $this->email->to($email);
        $this->email->subject('Registration Sucessfull: Login Info');
        $this->email->message('Dear ' . $student_name . ' !! Thank you for registration. You Registration No: ' . $reg_no . ' and Password : ' . $password . ' Please login at rashed.bd.education');
        $this->email->send();
    }

    public function student_login_check_info($reg_no, $password) {
        $this->db->select('student_id');
        $this->db->select('student_name');
        $this->db->select('reg_no');
        $this->db->from('tbl_student');
        $this->db->where('reg_no', $reg_no);
        $this->db->where('password', $password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function student_password_check_info($reg_no, $mobile) {
        $this->db->select('student_id');
        $this->db->select('student_name');
        $this->db->select('reg_no');
        $this->db->select('mobile');
        $this->db->from('tbl_student');
        $this->db->where('reg_no', $reg_no);
        $this->db->where('mobile', $mobile);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function get_last_teacher_id() {
        $this->db->select('teacher_id');
        $this->db->from('tbl_teacher');
        $this->db->order_by('teacher_id', "DESC");
        $query_result = $this->db->get();
        $teacher_id = $query_result->row();
        return $teacher_id;
    }

    public function teacher_registration_confirm_info($data) {
        $this->db->insert('tbl_teacher', $data);
    }

    public function teacher_reg_success_email($teacher_id, $examiner_name, $email, $password) {
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('email');
        $this->email->from('databasetomail@gmail.com', 'Admin');
        $this->email->to($email);
        $this->email->subject('Registration Sucessfull: Login Info');
        $this->email->message('Dear ' . $examiner_name . ' !! Thank you for registration. You Registration No: ' . $teacher_id . ' and Password : ' . $password . ' Please login at rashed.bd.education');
        $this->email->send();
    }

    public function teacher_login_check_info($examiner_id, $mobile, $password) {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('examiner_id', $examiner_id);
        $this->db->where('mobile', $mobile);
        $this->db->where('password', $password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_student_id_by_email_id($email) {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('email', $email);
        $query_result = $this->db->get();
        //$result = $query_result->row();
        return $query_result;
    }

    public function reset_password($student_data) {
        date_default_timezone_set('Asia/Dhaka');
        $this->load->helper('string');
        $password = random_string('alnum', 16);
        $this->db->where('student_id', $student_data->student_id);
        $this->db->update('tbl_student', array('password' => MD5($password)));
        $this->load->library('email');
        $this->email->from('databasetomail@gmail.com', 'Admin');
        $this->email->to($student_data->email);
        $this->email->subject('Student Password Reset :: Online Examination System');
        $this->email->message('Dear Student, You have requested the new password, Here is you new password: ' . $password . 'Please change your password at your first login.');
        $this->email->send();
    }

    public function select_teacher_id_by_email_id($email) {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('examiner_email', $email);
        $query_result = $this->db->get();
        //$result = $query_result->row();
        return $query_result;
    }

    public function reset_password_teacher($teacher_data) {
        date_default_timezone_set('Asia/Dhaka');
        $this->load->helper('string');
        $password = random_string('alnum', 16);
        $this->db->where('teacher_id', $teacher_data->teacher_id);
        $this->db->update('tbl_teacher', array('password' => MD5($password)));
        $this->load->library('email');
        $this->email->from('databasetomail@gmail.com', 'Admin');
        $this->email->to($teacher_data->examiner_email);
        $this->email->subject('Examiner Password Reset :: Online Examination System');
        $this->email->message('Dear Examiner !! You have requested the new password, Here is you new password: ' . $password . 'Please change your password at your first login');
        $this->email->send();
    }

}