$(document).ready(function(){

      $(".inboxMailId").click(function(){
      	alert('hiii');

        var id = $(this).attr('relid');
        var filepath = $("#filepath").val();

        // alert('id==' + id);
        $.ajax({
                url: "<?= base_url('detailMail'); ?>",
                method:"GET",
                data:{"mail_id": id},
                dataType: "json",
                success:function(data)
                { 
                  var i=0;
                   $('#inboxMailDetailsViewJs').empty();
                  	$.each(data.finalResult, function (key, val) {

                  	// append all data in inbox mail detail view

                      $('#inboxMailDetailsViewJs').append("<div class='row'>"+
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
                  			"<i class='mdi mdi-star menu-icon' id='ImpStar' style='font-size: 15px; color: yellow; display: none;'></i>"+
                  			"<i class='mdi mdi-star menu-icon' id='notImpStar' style='font-size: 15px; '></i>"+
                  			"<span class='dropdown'>"+
                  				"<a id='reminderOption' data-bs-toggle='dropdown'>"+
                  					"<i class='mdi mdi-clock menu-icon' id='reminder' style='font-size: 15px;'></i>"+
                  				"</a>"+
                  				"<div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='reminderOption'>"+
                  					"<div class='setReminder p-4'>"+
                  						"<div class='row m-2'>"+
		                                  "<div class='col-12 pl-2 text-center'>"+
		                                  	 "<h6>Set Reminder</h6>"+
		                                  "</div>"+
		                                "</div>"+
                  					"</div>"+
                  					"<div class='row m-2'>"+
                                       "<div class='col-12 text-center p-2'>"+
                                           "<h6>Reminder Date :</h6>"+
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
                                    		"<button type='btn' class='btn btn-primary' id='setReminderBtn'>SET</button>"+
                                  		"</div>"+
                                	"</div>"+
                  				"</div>"+
                  			"</span>"+
                  			"<i class='mdi mdi mdi-eye-off markasunread' style='font-size: 15px;'' data-toggle='tooltip' title='Mark As Unread'></i>"+
                  			"<i class='mdi mdi-trash-can menu-icon trashMail' style='font-size: 15px;'></i>"+
							"<div><p id='receiveTime' style='font-size: 12px;'>"+ moment(val.mail_recivedAt).format('ddd, DD/MM/YYYY h:mm:ss A') +"</p></div>"+
                  		"</div>"+
                     "</div>"+
                     "<div class='row collapse MailDetail' id='MailDetail"+i+"'>"+
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
                     "</div>"
                     );

                    console.log('i=='+i);
                    console.log('id='+ 'MailDetail'+i);

                    i++;
                   });
                  
                }
          });
      });
});