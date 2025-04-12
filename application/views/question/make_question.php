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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/make_question.css">
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
            <div class="container-fluid" id="banner">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>

        <div class="Menu_section">
            <div class="container">
                <nav>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>teacher"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/teacher_profile"> শিক্ষক প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>question/make_set"> সেট ও প্রশ্নপত্র  </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/result"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/notice_board"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/dictionary"> শব্দ ভান্ডার </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/teacher_settings"> সেটিংস </a> </li>
                        <li><a href="<?php echo base_url(); ?>teacher/logout"> লগআউট </a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Make_Question_Section" id="bangla_font">
            <div class="container">
                <div class="col-lg-12">
                    <div>  </div>

                    <?php
                    if (isset($set_details) && $set_details != null) {
                        $total_question = $set_details->total_question;
                        ;
                        ?>

                        <div class="question_header text-center">
                            <h5 class="text-right"> <?php echo $set_details->set_name; ?> </h5>
                            <h3>  <?php echo $set_details->exam_name; ?> পরীক্ষা ২০১৭ </h3>
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
                        <div class="col-lg-12 text-center text-danger">
                            <u>  বি:দ্র: এই সেটে মোট <?php echo $set_details->total_question; ?> টি প্রশ্ন রয়েছে।  প্রতিটি ভূল উত্তরের জন্য <?php echo $set_details->mark_minus; ?> নম্বর কাটা হবে। </u>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <br/><br/>
        <?php
        $save_message = $this->session->userdata('save_message');

        if (isset($save_message)) {
            ?>
            <div class="container">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <p class="alert alert-success"><?php echo $save_message ?></p>
                </div>
            </div>
            <?php
        }
        $this->session->unset_userdata('save_message');
        ?>

        <div class="Make_Question" id="bangla_font">
            <div class="container"> 
                <div>
                    <?php
                    if (isset($question_details) && $question_details == null) {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">কোন প্রশ্ন পাওয়া যায় নাই। দয়া করে প্রশ্ন সংযুক্ত করুন।</th>
                                </tr>
                            </thead>
                        </table>
                        <?php
                    } else {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center">ক্রমিক নং</th>
                                    <th class="col-xs-6 text-center">প্রশ্ন</th>
                                    <th class="col-xs-3 text-center">সঠিক উত্তর</th>
                                    <th class="col-xs-1 text-center">নম্বর</th>
                                    <th class="col-xs-1 text-center">একশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;

                                if (is_array($question_details) || is_object($question_details)) {
                                    foreach ($question_details as $question_detail) {
                                        ?>
                                        <tr>
                                            <th class="text-center"><?php echo $i++; ?></th>
                                            <th><?php echo $question_detail['question_details']; ?></th>
                                            <th><?php echo $question_detail['answer']; ?></th>
                                            <th class="text-center"><?php echo $question_detail['mark']; ?></th>
                                            <th class="text-center"><a onclick="return confirm('আপনি কি প্রশ্নটি মুছে ফেলতে চান?')" style="color: white;" href="<?php echo base_url(); ?>question/delete_question/<?php echo $this->session->userdata('set_id'); ?>/<?php echo $question_detail['question_id']; ?>"> মুছুন </a></th>
                                        </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
                <br/>

                <?php
                if (($total_question - $i) != -1) {
                    ?>
                    <div class="col-lg-2 col-lg-offset-5" style="margin-bottom: 50px;">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> প্রশ্ন সংযোজন করুন </button>
                    </div>
<?php } ?>

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
                                            <div class="form-group" id="bangla_font">
                                                <label for="question_details" class="col-lg-4 control-label"> প্রশ্ন </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="question_set_details" name='question_details' >
                                                </div>
                                            </div>
                                            <div class="form-group" id="bangla_font">
                                                <label for="answer" class="col-lg-4 control-label"> উত্তর </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="answer" name="answer">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="mark" class="col-lg-4 control-label"> নম্বর </label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="mark">
                                                                <span class="glyphicon glyphicon-minus"></span>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="mark"  class="form-control input-number text-center" value="1" min="1" max="10">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="mark">
                                                                <span class="glyphicon glyphicon-plus"></span>
                                                            </button>
                                                        </span>
                                                    </div>
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

        <script type="text/javascript">
            $('.btn-number').click(function (e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });

            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                        // Allow: Ctrl+A
                                (e.keyCode == 65 && e.ctrlKey === true) ||
                                // Allow: home, end, left, right
                                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                            // let it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                    });
        </script>                                    
    </body>
</html>