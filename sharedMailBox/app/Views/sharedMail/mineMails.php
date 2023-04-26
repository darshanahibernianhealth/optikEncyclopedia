<div class="main-panel">
   <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
          <div class="row" style="border-bottom: solid 1px lightgrey;">
              <div class="col-8">
                <p>Mine Mail's</p>
              </div>
              <div class="col-4">
                <form class="searchbar">
                  <input type="search" placeholder="Search here" name="search" class="searchbar-input"
                    id="search_name"  required>
                  <span class="searchbar-icon"><i class="mdi mdi-magnify" aria-hidden="true"></i></span>
                </form>
              </div>
            </div>
            <div class="row" style="margin-top: 5px;">
               <div class="col-4 listViewClass">
                <div class="card">
                  <div class="card-body mailListCardBody">
                      <div id="tableSearchResult">
                        <table class="w-100" id="allMailTableList">
                           <?php 
                               // echo 'ROOTPATH=='.ROOTPATH;
                               // echo 'DOCUMENT_ROOT=='.base_url();
                               $user = session()->get('user');
                               $useremail = $user['useremail'];
                               
                               $data = json_decode($getMineMails);
                                // $data = json_decode($mailColors);
                               $dataMemberName = json_decode($member_name);
                                
                           ?>
                           <tr style="border-bottom: solid 1px lightgrey;">
                             <th class="thMailList">
                               <!-- <i class="mdi mdi-checkbox-multiple-marked-circle-outline" id="selectMailIcon" style="font-size: 18px;color: #104e89;"> -->
                               </th>
                             <th class="thMailList"></th>
                             <th class="thMailList" id="deleteSelectMail" style="text-align: right;">
                               <!-- <i class="mdi mdi-trash-can menu-icon" style="font-size: 18px;color: #104e89;"> -->
                             </th>

                           </tr>
                        <?php 
                        $counter=0;
                          foreach($data as $row){
                            
                            foreach($row as $rowData){
                              $mail_id = $rowData->mail_id;
                              // $mail_mailbox_color = $rowData->mail_mailbox_color;
                              // $isStarred = $rowData->isStarred;
                              // $mail_starredBy = $rowData->mail_starredBy;
                              $mail_recivedAt = strtotime($rowData->mail_recivedAt);
                              $date = date("D, d M y ",$mail_recivedAt);
                        ?>
                        <input type="hidden" name="mail_id" id="mail_id" value="<?php echo $mail_id; ?>">
                        <input type="hidden" name="filepath" id="filepath" value="<?php echo base_url(); ?>">
                        
                        <tr style="cursor: pointer; border-bottom: solid 1px lightgrey;" class="">

                          <td class="listMailIcon">
                            <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" id="user_img_icon_<?php echo $counter; ?>" class="me-2" alt="image">

                            <div class="form-group" id="delete_Select_<?php echo $counter; ?>" style="display: none">
                              <div class="form-check">
                                  <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input deleteChkBk" name="deleteMailIds[]" id="deleteMailIds" value="<?php echo  $rowData->mail_conversation_id; ?>"> 
                                  </label>
                              </div>
                          </div>
                          </td>

                          <td class="listMailDetails inboxMailId" relid="<?php echo $rowData->mail_id; ?>">
                            <span><p class="pClass" ><?php echo $rowData->mail_from_name; ?></p></span>
                            <span><p class="pClass" style="font-size: 13px; color: #5eb1b1"><?php echo substr($rowData->mail_subject,0,17); if(strlen($rowData->mail_subject) > 20){ echo '..'; }?></p></span>
                            <span>
                              <p class="pClass" style="font-size: 12px;">
                                <?php echo substr($dataMemberName,0,17);  ?>
                              </p></span>
                          </td>

                          <td class="inboxMailId" relid="<?php echo $rowData->mail_id; ?>">
                            <p class="pClass" style="font-size: 9px; color: #024483; font-weight:600; "><?php echo $date; ?></p>
                          </td>
                        </tr>
                        <?php                          
                          }
                           $counter++;
                        }
                        ?>
                        <input type="hidden" name="counter" id="counter" value="<?php echo $counter; ?>">
                        <input type='hidden' id='hdncheckbox' />
                      </table>

                      <table class="w-100" id="searchMailTableResult" style="display: none;">
                        <tr style="border-bottom: solid 1px lightgrey;">
                          <th class="thMailList">
                            <i class="mdi mdi-checkbox-multiple-marked-circle-outline" id="selectMailIcon" style="font-size: 18px;color: #104e89;">
                            </th>
                          <th class="thMailList"></th>
                          <th class="thMailList" id="deleteSelectMail" style="text-align: right;">
                            <i class="mdi mdi-trash-can menu-icon" style="font-size: 18px;color: #104e89;">
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
                    // print_r($_REQUEST);
                    include('assignDetailMail.php');
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


      // $('#example').hierarchySelect({
      //   search: true,
      //  });
     // $('.search_select_box select').selectpicker();


      //search from 
      $('#search_name').on("keyup",function(){

        var query = $('#search_name').val();

        if(query != ''){
            $.ajax({
                   url: "<?= base_url('searchMails'); ?>",
                    method:"GET",
                    data:{"query":query,"search_mails_from":"allAssignMails"},
                    dataType: "json",
                    success:function(data){
                      console.log(data);

                      if(data){
                        $("#allMailTableList").hide();
                        $("#searchMailTableResult").show();

                          // $("#searchMailBodyTr").empty();
                          var counter = 0;
                           $.each(data.allSearchData, function (key, val) {
                            var subject = val.mail_subject;
                            var body_preview = (val.mail_bodyPreview).substring(0,20);

                           var date = new Date();
                            var formattedDate = moment(val.mail_recivedAt).format('DD MM YY A');
                            // var formattedDate = date.format("d, d M y ",); 
                            // var formattedDate = date("D, d M y ",val.mail_recivedAt);

                            // console.log('formattedDate==' + formattedDate);

                               $('#searchMailBodyTr').append("<tr class='w-100' style='cursor: pointer; border-bottom: solid 1px lightgrey; '>"+
                                  "<td class='listMailIcon'>"+
                                    "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' class='me-2' alt='image'>"+
                                  "</td>"+
                                  " <td class='listMailDetails inboxMailId' relid='"+val.mail_id+"'>"+
                                    "<span>"+
                                      "<p class='pClass' style='color: "+val.mail_mailbox_color+"'>"+val.mail_from_name+"</p>"+
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

                      } else{
                        $("#allMailTableList").show();
                        $("#searchMailTableResult").hide();
                      }
                      
                }
          });
        }else {
                $("#allMailTableList").show();
                $("#searchMailTableResult").hide(); 
            } 
      });

      $("#selectMailIcon").click(function(){
        var counter = $("#counter").val();

        for (var i = 0; i < counter; i++) {
           $("#user_img_icon_"+i).hide();
            $("#delete_Select_"+i).show();
        }
      });

      $(".deleteChkBk").on("change", function() {
        tmp = [];
        $(".deleteChkBk").each(function() {
            if($(this).prop("checked") == true)
            {
              tmp.push($(this).val());
            }
        });
        $("#hdncheckbox").val(JSON.stringify(tmp));
        // $("#result").text($("#hdncheckbox").val());
        // console.log($("#hdncheckbox").val())
      });

      $("#deleteSelectMail").click(function(){

        var checkboxVal = $("#hdncheckbox").val();
            $.ajax({
               url: "<?= base_url('multiDelete'); ?>",
                method:"REQUEST",
                data:{"checkboxVal":checkboxVal, "mail_status" : "deleted", "mail_flag" : ""},
                // dataType: "json",
                success:function(data)
                { 
                  setTimeout(function(){
                   location.reload();
                  }, 50);
                }
          });
      })

  $(document).on('click', '.inboxMailId', function(){
      // $("").click(function(){

        $("#showMailCard").show();
        $("#showEmptyCard").hide();

        var id = $(this).attr('relid');
        var filepath = $("#filepath").val();

        // alert('id==' + id);
        $.ajax({
                url: "<?= base_url('assignDetailMailView'); ?>",
                method:"GET",
                data:{"mail_id": id},
                dataType: "json",
                success:function(data)
                { 
                  var i=0;
                   $('#assignMailDetailViewJs').empty();
                    $.each(data.finalResult, function (key, val) {

                      
                      $("#mailInboxSubject").html(val.mail_subject);
                      $("#mail_conversation_id").val(val.mail_conversation_id);
                      $("#mail_mail_id").val(val.mail_mail_id);
                      $("#mail_from").val(val.mail_from);
                      $("#mail_to").val(val.mail_to);
                    // append all data in inbox mail detail view

                      $('#assignMailDetailViewJs').append("<div class='card-body' style='padding: 1rem 1.5rem !important;'>"+
                        "<div class='row'>"+
                        "<div class='col-1'>"+
                        "<div class='nav-profile-image'>"+
                          "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' alt='profile' style='width: 44px;height: 44px;border-radius: 100%;'>"+
                        "</div>"+
                     "</div>"+
                     "<div class='col-7' id='colFromName'>"+
                        "<a id='MailFromNameHref' data-toggle='collapse' href='#MailDetail"+i+"' aria-controls='MailDetail"+i+"'>"+
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
                     "<div class='row panel-collapse collapse in' id='MailDetail"+i+"' aria-expanded='true'>"+
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
                        $('.markasunread').show();
                        $('.trashMail').show();
                        $("#ticketAssign").show();
                      }

                      // console.log(data.teammember);


                      if(data.reminder != '' && data.reminder != null){
                        if(data.reminder['reminder_date_time'] != '' && data.reminder['reminder_date_time'] != null){

                          $('#reminderDate').show();
                          $('#reSetReminder').show();
                          $('#setReminder').hide();
                          $('#preReminderDate').html(data.reminder['reminder_date_time']);
                        }
                      }

                    
                    i++;
                   }); 


                  $("#replyEditor").append("<div class='card'>"+
  "<div class='card-header'>"+
      "<div class='row'>"+
          "<div class='col-6'>"+
              "<button id='shortReplyTxt' type='button' class='btn btn-outline-light text-black btn-fw'>Reply <i class='mdi mdi-reply menu-icon'></i></button>"+
              "<button id='shortForwardTxt' type='button' class='btn btn-outline-light text-black btn-fw'>Forward <i class='mdi mdi-forward menu-icon'></i></button>"+
          "</div>"+
          "<div class='col-6' style='text-align: right;'>"+
              "<span class='p-2' id='FromBtn'><strong>From</strong></span>"+
              "<span class='p-2' id='CcBtn'><strong>Cc</strong></span>"+
              "<span class='p-2' id='BccBtn'><strong>Bcc</strong></span>"+
            "</div>"+
      "</div>"+
    "</div>"+ 
    "<form method='post' id='rlyFrwForm' action='javascript:void(0)'>"+
      "<div class='card-body'>"+

        "<div class='row' id='replayToTxtBox' style='display: none; font-size: 12px;'>"+
            "<div class='col-1' style='padding-left: 5px; padding-right: 5px;'>"+
                "<p style='font-size: 12px; font-weight: bold; '>To</p>"+ 
              "</div>"+
              "<div class='col-11'>"+
                  "<div class='form-group'>"+
                      "<input type='email' name='send_mail_to' id='send_mail_to'  class='form-control' placeholder=''>"+
                  "</div>"+
              "</div>"+
        "</div>"+
        "<div class='row' id='FromInBox' style='display: none; font-size: 12px;'>"+
            "<div class='col-1' style='padding-left: 5px; padding-right: 5px;'><p style='font-size: 12px; font-weight: bold; '>From</p></div>"+
              "<div class='col-10'>"+
                  "<div class='form-group'>"+
                      "<input type='email' name='send_mail_from' id='send_mail_from'  class='form-control' placeholder=''>"+
                  "</div>"+
                  "<p id='errorFrom' style='display: none; color: red; font-size: 9px;'>Please enter email id which is allocate to you !</p>"+
              "</div>"+
              "<div class='col-1'>"+
                  "<a><i class='mdi mdi-close menu-icon' id='fromInputClose'></i></a>"+
                "</div>"+
            "</div>"+
            "<div class='row' id='CcInBox' style='display: none; font-size: 12px;'>"+
              "<div class='col-1' style='padding-left: 5px; padding-right: 5px;'><p style='font-size: 12px; font-weight: bold; '>Cc </p></div>"+
                  "<div class='col-10'>"+
                    "<div class='form-group'>"+
                      "<input type='email' name='send_mail_cc' id='send_mail_cc'  class='form-control'>"+
                    "</div>"+
                    "</div>"+
                    "<div class='col-1'>"+
                      "<a><i class='mdi mdi-close menu-icon' id='CcInputClose'></i></a>"+
                    "</div>"+
                "</div>"+

                "<div class='row' id='BccInBox' style='display: none; font-size: 12px;'>"+
                    "<div class='col-1' style='padding-left: 5px; padding-right: 5px;'><p style='font-size: 12px; font-weight: bold; '>Bcc </p></div>"+
                    "<div class='col-10'>"+
                        "<div class='form-group'>"+
                           "<input type='email' name='send_mail_bcc' id='send_mail_bcc'  class='form-control'>"+
                        "</div>"+
                    "</div>"+
                    "<div class='col-1'>"+
                      "<a><i class='mdi mdi-close menu-icon' id='BccInputClose'></i></a>"+
                    "</div>"+
                "</div>"+
                "<textarea id='reply' name='send_mail_content'></textarea>"+
              "</div>"+

              "<div class='card-footer'>"+
                  "<div class='sendBtn' style='float: right;'>"+
                      "<button class='btn btn-md btn-outline-danger dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>YOU</button>"+
                          "<div class='dropdown-menu' id='reassignlist'>"+
                          "</div>"+
                        "<div class='btn btn-outline-primary btn-fw m-2' id='rlyBtn' disabled> Reply & Close </div> "+
                        "<button type='submit' class='btn btn-outline-primary btn-fw m-2' id='forwardBtn' style='display: none;' disabled>Forward & Close</button>"+
                  "</div>"+
            "</div>"+
        "</form>"+
  "</div>");

// console.log(data.teammemberName);
 $.each(data.teammember, function (key, val){
                        // console.log(val.member_name);
                        $("#assignDropDown").append("<option value='"+val.member_id+"'>"+val.member_name+"</option>");

                         $("#reassignlist").append("<p id='dropdown-item' class='re_assignDropDown p-2' relid='"+val.member_id+"'>"+val.member_name +"</p>");
                      });

                      $("#assignDropDown").select2();

// $.each(data.teammemberName, function (key, val){
//    $("#reassignlist").append("<p id='dropdown-item' class='re_assignDropDown p-2' relid='"+val.member_id+"'>"+
//       val.member_name +
//       "</p>");
// });

      tinymce.init({
            selector: "#reply",
            themes: 'modern',
            menubar: false,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],

            toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect |",
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            toolbar_location: 'bottom',
            file_picker_types: 'file image media'
        });

                }
          });
      }); 

});
</script>
