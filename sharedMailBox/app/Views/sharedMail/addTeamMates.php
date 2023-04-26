<!-- <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="right:0;" >
  <button class="w3-bar-item w3-button w3-large" id="closeTeamMates">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div> -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
          <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <form method="post" action="<?php echo base_url('inboxAccess'); ?>">
                    <div class="card-header" style="background-color: #5a5a5ab5 !important;">
                      <div class="row">
                        <div class="col-12">
                            <h4 class="card-title float-left" style="color: white;">Add Teammates</h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <p>Enter Email</p>
                        <div class="row">
                            <div class="col-12">
                               <div class="form-group">
                                  <!-- <label for="exampleTextarea1">Textarea</label> -->
                                  <input type="email" class="form-control" name="member_name" id="member_name" rows="4" placeholder="name@email.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="emailError">
                            <p id="emailError"></p>
                        </div>
                    </div>
                    <!-- <div class="card-footer"> -->
                      <div class="text-center p-4">
                        <!-- <a id="nextMailboxlink" href="<?php echo base_url('inboxAccess'); ?>" style="visibility: hidden;"> -->
                            <button type="submit" id="nextToMailbox" class="btn btn-fw" style="background-color: #47b5b5; color: white;" disabled>Next</button>
                        <!-- </a> -->
                        <button type="button" id="calcelToMailbox" class="btn btn-fw" style="background-color: #12508b; color: white;">Cancel</button>
                      </div>
                    <!-- </div> -->
                    </form>
                  </div>
              </div>
               <div class="col-2"></div>
          </div>
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
      <!-- href="<?php echo base_url('inboxAccess'); ?>" -->
      <script type="text/javascript">
          $(document).ready(function(){
            $('#member_name').on('keyup',function(){
                var email = $('#member_name').val();

                // alert('email=' + email);
                if(email == ''){
                    $("#emailError").html("Please enter email id !").css("color", "red");
                    return false;
                } 

                if(IsEmail(email)==false){
                    $("#emailError").html("Please enter valid email id !").css("color", "red");
                    return false;
                }

                if ((email != '') && (IsEmail(email) != false)) {
                    $("#emailError").html("Ok !").css("color", "green");
                    $('#nextToMailbox').prop('disabled' , false);
                     // $.ajax({
                     //    url: "<?= base_url('inboxAccess'); ?>",
                     //    method:"GET",
                     //    data:{"member_name":email},
                     //    dataType: "json",
                     //    success:function(data){

                     //    }
                     // });
                }
            });

            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                return false;
                }else{
                   return true;
                }
              }

          });
      </script>