<?php

class Student_Model extends CI_Model {

    //put your code here


    public function select_stu_aca_info_by_id($student_id) {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('student_id', $student_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_question_set() {
        $this->db->select('*');
        $this->db->from('tbl_question_set');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_question_details_by_id() {
        $this->db->select('*');
        $this->db->from('tbl_question');
        $query_result = $this->db->get();

        $result = $query_result->result();

        if ($result) {
            $question_array = array();
            foreach ($result as $row) {
                $question_array[] = array(
                    'question_no' => $row->question_no,
                    'question_details' => $row->question_details,
                    'mark' => $row->mark,
                    'answer' => $row->answer,
                );
            }
            return $question_array;
        }
    }

}
