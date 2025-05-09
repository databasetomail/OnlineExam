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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_login.css">
    </head>

    <body>
        <div class="container">
            <div class="col-lg-12 text-center header">
                <h1> <strong> পরীক্ষক হিসেবে প্রবেশ করুনঃ </strong> </h1>                     
            </div>
        </div>

        <div class="container">
            <div class="login_form">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php
                    $succ_message = $this->session->userdata('teacher_reg_succ_msg');

                    if (isset($succ_message)) {
                        ?>
                        <label style="color: green;" class="text-center"><?php echo $succ_message ?></label>
                        <?php
                    }
                    $this->session->unset_userdata('teacher_reg_succ_msg');
                    ?>
                    <form action="<?php echo base_url(); ?>main/teacher_login_check" method="POST" class="form-horizontal" role="form">
                        <fieldset>
                            <legend class="text-center"> ফর্মটি পুরণ করুন:</legend>

                            <div class="form-group">
                                <label for="examiner_id" class="col-md-3 control-label">পরীক্ষক আইডি</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="examiner_id" name="examiner_id" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="col-md-3 control-label">মোবাইল নং</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">পাসওয়ার্ড</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="password" name="password" required="">
                                </div>
                            </div>

                            <?php
                            $message = $this->session->userdata('exception');

                            if (isset($message)) {
                                ?>
                                <div style="color: red;"><?php echo $message ?></div>
                                <?php
                            }
                            $this->session->unset_userdata('exception');
                            ?>                                                        

                            <div class="form-group">
                                <div class="col-md-8 help-block">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo base_url(); ?>main"> হোমপেজ </a> &nbsp;&nbsp;/&nbsp;&nbsp;
                                    <a href="<?php echo base_url(); ?>main/teacher_password_reset"> সাহায্য নিন </a>&nbsp;&nbsp; /&nbsp;&nbsp;                                                                  
                                    <a href="<?php echo base_url(); ?>main/teacher_registration"> রেজিষ্ট্রেশন করুন </a>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <input type="submit" class="form-control btn-primary" name="submit" value="প্রবেশ করুন" id="submit">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>

    </body>
</html>
