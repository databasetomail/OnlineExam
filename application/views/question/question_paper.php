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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/question_paper.css">

        <!---------------------------------------------------- Code for Graph-->
        <script type='text/javascript' src='<?php echo base_url(); ?>Assest/JavaScriptSpellCheck/include.js' ></script>
        <script type='text/javascript'> $Spelling.SpellCheckAsYouType('myTextArea')</script>


    </head>

    <body>

        <div class="Banner_Section">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>Assest/Background/Banner.jpg" alt="Banner goes here" class="img-responsive"/>
            </div>
        </div>
        <?php $student_id = $this->session->userdata('student_id'); ?>

        <div class="Menu_section">
            <div class="container">
                <nav>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>student"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/academic_profile/<?php echo $student_id; ?>"> একাডেমিক প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/question_paper" onclick="confirm('আপনি কি পরীক্ষা দিতে চান?')"> পরীক্ষা </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>#"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/logout"> লগআউট(<?php echo $roll_no = $this->session->userdata('roll_no'); ?>)</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Question_Section">
            <div class="container">
                <div class="col-lg-12">
                    <div class="question_header text-center">
                        <?php
                        foreach ($set_details as $details) {
                            ?>
                            <h5 class="text-right"> <?php echo $details->set_name; ?> </h5>
                            <h3> <strong>  ঢাকা ইন্টারন্যাশনাল ইউনিভার্সিটি </strong> </h3>
                            <h4>  কম্পিউটার সায়েন্স এন্ড ইঞ্জিনিয়ারিং ডিপার্টমেন্ট </h4>
                            <h4>   <?php echo $details->exam_name; ?> পরীক্ষা ২০১৭</h4>
                            <h4>   <?php echo $details->subject_name; ?> </h4>
                        </div>
                        <br/>
                        <div>
                            <div class="col-lg-2">
                                <h5> সময়:  <?php echo $details->time; ?> মিনিট    </h5>
                            </div>
                            <div class="col-lg-2 col-lg-offset-8">
                                <h5> পূর্ণমাণ:  <?php echo $details->full_marks; ?> </h5>
                            </div>                                                                     
                        </div>
                        <br/>
                    <?php } ?>

                    <h4 class="text-center "> <mark>  যে কোন ২ টি প্রশ্নের উত্তর দাও: </mark>    </h4>
                    <br/>
                    <br/>
                    <br/>

                    <div class="col-lg-8 col-lg-offset-2" id="font_bangla">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>নং </th>
                                    <th>প্রশ্ন</th>
                                    <th>নম্বর</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($question_detail as $q_details) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $i; ?></td>                                
                                        <td> <a href="" data-toggle="modal" data-target="#myModal" name="answer[<?php echo $i; ?>]"> <?php echo $q_details['question_details']; ?> </a></td>
                                        <td><?php echo $q_details['mark']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>                      
                    </div>
                </div>
            </div>
        </div>

<!--        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> নতুন সেট সংযোজন </h4>
                    </div>

                    <form action="<?php echo base_url(); ?>question/make_question" method="POST" class="form-horizontal" role="form">
                        <fieldset>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="question_no" class="col-lg-4 control-label"> প্রশ্ন নং </label>
                                    <div class="col-lg-6"><label for="question_no"> ১ </label> </div>
                                </div>

                                <div class="form-group">
                                    <label for="question_name" class="col-lg-4 control-label"> প্রশ্ন </label>
                                    <div class="col-lg-6"> <label for="question_name"> ১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১১ </label> </div>
                                </div>                                                      
                                <div class="form-group">
                                    <label for="answer" class="col-lg-4 control-label"> উত্তর </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="answer" >
                                    </div>
                                </div>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"> বাতিল করুন </button>
                                <button type="submit" name="submit" class="btn btn-primary"> সংরক্ষণ করুন </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div> -->

        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
