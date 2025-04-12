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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/dictionary.css">
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
        
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
    </body>
</html>