<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Online Examination System </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>          
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/result_sheet_single.css">
    </head>

    <body>
        <div class="Banner_Section">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>

        <div class="Menu_section">
            <div class="container">
                <nav>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>student"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/academic_profile"> শিক্ষার্থী প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/question_paper"> পরীক্ষা </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/all_result"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/notice_board"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/student_help"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/student_setting"> সেটিংস </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/logout"> লগআউট</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br/>
        <div class="Body_Section" id="">
            <div class="container">
                <table class="table table-bordered">
                    <thead>                        
                        <tr>
                            <th class="col-xs-1 text-center">ক্রমিক নং</th>
                            <th class="col-xs-4 text-center"> প্রশ্ন </th>
                            <th class="col-xs-3 text-center"> সঠিক উত্তর </th>
                            <th class="col-xs-2 text-center"> আপনার উত্তর </th>
                            <th class="col-xs-2 text-center"> নম্বর</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        $total_marks = 0;

                        if (isset($question_data) && isset($user_answer_data)) {
                            foreach ($question_data as $key => $question_details) {
                                ?>
                                <tr>
                                    <th class="text-center" id="bangla_font"> <?php echo $i++; ?> </th>
                                    <th class="text-center"><?php echo $question_details['question_details']; ?></th>
                                    <th class="text-center"><?php echo $question_details['answer']; ?></th>
                                    <th class="text-center"><?php echo $user_answer_data[$key]['user_answer']; ?></th>
                                    <th class="text-center" id="bangla_font"><?php echo $user_answer_data[$key]['single_question_marks']; ?></th>
                                </tr>
                                <?php
                                $total_marks += $user_answer_data[$key]['single_question_marks'];
                            }
                        }
                        ?>     
                        <tr>
                            <th class="text-right" colspan="4">সর্বমোট নম্বর : </th>
                            <th class="text-center" id="bangla_font"><?php echo $total_marks; ?></th>
                        </tr>
                    </tbody>
                </table>


            </div>

        </div>
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
