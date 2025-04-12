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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/answer_sheet.css">
    </head>

    <body>

        <div class="Banner_Section">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>
        <br/>

        <div class="q_SECTION">
            <div class="container">
                <div class="col-md-6 col-lg-offset-3">
                    <div class="text-center text-danger text-capitalize">
                        <div style="font-weight: bold; font-size: 19px; color: red;" id="quiz-time-left"></div>
                        <script type="text/javascript">
                            var max_time = <?php echo $set_details->time; ?>;
                            var c_seconds = 0;
                            var total_seconds = 60 * max_time;
                            max_time = parseInt(total_seconds / 60);
                            c_seconds = parseInt(total_seconds % 60);
                            document.getElementById("quiz-time-left").innerHTML = 'অবশিষ্ট সময়: ' + max_time + ' : ' + c_seconds;
                            function init() {
                                document.getElementById("quiz-time-left").innerHTML = 'অবশিষ্ট সময়: ' + max_time + ' : ' + c_seconds;
                                setTimeout("CheckTime()", 999);
                            }
                            function CheckTime() {
                                document.getElementById("quiz-time-left").innerHTML = 'অবশিষ্ট সময়: ' + max_time + ' : ' + c_seconds;
                                if (total_seconds <= 0) {
                                    setTimeout('document.quiz.submit()', 1);

                                } else
                                {
                                    total_seconds = total_seconds - 1;
                                    max_time = parseInt(total_seconds / 60);
                                    c_seconds = parseInt(total_seconds % 60);
                                    setTimeout("CheckTime()", 999);
                                }

                            }
                            init();

                            function finishpage()
                            {
                                //alert("unload event detected!");
                                document.quiz.submit();
                            }
                            window.onbeforeunload = function () {
                                setTimeout('document.quiz.submit()', 1);
                            };


                        </script>
                    </div>
                    <br/>
                    <form name="quiz" id="quiz_form" action="<?php echo base_url(); ?>student/student_result_calculation" method="POST" role="form">
                        <?php
                        if (isset($question_array) == null) {
                            echo "কোন প্রশ্ন পাওয়া যায় নাই।";
                        } else {

                            $i = 0;
                            foreach ($question_array as $question) {
                                ?>
                                <div class="panel panel-primary" id="bangla_font">
                                    <div class="panel-heading">
                                        <strong>   প্রশ্ন নং <?php echo $i + 1; ?> </strong>                                
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="question"> <?php echo $question['question_details']; ?> </label>
                                            <input type="hidden" class="form-control" id="question" name="set_id[]" value="<?php echo $set_details->set_id; ?>">
                                            <input type="hidden" class="form-control" id="question" name="question_id[]" value="<?php echo $question['question_id']; ?>">
                                            <input type="hidden" class="form-control" id="question" name="student_id[]" value="<?php echo $this->session->userdata('student_id'); ?>">
                                            <input type="text" class="form-control" id="question" placeholder="উত্তর লিখুন" name="answer[]">
                                        </div>                                                        
                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                            <input type="hidden" name="question_count" value="<?php echo $i - 1; ?>">
                            <submit type="submit" class="form-control btn-primary text-center" name="submit" onclick="document.quiz.submit()">পরীক্ষা শেষ করুন</submit>
                            <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

        <script type="text/javascript">
                            $(document).ready(function () {
                                //Disable cut copy paste
                                $('body').bind('cut copy paste', function (e) {
                                    e.preventDefault();
                                });

                                //Disable mouse right click
                                $("body").on("contextmenu", function (e) {
                                    alert("For Security Reason, Right Click Disable");
                                    return false;
                                });
                            });
        </script>
    </body>
</html>
