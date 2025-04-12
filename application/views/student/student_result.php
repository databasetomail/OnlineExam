
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_result.css">
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
                <?php
                $succ_message = $this->session->userdata('exam_end_succ_msg');

                if (isset($succ_message)) {
                    ?>
                    <div style="color: green;" class="text-center"><?php echo $succ_message ?></div>
                    <?php
                }
                $this->session->unset_userdata('exam_end_succ_msg');

                if (isset($result_data)) {
                    ?>
                    <br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading"> <?php echo $result_data->exam_name; ?> পরীক্ষার ফলাফল: </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-center" style="color: black;">
                                        প্রশ্নের বিবরণ
                                    </td>
                                    <td class="text-center" style="color: black;">
                                        আপনার মোট নম্বর 
                                    </td>
                                    <td class="text-center" style="color: black;">
                                        আপনার শতকরা নম্বর
                                    </td>
                                    <td class="text-center" style="color: black;">
                                        আপনার প্রাপ্ত গ্রেড
                                    </td>
                                    <td class="text-center" style="color: black;">
                                        বিস্তারিত
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        বিষয়ের নাম: <?php echo $result_data->subject_name; ?> <br/> সেটের নাম: <?php echo $result_data->set_name; ?> <br/> মোট নম্বর: <?php echo $result_data->full_marks; ?> <br/> প্রতিটি ভুল প্রশ্নের জন্য নম্বর কর্তন হয়েছে:  <?php echo $result_data->mark_minus; ?>  <br/> পরীক্ষা শেষ করার সময়:  <?php echo $result_data->time; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $result_data->ache_marks; ?>
                                    </td>
                                    <td class="text-center">                                    
                                        <?php
                                        $total_marks = $result_data->full_marks;
                                        $ache_marks = $result_data->ache_marks;
                                        $percent = ($ache_marks * 100) / $total_marks;
                                        echo $percent = round($percent, 2) . '%';
                                        ?>
                                    </td>
                                    <td style="font-family: Arial" class="text-center">
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
                                    </td>
                                    <td class="text-center">
                                        <a style="color: mediumblue;" style="margin-top: 50px;" href="<?php echo base_url(); ?>student/exam_result_details_by_id/<?php echo $result_data->set_id; ?>/<?php echo $result_data->exam_id; ?>">বিস্তারিত</a></th>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php
                } else {
                    echo '<p class="text-center">ফলাফল দেখতে রেজাল্ট মেনুতে ক্লিক করুন।</p>';
                }
                ?>
            </div>
            <?php $this->session->unset_userdata('result_data'); ?>
        </div>
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
