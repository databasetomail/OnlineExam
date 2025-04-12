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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_registration.css">
        <script class="jsbin" src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-ui.min.js"></script>
        <script class="jsbin" src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <script class="jsbin" src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/image_display_js.js"></script>

        <style>
            article, aside, figure, footer, header, hgroup, 
            menu, nav, section { display: block; }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="col-lg-12 text-center header">
                <p> <strong> পরীক্ষার্থী নিবন্ধন ফর্ম </strong> </p>
            </div>
            <?php
            //                pic upload error show
            if (isset($error)) {
                echo $error;
            }
            ?>
            <div class="personal_info_section">
                <div class="col-lg-12">
                    <form action="<?php echo base_url() ?>main/student_registration_confirm" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"> শিক্ষার্থী  ব্যক্তিগত তথ্যাদিঃ </legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-lg-3 control-label"> পরীক্ষার্থীর নাম * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="student_name" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="f_name" class="col-lg-3 control-label"> পিতার নাম </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="f_name" name="f_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="m_name" class="col-lg-3 control-label"> মাতার নাম </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="m_name" name="m_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dob" class="col-lg-3 control-label"> জন্ম তারিখ </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="বছর-মাস-দিন">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-lg-3 control-label"> লিঙ্গ </label>
                                    <div class="col-lg-9">
                                        <span class="">
                                        <input type="radio" name="gender" value="Male" checked=""> পুরুষ 
                                        </span>
                                        <span class="gender">
                                        <input type="radio" name="gender" value="Female"> মহিলা
                                        </span>
                                        <span class="gender">
                                        <input type="radio" name="gender" value="Other"> অন্যান্য 
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pre_add" class="col-lg-3 control-label"> বর্তমান ঠিকানা </label>
                                    <div class="col-lg-9 pre_add">
                                        <textarea rows="3" cols="54" name="pre_add"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-lg-3 control-label"> ই-মেইল * </label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control" id="email" name="email" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-3">
                                        <img id="photo" src="<?php echo base_url(); ?>Assest/Background/Not_available_icon.jpg" height="180x" width="160px"/>
                                    </div>
                                    <div class="col-lg-5 browse_icon">
                                        <input type='file' onchange="readURL(this);" name="photo"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="religion" class="col-lg-3 control-label"> ধর্ম  </label>
                                    <div class="col-lg-9">
                                        <select name="religion"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option value="Islam"> ইসলাম </option>
                                            <option value="Hindu"> হিন্দু </option>
                                            <option value="Christian"> খ্রিষ্টান </option>
                                            <option value="Bhuddist"> বৌদ্ধ </option>
                                            <option value="Others"> অন্যান্য </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="per_add" class="col-lg-3 control-label"> স্থায়ী ঠিকানা. </label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="54" name="per_add"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mobile" class="col-lg-3 control-label"> মোবাইল *  </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="mobile" name="mobile" required="">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br/>
                        <div class="col-lg-2 col-lg-offset-5 text-center submit">
                            <input type="submit" name="submit" class="btn-primary" size="50px" value="সংরক্ষন করুন"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>