<div class="main-panel">
	<div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h5 style="font-weight:bold; color: #1fa5a5; "> Documentation</h5>
            </div>
            <div class="card-body">
                <div class="info">
                    <p>This project is design for assigning work tickets/mails to user. We have implements all functionality like other mail servers. 
                        In this project we get all mails of shared mail id as well as personal mail in our system , and after geting this user can perform operation. 
                        In this project we have two panels one is admin panel and second is user panel. Admin have authority to access mailbox and assign ticket and re-assign ticket to user.
                        and Admin can also assign ticket to himself also. After assignning ticket it will can give reply to that particular mail and as well as they can forward this particular mail.
                        Also from here user or admin can send mail also.

                    </p>
                    <p>
                        They can set reminder, set as important , it have universal search option by using universal search option can search mail by folder name, by name and we have given advance search option also.
                    </p>
                </div>
                <section class="mailbox">
                    <div class="mailbox_decri">
                        <h6 style="color: #004382;"><strong>1) Mailbox : </strong></h6>
                    </div>
                    <div class="getInboxDescri">
                        <p>
                            <blockquote> 
                                In mailbox we can add, delete and modify different mailbox in our system.  can add mailbox after entering email id of this mail. Only admin have authority to access this option and adding mailboxes.
                                At the time of adding mailbox we can set color for particular mailbox as per there choice , so we can see mail from there mailboxes in different colors and it is easy to unserstand if we integrate more than one mailbox.
                            </blockquote>
                        </p>

                        <ul>
                            <li class="margin_top_20"><strong>Add Mailbox</strong></li>
                        </ul>
                        <p>&nbsp; &nbsp; By using add mailbox admin can add mailbox's and can access in system.</p>
                        <p class="pF12">&nbsp; &nbsp; <u>Mailbox -> Add Mailbox</u></p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/add_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>
                        
                        <ul>
                            <li class="margin_top_20"><strong>View Mailbox</strong></li>
                        </ul>
                        <p>&nbsp; &nbsp; By using view mailbox we can see all mailbox's which mailbox added up till now and also we can modify and delete mailbox from view mailbox option.</p>
                        <p class="pF12">&nbsp; &nbsp; <u>Mailbox -> View Mailbox</u></p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/view_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>

                        <ul>
                            <li class="margin_top_20"><strong>Modify Mailbox</strong></li>
                        </ul>
                        <p>&nbsp; &nbsp; By using modify mailbox we can modify details of mailbox.</p>
                        <p class="pF12">&nbsp; &nbsp; <u>Mailbox -> Modify Mailbox</u></p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/modify_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>

                        <ul>
                            <li class="margin_top_20"><strong>Delete Mailbox</strong></li>
                        </ul>
                        <p>&nbsp; &nbsp; By using delete mailbox we can delete  mailbox.</p>
                        <p class="pF12 margin_top_20">&nbsp; &nbsp; <u>Mailbox -> View Mailbox</u></p>
                        <div class="row margin_top_20">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/delete1_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>
                        <p class="margin_top_20">After deleting mailbox , it will show one message "Mailbox Deleted Sucessfully." and refresh page.</p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/view_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>

                        <ul>
                            <li class="margin_top_20"><strong>Re-activate Mailbox</strong></li>
                        </ul>
                        <p>&nbsp; &nbsp; In Deleted Mailbox list we have option to re-activate mailbox. When click on re-activate button mailbox can re-activate again.</p>
                        <p class="pF12 margin_top_20">&nbsp; &nbsp; <u>Mailbox -> Delete Mailbox</u></p>
                        <div class="row margin_top_20">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/re_activate.png'); ?>" class="doc_img">
                            </div>
                        </div>
                        <p class="margin_top_20">After click on Re-activate button, it shows one confirm message pop up, click on ok button then it will re-activate mailbox and show one message "Mailbox Re-activated Sucessfully." and refresh page.</p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?= base_url('images/documentation/deleted_list_mailbox.png'); ?>" class="doc_img">
                            </div>
                        </div>

			        </div>
                
            </section>
            <hr>
            <section class="teamMates">
                <div class="mailbox_decri">
                    <h6 style="color: #004382;"><strong>2) Teammates : </strong></h6>
                </div>
                <div class="teammate_descri">
                    <p>
                        &nbsp;&nbsp; In teammates we can add , modify and view teammates. Only admin have authority to add, modify and view teammates.
                    </p>
                    <ul>
                        <li class="margin_top_20"><strong>Add Teammates</strong></li>
                    </ul>
                    <p>&nbsp; &nbsp; By using add teammates admin can add user and assign mailbox to particular user. </p>
                    <p class="pF12 margin_top_20">&nbsp; &nbsp; <u>Teammates -> Add Teammates</u></p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/add_teammates.png'); ?>" class="doc_img">
                        </div>
                    </div>
                    <p class="margin_top_20">&nbsp; &nbsp; If you enter invalid email id or email field is blank in that case next button is disable. When you fill in righ way then it we enable and show next screen </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/invite_teammates.png'); ?>" class="doc_img">
                        </div>
                    </div>
                    <p class="margin_top_20">&nbsp; &nbsp; When you click on next button , then above screen will be open , by using this admin can assign multiple mailbox to user.
                        And after click on invite button member is added and also mailbox are also assign to this particular user sucessfully.
                    </p>

                    <ul>
                        <li class="margin_top_20"><strong>View Teammates</strong></li>
                    </ul>
                    <p>&nbsp; &nbsp; In View teammates option we can see all member which is add by admin, in this option we can modify teammates as well by clicking on pen icon. </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/view_teammates.png'); ?>" class="doc_img">
                        </div>
                    </div>

                    <ul>
                        <li class="margin_top_20"><strong>Modify Teammates</strong></li>
                    </ul>
                    <p>&nbsp; &nbsp; In modify teammates admin can modify teammates/user details, admin can reassign mailboxs as well as change email id of user/teammate if it  wrong. </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/modify_teamates.png'); ?>" class="doc_img">
                        </div>
                    </div>
                   
                </div>
            </section>
            <hr>

            <section>
                <div class="mailbox_decri">
                    <h6 style="color: #004382;"><strong>3) Compose : </strong></h6>
                </div>
                <div class="send_mail_descri">
                    <p>
                        &nbsp;&nbsp; By using compose mail funcationality, we can send mail by given mail id to any other mail id. we can send with attachments also.
                        After sending mail it will reflect it on your mail server as well as in send mail folder of system.
                    </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/compose_mail.png'); ?>" class="doc_img">
                        </div>
                    </div>
                    <p class="margin_top_20">
                        Please enter valid email id in every field, and in from input field please enter email id which is provied by admin otherwise submit button will not work. 
                    </p>
                </div>
            </section>
                <hr>
            <section>
                <div class="mailbox_decri">
                    <h6 style="color: #004382;"><strong>4) Send Mail : </strong></h6>
                </div>
                <div class="send_mail_descri">
                    <p>
                        &nbsp;&nbsp; In Send Mail folder it display all mails which is send / compose by particular assign email id. If we have access of more than one mailbox then we have have differenciate all send mail's by it's color. 
                    </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/send_mail.png'); ?>" class="doc_img">
                        </div>
                    </div>
                    <p class="margin_top_20">
                        When click on any mail , it will one in second screen and we can see whole mail and if any replay is also there we display in conversation format.
                    </p>
                    <div class="row margin_top_20">
                        <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <img src="<?= base_url('images/documentation/send_mail_detail.png'); ?>" class="doc_img">
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <section>
                <div class="mailbox_decri">
                    <h6 style="color: #004382;"><strong>5) Inbox : </strong></h6>
                </div>
                <div class="inbox_decri">
                <p>
                    &nbsp;&nbsp;In Inbox section we have unassign, assign, reminder etc. optins. In this section we display all mails of mailbox which is assigned by admin, 
                    and in all mails we can perform different operation's like set reminder, star mail, delete mail, mark as unread mail etc.
                </p>
                </div>

                <ul>
                    <li class="margin_top_20"><strong>Unassign Mails : </strong></li>
                </ul>
                <p>
                    &nbsp;&nbsp; In Unassign mail optiion we display all mails of mailbox's which is assign by admin. If admin assign mailbox's to user more than one in that case all mailbox's mails are showing combinly,
                    And we seprated this mails by color, this mail color is set by admin at the time of adding or modifing mailbox.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/unassign_mail.png'); ?>" class="doc_img">
                    </div>
                </div>
                <p class="margin_top_20">
                    When you click on any mail it will open in second section and here it display whole mail with there details , if this mail have any kind of attachment this is also display.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/unassign_mail_detail.png'); ?>" class="doc_img">
                    </div>
                </div>
                <p class="margin_top_20">
                    When you double click on any mail from unassign mail list detail will open in new window as popup.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/dblclk_detail.png'); ?>" class="doc_img">
                    </div>
                </div>

                <ul>
                    <li class="margin_top_20"><strong>Star Mails : </strong></li>
                </ul>
                <p>
                    &nbsp;&nbsp; When click on star icon from mail detail from any panel it will mark as star and as well in star mail list with details of who star it and at when.
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/unstar_mail.png'); ?>" class="doc_img">
                    </div>
                </div>
                <p class="margin_top_20">
                    After click on star icon it will show in start mail list 
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/star_mail_list.png'); ?>" class="doc_img">
                    </div>
                </div>
                <p class="margin_top_20">
                    When you click on any mail form star mail list it will open in detail view and show details who star mar and at when.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/star_detail_mail.png'); ?>" class="doc_img">
                    </div>
                </div>

                <ul>
                    <li class="margin_top_20"><strong>Reminder Mails : </strong></li>
                </ul>
                <p>
                    &nbsp;&nbsp; When we click on clock icon one small form is open in popup , from there we can choose one particular date and click on SET button then reminder will be set for this particular date.
                    and then this mail will also display in reminder list.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/reminder_form.png'); ?>" class="doc_img">
                    </div>
                </div>
                <p class="margin_top_20">
                    After click on set button it will display one popup with message "Reminder Set Sucessfully". and if we again open this particular mail from unassign or any other panel it will show details of reminder.
                    , Who set Reminder and for which date.
                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/reminder_detail.png'); ?>" class="doc_img">
                    </div>
                </div>

                <p class="margin_top_20">
                    In Reminder mail list we can see all mail's  which mail's have reminder are in different color.
                    <br>
                    Green color mail indicate reminder date for mail is set for today's or current date.
                    Orage color mail indicate mail reminder date is upcoming.
                    Red color indiate reminder date for is passed away. 
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/reminder_list.png'); ?>" class="doc_img">
                    </div>
                </div>

                <ul>
                    <li class="margin_top_20"><strong>Unread Mail : </strong></li>
                </ul>

                <p>
                    &nbsp;&nbsp; When you click on eye icon then this mail is again sey as unread mail. And Show in bold font to indicate this mail is now read yet.

                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/unread_mail.png'); ?>" class="doc_img">
                    </div>
                </div>

                <ul>
                    <li class="margin_top_20"><strong>Trash Mail : </strong></li>
                </ul>

                <p>
                    &nbsp;&nbsp; When you click on trash icon then particular mail is move to the trash folder and mark as deleted.
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/trash_icon.png'); ?>" class="doc_img">
                    </div>
                </div>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/deleted_mail_list.png'); ?>" class="doc_img">
                    </div>
                </div>


                <ul>
                    <li class="margin_top_20"><strong>Assign Mail : </strong></li>
                </ul>
                <p>
                    &nbsp;&nbsp; Only admin can see this option and admin only assign mail to user . user don't have authority to assign ticket and it's not visible to user.
                    <br>
                    when you click on pen icon it will show you one dropdown in this dropdown you can seach name of user which you want to assign this mail. and just enter 
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/assign_icon.png'); ?>" class="doc_img">
                    </div>
                </div>

                <p class="margin_top_20">
                    After assigning mail to user or to himself, this mail move to assign mail list it will not display in any other list.
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/assign_mail_list.png'); ?>" class="doc_img">
                    </div>
                </div>

                <p class="margin_top_20">
                    When you click on any assign mail it will open in next section of windown. and agin this section is divied horizontally in two sections.
                    In first section display mail details and if mail have conversation then it will display with conversation. When you click on name it will expanded and will see details of mail.
                    In second setion we have given two option reply and forward.

                </p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img src="<?= base_url('images/documentation/assign_detail_view.png'); ?>" class="doc_img">
                    </div>
                </div>

                <p class="margin_top_20">
                    When you click on reply  button it open reply form , in that for it include to email, from email please all these details, To email field is autofilled when you click on reply button and it is readonly field, you just need to enter from email id,
                    But please enver valid and assign email id other wise it will show an error.
                   
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/reply_1.png'); ?>" class="doc_img">
                     </div>
                </div>

                <div class="row margin_top_20">
                    <!-- <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> -->
                        <div class="col-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="<?= base_url('images/documentation/reply_form.png'); ?>" width="100%" height="250px">
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="<?= base_url('images/documentation/reply_text_box.png'); ?>" width="100%" height="250px">
                        </div>
                    <!-- </div> -->
                </div>
                <p class="margin_top_20"> After Entering all fields reply will be send sucessfully. </p>

                <p class="margin_top_20">
                   If you want to re-assign just on you button dropdown will be populated, and select user on click ticket will be re-assign.
                   But admin only have this authoroity to re assign.
                </p>
                
                <p class="margin_top_20">
                  when you click on FORWARD button it will display form with filled data all content of particular mail is atofilled in text area,
                  ypu just need to pass to email and from email id.
                </p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/forward_1.png'); ?>" class="doc_img">
                     </div>
                </div>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/forward_3.png'); ?>" class="doc_img">
                     </div>
                </div>

                <p class="margin_top_20"> when you click on forward for form submission then mail will be forwared.</p>

                <ul>
                    <li class="margin_top_20"><strong>Mine Mail : </strong></li>
                </ul>

                <p class="margin_top_20"> In mine mails it display all assign mails of that particular user who is loged in .</p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/mine_mails.png'); ?>" class="doc_img">
                     </div>
                </div>

            </section>

            <section>
                <div class="mailbox_decri">
                    <h6 style="color: #004382;"><strong>5) Search Bar : </strong></h6>
                </div>
                <div class="inbox_decri">
                    We have given univarsal search option, we can search by name , by folder and also we have given advanc serch option.,
                    if i am not seleting any particular folder then it will search in all folder.

                </div>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/search_1.png'); ?>" class="doc_img">
                     </div>
                </div>

                <p class="margin_top_20"> now we select any particular folder and search in this folder by name.</p>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/search_2.png'); ?>" class="doc_img">
                     </div>
                </div>

                <p class="margin_top_20"> now we select advance search option . filled fields with valid data and search , just click on line icon and it will open advance search form</p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/advance_search_btn.png'); ?>" class="doc_img">
                     </div>
                </div>
                <p class="margin_top_20"> Enter values and click on search button. Result will populate it on your screen</p>
                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/advance_form.png'); ?>" class="doc_img">
                     </div>
                </div>

                <div class="row margin_top_20">
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                        <img src="<?= base_url('images/documentation/advance_result.png'); ?>" class="doc_img">
                     </div>
                </div>

                <p class="margin_top_20"> When you click on clear button then it will clear all search form field.</p>


            </section>

           
            </div>
        </div>
    </div>
</div>
