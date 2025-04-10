<?php

class Main_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_Model');
    }

    public function registration_confirm_info() {
        $data = array();
        $data['student_name'] = $this->input->post('student_name');
        $data['f_name'] = $this->input->post('f_name');
        $data['m_name'] = $this->input->post('m_name');
        $data['dob'] = $this->input->post('dob');
        $data['gender'] = $this->input->post('gender');
        $data['pre_add'] = $this->input->post('pre_add');
        $data['photo'] = $this->input->post('photo');
        $data['religion'] = $this->input->post('religion');
        $data['per_add'] = $this->input->post('per_add');
        $data['ins_name'] = $this->input->post('ins_name');
        $data['class'] = $this->input->post('class');
        $data['group_name'] = $this->input->post('group_name');
        $data['batch'] = $this->input->post('batch');
        $data['roll_no'] = $this->input->post('roll_no');
        $data['session'] = $this->input->post('session');
        $data['version'] = $this->input->post('version');
        $data['reg_no'] = $this->input->post('reg_no');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $data['mobile'] = $this->input->post('mobile');
        $this->db->insert('tbl_student', $data);
    }

public function student_login_check_info($reg_no, $roll_no, $password) {
$this->db->select('student_id');
$this->db->select('student_name');
$this->db->select('roll_no');
$this->db->select('reg_no');
$this->db->from('tbl_student');
$this->db->where('reg_no', $reg_no);
$this->db->where('roll_no', $roll_no);
$this->db->where('password', $password);
$query_result = $this->db->get();
$result = $query_result->row();
return $result;
}

public function teacher_registration_confirm_info() {
$data = array();
$data['examiner_id'] = $this->input->post('examiner_id');
$data['examiner_name'] = $this->input->post('examiner_name');
$data['examiner_mobile'] = $this->input->post('examiner_mobile');
$data['password'] = md5($this->input->post('password'));
$this->db->insert('tbl_teacher', $data);
}

public function teacher_login_check_info($examiner_id, $examiner_mobile, $password) {
$this->db->select('*');
$this->db->from('tbl_teacher');
$this->db->where('examiner_id', $examiner_id);
$this->db->where('examiner_mobile', $examiner_mobile);
$this->db->where('password', $password);
$query_result = $this->db->get();
$result = $query_result->row();
return $result;
}

}
