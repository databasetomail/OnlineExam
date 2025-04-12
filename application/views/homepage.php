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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/homepage.css">
    </head>

    <body>

        <div class="container">
            <div class="col-md-4 col-md-offset-4 header">
                <img src="<?php echo base_url(); ?>Assest/Background/Logo copy.png" alt="Easy Exam" height="100px" width="250px" class="img-responsive image">
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12 text-center headline" >
                <h1 id="bangla_font"> <strong> ইজি এক্সজাম পোর্টালে আপনাকে স্বাগতম! </strong> </h1>
                <hr/> <br/>                
            </div>
        </div>

        <div class="container">
            <div class="login">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-4 col-md-offset-3 col-sm-offset-2 col-xs-offset-1">
                    <a href="<?php echo base_url() ?>main/student_login">
                        <img src="<?php echo base_url(); ?>Assest/Icon/Student.png" alt="Student Login" height="100px" width="100px"/>
                    </a>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-1 col-md-offset-3 col-sm-offset-4 col-xs-offset-3">
                    <a href="<?php echo base_url(); ?>main/teacher_login">
                        <img src="<?php echo base_url(); ?>Assest/Icon/Admin.png" alt="Student Login" height="100px" width="100px"/>
                    </a>
                </div>
            </div>
        </div>

        <div class="container footer">
            <hr/>             
            <div class="col-md-3 col-sm-12 col-xs-12 text-center" >
                কপিরাইট @ ইজি এক্সজাম ২০১৭
            </div>
            <div class="col-md-3 col-md-offset-6 col-sm-12 col-xs-12 text-center" >
                ডেভেলপমেন্ট বাই: ডিআইইউ টিম-৩১               
            </div>
        </div>

        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html> 