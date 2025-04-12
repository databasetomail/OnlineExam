
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_notice_board.css">
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
        <br>
        <div class="Notice_display_section">
            <div class="container">
                <div class="col-lg-12" style="padding-left: 0px; padding-right: 6px;">
                    <div class="uploaded_notice_show table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center">নং</th>
                                    <th class="col-xs-8 text-center"> সংক্ষিপ্ত নোটিশ</th>
                                    <th class="col-xs-2 text-center">ধরণ</th>
                                    <th class="col-xs-1 text-center"> ডাউনলোড </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($all_notice_data) &&  $all_notice_data != NULL) {
                                    $i = 1;
                                    foreach ($all_notice_data as $data) {
                                        ?>
                                        <tr>
                                            <th><?php
                                                echo $i;
                                                $i++
                                                ?></th>
                                            <th><?php echo $data->notice_detials ?></th>
                                            <th><?php
                                                if ($data->notice_type == 1) {
                                                    echo "Administrative";
                                                } else {
                                                    echo "Others";
                                                }
                                                ?></th>
                                            <th><a href="<?php echo base_url(); ?>Uploaded_Files/Notice_Files/<?php echo $data->upload_file ?>" target="_blank"> ডাউনলোড </a></th>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <tr><th colspan="4" class="text-center"> কোন নোটিশ পাওয়া যায় নাই। </th></tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>