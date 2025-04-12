<?php

class Teacher_Model extends CI_Model {

    public function select_examiner_aca_info_by_id($teacher_id) {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('teacher_id', $teacher_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function show_all_notices_by_teacher_id($teacher_id) {
        $this->db->select('*');
        $this->db->from('tbl_notice_data');
        $this->db->where('upload_by', $teacher_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    function save_notice_data($data) {
        $insert_data['notice_detials'] = $data['notice_detials'];
        $insert_data['notice_type'] = $data['notice_type'];
        $insert_data['upload_file'] = $data['upload_file'];
        $insert_data['upload_by'] = $data['upload_by'];
        $this->db->insert('tbl_notice_data', $insert_data);
    }

    public function delete_notice_by_id($notice_id, $upload_file) {
        unlink("Uploaded_Files/Notice_Files/" . $upload_file);

        $this->db->where('notice_id', $notice_id);

        $this->db->delete('tbl_notice_data');
    }

    public function get_set_data_by_teacher_id($teacher_id) {
        $this->db->select('*');
        $this->db->from('tbl_question_set');
        $this->db->where('created_by', $teacher_id);
        $this->db->order_by('set_id', 'DESC');
        $query_result = $this->db->get();
        $data = $result_data['set_details'] = $query_result->result();
        foreach ($data as $key=>$result) {
            $set_id = $result->set_id;
            $this->db->select('*');
            $this->db->from('tbl_result');
            $this->db->where('set_id', $set_id);
            $query_result_new = $this->db->get();
                        
            $result_data[$key]['student_count'] = $query_result_new->num_rows();
            $result_data['result_details'] = $query_result_new->result();
        }
//                    echo '<pre>';
//            print_r($result_data);
//            exit();
        return $result_data;
    }

    public function get_result_data_by_teacher_id($result_data) {
        foreach ($result_data as $result) {
            $set_id = $result->set_id;
            $this->db->select('*');
            $this->db->from('tbl_result');
            $this->db->where('set_id', $set_id);
            $query_result = $this->db->get();
            $result_data = $query_result->result();
        }
        return $result_data;
    }

    public function set_result_by_set_id($set_id) {
        $this->db->select('tbl_student.student_name, tbl_student.f_name, tbl_student.m_name, tbl_student.mobile, result_view.ache_marks, result_view.full_marks, result_view.time');
        $this->db->from('result_view');
        $this->db->join('tbl_student', 'result_view.student_id = tbl_student.student_id', 'left');
        $this->db->where('result_view.set_id', $set_id);
        $this->db->order_by('ache_marks', 'DESC');
        $query_result = $this->db->get();
        $result_data = $query_result->result();
        return $result_data;
    }

    public function password_change_confirm($password) {
        $teacher_id = $this->session->userdata('teacher_id');
        $new_password = array(
            'password' => $password,
        );
        $this->db->where('teacher_id', $teacher_id);
        $this->db->update('tbl_teacher', $new_password);
    }

}
