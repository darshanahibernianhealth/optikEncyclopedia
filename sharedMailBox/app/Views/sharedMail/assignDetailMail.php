 <!-- <div class="main-panel"> -->
<?php
    $getuser = session()->get('user');
    // print_r( $user);
    $user = $getuser['useremail'];
    $user_role = $getuser['role'];

    // echo '$mail_id=='.$mail_id;
  ?>
   <!-- <div class="content-wrapper"> -->
     <div class="row">
        <div class="col-12">
            <div class="card"  >
              <div class="card-header">
                <div class="row" style="height:40px;">
                  <div class="col-12">
                    <div class="actionHeader text-left row">
                      <div class="col-12">
                          <input type="hidden" name="mail_to" id="mail_to" >
                          <input type="hidden" name="mail_from" id="mail_from" >
                          <input type="hidden" name="mail_conversation_id" id="mail_conversation_id" >
                          <input type="hidden" name="createdBy" id="createdBy" value="<?php echo $user; ?>">
                          <input type="hidden" name="mail_mail_id" id="mail_mail_id">
                          <p class="card-title float-left" id="mailInboxSubject"></p>
                     <!--  </div>
                      <div class="col-4"> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="MailDetail overflow-auto">
            <p class="card-body" id="starDetails" style="border-bottom: solid 1px lightgrey; font-size: 13px; color: #245d93;display: none;"> </p>
              <p class="card-body" id="assignDetails" style="border-bottom: solid 1px lightgrey; font-size: 13px; color: #245d93;display: none;"> </p>
              <p class="card-body" id="reminderDetails" style="border-bottom: solid 1px lightgrey; font-size: 13px; color: #245d93;display: none;"> </p>
              <div class="card mt-2 overflow-auto" id="assignMailDetailViewJs" style="overflow-y: auto; overflow-x: unset !important;">
              </div>
          </div>
          <div class="replyEditor" id="replyEditor" style="overflow-y: auto; overflow-x: unset !important;">

          </div>
      </div>
   </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
  <script src="<?php echo base_url();?>/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/your-tinymce-apikey/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>


  <script type="text/javascript">
     $(document).ready(function(){

              
        // $('.pop').on('click', function() {
        //   $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        //   $('#imagemodal').modal('show');   
        // });   
     });
  </script>