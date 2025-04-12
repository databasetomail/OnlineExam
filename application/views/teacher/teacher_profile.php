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
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_profile.css">
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

        <div class="Body_Section">
            <div class="container">
                <br/>
                <br/>
                <div class="personal_info_section">
                    <div class="col-lg-12" style="padding-left: 0px !important; padding-right: 0px !important;">
                        <form action="" method="" class="form-horizontal" role="form">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"> শিক্ষার্থীর ব্যক্তিগত তথ্যাদিঃ </legend>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="col-lg-3 control-label"> পরীক্ষার্থীর নাম </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="name" name="student_name" value="<?php echo $academic_profile->examiner_name; ?>" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="f_name" class="col-lg-3 control-label"> পিতার নাম </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $academic_profile->f_name; ?>" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="m_name" class="col-lg-3 control-label"> মাতার নাম </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="m_name" name="m_name" value="<?php echo $academic_profile->m_name; ?>" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob" class="col-lg-3 control-label"> জন্ম তারিখ </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" value="<?php echo $academic_profile->dob; ?>" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="col-lg-3 control-label"> লিঙ্গ </label>
                                        <div class="col-lg-9">
                                            <span class="">
                                            <input type="radio" name="gender" <?php if ($academic_profile->gender == "Male") { ?> checked="true" <?php } ?>value="Male"> পুরুষ
                                            </span>
                                            <span class="gender">
                                                <input type="radio" name="gender" <?php if ($academic_profile->gender == "Female") { ?> checked="true" <?php } ?>value="Female"> মহিলা
                                            </span>
                                            <span class="gender">
                                                <input type="radio" name="gender" <?php if ($academic_profile->gender == "Others") { ?> checked="true" <?php } ?>value="Others"> অন্যান্য 
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pre_add" class="col-lg-3 control-label"> বর্তমান ঠিকানা </label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" cols="54" name="pre_add" disabled=""><?php echo $academic_profile->pre_add; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-lg-3 control-label"> ই-মেইল </label>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $academic_profile->email; ?>" disabled="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-lg-4 col-lg-offset-3">
                                            <img id="photo" src="<?php echo base_url(); ?>Uploaded_Files/User_Photos/<?php echo $academic_profile->photo; ?>" height="180px" width="160px"/>
                                        </div>
                                        <div class="col-lg-5 browse_icon">
                                            <!--<input type='file' onchange="readURL(this);" name="photo"/>-->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="religion" class="col-lg-3 control-label"> ধর্ম  </label>
                                        <div class="col-lg-9">
                                            <select name="religion" disabled> 
                                                <option> ----- সিলেক্ট করুন ---- </option>
                                                <option  <?php if ($academic_profile->religion == "Islam") { ?> selected="true" <?php } ?>value="Islam"> ইসলাম </option>
                                                <option  <?php if ($academic_profile->religion == "Hindu") { ?> selected="true" <?php } ?>value="Hindu"> হিন্দু </option>
                                                <option <?php if ($academic_profile->religion == "Christian") { ?> selected="true" <?php } ?>value="Christian"> খ্রিষ্টান </option>
                                                <option  <?php if ($academic_profile->religion == "Bhuddist") { ?> selected="true" <?php } ?>value="Bhuddist"> বৌদ্ধ </option>
                                                <option  <?php if ($academic_profile->religion == "Others") { ?> selected="true" <?php } ?>value="Others"> অন্যান্য </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="per_add" class="col-lg-3 control-label"> স্থায়ী ঠিকানা. </label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" cols="54" name="per_add" disabled=""><?php echo $academic_profile->per_add; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="col-lg-3 control-label"> মোবাইল  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $academic_profile->mobile; ?>" disabled="">
                                        </div>
                                    </div> 
                                </div>
                            </fieldset>    
                            <br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
    </body>
</html>