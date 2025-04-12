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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_password_reset.css">
    </head>

    <body>

        <div class="container">
            <div class="col-lg-12 text-center header">
                <h1> <strong>  পরীক্ষকের পাসওয়ার্ড পুনরুদ্ধার </strong></h1>
            </div>
        </div>

        <div class="container">
            <div class="login_form">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="<?php echo base_url(); ?>main/teacher_password_reset_confirm" method="POST" class="form-horizontal" role="form" id="form">
                        <fieldset>
                            <legend class="text-center"> ফর্মটি পুরণ করুন:</legend>

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">ইমেইল আইডি :</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" required="">
                                </div>
                            </div>

                            <?php
                            $message = $this->session->userdata('password_reset_success');

                            if (isset($message)) {
                                ?>
                            <div class="col-md-9 col-md-offset-3" style="color: green;"><?php echo $message ?></div>
                                <?php
                            }
                            $this->session->unset_userdata('password_reset_success');
                            ?>
                            <?php
                            $message = $this->session->userdata('password_reset_error');

                            if (isset($message)) {
                                ?>
                                <div class="col-md-9 col-md-offset-3" style="color: red;"><?php echo $message ?></div>
                                <?php
                            }
                            $this->session->unset_userdata('password_reset_error');
                            ?>

                            <div class="form-group">
                                <label for="submit" class="col-md-3 control-label"></label>
                                <div class="col-md-4 help-block">                                    
                                    <a href="<?php echo base_url(); ?>main/teacher_login"> লগইন করুন </a>
                                </div>
                                <div class="col-md-4 col-md-offset-1">
                                    <input type="submit" class="form-control btn-primary" name="submit" value="পাসওয়ার্ড রিসেট" >
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
