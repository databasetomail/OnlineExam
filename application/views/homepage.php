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
        <link rel="stylesheet" href="<?php echo base_url();?>Assest/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>Assest/homepage.css">
    </head>

    <body>

        <div class="container">
            <div class="col-lg-12 text-center header">
                <h1> <strong> অনলাইন পরীক্ষায় আপনাকে স্বাগতম! </strong> </h1>
                <hr/> <br/>                
            </div>

            <div class="login">
                <div class="col-lg-2 col-lg-offset-3">
                    <a href="<?php echo base_url() ?>main/student_login">
                        <img src="<?php echo base_url();?>Assest/Icon/Student.png" alt="Student Login" height="100px" width="100px"/>
                    </a>
                </div>

                <div class="col-lg-2 col-lg-offset-2">
                    <a href="<?php echo base_url();?>main/teacher_login">
                        <img src="<?php echo base_url();?>Assest/Icon/Admin.png" alt="Student Login" height="100px" width="100px"/>
                    </a>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>