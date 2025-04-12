
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assest/student_help.css">
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
                        <li><a href="<?php echo base_url(); ?>student/logout"> লগআউট</a></li>                    </ul>
                </nav>
            </div>
        </div>

        <div class="Body_Section">
            <section id="contact">
                <div class="section-content">
                    <strong> <h2>যোগাযোগ:</h2></strong>
                </div>
                <div class="contact-section">
                    <div class="container">                        
                        <div class="col-md-6 form-line">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14606.841573549784!2d90.368868!3d23.7577047!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bb2df15243%3A0xc11ceb1a3bffa8ec!2sDhaka+International+University!5e0!3m2!1sen!2s!4v1508271077171" width="550" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>                            
                        </div>
                        <form action="<?php echo base_url(); ?>student/help" method="POST" role="form" name="form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for ="subject"> বিষয়: </label>
                                    <input  type="text" class="form-control" id="subject" name="subject"/>
                                </div>
                                <div class="form-group">
                                    <label for ="description"> বিস্তারিত বার্তা: </label>
                                    <textarea  class="form-control" id="description" placeholder="Enter Your Message" name="message_details"></textarea>
                                </div>
                                <?php
                                $message = $this->session->userdata('sent_message_data');

                                if (isset($message)) {
                                    ?>
                                    <label style="color: yellow;"><?php echo $message ?></label> <br/>
                                    <?php
                                }
                                $this->session->unset_userdata('sent_message_data');
                                ?>
                                <div>

                                    <button type="submit" name="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  বার্তা পাঠান</button>
                                </div>

                            </div>
                        </form>
                    </div>
            </section>
        </div>

        <script src = "<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>Assest/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>