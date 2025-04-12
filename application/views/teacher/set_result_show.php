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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_view_result.css">
    </head>

    <body>
        <div class="Banner_Section">
            <div class="container-fluid" id="banner">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>

        <div class="Menu_section">
            <div class="container">
                <nav>
                    <ul class="dropdown">
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher"> হোম </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/teacher_profile"> শিক্ষক প্রোফাইল </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>question/make_set"> সেট ও প্রশ্নপত্র  </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/result"> ফলাফল </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/notice_board"> নোটিশ বোর্ড </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/dictionary"> শব্দ ভান্ডার </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/teacher_settings"> সেটিংস </a> </li>
                        <li><a style="color: black;" href="<?php echo base_url(); ?>teacher/logout"> লগআউট </a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br/>
        <div class="Set_Details">
            <div class="container">
                <div class="col-md-12" style="padding-left: 0px !important; padding-right: 0px !important;">
                    <div class="uploaded_notice_show table-responsive">
                        <table class="table table-bordered">
                            <thead style="color: black;">
                                <tr>
                                    <th class="col-xs-1 text-center">নং</th>
                                    <th class="col-xs-2 text-center">পরীক্ষার্থীর নাম</th>
                                    <th class="col-xs-2 text-center"> পিতার নাম</th>
                                    <th class="col-xs-2 text-center"> মাতার নাম </th>
                                    <th class="col-xs-2 text-center"> মোবাইল নং </th>
                                    <th class="col-xs-1 text-center">প্রাপ্ত নম্বর</th>
                                    <th class="col-xs-2 text-center"> পরীক্ষার সময় </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (isset($result_data) && $result_data == NULL) { ?>
                                    <tr>
                                        <th colspan="7" class="text-center">কোন তথ্য পাওয়া যায় নাই।  </th>
                                    </tr>
                                    <?php
                                } else {
                                    $i = 1;
                                    foreach ($result_data as $data) {
                                        ?>
                                        <tr>
                                            <th class="text-center" id="bangla_font"> <?php echo $i++; ?> </th>
                                            <th> <?php echo $data->student_name; ?> </th>
                                            <th> <?php echo $data->f_name; ?> </th>
                                            <th> <?php echo $data->m_name; ?> </th>
                                            <th class="text-center" id="bangla_font"> <?php echo $data->mobile; ?> </th>
                                            <th class="text-center" id="bangla_font"><?php echo $data->ache_marks ?> (<?php echo $data->full_marks ?>) </th>
                                            <th class="text-center" id="bangla_font"><?php echo $data->time; ?> </th>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
    </body>
</html>