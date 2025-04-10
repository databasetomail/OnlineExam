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
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/canvasjs.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_dashboard.css">

        <!---------------------------------------------------- Code for Graph-->
        <script type="text/javascript">

            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "theme1", //theme1
                    title: {
                        text: "বিগত বছরের ফলাফল চার্ট"
                    },
                    animationEnabled: false, // change to true
                    data: [
                        {
                            // Change type to "bar", "area", "spline", "pie",etc.
                            type: "column",
                            dataPoints: [
                                {label: "১ম সাময়িক", y: 10},
                                {label: "২য় সাময়িক", y: 15},
                                {label: "অর্ধঃবার্ষিক", y: 25},
                                {label: "বার্ষিক", y: 30},
                            ]
                        }
                    ]
                });
                chart.render();
            }
        </script>

    </head>

    <body>

        <div class="Banner_Section">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>
        <?php
        $message = $this->session->userdata('student_name');
        $student_id = $this->session->userdata('student_id');
        ?>

        <div class="Menu_section">
            <div class="container">
                <nav>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>student"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/academic_profile/<?php echo $student_id; ?>"> একাডেমিক প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/question_paper" onclick="confirm('আপনি কি পরীক্ষা দিতে চান?')"> পরীক্ষা </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/logout"> লগআউট(<?php echo $roll_no = $this->session->userdata('roll_no'); ?>)</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Body_Section">
            <div class="container">
                <h3> স্বাগতম !   <?php
                    if (isset($message)) {
                        ?>
                        <label style="color: yellow;"><?php echo $message ?> </label>                                        
                        <?php
                    }
                    ?>   
                </h3>
            </div>
        </div>

        <div class="Graph_Section">
            <div class="container">
                <div class="col-lg-6 col-lg-offset-3">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/index.js"></script>
    </body>
</html>
