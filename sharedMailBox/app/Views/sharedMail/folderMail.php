<?php 
  $user = session()->get('user');
  $userRole = $user['role'];
  $username = $user['useremail'];
  $name = $user['username'];

  $data = json_decode($allCount);
  // print_r($data);

  $flashMsg = session()->getFlashdata("message");
?>
 <div class="main-panel"> 
  <?php 
    if($flashMsg != '' && $flashMsg != NULL){
      ?>
      <div class="row" id="flashMsg">
      <div class="col-5 offset-md-7">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <?php echo $flashMsg; ?>
              <span aria-hidden="true" class="close text-right" data-dismiss="alert" aria-label="Close" style="float: right;cursor: pointer; font-size:20px;">&times;</span>
          </div>
      </div>
    </div>
      <?php 
    }
  ?>
 

   <div class="content-wrapper">
     <div class="card">
        <div class="card-body">
          
          <div class="row" style="border-bottom: solid 1px lightgrey;">
              <div class="col-8">
                <!-- <p>Recent Tickets</p> -->
              </div>
              <div class="col-4">

              </div>
            </div>
            <input type="hidden" name="userrole" id="userrole" value="<?php echo $userRole; ?>">
            <input type="hidden" name="useremail" id="useremail" value="<?php echo $username; ?>">
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
                            
                            $data = json_decode($allMails);
                             foreach($data as $row){
                              foreach($row as $rowData){
                                $receiveTime[] =  strtotime($rowData->mail_recivedAt);
                              }
                            }
                            array_multisort($receiveTime,SORT_DESC,SORT_STRING,$data);
                             // $data = json_decode($mailColors);
                             
                        ?>
                        <tr style="border-bottom: solid 1px lightgrey;">
                          <th class="thMailList">
                            <i class="mdi mdi-checkbox-multiple-marked-circle-outline" id="selectMailIcon" style="font-size: 18px;color: #104e89;"></i>

                        </th>
                          <th class="thMailList">
                            <div class="row">
                              <div class="col-6">
                                <i class="mdi mdi-account-circle" id="UserIcon" style="font-size: 18px;color: #104e89; display: none;"></i>
                              </div>
                              <div class="col-6">
                                <!-- <span style="text-align: right;" class="col-6">
                                  <div class="dropdown">
                                      <a id="showmoreoption" data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical" style="font-size: 18px;color: #104e89;"></i>
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="showmoreoption">
                                        <a id="readMailsId" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Read Mails</a>
                                        <div class="dropdown-divider"></div> 
                                        <a id="unreadMailsId" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Un-read Mails</a>
                                     </div>
                                    </div>
                                </span> -->
                              </div>
                            </div>
                          </th>

                          <th class="thMailList"  style="text-align: right;">
                            <i id="deleteSelectMail" class="mdi mdi-trash-can menu-icon" style="font-size: 18px;color: #104e89;">
                              
                            </i>
                            
                          </th>

                        </tr>
                        
                        <?php 
                        $counter=0;
                          foreach($data as $row){
                            
                            foreach($row as $rowData){
                              $mail_id = $rowData->mail_id;
                              $isOpen = $rowData->mail_is_open;
                              $isStarred = $rowData->isStarred;
                              // $mail_starredBy = $rowData->mail_starredBy;
                              $mail_recivedAt = strtotime($rowData->mail_recivedAt);
                              $date = date("D, d M y ",$mail_recivedAt);
                              $mail_mailbox_id = $rowData->mail_mailbox_id;
                   
                        ?>
                        <input type="hidden" name="mail_id" id="mail_id" value="<?php echo $mail_id; ?>">
                        <input type="hidden" name="filepath" id="filepath" value="<?php echo base_url(); ?>">
                        
                        <tr id="allFilterMailsTr" style="cursor: pointer; border-bottom: solid 1px lightgrey;">

                          <td class="listMailIcon" id="listMailIcon_<?php echo $counter; ?>" relid="<?php echo $counter; ?>">
                            <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" id="user_img_icon_<?php echo $counter; ?>" class="user_img_icon" class="me-2" alt="image" relid="<?php echo $counter; ?>">

                            <div class="form-group delete_Select" id="delete_Select_<?php echo $counter; ?>"  style="display: none">
                              <div class="form-check">
                                  <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input deleteChkBk" name="deleteMailIds[]" id="deleteMailIds" value="<?php echo  $rowData->mail_conversation_id; ?>"> 
                                  </label>
                              </div>
                            </div>
                          </td>

                          <td class="listMailDetails inboxMailId" relid="<?php echo $rowData->mail_id; ?>">
                            <span><p class="pClass" 
                            style="color: <?php 
                              $colorData = json_decode($mailbox_color);

                              foreach($colorData as $rowColor){
                                foreach($rowColor as $color){
                                  $mailbox_id = $color->mailbox_id;
                                  $color = $color->mailbox_color;
                                  if($mail_mailbox_id == $mailbox_id){
                                    echo $color;
                                  }
                                  
                                }
                              }
                            ?>; 
                            font-weight: <?php if($isOpen == 'N'){?> bold <?php } ?>; "><?php echo $rowData->mail_from_name; ?></p></span>
                            <span><p class="pClass" style="font-size: 13px; color: #5eb1b1"><?php echo substr($rowData->mail_subject,0,17); if(strlen($rowData->mail_subject) > 20){ echo '..'; }?></p></span>
                            <span>
                              <p class="pClass" style="font-size: 12px;">
                                <?php echo substr($rowData->mail_bodyPreview,0,17); if(strlen($rowData->mail_bodyPreview) > 20){ echo '..'; } ?>
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
                          <th class="thMailList">
                            <div class="row">
                              <div class="col-6">
                                <i class="mdi mdi-account-circle" id="UserIcon" style="font-size: 18px;color: #104e89; display: none;"></i>
                              </div>
                              <div class="col-6">
                                <span style="text-align: right;" class="col-6">
                                  <div class="dropdown">
                                      <a id="showmoreoption" data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical" style="font-size: 18px;color: #104e89;"></i>
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="showmoreoption">
                                        <a id="readMailsId" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Read Mails</a>
                                        <div class="dropdown-divider"></div> 
                                        <a id="unreadMailsId" class="p-2 mb-0" style="font-size: 10px; cursor: pointer;">Un-read Mails</a>
                                     </div>
                                    </div>
                                </span>
                              </div>
                            </div>
                          </th>
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

      $('#flashMsg').show(0).delay(5000).hide(0);
      //search from 
      $('.listMailIcon').on({

        mouseenter: function () {
          var counter = $(this).attr("relid");
          // alert('hover='+counter);
          // alert('counter==' + counter);
          $("#user_img_icon_"+counter).hide(); //On mouseover, hode the first div
          $("#delete_Select_"+counter).show();
        },
        mouseleave: function () {
          var counter = $(this).attr("relid");
          // alert('leave='+counter);
          // var delCheckbox = $("#delete_Select_"+counter).val(); 
          // alert("delCheckbox=" +delCheckbox);
          $("#user_img_icon_"+counter).show();
          $("#delete_Select_"+counter).hide();

        }

      });

      $('#search_name').on("keyup",function(){

        var query = $('#search_name').val();

        if(query != ''){
            $.ajax({
                   url: "<?= base_url('searchMails'); ?>",
                    method:"GET",
                    data:{"query":query,"search_mails_from":"allInMails"},
                    dataType: "json",
                    success:function(data){
                      console.log(data);

                      if(data){
                        $("#allMailTableList").hide();
                        $("#searchMailTableResult").show();

                          // $("#searchMailBodyTr").remove();
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
                                      "<p class='pClass' id='mail_name_clor'>"+val.mail_from_name+"</p>"+
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

      $(document).on('click', '#readMailsId', function(){
          $.ajax({
               url: "<?= base_url('get_read_unread_mail'); ?>",
                method:"GET",
                data:{"flag":"read_mail"},
                dataType: "json",
                success:function(data)
                {   
                  if(data){

                    console.log(data);

                    $("#searchMailBodyTr").empty();

                    $("#allMailTableList").hide();
                    $("#searchMailTableResult").show();

                     var counter = 0;

                     $.each(data.allReadMail, function (key, val) {

                      var subject = val.mail_subject;
                      var body_preview = (val.mail_bodyPreview).substring(0,20);
                      var mailbox_color = val.mailbox_color;

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
                                "<p class='pClass' id='mail_name_clor' style='color:"+mailbox_color+"'>"+val.mail_from_name+"</p>"+
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

      $(document).on('click', '#unreadMailsId', function(){
         $.ajax({
               url: "<?= base_url('get_read_unread_mail'); ?>",
                method:"GET",
                data:{"flag":"un_read_mail"},
                dataType: "json",
                success:function(data)
                {   
                  if(data){

                    // console.log(data);

                    $("#searchMailBodyTr").empty();

                    $("#allMailTableList").hide();
                    $("#searchMailTableResult").show();

                     var counter = 0;

                     $.each(data.allUnreadMails, function (key, val) {

                      var subject = val.mail_subject;
                      var body_preview = (val.mail_bodyPreview).substring(0,20);

                     var date = new Date();
                      var formattedDate = moment(val.mail_recivedAt).format('DD MM YY A');
                      var mailbox_color = val.mailbox_color;
                      // var formattedDate = date.format("d, d M y ",); 
                      // var formattedDate = date("D, d M y ",val.mail_recivedAt);

                      // console.log('formattedDate==' + formattedDate);

                         $('#searchMailBodyTr').append("<tr class='w-100' style='cursor: pointer; border-bottom: solid 1px lightgrey; font-weight: bold; '>"+
                            "<td class='listMailIcon'>"+
                              "<img src='<?= base_url();?>/assets/images/faces-clipart/pic-1.png' class='me-2' alt='image'>"+
                            "</td>"+
                            " <td class='listMailDetails inboxMailId' relid='"+val.mail_id+"'>"+
                              "<span>"+
                                "<p class='pClass' style='color:"+mailbox_color+"'>"+val.mail_from_name+"</p>"+
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

      $("#selectMailIcon").click(function(){
        $("#UserIcon").show();
        $("#selectMailIcon").hide();

        var counter = $("#counter").val();

        for (var i = 0; i < counter; i++) {
           $("#user_img_icon_"+i).hide();
            $("#delete_Select_"+i).show();

            $('input:checkbox').prop('checked',true);
        }
      });

    $(document).on('click', '#UserIcon', function(){

        $("#UserIcon").hide();
        $("#selectMailIcon").show();

        var counter = $("#counter").val();

        for (var i = 0; i < counter; i++) {

          $('input:checkbox').prop('checked',false);
          // $("#delete_Select_"+i).prop("checked", 'false');

          $("#user_img_icon_"+i).show();
          $("#delete_Select_"+i).hide();
          
        }
      })

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
        var Comfirm = confirm("Do You Really Want To Delete All Select Mails !");
        var useremail = $("#useremail").val();

        if(Comfirm == true){

            $.ajax({
               url: "<?= base_url('multiDelete'); ?>",
                method:"REQUEST",
                data:{"checkboxVal":checkboxVal, "mail_status" : "deleted", "mail_flag" : "","useremail" : useremail},
                // dataType: "json",
                success:function(data)
                { 
                  setTimeout(function(){
                   location.reload();
                  }, 50);
                }
            });
          }
      });

$(document).on('dblclick', '.inboxMailId', function(){

      var id = $(this).attr('relid');

      var url = "<?= base_url(); ?>/detailMail?mail_id="+id+"&flag=doubleClick";

      window.open(url,'Shared Mailbox','status=0,width=1000,height=900');
    });

  $(document).on('click', '.inboxMailId', function(){
      // $("").click(function(){

        $("#showMailCard").show();
        $("#showEmptyCard").hide();

        var id = $(this).attr('relid');
        var filepath = $("#filepath").val();
        var userrole = $("#userrole").val();

        $("#assignDropDown").html('');

        // alert('id==' + id);
        $.ajax({
                url: "<?= base_url('detailMail'); ?>",
                method:"GET",
                data:{"mail_id": id,"flag":"singleClick"},
                dataType: "json",
                success:function(data)
                { 
                  var i=0;
                   $('#inboxMailDetailsViewJs').empty();
                   console.log(data.finalResult);
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
                        "<a id='MailFromNameHref' data-toggle='collapse' href='#MailDetail"+i+"' aria-controls='MailDetail"+i+"' data-is-focusable='true'>"+
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
                     "<div class='row accordion-body collapse in' id='MailDetail"+i+"' aria-expanded='true'>"+
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
                      "<div class='gallery'>"+
                        "<div class='row mt-4' id='allAttachments' style='margin-bottom: 50px; padding-bottom: 10px;'>"+

                        "</div>"+
                        " <div class='modal fade' id='imagemodal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"+
                            "<div class='modal-dialog'>"+
                              "<div class='modal-content'>"+              
                                "<div class='modal-body'>"+
                                    "<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>"+
                                    "<img src='' class='imagepreview' style='width: 100%;' >"+
                                "</div>"+
                              "</div>"+
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

                        if(userrole == 'admin'){
                          $("#ticketAssign").show();
                        }
                      }

                      if(val.mail_flag == 'assigned'){

                        var assignStr = "<i class='mdi mdi-account-circle' style='padding-right:6px;'></i>This mail is assign by "+ val.mail_assignBy + " at " + val.mail_AssignAt;
                        $("#assignDetails").show();
                        $("#assignDetails").html(assignStr);
                      }else{
                         $("#assignDetails").hide();
                      }
                      
                      // console.log(data.teammember);

                      $.each(data.teammember, function (key, val){
                        // console.log(val.member_name);
                        $("#assignDropDown").append("<option value='"+val.member_id+"'>"+val.member_name+"</option>");
                      });

                      $("#assignDropDown").select2();

                      $('#reminderDetails').empty();

                      if(data.reminder != '' && data.reminder != null){
                        if(data.reminder['reminder_date_time'] != '' && data.reminder['reminder_date_time'] != null){

                          $('#reminderDate').show();
                          $('#reSetReminder').show();
                          $('#setReminder').hide();
                          $('#preReminderDate').html(data.reminder['reminder_date_time']);

                           var reminderTxt = "<i class='mdi mdi-alarm' style='padding-right:6px;'></i>Reminder is set by "+data.reminder['reminder_createdBy']+" on " + data.reminder['reminder_date_time'] ;

                          $('#reminderDetails').show(); 

                          $('#reminderDetails').html(reminderTxt);
                        } else{
                          $('#reminderDetails').hide(); 
                        }
                      }else{
                        $('#reminderDetails').hide();
                      }

                      // console.log(data.attachments);
                      $.each(data.attachments, function(key, val){
                        var attachment_bytes = val.attachment_bytes;
                        var attachment_name = val.attachment_name;
                        var attachment_size = val.attachment_size;
                        var attatchment_type = val.attatchment_type;

                        if(attatchment_type == "text/plain"){
                          $("#allAttachments").append("<div class='col-4'><div class='card'><div class='card-header' style='height: 30px;'><a href='data:"+attatchment_type+";base64,"+attachment_bytes+"' relid='data:"+attatchment_type+";base64,"+attachment_bytes+"' class='txtAttchFileOp' id='txtDwnLod' style='font-size: 12px;' download='"+attachment_name+"'>"+attachment_name+"<span><i class='mdi mdi-arrow-down-bold-circle' style='padding-left: 10px;'></i></span></a></div></div></div>");

                        }else if(attatchment_type == "image/jpeg" || attatchment_type == "image/png"){

$("#allAttachments").append("<div class='col-2'><a href='#' class='pop'><img src='data:"+attatchment_type+";base64,"+attachment_bytes+"' class='img-fluid attachmentImg' relid='data:"+attatchment_type+";base64,"+attachment_bytes+"' id='attachmentImg' "+
  "style='margin-bottom: 10px; width:100%; height: 100px;'/></a></div" );

                        }else if(attatchment_type == "video/mp4"){

                $("#allAttachments").append(" <video style='margin-bottom: 10px; width:100%; height: 100px;' controls>"+
                                "<source src='data:"+attatchment_type+";base64,"+attachment_bytes+"' type='"+attatchment_type+"'>"+
                              "</video>"
                            );
                        }

                      });

                    
                    i++;
                   }); 

                    $("#starDetails").empty();
                    if(data.starMail != '' && data.starMail != null){
                      $.each(data.starMail, function (key, val){
                      // alert();
                      if((val.starred_createdBy != '' && val.starred_createdBy != null) && (val.starred_date_time != '' && val.starred_date_time != null)){

                        $("#starDetails").show();

                        var starTxt = "<i class='mdi mdi-star' style='padding-right:6px;'></i>This mail has star by " + val.starred_createdBy + " at " + val.starred_date_time;

                        $("#starDetails").html(starTxt);
                      } else{
                        $("#starDetails").hide();
                      }
                      });
                    }else{
                      $("#starDetails").hide();
                    }
                }
          });
      }); 


    // $(document).on('click', '#txtDwnLod', function (e) {
    //     e.preventDefault();
    //     var href = $('#txtDwnLod').attr('href');
    //     document.location.href = href;
    // });



    $(document).on('change', '#assignDropDown', function() { 


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
                  // console.log(data);
                  alert(data);

                  // $("#assignMailCounter").text(data.countResult);
                }
          });

        });

});
  </script>
