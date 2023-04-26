      <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © HibernianHealthCare</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer> -->
          <!-- partial -->
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="<?php echo base_url();?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url();?>/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>/assets/js/todolist.js"></script>
    <script src="<?php echo base_url();?>/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
   <!--  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script> -->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.jqueryui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    <script src="<?php echo base_url();?>/assets/js/dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/DataTables/datatables.min.js"></script>
   <!--  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <!-- End custom js for this page -->

    <script>
      $(document).ready(function(){

        //refreshBody
        var submitIcon = $('.searchbar-icon');
            var inputBox = $('.searchbar-input');
            var searchbar = $('.searchbar');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchbar.addClass('searchbar-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchbar.removeClass('searchbar-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
            submitIcon.mouseup(function(){
                    return false;
                });
            searchbar.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbar-icon').css('display','block');
                        submitIcon.click();
                    }
                });


         var site_url = "<?php echo base_url('refresh'); ?>"; 
          $("#refreshBody").load(site_url);

          // var sideBarUrl = "<?php echo base_url('refreshSideBar');?>";
          // $("#sidebar").load('http://localhost:8080/');

        $(document).on('click', '.pop', function(){
// alert('hiii');
          $('.imagepreview').attr('src', $(this).find('img').attr('src'));
          $('#imagemodal').modal('show'); 

            // var src = $(this).attr("src");
            // $('#imagemodal').modal('show'); 
            // // $("#imagemodal").css({"display": "block"});

            // $("#imagepreview").prop("src",src);


        }); 

        $('[data-toggle="tooltip"]').tooltip();

        $('.markasunread').click(function(){

          var conversation_id = $(this).attr('relid');
           $.ajax({
               url: "<?= base_url('markunread'); ?>",
                method:"GET",
                data:{"mail_conversation_id":conversation_id, "mail_is_open" : "N", "mail_openAt" : ""},
                dataType: "json",
                success:function(data)
                { 
                  alert(data);
                }
          });
        });

        $(document).on('click', '.trashMail', function(){
          var conversation_id = $(this).attr('relid');

          $.ajax({
               url: "<?= base_url('trash'); ?>",
                method:"GET",
                data:{"mail_conversation_id":conversation_id, "mail_status" : "deleted", "mail_flag" : ""},
                dataType: "json",
                success:function(data)
                { 
                  alert(data);
                }
          });

        });

        $('#refreshAllMails').click(function(){
          // alert('hii');
            $.ajax({
                 url: "<?= base_url('refresh'); ?>",
                  method:"GET",
                  data:{},
                  dataType: "json",
                  success:function(data)
                  { 
                    // alert(data);
                  }
            });
        });

      });
      tinymce.init({
            selector: "#send_mail_content",
            themes: 'modern',
            menubar: false,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image file"
            ],

            toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect |",
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            toolbar_location: 'bottom',
            file_picker_types: 'file image media',
            file_browser_callback_types: 'file image media'
        });

      $(document).on('click', '#shortForwardTxt', function(){
        //  $("#formwardToTxtBox").show();
        // $("#forwardBtn").show();
        // $("#replayToTxtBox").hide();
        $('#send_mail_to').val('');
        $('#send_mail_from').val('');
        $('#send_mail_cc').val('');
        $('#send_mail_bcc').val('');
        
        $("#replayToTxtBox").show();
        $("#SubjectInBox").show();
        $("#forwardBtn").show();
        $("#rlyBtn").hide();
        $("#noteBtn").hide();
      });

      $(document).on('click', '#FromBtn', function(){
        $("#FromInBox").show();
      });

      $(document).on('click', '#CcBtn', function(){
        $("#CcInBox").show();
      });

      $(document).on('click', '#BccBtn', function(){
        $("#BccInBox").show();
      });

      $(document).on('click', '#shortNoteTxt', function(){
         $("#formwardToTxtBox").hide();
        $("#forwardBtn").hide();
        $("#replayToTxtBox").hide();
        $("#rlyBtn").hide();
        $("#FromInBox").hide();
         $("#CcInBox").hide();
         $("#BccInBox").hide();
         $("#SubjectInBox").hide();
        $("#noteBtn").show();
      });

    $(document).on('click', '#fromInputClose', function(){
        $("#FromInBox").hide();
      });

      $(document).on('click', '#SubjectInputClose', function(){
        $("#SubjectInBox").hide();
      });

    $(document).on('click', '#CcInputClose', function(){
        $("#CcInBox").hide();
      });

    $(document).on('click', '#BccInputClose', function(){
        $("#BccInBox").hide();
      });

      $(document).on('click', '#setReminderBtn', function(){
        // alert('Hiii');
        var date = $('#datepick').val();
        var time = $('#remindertime').val();
        var conversation_id = $('#mail_conversation_id').val();
        var createdBy = $('#createdBy').val();
        var reminder_date_time = date;
        // alert('conversation_id==' + conversation_id) + ',' + time;

        if(date == ''){
          $("#dateError").html("Please Select Date !").css("color", "red");
          return false;
        }else if(time == ''){
           $("#timeError").html("Please Select Time !").css("color", "red");
            return false;
        }else{
          $("#dateError").hide();
          $("#timeError").hide();
           $.ajax({
              url: "<?= base_url('setReminder'); ?>",
              method:"GET",
              data:{"conversation_id" : conversation_id, "createdBy" : createdBy, "reminder_date_time" : reminder_date_time, 
                    "reminder_flag" : "active"},
              dataType: "json",
              success:function(data)
              {
                alert(data);
              }

          });
        }
      });

      // common search bar 

      $("#CommonSearchInput").on("keyup",function(){
         var selectFolder = $("#commonSelectFolder").val();
         var selectQuery = $(this).val();

         // alert('selectQuery==' + selectQuery);
         // alert('selectFolder==' + selectFolder);

         if(selectQuery != ''){
            $.ajax({
                   url: "<?= base_url('searchMails'); ?>",
                    method:"GET",
                    data:{"query":selectQuery,"search_mails_from":selectFolder},
                    dataType: "json",
                    success:function(data){
                      console.log(data);

                      if(data != '' && data != null){
                        $("#allMailTableList").hide();
                        $("#searchMailTableResult").show();

                          $("#searchMailBodyTr").empty();
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
                                      "<p class='pClass' style='color: "+val.mail_mailbox_color+"'>"+(val.mail_from_name).substring(0,20)+"</p>"+
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
                        // $('#searchMailBodyTr').append("<p>No Data Found !</p>");
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

      $("#advanceSearchForm").submit(function() {
          // alert('hiiiii');

            $.ajax({
                url: "<?= base_url('advanceSearch'); ?>",
                type:"POST",
                data: $(this).serialize(), // get all form field value in serialize form
                dataType: "json",
                success: function(data){
                   // alert(data);
                  if(data != '' && data != null){

                        $("#allMailTableList").hide();
                        $("#searchMailTableResult").show();

                          // $("#searchMailBodyTr").empty();
                        // console.log(data.allSearchData);

                          var counter = 0;

                          // $("#searchMailBodyTr").empty();
                           $.each(data.allSearchData, function (key, val) {

                            if(data.allSearchData[counter] != '' && data.allSearchData[counter] != null){

                           
                            $.each(data.allSearchData[counter], function(key,val){

                              console.log(val);
                           
                            var subject = val.mail_subject;
                            var body_preview = (val.mail_bodyPreview).substring(0,20);

                            // alert(val.mail_subject);

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
                              });
                            }
                               counter++;

                           });

                      } else{
                        // $('#searchMailBodyTr').append("<p>No Data Found !</p>");
                        $("#allMailTableList").show();
                        $("#searchMailTableResult").hide();
                      }

                }
            });
         });

       $('#resetAdvanceSearch').click(function(){
            $('#advanceSearchForm')[0].reset();
            location.reload(true);
        });

        // $(document).on('dblclick', '.txtAttchFileOp', function(){

        //     var id = $(this).attr('relid');

        //     var url = id;

        //     window.openwindow.open(id);
        //     // (url,'Shared Mailbox','status=0,width=1000,height=900');
        // });
     
      function onTimeChange() {
        var inputEle = document.getElementById('timepick');
        // alert()
        var timeSplit = inputEle.value.split(':'),
          hours,
          minutes,
          meridian;
        hours = timeSplit[0];
        minutes = timeSplit[1];
        if (hours > 12) {
          meridian = 'PM';
          hours -= 12;
        } else if (hours < 12) {
          meridian = 'AM';
          if (hours == 0) {
            hours = 12;
          }
        } else {
          meridian = 'PM';
        }
      
        var time = hours + ':' + minutes + ' ' + meridian;
        document.getElementById('remindertime').value = time;

        var remindertime = document.getElementById('remindertime').value;
        // alert('remindertime==' + remindertime);
      }
      
    </script>

  </body>
</html>