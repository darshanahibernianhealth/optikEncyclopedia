 <div class="main-panel">
  <?php
    $data = json_decode($finalResult);

    // print_r($data);

    // $mail_id = '';
     foreach($data as $row){
      // print_r($row);
        // die();
        $senderName = $row->mail_from_name;
        $senderEmailId= $row->mail_from;
        $receiveTime[] = strtotime($row->mail_recivedAt);
        $toEmailId = $row->mail_to;
        $content = $row->mail_content;
        $subject = $row->mail_subject;
        // $mail_id = $row->mail_id;
        $conversation_id = $row->mail_conversation_id;
        $isStarred = $row->isStarred;
        // $mail_starredBy = $row->mail_starredBy;

        // echo '$mail_starredBy=='.$mail_starredBy;
        // echo '$isStarred=='.$isStarred;
     }

    array_multisort($receiveTime,SORT_DESC,SORT_STRING,$data);

    $getuser = session()->get('user');
    // print_r( $user);
    $user = $getuser['useremail'];
    $role = $getuser['role'];

    // echo '$user=='.$user;

    // echo '$mail_conversation_id=='.$conversation_id;
   
  ?>
   <div class="content-wrapper">
     <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row pt-2">
                  <div class="col-12">
                    <div class="actionHeader text-left row">
                      <div class="col-12">
                        <div class="text-left">
                          
                          <input type="hidden" name="mail_conversation_id" id="mail_conversation_id" value="<?php echo $conversation_id; ?>">
                          <input type="hidden" name="createdBy" id="createdBy" value="<?php echo $user; ?>">
                          <h6 class="card-title float-left"><?php echo ucfirst($subject); ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<!--                 <div class="row pt-2">
                    
                </div> -->
            </div>
          </div>
          <div class="">
          <div class="card mt-2">

            <?php 
            $j =0;
               foreach($data as $row){
                  $senderName = $row->mail_from_name;
                  $senderEmailId= $row->mail_from;
                  $receiveTime = $row->mail_recivedAt;
                  $toEmailId = $row->mail_to;
                  $content = $row->mail_content;
                  $subject = $row->mail_subject;
                  ?>


            <div class="card-body" style="padding: 1rem 1.5rem !important;">
              <div class="row">
                  <div class="col-1">
                    <div class="nav-profile-image">
                      <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" alt="profile" style="width: 44px;height: 44px;border-radius: 100%;">
                      <!--change to offline or busy as needed-->
                    </div>
                  </div>
                  <div class="col-7">
                    <a data-bs-toggle="collapse" href="#<?php echo 'MailDetail'.$j; ?>" aria-expanded="false" aria-controls="<?php echo 'MailDetail'.$j; ?>">
                        <h5 style="color:blue;"><?php echo ucfirst($senderName); ?></h5>
                    </a>
                  </div>
                  <div class="col-4">

                    <div class="row">
                      <div class="col-2">
                          <?php 
                          $starData = json_decode($starMail);

                          foreach($starData as $row){
                            $mail_starredBy = $row->starred_createdBy;
                          }
                         
                          if($isStarred == 'yes' && $mail_starredBy == $user){
                              ?>
                              <i class="mdi mdi-star menu-icon" id="ImpStar" relid="<?php echo $conversation_id; ?>" style="font-size: 15px; color: yellow;"></i>
                              <i class="mdi mdi-star menu-icon" id="notImpStar" relid="<?php echo $conversation_id; ?>" 
                                style="font-size: 15px; display: none;"></i>
                              <?php
                            } else{
                              ?>
                                 <i class="mdi mdi-star menu-icon" id="notImpStar" relid="<?php echo $conversation_id; ?>" 
                                style="font-size: 15px;"></i>
                                <i class="mdi mdi-star menu-icon" id="ImpStar" relid="<?php echo $conversation_id; ?>" style="font-size: 15px; color: yellow; display: none;"></i>
                              <?php
                            }
                            
                          ?>
                      </div>
                      <div class="col-2">
                          <div class="dropdown">
                          <a id="reminderOption" data-bs-toggle="dropdown">
                            <!-- <input type="hidden" id="popupDatepicker"> -->
                            <i class="mdi mdi-clock menu-icon" id="reminder" relid="<?php echo $conversation_id; ?>" style="font-size: 15px;"></i>
                            <!-- <div id="datepicker"></div> -->
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="reminderOption">
                              <div class="setReminder p-4">
                                <div class="row m-2">
                                  <div class="col-12 pl-2 text-center">
                                   <h6>Set Reminder</h6>
                                  </div>
                                </div>
                                <?php 
                                    $reminderData = json_decode($reminder);
                                    // print_r($reminderData->reminder_date_time);
                                    if($reminderData != '' && $reminderData != NULL){
                                      ?>
                                        <div class="row m-2">
                                          <div class="col-12 text-center p-2">
                                            <h6>Reminder Date : <?php echo $reminderData->reminder_date_time; ?></h6>
                                          </div>
                                        </div>
                                      <?php
                                    }
                                    ?>
                                <div class="row m-2">
                                  <div class="col-12 text-center p-2">
                                    <input type="date" name="datepick" id="datepick">
                                  </div>
                                </div>
                                <p id="dateError" style="font-size: 8px;"></p>
                                <!-- <div class="row m-2">
                                   <div class="col-12 text-center p-2">
                                    <input type="time" name="timepick" id="timepick" onchange="onTimeChange()">
                                    <input type="hidden" name="remindertime" id="remindertime">
                                  </div>
                                </div> -->
                                <!-- <p id="timeError" style="font-size: 8px;"></p> -->
                                <div class="row">
                                  <div class="col-12 pl-2 text-center">
                                    <button type="btn" class="btn btn-primary" id="setReminderBtn">
                                      <?php if($reminderData == '' && $reminderData == null){
                                        echo 'SET';
                                      } else{
                                        echo 'RE-SET';
                                      }?>
                                    </button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-2">
                        <i class="mdi mdi-trash-can menu-icon trashMail" relid="<?php echo $conversation_id; ?>" style="font-size: 15px;"></i>
                      </div>
                      <div class="col-2">
                        <i class="mdi mdi mdi-eye-off markasunread" relid="<?php echo $conversation_id; ?>"  style="font-size: 15px;" data-toggle="tooltip" title="Mark As Unread"></i>
                      </div>
                      <div class="col-3">
                      <span >
                        <div class="dropdown">
                          <a id="ticketAssignOption" data-bs-toggle="dropdown">
                            <i class="mdi mdi-pen menu-icon" id="ticketAssign" style="font-size: 15px;"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="ticketAssignOption">
                            <select class="form-control select2" id="assignDropDown" style="width: 100%;" <?php if($role == 'user'){ ?> disabled="false" <?php }?>>
                              <option>Assign</option>
                              <?php
                                $teamData = json_decode($teammember);
                                foreach($teamData as $row){
                                  ?>
                                    <option value="<?php echo $row->member_id; ?>"><?php echo $row->member_name; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </div>
                              </div>
                        </span>

                        <!-- <div class="form-group">
                          <select class="form-control form-control-sm" id="assignDropDown" <?php if($role == 'user'){ ?> disabled="true" <?php }?>>
                            
                          </select>
                        </div>
                      </div> -->

                    </div>
                      <span style="float: right; font-size: 12px;"><?php echo $receiveTime; ?></span>
                  </div>
              </div>
              <div class="row collapse in" id="<?php echo 'MailDetail'.$j; ?>">
                <div class="col-1">
                </div>
                <div class="col-11">
                  <div class="row">
                    <div class="col-12"> 
                      <p><strong>To : </strong><span><?php echo $toEmailId; ?></span></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                       <div>
                        <?php echo html_entity_decode($content, ENT_QUOTES, "UTF-8")?>
                         </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="gallery">
                  <div class="row" style="margin-bottom: 50px; padding-bottom: 10px;">
                    <?php 
                        $atachmentData = json_decode($attachments);
                        $i=0;
                        foreach($atachmentData as $rowAttachment){
                         
                          // $attachment = ($bytes);
                          $attachment_name = $rowAttachment->attachment_name;
                          $attatchment_type = $rowAttachment->attatchment_type;
                          // echo '$attatchment_type=='.$attatchment_type.'<br>';
                          // if()
                          // if($attatchment_type !== 'video/mp4'){
                          ?>
                          <div class="col-2 item">
                            <?php 

                            if(($attatchment_type == 'image/jpeg' || $attatchment_type == 'image/png')){
                               $bytes = $rowAttachment->attachment_bytes;
                               $img = "<a href='#' class='pop'>
                                <img src='data:$attatchment_type;base64,$bytes' class='img-fluid attachmentImg'
                                relid='data:$attatchment_type;base64,$bytes' id='attachmentImg'
                                style='margin-bottom: 10px; width:100%; height: 100px;'/>
                                </a>
                                ";
                               print($img);
                              ?>
                              <?php
                              } else if($attatchment_type == 'video/mp4'){
                              $bytes = $rowAttachment->attachment_bytes;
                               $video = "<video style='margin-bottom: 10px; width:100%; height: 100px;' controls>
                                          <source src='data:$attatchment_type;base64,$bytes' type='$attatchment_type'>
                                        </video>";
                               print($video);
                              }
                            ?>
                          </div>
                          <?php
                        // }
                          $i++;
                        }
                    ?>
                  </div>
                  <!-- Modal -->
                 
                  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">              
                        <div class="modal-body">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <img src="" class="imagepreview" style="width: 100%;" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
            </div>

            <?php
            $j++;
               }
            ?>

          </div>
          </div>
          <!-- <div class="replyEditor" style="height: 35%; cursor: pointer;display: block;margin: 0 auto;position:fixed;bottom:-11px;overflow-y: scroll;">
           <div class="row">
            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <textarea id="reply"></textarea>
                  </div>
              </div>
            </div>
           </div>
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

      $("#assignDropDown").change(function(){
        var mail_member_id = $('#assignDropDown').val(); 
        var mail_id = $('#mail_id').val();
        var mail_conversation_id = $('#mail_conversation_id').val();

        $.ajax({
               url: "<?= base_url('assignTicketToMem'); ?>",
                method:"GET",
                data:{"mail_id":mail_id, "mail_member_id" : mail_member_id, "status" : "assigned", "mail_conversation_id" : mail_conversation_id,"flag":"assign"},
                dataType: "json",
                success:function(data)
                { 
                  alert(data);
                }
          });
      });

      $('#notImpStar').click(function(){
          $("#ImpStar").show();
          $("#notImpStar").hide();

          var mail_id = $(this).attr('relid');
          var createdBy = $('#createdBy').val();
          // alert('mail_id==' + mail_id);
          
            $.ajax({
                url: "<?= base_url('starredMail'); ?>",
                method:"GET",
                data:{"mail_id" : mail_id, "starred_mail_action" : "active","starred_createdBy" : createdBy},
                dataType: "json",
                success:function(data)
                {
                  // alert(data);
                  // console.log("hello==" + data);
                  // Process(msg);
                  setTimeout(function(){
                   location.reload();
                  }, 50);
                }

            });
        });
        $('#ImpStar').click(function(){
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
                  setTimeout(function(){
                   location.reload();
                  }, 50);
                }

            });

        });

     });

     //get time with meridian
     

  </script>