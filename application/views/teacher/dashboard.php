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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_dashboard.css">
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
                        <li><a href="<?php echo base_url(); ?>teacher"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> শিক্ষক প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>question/make_set"> সেট ও প্রশ্নপত্র তৈরি </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/logout"> লগআউট(<?php echo $examiner_id= $this->session->userdata('examiner_id'); ?>)</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Menu_section">
            <div class="container">
                <h3> Welcome !   <?php
                    $message = $this->session->userdata('examiner_name');

                    if (isset($message)) {
                        ?>
                        <label style="color: yellow;"><?php echo $message ?> </label>                                        
                        <?php
                    }
                    ?>   
                </h3>
            </div>
        </div>



        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
    </body>
</html>