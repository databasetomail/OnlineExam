<?php

class Question_Model extends CI_Model {

//put your code here

    public function make_set_confirm_info() {
        $data = array();
        $data['exam_name'] = $this->input->post('exam_name');
        $data['subject_name'] = $this->input->post('subject_name');
        $data['set_name'] = $this->input->post('set_name');
        $data['time'] = $this->input->post('time');
        $data['total_question'] = $this->input->post('total_question');
        $data['full_marks'] = $this->input->post('full_marks');
        $data['mark_minus'] = $this->input->post('mark_minus');
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
                    'question_id' => $row->question_id,
                    'question_details' => $row->question_details,
                    'mark' => $row->mark,
                    'answer' => $row->answer,
                    'answer' => $row->answer,
                );
            }
            return $question_array;
        }
    }

    public function add_question_info() {
        $data = array();
        $data['question_details'] = $this->input->post('question_details');
        $data['mark'] = $this->input->post('mark');
        $data['answer'] = $this->input->post('answer');
        $data['set_id'] = $this->input->post('set_id');
        $data['created_by'] = $this->input->post('created_by');
        $set_id = $data['set_id'];
        $this->db->insert('tbl_question', $data);
        return $set_id;
    }

    public function delete_question_info($set_id, $question_id) {
        $this->db->where('question_id', $question_id);
        $this->db->where('set_id', $set_id);
        $this->db->delete('tbl_question');
    }

    public function delete_question($set_id) {
        $this->db->where('set_id', $set_id);
        $this->db->delete('tbl_question');
    }

    public function delete_set($set_id) {
        $this->db->where('set_id', $set_id);
        $this->db->delete('tbl_question_set');
    }

    public function student_exam_data() {
        $set_id = $_POST['set_id'][0];
        $this->db->select('mark_minus');
        $this->db->from('tbl_question_set');
        $this->db->where('set_id', $set_id);
        $minus = $this->db->get();
        $minus = $minus->row();
        $minus = '-' . $minus->mark_minus;

        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->where('set_id', $set_id);
        $query_result = $this->db->get();
        $query_result = $query_result->result();
        $ans = array();
        $calculate_result = 0;
        foreach ($query_result as $key => $result) {

            if ($_POST['answer'][$key] == "") {
                $calculate_result += 0;
            } else if (strcmp($result->answer, $_POST['answer'][$key]) == 0) {
                $ans[$key] = $result->mark;
                $calculate_result += $result->mark;
            } else {
                $ans[$key] = $minus;
                $calculate_result += $minus;
            }
        }
        $uid = uniqid("exm_", FALSE);
        $total_result = array();
        $total_result['set_id'] = $_POST['set_id'][0];
        $total_result['student_id'] = $_POST['student_id'][$key];
        $total_result['ache_marks'] = $calculate_result;
        $total_result['exam_id'] = $uid;
        $this->db->insert('tbl_result', $total_result);

        foreach ($_POST['set_id'] as $key => $value) {
            if ($_POST['answer'][$key] == NULL) {
                $ans[$key] = 0;
            }
            $data = array();
            $data['set_id'] = $_POST['set_id'][$key];
            $data['question_id'] = $_POST['question_id'][$key];
            $data['user_answer'] = $_POST['answer'][$key];
            $data['single_question_marks'] = $ans[$key];
            $data['student_id'] = $_POST['student_id'][$key];
            $data['exam_id'] = $uid;
            $this->db->insert('tbl_user_answer', $data);
        }
        $set_id = array();
        $set_id['set_id'] = $data['set_id'];
        $set_id['exm_id'] = $uid;

        return $set_id;
    }

    public function get_result_data($student_id, $set_id, $exm_id) {
        $this->db->select('*');
        $this->db->from('result_view');
        $this->db->where('student_id', $student_id);
        $this->db->where('exam_id', $exm_id);
        $this->db->where('set_id', $set_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function exam_result_data($student_id) {
        $this->db->select('*');
        $this->db->from('result_view');
        $this->db->where('student_id', $student_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        $result = $query_result->result();

        if ($result) {
            $result_array = array();
            foreach ($result as $row) {
                $result_array[] = array(
                    'id' => $row->id,
                    'exam_id' => $row->exam_id,
                    'subject_name' => $row->subject_name,
                    'set_name' => $row->set_name,
                    'set_id' => $row->set_id,
                    'full_marks' => $row->full_marks,
                    'ache_marks' => $row->ache_marks,
                );
            }
            return $result_array;
        }
    }

//    public function select_question_detail_by_id($set_id) {
//        $this->db->select('*');
//        $this->db->from('tbl_question');
//        $this->db->where('set_id', $set_id);             
//        $query_result = $this->db->get();
//        
//        if ($query_result->num_rows() != 0) {
//            return $query_result->result_array();
//        } else {
//            return false;
//        }
//    }

    public function single_result($exam_id) {
        $this->db->select('question_id, user_answer, single_question_marks');
        $this->db->from('tbl_user_answer');
        $this->db->where('exam_id', $exam_id);
        $query_result = $this->db->get();

        if ($query_result->num_rows() != 0) {
            return $query_result->result_array();
        } else {
            return false;
        }
    }

}
