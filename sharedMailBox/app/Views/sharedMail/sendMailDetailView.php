  <?php 
    $getuser = session()->get('user');
    // print_r( $user);
    $user = $getuser['useremail'];
    $role = $getuser['role'];
   ?>
     <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row pt-2">
                  <div class="col-12">
                    <div class="actionHeader text-left row">
                      <div class="col-12">
                        <div class="text-left">
                          <input type="hidden" name="mail_conversation_id" id="mail_conversation_id">
                          <input type="hidden" name="createdBy" id="createdBy" value="<?php echo $user; ?>">
                          <p class="card-title float-left" id="mailInboxSubject"></p>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
<!--                 <div class="row pt-2">
                    
                </div> -->
            </div>
          </div>
          <p class="card-body" id="starDetails" style="border-bottom: solid 1px lightgrey; font-size: 13px; color: #245d93;display: none;"> </p>
          <div class="card mt-2" id="sendMailDetailsViewJs">
            <!-- <div class="card-body" style="padding: 1rem 1.5rem !important;">
       
            </div> -->
          </div>
          
        </div>
      </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

  <script type="text/javascript">
     $(document).ready(function(){

      $(document).on('click', '#notImpStar', function() { 

          $("#ImpStar").show();
          $("#notImpStar").hide();

          var mail_id = $(this).attr('relid');
          var createdBy = $('#createdBy').val();
          // alert('mail_id==' + mail_id);
          
            $.ajax({
                url: "<?= base_url('starredMail'); ?>",
                method:"GET",
                data:{"mail_id" : mail_id, "starred_mail_action" : "active","starred_createdBy" : createdBy,"flag":"sendMail"},
                dataType: "json",
                success:function(data)
                {
                  $("#starMailCounter").text(data);
                }

            }); 

      });

       $(document).on('click', '#ImpStar', function() { 

          $("#ImpStar").hide();
          $("#notImpStar").show();
          var mail_id = $(this).attr('relid');

          $.ajax({
                url: "<?= base_url('unstarredmail'); ?>",
                method:"GET",
                data:{"mail_id" : mail_id, "starred_mail_action" : "de-active"},
                dataType: "json",
                success:function(data)
                {
                  // alert(data);
                  // console.log("hello==" + data);
                  // Process(msg);
                  // setTimeout(function(){
                  //  location.reload();
                  // }, 50);
                  // $("#sidebar").load("http://localhost:8080/" + "#starMailCounter");
                  // console.log(data);

                  $("#starMailCounter").text(data);
                }

            });

       });

      });

     </script>
   