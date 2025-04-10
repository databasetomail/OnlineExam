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
                        <li><a href="<?php echo base_url(); ?>teacher/logout"> লগআউট(<?php echo $examiner_id= $this->session->userdata('examiner_id'); ?>)</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="Make_Question_Section">
            <div class="container">
                <div>
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title"> আপনার তৈরিকৃত প্রশ্নসমূহ: </h3>
                                </div>
                                <div class="col col-xs-6 text-right">
                                    <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#myModal"> নতুন সেট সংযোজন </button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list table-responsive">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th> নং </th>
                                        <th> পরীক্ষার নাম </th>
                                        <th> বিষয়ের নাম </th>
                                        <th> সেটের নাম </th>                                        
                                        <th> </th>                                        
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                    $message = $this->session->userdata('message');

                                    if (isset($message)) {
                                        ?>
                                    <div class="alert alert-success"><?php echo $message ?></div>
                                    <?php
                                }
                                $this->session->unset_userdata('message');
                                ?>

                                <?php
                                $i = 1;
                                foreach ($question_set as $all_set) {
                                    ?>   

                                    <tr>                                            
                                        <td align="center">
                                            <a href="<?php echo $all_set->set_id; ?>" class="btn btn-default" data-toggle="modal" data-target="#myModal"><em class="fa fa-pencil"></em></a>
                                            <a href="#" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
                                        <td> <?php echo $i++; ?> </td>
                                        <td> <?php echo $all_set->exam_name; ?>  </td>
                                        <td> <?php echo $all_set->subject_name; ?> </td>
                                        <td> <?php echo $all_set->set_name; ?> </td>
                                        <td align="center">
                                            <a href="<?php echo base_url()?>Question/make_question/<?php echo $all_set->set_id; ?>"class="btn btn-default"><em class="fa fa-book"> দেখুন </em></a>
                                            <input type="hidden" name="set_id" value="<?php echo $all_set->set_id; ?>"/>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>

                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col col-xs-4">Page 1 of 5
                                </div>
                                <div class="col col-xs-8">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="<?php echo base_url(); ?>#">1</a></li>
                                        <li><a href="<?php echo base_url(); ?>#">2</a></li>
                                        <li><a href="<?php echo base_url(); ?>#">3</a></li>
                                        <li><a href="<?php echo base_url(); ?>#">4</a></li>
                                        <li><a href="<?php echo base_url(); ?>#">5</a></li>
                                    </ul>
                                    <ul class="pagination visible-xs pull-right">
                                        <li><a href="<?php echo base_url(); ?>#">«</a></li>
                                        <li><a href="<?php echo base_url(); ?>#">»</a></li>
                                    </ul>
                                </div>
                            </div>
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
                                    <label for="exam_name" class="col-lg-4 control-label"> পরীক্ষার নাম </label>
                                    <div class="col-lg-6">
                                        <select name="exam_name"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option name="mid_term"> অর্ধ:বার্ষিক </option>
                                            <option name="final"> বার্ষিক </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="subject_name" class="col-lg-4 control-label"> বিষয়ের নাম </label>
                                    <div class="col-lg-6">
                                        <select name="subject_name"> 
                                            <option> ----- সিলেক্ট করুন ---- </option>
                                            <option name="405"> বাংলা ১ম পত্র  </option>
                                            <option name="406"> বাংলা ২য় পত্র </option>
                                            <option name="407"> সমাজ </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="set_name" class="col-lg-4 control-label"> সেটের  নাম </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="question_name" name="set_name">
                                    </div>
                                </div>                            
                                <div class="form-group">
                                    <label for="time" class="col-lg-4 control-label"> সময় </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="time" name="time">
                                    </div>
                                </div>                            
                                <div class="form-group">
                                    <label for="full_marks" class="col-lg-4 control-label"> মোট নম্বর </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="marks" name="full_marks">
                                        <?php
                                        $teacher_id = $this->session->userdata('teacher_id');

                                        if (isset($teacher_id)) {
                                            ?>   
                                            <input type="hidden" class="form-control" id="marks" name="created_by" value="<?php echo $teacher_id; ?>">                                   
                                            <?php
                                        }
                                        ?>
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
        </div> 

        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>
