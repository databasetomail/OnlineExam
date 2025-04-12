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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/all_result.css">
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
        <div class="Body_Section" id="bangla_font">
            <div class="container">
                <table class="table table-bordered">
                    <thead>                        
                        <tr>
                            <th class="col-xs-1 text-center">ক্রমিক নং</th>
                            <th class="col-xs-3 text-center">বিষয়</th>
                            <th class="col-xs-2 text-center">সেট</th>
                            <th class="col-xs-1 text-center">মোট নম্বর</th>
                            <th class="col-xs-1 text-center">প্রাপ্ত নম্বর</th>
                            <th class="col-xs-1 text-center">প্রাপ্ত স্কোর</th>
                            <th class="col-xs-1 text-center">প্রাপ্ত গ্রেড</th>
                            <th class="col-xs-2 text-center">বিস্তারিত</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        if (isset($result_array) && $result_array != null) {
                            foreach ($result_array as $exam_details) {
                                if($exam_details['id'] != Null) {
                                ?>
                                <tr>
                                    <th class="text-center"> <?php echo $i++; ?> </th>
                                    <th class="text-center"><?php echo $exam_details['subject_name']; ?></th>
                                    <th class="text-center"><?php echo $exam_details['set_name']; ?></th>
                                    <th class="text-center"><?php echo $exam_details['full_marks']; ?></th>
                                    <th class="text-center"><?php echo $exam_details['ache_marks']; ?></th>
                                    <th class="text-center">                                    
                                        <?php
                                        $total_marks = $exam_details['full_marks'];
                                        $ache_marks = $exam_details['ache_marks'];
                                        $percent = ($ache_marks * 100) / $total_marks;
                                        echo $percent = round($percent, 2) . '%';
                                        ?>
                                    </th>
                                    <th style="font-family: Arial" class="text-center">

                                        <?php
                                        if ($percent > 80) {
                                            echo "A+";
                                        } else if ($percent >= 75) {
                                            echo "A";
                                        } else if ($percent >= 70) {
                                            echo "A-";
                                        } else if ($percent >= 65) {
                                            echo "B+";
                                        } else if ($percent >= 60) {
                                            echo "B";
                                        } else if ($percent >= 55) {
                                            echo "B-";
                                        } else if ($percent >= 50) {
                                            echo "C+";
                                        } else if ($percent >= 45) {
                                            echo "C";
                                        } else if ($percent >= 40) {
                                            echo "D";
                                        } else if ($percent < 40) {
                                            echo "অকৃতকার্য";
                                        }
                                        ?>
                                    </th>
                                    <th class="text-center">
                                        <a style="color: mediumblue;" href="<?php echo base_url(); ?>student/exam_result_details_by_id/<?php echo $exam_details['set_id']; ?>/<?php echo $exam_details['exam_id']; ?>">বিস্তারিত</a></th>
                                </tr>
                                <?php
                            }
                        else {
                            ?>
                            <tr>
                                <th colspan="8" class="text-center">আপনি এখনও কোন পরীক্ষায় অংশগ্রহন করেন নাই। দয়া করে পরীক্ষা মেনুতে ক্লিক করুন।</th>
                            </tr>
                        <?php }
                        } }
                            else { ?>
                                <tr>
                                <th colspan="8" class="text-center">আপনি এখনও কোন পরীক্ষায় অংশগ্রহন করেন নাই। দয়া করে পরীক্ষা মেনুতে ক্লিক করুন।</th>
                            </tr>
                        <?php    }
                        ?>                        
                    </tbody>
                </table>
            </div>

        </div>
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
