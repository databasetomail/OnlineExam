<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title> Online Examination System </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/make_set.css">

        <script type="text/javascript">
            $(document).ready(function () {
                $("#myModal").on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);  // Button that triggered the modal
                    var titleData = button.data('title'); // Extract value from data-* attributes
                    $(this).find('.modal-title').text(titleData + ' Form');
                });
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

        <div class="Make_Question_Section">
            <div class="container">
                <div class="panel panel-primary panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title"> আপনার তৈরিকৃত সেটসমূহ: </h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#myModal"> নতুন সেট সংযোজন </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list table-responsive">
                            <br/>
                            <thead style="color: black;">
                                <tr>
                                    <th class="text-center col-xs-1"> নং </th>
                                    <th class="text-center col-xs-4"> পরীক্ষার নাম </th>
                                    <th class="text-center col-xs-3"> বিষয়ের নাম </th>
                                    <th class="text-center col-xs-1"> সেটের নাম </th>                                        
                                    <th class="text-center col-xs-1"> মোট প্রশ্ন </th>                                        
                                    <th class="text-center col-xs-2"> একশন </th>                                        
                                </tr> 
                            </thead>
                            <?php
                            if (isset($question_set) && $question_set == null) {
                                $i = 1;
                                ?> 
                                <tbody>                                 
                                    <tr>
                                        <th colspan="6" class="text-center"> কোন তথ্য পাওয়া যায় নাই। </th>
                                    </tr>  
                                </tbody>                                 
                                <?php
                            } else {
                                $i = 1;
                                foreach ($question_set as $all_set) {
                                    ?>
                                    <tbody>
                                        <tr>                                            
                                            <th class="text-center" style="font-family: SutonnyMJ;"> <?php echo $i++; ?> </th>
                                            <th class="text-center" > <?php echo $all_set->exam_name; ?>  </th>
                                            <th class="text-center"> <?php echo $all_set->subject_name; ?> </th>
                                            <th class="text-center"> <?php echo $all_set->set_name; ?> </th>
                                            <th class="text-center" style="font-family: SutonnyMJ;"> <?php echo $all_set->total_question; ?> </th>
                                            <th align="center">
                                                <a href="<?php echo base_url() ?>Question/make_question/<?php echo $all_set->set_id; ?>" class="btn btn-default text-center"> &nbsp;&nbsp; দেখুন &nbsp;&nbsp;</a>
                                                <a onclick="return confirm('আপনি কি এই সেট ও সেটের অন্র্তভুল প্রশ্নগুলো মুছে ফেলতে চান?')" href="<?php echo base_url() ?>Question/delete_set_and_question/<?php echo $all_set->set_id; ?>" class="btn btn-default text-center"> &nbsp;&nbsp;&nbsp; মুছুন &nbsp;&nbsp;&nbsp; </a>
                                                <input type="hidden" name="set_id" value="<?php echo $all_set->set_id; ?>"/>
                                            </th>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-right" style="font-family: SutonnyMJ;">
                            <label> সর্বমোট <?php echo $i - 1; ?> টি সেট পাওয়া গেছে &nbsp;&nbsp;&nbsp; </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>            

        <!-- Modal HTML ------------------------------------------- Just For Input -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> নতুন সেট সংযোজন </h4>
                    </div>

                    <form action="<?php echo base_url(); ?>question/make_set_info" method="POST" class="form-horizontal" role="form">
                        <fieldset>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exam_name" class="col-lg-4 control-label"> পরীক্ষার নাম : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="exam_name" name="exam_name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject_name" class="col-lg-4 control-label"> বিষয়ের নাম : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="subject_name" name="subject_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="set_name" class="col-lg-4 control-label"> সেটের  নাম : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="question_name" name="set_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="time" class="col-lg-4 control-label"> মোট সময় (মিনিট) : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="time" name="time">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="total_question" class="col-lg-4 control-label"> মোট প্রশ্নের সংখ্যা :  </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="total_question" name="total_question">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="full_marks" class="col-lg-4 control-label"> মোট নম্বর :  </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="full_marks" name="full_marks">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mark_minus" class="col-lg-4 control-label"> নম্বর কর্তন : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="mark_minus" name="mark_minus" placeholder="প্রতিটি ভূল উত্তরের জন্য ">
                                        <input type="hidden" class="form-control" id="marks" name="created_by" value="<?php echo $this->session->userdata('teacher_id'); ?>">                                   
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"> বাতিল করুন </button>
                                <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('আপনি কি ডাটাগুলো সংরক্ষণ করতে চান?')"> সংরক্ষণ করুন </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div> 

        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
