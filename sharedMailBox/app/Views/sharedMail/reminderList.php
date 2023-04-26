<div class="main-panel">
   <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="row" style="border-bottom: solid 1px lightgrey;">
              <div class="col-8">
                <p>Reminder's</p>
              </div>
             <!--  <div class="col-4">
                <form class="searchbar">
                  <input type="search" placeholder="Search here" name="search" class="searchbar-input"
                    id="search_name"  required>
                  <span class="searchbar-icon"><i class="mdi mdi-magnify" aria-hidden="true"></i></span>
                </form>
              </div> -->
            </div>
            <?php 
              // $systemDate = strftime('%F');
              $systemDate =  date('Y-m-d');
            ?>
            <input type="hidden" name="systemdate" id="systemdate" value="<?php echo $systemDate; ?>">
            <div class="row" style="margin-top: 5px;">
              <div class="col-4 listViewClass">
                <div class="card">
                  <div class="card-body mailListCardBody">
                      <div id="tableSearchResult">
                        <table class="w-100" id="allMailTableList">
                           <?php 
                               $user = session()->get('user');
                               $useremail = $user['useremail'];
                               
                               $data = json_decode($reminders);                               
                           ?>
                          <tr style="border-bottom: solid 1px lightgrey;">
                             <th class="thMailList">
                               <!-- <i class="mdi mdi-checkbox-multiple-marked-circle-outline" id="selectMailIcon" style="font-size: 18px;color: #104e89;">
                               </th> -->
                             <th class="thMailList">
                               
                             </th>
                             <th class="thMailList" id="deleteSelectMail" style="text-align: right;">
                               <!-- <i class="mdi mdi-trash-can menu-icon" style="font-size: 18px;color: #104e89;"> -->
                                <div class="row">
                                
                                <div class="col-12">
                                  <span style="text-align: right;" class="col-6">
                                    <div class="dropdown">
                                        <a id="showmoreoption" data-bs-toggle="dropdown">
                                          <i class="mdi mdi-dots-vertical" style="font-size: 18px;color: #104e89;"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="showmoreoption">
                                          <a id="asceReminderDtWise" relid="ascOrder" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Ascending</a>
                                          <div class="dropdown-divider"></div> 
                                          <a id="descReminderDtWise" relid="descOrder" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Decending</a>
                                       </div>
                                      </div>
                                  </span>
                                </div>
                              </div>
                             </th>

                           </tr>
                        <?php 

                        foreach($data as $row){
                          // foreach($row as $rowData){
                            $receiveTime[] =  strtotime($row->reminder_date_time);
                          // }
                        }
                        array_multisort($receiveTime,SORT_DESC,SORT_STRING,$data);

                        $counter=0;
                          foreach($data as $row){
                            
                              $reminder_date_time = $row->reminder_date_time;
                              $mail_subject = $row->mail_subject;
                              $mail_id = $row->mail_id;
                              $mail_to_name = $row->mail_to_name;
                              $mail_from_name = $row->mail_from_name;

                              $mail_recivedAt = strtotime($reminder_date_time);
                              $date = date("D, d M y ",$mail_recivedAt);
                        ?>
                        <input type="hidden" name="mail_id" id="mail_id" value="<?php echo $mail_id; ?>">
                        <input type="hidden" name="filepath" id="filepath" value="<?php echo base_url(); ?>">
                        
                        <tr style="cursor: pointer; border-bottom: solid 1px lightgrey;
                         <?php 
                         if($systemDate == $reminder_date_time){ 
                          ?> color: green; font-weight: bold;
                          <?php } else if($systemDate > $reminder_date_time){?>
                            color: red;
                           <?php } else if($systemDate < $reminder_date_time){
                            ?> color: orange; 
                            <?php } else{ ?> 
                              color: black;
                              <?php }?>" 
                         class="">

                          <td class="listMailIcon">
                            <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" id="user_img_icon_<?php echo $counter; ?>" class="me-2" alt="image">
                          </td>

                          <td class="listMailDetails inboxMailId" relid="<?php echo $mail_id; ?>">
                            <span><p class="pClass" ><?php echo $mail_from_name; ?></p></span>
                            <span><p class="pClass" style="font-size: 13px; color: #5eb1b1"><?php echo substr($mail_subject,0,17); if(strlen($mail_subject) > 20){ echo '..'; }?></p></span>
                            <span>
                          </td>

                          <td class="inboxMailId" relid="<?php echo $mail_id; ?>">
                            <p class="pClass" style="font-size: 9px; color: #024483; font-weight:600; "><?php echo $date; ?></p>
                          </td>
                        </tr>
                        <?php                          
                           $counter++;
                        }
                        ?>
                        <input type="hidden" name="counter" id="counter" value="<?php echo $counter; ?>">
                        <input type='hidden' id='hdncheckbox' />
                      </table>

                      <table class="w-100" id="searchMailTableResult" style="display: none;">
                        <tr style="border-bottom: solid 1px lightgrey;">
                          <th class="thMailList">
                            <!-- <i class="mdi mdi-checkbox-multiple-marked-circle-outline" id="selectMailIcon" style="font-size: 18px;color: #104e89;"> -->
                            </th>
                            <th class="thMailList"></th>
                          <th class="thMailList" id="deleteSelectMail" style="text-align: right;">
                               <!-- <i class="mdi mdi-trash-can menu-icon" style="font-size: 18px;color: #104e89;"> -->
                                <div class="row">
                                
                                <div class="col-12">
                                  <span style="text-align: right;" class="col-6">
                                    <div class="dropdown">
                                        <a id="showmoreoption" data-bs-toggle="dropdown">
                                          <i class="mdi mdi-dots-vertical" style="font-size: 18px;color: #104e89;"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="showmoreoption">
                                          <a id="asceReminderDtWise" relid="ascOrder" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Ascending</a>
                                          <div class="dropdown-divider"></div> 
                                          <a id="descReminderDtWise" relid="descOrder" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Decending</a>
                                       </div>
                                      </div>
                                  </span>
                                </div>
                              </div>
                             </th>

                        </tr>
                        <tbody id="searchMailBodyTr">
                          
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-8 previewMailClass">
                <div class="card" id="showMailCard" style="border: solid 1px lightgray; height: 800px; overflow-y: scroll; display: none;">
                  <div class="card-body" style="padding: 2px !important;">
                    <?php 
                      include('mailbox.php');
                     ?>
                   </div>
                </div>

                <div class="card" id="showEmptyCard" style="border: solid 1px lightgray; height: 800px; overflow-y: scroll;">
                  <div class="card-body" style="padding: 2px !important; display: flex;justify-content: center;align-items: center;">
                    <div class="text-center mx-auto justify-content-center" >
                      <i class="mdi mdi-email-variant" style="font-size: 100px; color: lightgrey;"></i>
                      <p><strong>Select an item to read</strong></p>
                    </div>
                   </div>
                </div>

              </div>

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
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
  <script src="<?php echo base_url();?>/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/your-tinymce-apikey/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script>
    $(document).ready(function(){

      //asceReminderDtWise
      $(document).on('click', '#asceReminderDtWise', function(){
        // alert('hello');
        var filterBy = $(this).attr('relid');
        var systemdate = $("#systemdate").val();

        $.ajax({
               url: "<?= base_url('reminderFilter'); ?>",
                method:"GET",
                data:{"filterBy":filterBy},
                dataType: "json",
                success:function(data)
                {   
                  if(data){

                    // console.log(data);

                    $("#searchMailBodyTr").empty();

                    $("#allMailTableList").hide();
                    $("#searchMailTableResult").show();

                     var counter = 0;

                     $.each(data.reminderFilterResult, function (key, val) {

                      var subject = val.mail_subject;
                      var body_preview = (val.mail_bodyPreview).substring(0,20);

                     var date = new Date();
                      var formattedDate = moment(val.reminder_date_time).format('DD MM YY A');
                      // var formattedDate = date.format("d, d M y ",); 
                      // var formattedDate = date("D, d M y ",val.mail_recivedAt);

                      // console.log('formattedDate==' + formattedDate);

                         $('#searchMailBodyTr').append("<tr class='w-100' style='cursor: pointer; border-bottom: solid 1px lightgrey; '>"+
                            "<td class='listMailIcon'>"+
                              "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' class='me-2' alt='image'>"+
                            "</td>"+
                            " <td class='listMailDetails inboxMailId' relid='"+val.mail_id+"'>"+
                              "<span>"+
                                "<p class='pClass reminderFromName' id='reminderFromName'>"+val.mail_from_name+"</p>"+
                              "</span>"+
                              "<span>"+
                                "<p class='pClass' style='font-size: 13px; color: #5eb1b1'>"+
                                  subject.substring(0,20)
                                +"</p>"+
                              "</span>"+
                              "<span>"+
                                "<p class='pClass' style='font-size: 12px;'>"+
                                 body_preview
                                +"</p>"+
                              "</span>"+
                            "</td>"+
                            "<td class='inboxMailId' relid='"+val.mail_id+"'>"+
                              "<p class='pClass' style='font-size: 9px; color: #024483; font-weight:600; '>"
                                +formattedDate+
                              "</p>"+
                            "</td>"+
                          "</tr>");

                         if(systemdate > val.reminder_date_time ){
                          console.log('deactivate');
                            $(".reminderFromName").css("color","red");
                         } else if(systemdate == val.reminder_date_time ){
                          console.log('activate')
                            $(".reminderFromName").css("color","green");
                         } else if(systemdate < val.reminder_date_time ){
                          console.log('acti');
                           $(".reminderFromName").css("color","orange");
                         }

                         counter++;

                     });
                  }  

                }
            });

      });

      $(document).on('click', '#descReminderDtWise', function(){
        // alert('hello');
        var filterBy = $(this).attr('relid');

        $.ajax({
               url: "<?= base_url('reminderFilter'); ?>",
                method:"GET",
                data:{"filterBy":filterBy},
                dataType: "json",
                success:function(data)
                {   
                  if(data){

                    // console.log(data);

                    $("#searchMailBodyTr").empty();

                    $("#allMailTableList").hide();
                    $("#searchMailTableResult").show();

                     var counter = 0;

                     $.each(data.reminderFilterResult, function (key, val) {

                      var subject = val.mail_subject;
                      var body_preview = (val.mail_bodyPreview).substring(0,20);

                     var date = new Date();
                      var formattedDate = moment(val.mail_recivedAt).format('DD MM YY A');
                      // var formattedDate = date.format("d, d M y ",); 
                      // var formattedDate = date("D, d M y ",val.mail_recivedAt);

                      // console.log('formattedDate==' + formattedDate);
                      var color = "";
                      if(systemdate > val.reminder_date_time ){
                          color = "red";
                         } 
                      if(systemdate == val.reminder_date_time ){
                          color = "green";
                         } 
                      if(systemdate < val.reminder_date_time ){
                          color= "orange";
                         }

                         $('#searchMailBodyTr').append("<tr class='w-100' style='cursor: pointer; border-bottom: solid 1px lightgrey; '>"+
                            "<td class='listMailIcon'>"+
                              "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' class='me-2' alt='image'>"+
                            "</td>"+
                            " <td class='listMailDetails inboxMailId' relid='"+val.mail_id+"'>"+
                              "<span>"+
                                "<p class='pClass reminderFromName' style='color:"+color+"'>"+val.mail_from_name+"</p>"+
                              "</span>"+
                              "<span>"+
                                "<p class='pClass' style='font-size: 13px; color: #5eb1b1'>"+
                                  subject.substring(0,20)
                                +"</p>"+
                              "</span>"+
                              "<span>"+
                                "<p class='pClass' style='font-size: 12px;'>"+
                                 body_preview
                                +"</p>"+
                              "</span>"+
                            "</td>"+
                            "<td class='inboxMailId' relid='"+val.mail_id+"'>"+
                              "<p class='pClass' style='font-size: 9px; color: #024483; font-weight:600; '>"
                                +formattedDate+
                              "</p>"+
                            "</td>"+
                          "</tr>");

                         counter++;

                     });
                  }  

                }
            });

      });


      $(document).on('click', '.inboxMailId', function(){
      // $("").click(function(){

        $("#showMailCard").show();
        $("#showEmptyCard").hide();

        var id = $(this).attr('relid');
        var filepath = $("#filepath").val();

        // alert('id==' + id);
        $.ajax({
                url: "<?= base_url('detailMail'); ?>",
                method:"GET",
                data:{"mail_id": id,"flag":"singleClick"},
                dataType: "json",
                success:function(data)
                { 

                  // console.log(data);
                  var i=0;
                   // $('#inboxMailDetailsViewJs').empty();
                    $.each(data.finalResult, function (key, val) {

                      
                      $("#mailInboxSubject").html(val.mail_subject);
                      $("#mail_conversation_id").val(val.mail_conversation_id);
                    // append all data in inbox mail detail view

                      $('#inboxMailDetailsViewJs').append("<div class='card-body' style='padding: 1rem 1.5rem !important;'>"+
                        "<div class='row'>"+
                        "<div class='col-1'>"+
                        "<div class='nav-profile-image'>"+
                          "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' alt='profile' style='width: 44px;height: 44px;border-radius: 100%;'>"+
                        "</div>"+
                     "</div>"+
                     "<div class='col-7' id='colFromName'>"+
                        "<a id='MailFromNameHref' data-toggle='collapse' href='#MailDetail"+i+"' aria-expanded='false' aria-controls='MailDetail"+i+"'>"+
                            "<h6 class='mailFromNameTitle' style='font-weight: 600;'>"+ val.mail_from_name +"</h6>"+
                        "</a>"+
                      "</div>"+
                      "<div class='col-4' style='text-align: right;'>"+
                        "<i class='mdi mdi-star menu-icon' id='ImpStar' relid='"+val.mail_conversation_id+"' style='font-size: 15px; color: yellow; display: none; padding-right: 4px;' data-toggle='tooltip' title='Make Un-star mail'></i>"+
                        "<i class='mdi mdi-star menu-icon' id='notImpStar' relid='"+val.mail_conversation_id+"' style='font-size: 15px; padding-right: 4px;display: none;' data-toggle='tooltip' title='Make star mail'></i>"+
                        "<span class='dropdown'>"+
                          "<a id='reminderOption' data-bs-toggle='dropdown'>"+
                            "<i class='mdi mdi-clock menu-icon' id='reminder' relid='"+val.mail_conversation_id+"' style='font-size: 15px; padding-right: 4px; display: none;' data-toggle='tooltip' title='Set Reminder'></i>"+
                          "</a>"+
                          "<div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='reminderOption'>"+
                            "<div class='setReminder p-2'>"+
                              "<div class='row m-2'>"+
                                      "<div class='col-12 pl-2 text-center'>"+
                                         "<p style='font-size: 11px;'>Set Reminder</p>"+
                                      "</div>"+
                                    "</div>"+
                            "</div>"+
                            "<div class='row m-2' id='reminderDate' style='display: none;'>"+
                               "<div class='col-12 text-center p-2'>"+
                                   "<p style='font-size: 11px;'>Reminder Date : <span id='preReminderDate'></span></p>"+
                               "</div>"+
                           "</div>"+
                           "<div class='row m-2'>"+
                              "<div class='col-12 text-center p-2'>"+
                                "<input type='date' name='datepick' id='datepick'>"+
                              "</div>"+
                          "</div>"+
                          "<p id='dateError' style='font-size: 8px;'></p>"+
                          "<div class='row'>"+
                              "<div class='col-12 pl-2 text-center'>"+
                                "<button type='btn' class='btn btn-primary setReminder' id='setReminderBtn'>SET</button>"+
                                "<button type='btn' class='btn btn-primary reSetReminder' id='setReminderBtn' style='display:none; '>RE-SET</button>"+
                              "</div>"+
                          "</div>"+
                          "</div>"+
                        "</span>"+
                        "<i class='mdi mdi mdi-eye-off markasunread' relid='"+val.mail_conversation_id+"' style='font-size: 15px; padding-right: 4px; display: none;' data-toggle='tooltip' title='Mark As Unread'></i>"+
                        "<i class='mdi mdi-trash-can menu-icon trashMail' relid='"+val.mail_conversation_id+"' style='font-size: 15px; padding-right: 4px; display: none;' data-toggle='tooltip' title='Trash Mail'></i>"+
                        "<span class='dropdown'>"+
                            "<a id='ticketAssignOption' data-bs-toggle='dropdown'>"+
                              "<i class='mdi mdi-pen menu-icon' id='ticketAssign' style='font-size: 15px; display: none; '></i>"+
                            "</a>"+
                          "<div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='ticketAssignOption'>"+
                            "<select class='form-control select2' id='assignDropDown' style='width: 100%;'>"+
                            "</select>"+ 
                          "</div>"+
                        "</span>"+
              "<div><p id='receiveTime' style='font-size: 12px;'>"+ moment(val.mail_recivedAt).format('ddd, DD/MM/YYYY h:mm:ss A') +"</p></div>"+
                      "</div>"+
                     "</div>"+
                     "<div class='row collapse' id='MailDetail"+i+"'>"+
                      "<div class='col-1'></div>"+
                      "<div class='col-11'>"+
                        "<div class='row'>"+
                          "<div class='col-12'>"+ 
                              "<p style='font-size: 12px;'><strong>To : </strong><span id='toMailName'>"+val.mail_to+"</span></p>"+
                          "</div>"+
                        "</div>"+
                        "<div class='row'>"+
                          "<div class='col-12'>"+
                              "<div id='MailContent'>"+val.mail_content+"</div>"+
                          "</div>"+
                        "</div>"+
                      "</div>"+
                     "</div>"+
                     "</div>"
                     );

                    // console.log('i=='+i);
                    // console.log('id='+ 'MailDetail'+i);
                    if (i == 0){
                        // console.log('$ii==' + i);
                      if(val.isStarred == 'yes'){
                        $('#notImpStar').hide();
                        $('#ImpStar').show();
                      }else{
                        $('#ImpStar').hide();
                        $('#notImpStar').show();
                      }
                        $('#reminder').show();
                       
                        $('.trashMail').show();
                        $("#ticketAssign").show();
                      } 

                      // console.log(data.teammember);

                      $.each(data.teammember, function (key, val){
                        // console.log(val.member_name);
                        $("#assignDropDown").append("<option value='"+val.member_id+"'>"+val.member_name+"</option>");
                      });

                      if(val.mail_flag == 'assigned'){

                        var assignStr = "This mail is assign by "+ val.mail_assignBy + " at " + val.mail_AssignAt;
                        $("#assignDetails").show();
                        $("#assignDetails").text(assignStr);
                      }


                      $("#assignDropDown").select2();

                      $('#reminderDetails').empty();

                      if(data.reminder != '' && data.reminder != null){
                        if(data.reminder['reminder_date_time'] != '' && data.reminder['reminder_date_time'] != null){

                          $('#reminderDate').show();
                          $('#reSetReminder').show();
                          $('#setReminder').hide();
                          $('#preReminderDate').html(data.reminder['reminder_date_time']);

                          var reminderTxt = "Reminder is set by "+data.reminder['reminder_createdBy']+" on " + data.reminder['reminder_date_time'] ;

                          $('#reminderDetails').show(); 

                          $('#reminderDetails').text(reminderTxt);
                        } else{
                          $('#reminderDetails').hide(); 
                        }
                      }
                    
                    i++;
                   }); 

                  $("#starDetails").empty();
                    $.each(data.starMail, function (key, val){

                      // alert();
                      if((val.starred_createdBy != '' && val.starred_createdBy != null) && (val.starred_date_time != '' && val.starred_date_time != null)){

                        $("#starDetails").show();

                        var starTxt = "This mail has star by " + val.starred_createdBy + " at " + val.starred_date_time;

                        $("#starDetails").text(starTxt);
                      } else{
                        $("#starDetails").hide();

                      }
                    });


                }
          });
      }); 

});
  </script>