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
                <h1> <strong> পরীক্ষার্থী নিবন্ধন ফর্ম </strong> </h1>
            </div>

            <div class="personal_info_section">
                <div class="col-lg-12">
                    <form action="<?php echo base_url() ?>main/student_registration_confirm" method="POST" class="form-horizontal" role="form">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"> শিক্ষার্থী  ব্যক্তিগত তথ্যাদিঃ </legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-lg-3 control-label"> পরীক্ষার্থীর নাম </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="student_name">
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
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-lg-3 control-label"> লিঙ্গ </label>
                                    <div class="col-lg-9">
                                        <input type="radio" name="gender" value="male" checked> পুরুষ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" value="female"> মহিলা &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" value="other"> অন্যান্য 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pre_add" class="col-lg-3 control-label"> বর্তমান ঠিকানা </label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="54" name="pre_add"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-3">
                                        <img id="photo" src="<?php echo base_url(); ?>Assest/Background/Not_available_icon.jpg" height="179x" width="160px"/>
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
                                            <option name="islam"> ইসলাম </option>
                                            <option name="hindu"> হিন্দু </option>
                                            <option name="christian"> খ্রিষ্টান </option>
                                            <option name="bhuddist"> বৌদ্ধ </option>
                                            <option name="others"> অন্যান্য </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="per_add" class="col-lg-3 control-label"> স্থায়ী ঠিকানা. </label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="54" name="per_add"></textarea>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <br/>

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"> একাডেমিক তথ্যাদিঃ </legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="ins_name" class="col-lg-3 control-label"> প্রতিষ্ঠানের নাম </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="ins_name" name="ins_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="class" class="col-lg-3 control-label"> শ্রেণি </label>
                                    <div class="col-lg-9">
                                        <select name="class"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option name="6"> ষষ্ঠ </option>
                                            <option name="7"> সপ্তম </option>
                                            <option name="8"> অষ্টম </option>
                                            <option name="9"> নবম </option>
                                            <option name="10"> দশম </option>
                                            <option name="11"> একাদশ </option>
                                            <option name="12"> দাদশ </option>
                                            <option name="13"> অনার্স </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_name" class="col-lg-3 control-label"> গ্রুপ </label>
                                    <div class="col-lg-9">
                                        <input type="radio" name="group_name" value="science" checked> বিজ্ঞান  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="group_name" value="humanities"> মানবিক &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="group_name" value="commerce"> ব্যবসায় শিক্ষা 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="batch" class="col-lg-3 control-label"> ব্যাচ </label>
                                    <div class="col-lg-9">
                                        <select name="batch"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option name="6"> ৬ </option>
                                            <option name="7"> ৭ </option>
                                            <option name="8"> ৮ </option>
                                            <option name="9"> ৯ </option>
                                            <option name="10"> ১০ </option>
                                            <option name="11"> ১১ </option>
                                            <option name="12"> ১২ </option>
                                            <option name="13"> ১৩ </option>
                                            <option name="31"> ৩১ </option>
                                            <option name="32"> ৩২ </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">                                
                                <div class="form-group">
                                    <label for="roll_no" class="col-lg-3 control-label"> রোল  </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="roll_no" name="roll_no">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="session" class="col-lg-3 control-label"> সেশন  </label>
                                    <div class="col-lg-9">
                                        <select name="session"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option name="2012-13"> ২০১২-১৩ </option>
                                            <option name="2013-14"> ২০১৩-১৪ </option>
                                            <option name="2014-15"> ২০১৪-১৫ </option>
                                            <option name="2015-16"> ২০১৫-১৬ </option>
                                            <option name="2016-17"> ২০১৬-১৭ </option>                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="version" class="col-lg-3 control-label"> ভার্সন </label>
                                    <div class="col-lg-9">
                                        <input type="radio" name="version" value="bangla" checked> বাংলা  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="version" value="english"> English 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="reg_no" class="col-lg-3 control-label"> রেজিষ্ট্রেশন </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="reg_no" name="reg_no">
                                    </div>
                                </div>                               
                            </div>
                        </fieldset>

                        <br/>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"> একাউন্ট তথ্যাদিঃ </legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="col-lg-3 control-label"> ই-মেইল </label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-lg-3 control-label"> পাসওয়ার্ড </label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-lg-6">                                
                                <div class="form-group">
                                    <label for="mobile" class="col-lg-3 control-label"> মোবাইল  </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="c_password" class="col-lg-3 control-label"> পুণরায় পাসওয়ার্ড  </label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" id="c_password" >
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
