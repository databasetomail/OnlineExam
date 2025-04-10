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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/make_set.css">
        <script>
            $('#button').submit(function (e) {
                e.preventDefault();
                // Coding
                $('#myModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                return false;
            });
        </script>

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
                        <li><a href="<?php echo base_url(); ?>teacher"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> শিক্ষক প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>question/make_set"> সেট ও প্রশ্নপত্র তৈরি </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/logout"> লগআউট(<?php echo $examiner_id = $this->session->userdata('examiner_id'); ?>)</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Make_Question_Section">
            <div class="container">
                <div class="col-lg-12">
                    <div>  </div>

                    <div class="question_header text-center">
                        <h5 class="text-right"> <?php echo $set_details->set_name; ?> </h5>
                        <h3> <strong>  ঢাকা ইন্টারন্যাশনাল ইউনিভার্সিটি </strong> </h3>
                        <h4>  কম্পিউটার সায়েন্স এন্ড ইঞ্জিনিয়ারিং ডিপার্টমেন্ট </h4>
                        <h4>  <?php echo $set_details->exam_name; ?> পরীক্ষা ২০১৭ </h4>
                        <h4>  <?php echo $set_details->subject_name; ?> </h4>
                    </div>
                    <br/>
                    <div>
                        <div class="col-lg-2">
                            <h5> সময়: <?php echo $set_details->time; ?> মিনিট    </h5>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8">
                            <h5> পূর্ণমাণ: <?php echo $set_details->full_marks; ?> </h5>
                        </div>                                                                     
                    </div>
                </div>
            </div>
        </div>

        <br/><br/><br/>

        <?php
        $save_message = $this->session->userdata('save_message');

        if (isset($save_message)) {
            ?>
            <div class="alert alert-success"><?php echo $save_message ?></div>
            <?php
        }
        $this->session->unset_userdata('save_message');
        ?>

        <br/>

        <div class="Make_Question">
            <div class="container">
                <?php
                foreach ($question_details as $question_detail) {
                    ?>
                <div class="col-lg-12" style="margin-bottom: 15px;">
                        <div class="col-lg-1 col-lg-offset-1"><?php echo $question_detail['question_no']; ?></div>
                        <div class="col-lg-8"><?php echo $question_detail['question_details']; ?></div>
                        <div class="col-lg-1"><?php echo $question_detail['mark']; ?></div>
                        <br/>
                        <div class="col-lg-8 col-lg-offset-2">সঠিক উত্তরঃ <?php echo $question_detail['answer']; ?></div>
                    </div>
                <?php } ?>
                <br/>


                <div class="col-lg-2 col-lg-offset-5">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> প্রশ্ন সংযোজন করুন </button>
                </div>

                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title"> নতুন সেট সংযোজন </h4>
                            </div>

                            <form action="<?php echo base_url(); ?>question/add_question" method="POST" class="form-horizontal" role="form">
                                <fieldset>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="question_no" class="col-lg-4 control-label"> প্রশ্ন নং </label>
                                            <div class="col-lg-6">
                                                <select name="question_no"> 
                                                    <option> ----- সিলেক্ট করুন ---- </option>
                                                    <option name="1"> 1 </option>
                                                    <option name="2"> 2 </option>
                                                    <option name="3"> 3 </option>
                                                    <option name="4"> 4 </option>
                                                    <option name="5"> 5 </option>>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="question_details" class="col-lg-4 control-label"> প্রশ্ন </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="question_set_details" name='question_details' >
                                            </div>
                                        </div>                            
                                        <div class="form-group">
                                            <label for="mark" class="col-lg-4 control-label"> নম্বর </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="mark" name="mark">
                                            </div>
                                        </div>                            
                                        <div class="form-group">
                                            <label for="answer" class="col-lg-4 control-label"> উত্তর </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="answer" name="answer">
                                            </div>
                                        </div>                            
                                    </div>
                                    <input type="hidden" name="set_id" value="<?php echo $set_details->set_id; ?>">
                                    <input type="hidden" name="created_by" value="<?php echo $teacher_id = $this->session->userdata('teacher_id'); ?>">                                      
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"> বাতিল করুন </button>
                                        <button type="submit" name="submit" class="btn btn-primary"> সংরক্ষণ করুন </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>                                          
            </div>
        </div>

        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>