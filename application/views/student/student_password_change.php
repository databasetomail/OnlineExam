
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/font-awesome-4.7.0/css/font-awesome.min">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_password_change.css">
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>                  
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

        <div class="Body_Section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center">পাসওয়ার্ড  পরিবর্তন</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <p></p>
                        <form action="<?php echo base_url(); ?>student/password_change" method="post" id="passwordForm">
                            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="নতুন পাসওয়ার্ড:" autocomplete="off" required="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> ৮ সংখ্যার হবে <br>
                                    <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> একটি বড় হাতের অক্ষর থাকবে
                                </div>
                                <div class="col-sm-6" style="margin-bottom: 15px;">
                                    <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> একটি ছোট হাতের অক্ষর থাকবে<br/>
                                    <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> একটি নাম্বার থাকবে
                                </div>
                            </div>

                            <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="পুণরায় পাসওয়ার্ড:" autocomplete="off" required="">
                            <div class="row">
                                <div class="col-sm-12" style="margin-bottom: 15px;">
                                    <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> পাসওয়ার্ড মিলেছে   
                                </div>
                            </div>
                            <?php
                            $message = $this->session->userdata('message');

                            if (isset($message)) {
                                ?>
                                <label style="color: yellow;"><?php echo $message ?></label> <br/>
                                <?php
                            }
                            $this->session->unset_userdata('message');
                            ?>

                                <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="পাসওয়ার্ড পরিবর্তন">
                        </form>
                    </div><!--/col-sm-6-->
                </div><!--/row-->
            </div>
        </div>
        <script type="text/javascript">
            
            $("input[type=password]").keyup(function () {
                var ucase = new RegExp("[A-Z]+");
                var lcase = new RegExp("[a-z]+");
                var num = new RegExp("[0-9]+");

                if ($("#password1").val().length >= 8) {
                    $("#8char").removeClass("glyphicon-remove");
                    $("#8char").addClass("glyphicon-ok");
                    $("#8char").css("color", "#00A41E");
                } else {
                    $("#8char").removeClass("glyphicon-ok");
                    $("#8char").addClass("glyphicon-remove");
                    $("#8char").css("color", "#FF0004");
                }

                if (ucase.test($("#password1").val())) {
                    $("#ucase").removeClass("glyphicon-remove");
                    $("#ucase").addClass("glyphicon-ok");
                    $("#ucase").css("color", "#00A41E");
                } else {
                    $("#ucase").removeClass("glyphicon-ok");
                    $("#ucase").addClass("glyphicon-remove");
                    $("#ucase").css("color", "#FF0004");
                }

                if (lcase.test($("#password1").val())) {
                    $("#lcase").removeClass("glyphicon-remove");
                    $("#lcase").addClass("glyphicon-ok");
                    $("#lcase").css("color", "#00A41E");
                } else {
                    $("#lcase").removeClass("glyphicon-ok");
                    $("#lcase").addClass("glyphicon-remove");
                    $("#lcase").css("color", "#FF0004");
                }

                if (num.test($("#password1").val())) {
                    $("#num").removeClass("glyphicon-remove");
                    $("#num").addClass("glyphicon-ok");
                    $("#num").css("color", "#00A41E");
                } else {
                    $("#num").removeClass("glyphicon-ok");
                    $("#num").addClass("glyphicon-remove");
                    $("#num").css("color", "#FF0004");
                }

                if ($("#password1").val() === $("#password2").val()) {
                    $("#pwmatch").removeClass("glyphicon-remove");
                    $("#pwmatch").addClass("glyphicon-ok");
                    $("#pwmatch").css("color", "#00A41E");
                    
                } else {
                    $("#pwmatch").removeClass("glyphicon-ok");
                    $("#pwmatch").addClass("glyphicon-remove");
                    $("#pwmatch").css("color", "#FF0004");
                }
            });
        </script>
    </body>
</html>