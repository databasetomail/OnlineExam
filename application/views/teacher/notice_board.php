
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/teacher_notice_board.css">
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

        <br/>

        <div class="Notice Upload Section">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>teacher/notice_data" method="POST" enctype="multipart/form-data">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>নোটিশ আপলোড করুন</legend>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="notice_detials">সংক্ষিপ্ত নোটিশ</label>
                                <div class="col-md-8">                     
                                    <textarea class="form-control" id="notice_detials" name="notice_detials" style="height: 100px;"></textarea>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="notice_type">নোটিশের ধরণ</label>
                                <div class="col-md-8">
                                    <label class="radio-inline"><input type="radio" name="notice_type" value="1" checked="">প্রশাসনিক</label>
                                    <label class="radio-inline"><input type="radio" name="notice_type" value="2">অন্যান্য</label>
                                </div>
                            </div>

                            <!-- File Button --> 
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="upload_file">ফাইল সিলেক্ট করুন</label>
                                <div class="col-md-4">
                                    <input id="upload_file" name="upload_file" class="input-file" type="file"> &nbsp; [সর্বোচ্চ ২ মেগাবাইট]
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-4">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">সেভ করুন</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

        <br/>

        <?php
        $succ_message = $this->session->userdata('delete_success');

        if (isset($succ_message)) {
            ?>
            <label style="color: white;"><?php echo $succ_message ?></label>
            <?php
        }
        $this->session->unset_userdata('delete_success');
        ?>        
        <div class="Notice_display_section">
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="uploaded_notice_show table-responsive">
                        <table class="table table-bordered" style="color: black;">
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center">নং</th>
                                    <th class="col-xs-8 text-center">সংক্ষিপ্ত নোটিশ</th>
                                    <th class="col-xs-1 text-center">ধরণ</th>
                                    <th class="col-xs-1 text-center"> ডাউনলোড </th>
                                    <th class="col-xs-1 text-center">একশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($all_notice_data) >= 0) {
                                    $i = 1;
                                    foreach ($all_notice_data as $data) {
                                        ?>
                                        <tr>
                                            <th id="bangla_font" class="text-center"><?php
                                                echo $i;
                                                $i++
                                                ?></th>
                                            <th><?php echo $data->notice_detials ?></th>
                                            <th class="text-center"><?php
                                                if ($data->notice_type == 1) {
                                                    echo "প্রশাসনিক";
                                                } else {
                                                    echo "অন্যান্য";
                                                }
                                                ?></th>
                                            <th class="text-center"><a href="<?php echo base_url(); ?>Uploaded_Files/Notice_Files/<?php echo $data->upload_file ?>" style="color: black;" target="_blank">ফাইল</a></th>
                                            <th class="text-center"><a onclick="return confirm('আপনি কি নোটিশটি মুছে ফেলতে চান?')" href="<?php echo base_url(); ?>Teacher/delete_notice/<?php echo $data->notice_id ?>/<?php echo $data->upload_file ?>" style="color: black;">মুছুন</a></th>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr><th colspan="5">No Data </th></tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>