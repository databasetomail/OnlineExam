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
        <div class="container" style="margin-top:  -80px; margin-bottom: 70px;">
            <div class="col-lg-12 text-center header">
                <h1> <strong> পরীক্ষক হিসেবে রেজিষ্ট্রেশন করুনঃ </strong> </h1>
            </div>

            <div class="login_form">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="<?php echo base_url(); ?>Main/teacher_registration_confirm" method="POST" class="form-horizontal" role="form">
                        <fieldset>
                            <legend class="text-center"> ফর্মটি পুরণ করুন:</legend>

                            <div class="form-group">
                                <label for="examiner_id" class="col-md-3 control-label">পরীক্ষক আইডি</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="examiner_id" name="examiner_id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="examiner_name" class="col-md-3 control-label">পরীক্ষকের নাম</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="examiner_name" name="examiner_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="examiner_mobile" class="col-md-3 control-label">মোবাইল নং</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="examiner_mobile" name="examiner_mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">পাসওয়ার্ড</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="re-password" class="col-md-3 control-label">পুণঃ পাসওয়ার্ড</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="re-password" >
                                </div>
                            </div>                                                         

                            <div class="form-group">
                                <label for="submit" class="col-md-3 control-label"></label>
                                <div class="col-md-5 help-block">
                                    <?php
                                    $message = $this->session->userdata('message');

                                    if (isset($message)) {
                                        ?>
                                        <div style="color: green;"><?php echo $message ?> <a href="<?php echo base_url() ?>main/teacher_login">Login Here </a> </div>                                        
                                        <?php
                                    }
                                    $this->session->unset_userdata('message');
                                    ?>                                        
                                </div>
                                
                                <div class="col-md-3 col-md-offset-1">
                                    <input type="submit" class="form-control btn-primary" name="submit" value="সংরক্ষণ করুন" id="submit">
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
