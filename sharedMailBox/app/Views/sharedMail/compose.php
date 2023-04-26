 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form  method="post" action="<?php echo base_url('composeMail'); ?>" enctype="multipart/form-data">
                    <div class="card-header" style="background-color: #5a5a5ab5 !important;">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title float-left" style="color: white;"> New Conversation</h4>
                            </div>
                            <div class="col-6 pt-2" style="text-align: right;">
                                <!-- <span class="p-2" id="FromBtn" style="color: white;"><strong>From</strong></span> -->
                                <span class="p-2" id="CcBtn" style="color: white;"><strong>Cc</strong></span>
                                <span class="p-2" id="BccBtn" style="color: white;"><strong>Bcc</strong></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <p><strong>To  </strong></p>
                            </div>
                             <div class="col-11">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="send_mail_to" name="send_mail_to" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="CcInBox" style="display: none;">
                            <div class="col-1">
                                <p><strong>Cc  </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="send_mail_cc" name="send_mail_cc" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-1">
                                <a><i class="mdi mdi-close menu-icon" id="CcInputClose"></i></a>
                            </div>
                        </div>
                        <div class="row" id="BccInBox" style="display: none;">
                            <div class="col-1">
                                <p><strong>Bcc  </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="send_mail_bcc" name="send_mail_bcc" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-1">
                                <a><i class="mdi mdi-close menu-icon" id="BccInputClose"></i></a>
                            </div>
                        </div>
                        <div class="row" id="FromInBox" >
                            <div class="col-1">
                                <p><strong>From  </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="send_mail_from" name="send_mail_from" placeholder="Email">
                                </div>
                                <p id="errorFrom" style="display: none; color: red; font-size: 9px;">Please enter email id which is allocate to you !</p>
                            </div>
                            <div class="col-1">
                                 <a><i class="mdi mdi-close menu-icon" id="fromInputClose"></i></a>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-1" style="padding-right: 0px;">
                                <p><strong>Subject  </strong></p>
                            </div>
                            <div class="col-11">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="send_mail_subject" name="send_mail_subject" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class='editor' id="send_mail_content" name="send_mail_content"></textarea>
                                    <!-- <input type='file' name='fileupload' id='fileupload' style='display: none;'> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="send_mail_attachement_id" name="send_mail_attachement_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 " style="text-align: right;">
                        <button type="submit" class="btn btn-fw" id="composeMailBtn" style="background-color: #12508b; color: white;" disabled>SEND <i class="mdi mdi-send menu-icon"></i></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    
  <script type="text/javascript">
        $('#send_mail_from').on('keyup',function(){
          var email_id = $(this).val();

           $.ajax({
               url: "<?= base_url('checkFromEmailId'); ?>",
                method:"GET",
                data:{"from_email_id":email_id},
                dataType: "json",
                success:function(data)
                { 
                      if(data == 'false'){

                        $('#errorFrom').show();
                        return false;

                      }else{

                        $('#composeMailBtn').prop('disabled' , false);
                          $('#errorFrom').hide();
                          return true;

                      }
                }
          });

        });
  </script>

    