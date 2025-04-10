<?php

class Question_Model extends CI_Model {

//put your code here

    public function make_set_confirm_info() {
        $data = array();
        $data['exam_name'] = $this->input->post('exam_name');
        $data['subject_name'] = $this->input->post('subject_name');
        $data['set_name'] = $this->input->post('set_name');
        $data['time'] = $this->input->post('time');
        $data['full_marks'] = $this->input->post('full_marks');
        $data['created_by'] = $this->input->post('created_by');
        $this->db->insert('tbl_question_set', $data);
    }

    public function select_all_question_set() {
        $this->db->select('*');
        $this->db->from('tbl_question_set');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_set_details_by_id($set_id) {
        $this->db->select('*');
        $this->db->from('tbl_question_set');
        $this->db->where('set_id', $set_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_question_details_by_id($set_id) {
        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->where('set_id', $set_id);
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

    public function add_question_info() {
        $data = array();
        $data['question_no'] = $this->input->post('question_no');
        $data['question_details'] = $this->input->post('question_details');
        $data['mark'] = $this->input->post('mark');
        $data['answer'] = $this->input->post('answer');
        $data['set_id'] = $this->input->post('set_id');
        $data['created_by'] = $this->input->post('created_by');
        $set_id = $data['set_id'];
        $this->db->insert('tbl_question', $data);
        return $set_id;
    }

}
