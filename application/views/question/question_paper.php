        
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/question_paper.css">
        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
                        <li><a href="<?php echo base_url(); ?>student"> হোম </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/academic_profile"> শিক্ষার্থী প্রোফাইল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/question_paper"> পরীক্ষা </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/all_result"> ফলাফল </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/notice_board"> নোটিশ বোর্ড </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/student_help"> সাহায্য </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/student_setting"> সেটিংস </a> </li>
                        <li><a href="<?php echo base_url(); ?>student/logout"> লগআউট</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br/>

        <div class="Question_Paper">
            <div class="container">
                <?php
                if (isset($set_details) && $set_details == null) {
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-xs-offset-12 text-center">কোন প্রশ্ন পাওয়া যায়নি। দয়া করে পরীক্ষা নিয়ন্ত্রণ অফিসে যোগাযোগ করুন।</th>
                            </tr>
                        </thead>
                    </table>
                    <?php
                } else {
                    foreach ($set_details as $details) {
                        ?>
                        <div class="panel panel-primary" id="panel_transparent">
                            <div class="panel-heading"> <?php echo $details->subject_name; ?> </div>
                            <div class="panel-body" id="panel_transparent">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="width: 90%">
                                            সেটের নাম: <?php echo $details->set_name; ?>  <br/> মোট প্রশ্নের সংখ্যা: <?php echo $details->total_question; ?>  <br/> মোট নম্বর: <?php echo $details->full_marks; ?> <br/> মোট বরাদ্দকৃত সময়: <?php echo $details->time; ?> <br/> প্রতিটি ভুল প্রশ্নের জন্য নম্বর কর্তন হবে: <?php echo $details->mark_minus; ?>         
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <a href="#" data-toggle="tooltip" class="text-center text-danger" title="পরীক্ষা প্রদানের জন্য ইউনিকোড ব্যবহার করুন। উত্তরের আগে বা পরে কোন প্রকার স্পেস দেওয়া যাবে না। পরীক্ষা শুরু করার পর কোনভাবেই ব্রাউজার / কি-বোর্ডের ব্যাক বাটন চাপা যাবে না। পেজটি রিলোড দেওয়া যাবে না। নতুন কোন ট্যাব খোলা যাবে না। রাইট বাটনে ক্লিক করা যাবে না।"> বিশেষ নির্দেশনা</a>
                                            <br/>
                                            <a href="<?php echo base_url(); ?>student/all_question_by_id/<?php echo $details->set_id; ?>"> <button style="margin-top: 10px;" type="button" class="btn btn-primary" onclick="return confirm('আপনি কি পরীক্ষা শুরু করতে চান?')"> পরীক্ষা শুরু করুন </button> </a> <br>
                                            <br/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        </body>
        </html>
