<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Question_Model');
        $teacher_id = $this->session->userdata('teacher_id');
        $this->session->userdata('examiner_id');
        $this->session->userdata('examiner_name');

        if ($teacher_id == NULL) {
            redirect('main', 'refresh');
        }
    }

    public function index() {
        $this->load->view();
    }

    public function make_set() {
        $data = array();
        $data['question_set'] = $this->Question_Model->select_all_question_set();
        $this->load->view('question/make_set', $data);
    }

    public function make_set_info() {
        $this->Question_Model->make_set_confirm_info();
        redirect('question/make_set');
    }
    
    public function delete_set_and_question($set_id) {
        $this->Question_Model->delete_question($set_id);
        $this->Question_Model->delete_set($set_id);
        redirect('question/make_set');
    }

    public function make_question($set_id) {
        $set_id_session['set_id'] = $set_id;
        $this->session->set_userdata($set_id_session);
        $data = array();
        $data['set_details'] = $this->Question_Model->select_set_details_by_id($set_id);
        $data['question_details'] = $this->Question_Model->select_question_details_by_id($set_id);

//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->load->view('question/make_question', $data);
    }

    public function add_question() {
        $data = array();
        $set_id = $this->Question_Model->add_question_info();
        $data['save_message'] = 'আপনার প্রশ্নটি সংরক্ষিত হয়েছে।';
        $this->session->set_userdata($data);
        redirect('question/make_question/' . $set_id, $data);
    }

    public function delete_question($set_id, $question_id) {
        $this->Question_Model->delete_question_info($set_id, $question_id);
        $data['save_message'] = 'আপনার প্রশ্নটি মুছে ফেলা হয়েছে।';
        $this->session->set_userdata($data);
        redirect('question/make_question/' . $set_id, $data);
    }

}
