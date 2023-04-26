<div class="main-panel">
	<div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h5 style="font-weight:bold; color: #1fa5a5; ">Api Documentation</h5>
            </div>
            <div class="card-body">
                <div class="allAPi">
                    <p>All this api are responsible for get response and send request to mail server, for this puspose we have use Microsoft graph api and pass respective parameters for getting and sending request and response.</p>
                </div>
                <section class="getInboxAPi">
                    <div class="getInboxAPiHd">
                        <h6 style="color: #004382;"><strong>1) Get Inbox : </strong></h6>
                    </div>
                    <div class="getInboxDescri">
                        <p>
                            <blockquote>By using getInbox() method we can call MS Graph api to get message of inbox folder .
                            Just we need to pass email id , so we can easily access mail of inbox folder. </blockquote>
                            <p>after getting all data from microsoft graph it will store in database.</p>
                        </p>
                        <p><strong>Note: </strong> Please generate microsoft access token before calling this api. </p>
                        <div>
                            <ul>
                                <li>Api : getInbox</li>
                                <li>Method : GET</li>
                                <li>Parameters :</li>
                            </ul>
                        <div class="table margin_top_20">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th>Field</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    <td>Email ID (Required)</td>
                                    <td>string</td>
                                    <td>Pass outlook email id to proper response. </td>
                                </tr>
                            </table>
			    	    </div>
                        <div class="result margin_top_20">
                            <ul >
                                <li>Result : </li>
                            </ul>
                        </div>
                        <p>In this format we get result of inbox microsoft graph api and it will automatically store in databse.</p>
                        <pre>
 Array(
    [0] => Microsoft\Graph\Model\Message Object
        (
            [_propDict:protected] => Array
                (
                    [@odata.etag] => W/"CQAAABYAAADufhLbsaXjSapBeAPWsZVWAACGIx7P"
                    [id] => AAMkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQBGAAAAAADWV5v5kSGKT7AyRKAqenxDBwDufhLbsaXjSapBeAPWsZVWAAAAAAEMAADufhLbsaXjSapBeAPWsZVWAABx9CvuAAA=
                    [createdDateTime] => 2023-03-21T14:19:04Z
                    [lastModifiedDateTime] => 2023-04-20T14:24:23Z
                    [changeKey] => CQAAABYAAADufhLbsaXjSapBeAPWsZVWAACGIx7P
                    [categories] => Array
                        (
                        )

                    [receivedDateTime] => 2023-03-21T14:19:05Z
                    [sentDateTime] => 2023-03-21T14:19:03Z
                    [hasAttachments] => 1
                    [internetMessageId] => 
                    [subject] => A mail with an attachment
                    [bodyPreview] => Hi SSO.
PFA the text file.

Warm Regards
Natasha.
                    [importance] => normal
                    [parentFolderId] => AQMkADdmZGY1MTVlLWQ1NQA2LTRiNDYtOTYzYi0yZTI0Y2VmNzQyNDEALgAAA9ZXm-mRIYpPsDJEoCp6fEMBAO5_EtuxpeNJqkF4A9axlVYAAAIBDAAAAA==
                    [conversationId] => AAQkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQAQAI8YvzxYFAxLoBh-0W69fsE=
                    [conversationIndex] => AQHZXAAQjxi/PFgUDEugGH/Rbr1+wQ==
                    [isDeliveryReceiptRequested] => 
                    [isReadReceiptRequested] => 
                    [isRead] => 1
                    [isDraft] => 
                    [webLink] => https://outlook.office365.com/owa/?ItemID=AAMkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQBGAAAAAADWV5v5kSGKT7AyRKAqenxDBwDufhLbsaXjSapBeAPWsZVWAAAAAAEMAADufhLbsaXjSapBeAPWsZVWAABx9CvuAAA%3D&exvsurl=1&viewmodel=ReadMessageItem
                    [inferenceClassification] => focused
                    [body] => Array
                        (
                            [contentType] => html
                            [content] => 
Hi SSO.
PFA the text file.

Warm Regards
Natasha.

                        )

                    [sender] => Array
                        (
                            [emailAddress] => Array
                                (
                                    [name] => Natasha Sharma
                                    [address] => natasha.sharma@hibernianhealth.com
                                )

                        )

                    [from] => Array
                        (
                            [emailAddress] => Array
                                (
                                    [name] => Natasha Sharma
                                    [address] => natasha.sharma@hibernianhealth.com
                                )

                        )

                    [toRecipients] => Array
                        (
                            [0] => Array
                                (
                                    [emailAddress] => Array
                                        (
                                            [name] => sso.mailbox
                                            [address] => sso.mailbox@hibernianhealth.com
                                        )

                                )

                        )

                    [ccRecipients] => Array
                        (
                        )

                    [bccRecipients] => Array
                        (
                        )

                    [replyTo] => Array
                        (
                        )

                    [flag] => Array
                        (
                            [flagStatus] => notFlagged
                        )

                )

        )
        )


                        </pre>
                        <p>"Data Inserted Sucessfully."</p>
			        </div>
                </div>
            </section>
            <hr>
            <section class="getInboxAPi">
                    <div class="getInboxAPiHd">
                        <h6 style="color: #004382;"><strong>2) Get Send Mails : </strong></h6>
                    </div>
                    <div class="getInboxDescri">
                        <p>
                            <blockquote>By using getSendMail() method we can call MS Graph api to get message of send folder of particular mailbox.
                            Just we need to pass email id , so we can easily access mail of send folder. </blockquote>
                            <p>after getting all data from microsoft graph it will store in database.</p>
                        </p>
                        <p><strong>Note: </strong> Please generate microsoft access token before calling this api. </p>
                        <div>
                            <ul>
                                <li>Api : getSendMail</li>
                                <li>Method : GET</li>
                                <li>Parameters :</li>
                            </ul>
                        <div class="table margin_top_20">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th>Field</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    <td>Email ID (Required)</td>
                                    <td>string</td>
                                    <td>Pass outlook email id to proper response. </td>
                                </tr>
                            </table>
			    	    </div>
                        <div class="result margin_top_20">
                            <ul >
                                <li>Result : </li>
                            </ul>
                        </div>
                        <p>In this format we get result of inbox microsoft graph api and it will automatically store in databse.</p>
                        <pre>
 Array(
    [0] => Microsoft\Graph\Model\Message Object
        (
            [_propDict:protected] => Array
                (
                    [@odata.etag] => W/"CQAAABYAAADufhLbsaXjSapBeAPWsZVWAACGIx7P"
                    [id] => AAMkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQBGAAAAAADWV5v5kSGKT7AyRKAqenxDBwDufhLbsaXjSapBeAPWsZVWAAAAAAEMAADufhLbsaXjSapBeAPWsZVWAABx9CvuAAA=
                    [createdDateTime] => 2023-03-21T14:19:04Z
                    [lastModifiedDateTime] => 2023-04-20T14:24:23Z
                    [changeKey] => CQAAABYAAADufhLbsaXjSapBeAPWsZVWAACGIx7P
                    [categories] => Array
                        (
                        )

                    [receivedDateTime] => 2023-03-21T14:19:05Z
                    [sentDateTime] => 2023-03-21T14:19:03Z
                    [hasAttachments] => 1
                    [internetMessageId] => 
                    [subject] => A mail with an attachment
                    [bodyPreview] => Hi SSO.
PFA the text file.

Warm Regards
Natasha.
                    [importance] => normal
                    [parentFolderId] => AQMkADdmZGY1MTVlLWQ1NQA2LTRiNDYtOTYzYi0yZTI0Y2VmNzQyNDEALgAAA9ZXm-mRIYpPsDJEoCp6fEMBAO5_EtuxpeNJqkF4A9axlVYAAAIBDAAAAA==
                    [conversationId] => AAQkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQAQAI8YvzxYFAxLoBh-0W69fsE=
                    [conversationIndex] => AQHZXAAQjxi/PFgUDEugGH/Rbr1+wQ==
                    [isDeliveryReceiptRequested] => 
                    [isReadReceiptRequested] => 
                    [isRead] => 1
                    [isDraft] => 
                    [webLink] => https://outlook.office365.com/owa/?ItemID=AAMkADdmZGY1MTVlLWQ1NTYtNGI0Ni05NjNiLTJlMjRjZWY3NDI0MQBGAAAAAADWV5v5kSGKT7AyRKAqenxDBwDufhLbsaXjSapBeAPWsZVWAAAAAAEMAADufhLbsaXjSapBeAPWsZVWAABx9CvuAAA%3D&exvsurl=1&viewmodel=ReadMessageItem
                    [inferenceClassification] => focused
                    [body] => Array
                        (
                            [contentType] => html
                            [content] => 
Hi SSO.
PFA the text file.

Warm Regards
Natasha.

                        )

                    [sender] => Array
                        (
                            [emailAddress] => Array
                                (
                                    [name] => Natasha Sharma
                                    [address] => natasha.sharma@hibernianhealth.com
                                )

                        )

                    [from] => Array
                        (
                            [emailAddress] => Array
                                (
                                    [name] => Natasha Sharma
                                    [address] => natasha.sharma@hibernianhealth.com
                                )

                        )

                    [toRecipients] => Array
                        (
                            [0] => Array
                                (
                                    [emailAddress] => Array
                                        (
                                            [name] => sso.mailbox
                                            [address] => sso.mailbox@hibernianhealth.com
                                        )

                                )

                        )

                    [ccRecipients] => Array
                        (
                        )

                    [bccRecipients] => Array
                        (
                        )

                    [replyTo] => Array
                        (
                        )

                    [flag] => Array
                        (
                            [flagStatus] => notFlagged
                        )

                )

        )
        )


                        </pre>
                        <p>"Data Inserted Sucessfully."</p>
			        </div>
                </div>
            </section>

            <hr>

            <section id="index">
                <div class="getInboxAPiHd">
                        <h6 style="color: #004382;"><strong>3) Get mail detail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using detailMail() method we can get detail of seleted mail.</p>
                </div>

                <ul>
                    <li>Api : detailMail</li>
                    <li>Method : GET</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_id (Required)</td>
                            <td>string</td>
                            <td>Enter mail id of mail. </td>
                        </tr>
                        <tr>
                            <td>flag (Required)</td>
                            <td>string</td>
                            <td>pass "singleClick" as value of this parameter</td>
                        </tr>
                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Will get Data of mail in json format.</p></li>
                </ul>
            </section>
            <hr>
            <section id="addmailbox">
            <div class="getInboxAPiHd">
                        <h6 style="color: #004382;"><strong>4) Add Mailbox : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using addMailbox() method we can add mailbox in database.</p>
                </div>

                <ul>
                    <li>Api : addMailbox</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mailbox_name (Required)</td>
                            <td>string</td>
                            <td>Enter name for mailbox which do you want to set for particular mailbox. </td>
                        </tr>
                        <tr>
                            <td>mailbox_color (Required)</td>
                            <td>string</td>
                            <td>Enter color code in hash format which you want to set for mailbox </td>
                        </tr>
                        <tr>
                            <td>mailbox_email_id (Required)</td>
                            <td>string</td>
                            <td>Enter Valid Email id of any shared mailbox or personal mail which do you want to access mail in our system </td>
                        </tr>
                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p> Mailbox Added Sucessfully.</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                        <h6 style="color: #004382;"><strong>5) Get Mailbox : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using getAllMailBox() method we can add mailbox in database.</p>
                </div>

                <ul>
                    <li>Api : getAllMailBox</li>
                    <li>Method : GET</li>
                    <li>Result : Get all mailbox which status is active</li>
                </ul>
            </section>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>6) Modify Mailbox : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using modifyMailbox() method we can modify mailbox.</p>
                </div>

                <ul>
                    <li>Api : modifyMailbox</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mailbox_id (Required)</td>
                            <td>string</td>
                            <td>Enter mailbox id, which do you want to modify. </td>
                        </tr>
                        <tr>
                            <td>mailbox_name (Required)</td>
                            <td>string</td>
                            <td>Enter name for mailbox which do you want to set for particular mailbox. </td>
                        </tr>
                        <tr>
                            <td>mailbox_color (Required)</td>
                            <td>string</td>
                            <td>Enter color code in hash format which you want to set for mailbox </td>
                        </tr>
                        <tr>
                            <td>mailbox_email_id (Required)</td>
                            <td>string</td>
                            <td>Enter Valid Email id of any shared mailbox or personal mail which do you want to access mail in our system </td>
                        </tr>
                        <tr>
                            <td>isActive (Required)</td>
                            <td>string</td>
                            <td>Enter status of mailbox (Y/N) </td>
                        </tr>
                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p> Mailbox Modify Sucessfully.</p></li>
                </ul>          
            </section>
            <hr>

            
            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>7) Delete / Re-activate Mailbox : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using deleteMailbox() method we can delete or re-activate mailbox.</p>
                </div>

                <ul>
                    <li>Api : deleteMailbox</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mailbox_id (Required)</td>
                            <td>string</td>
                            <td>Enter mailbox id, which do you want to modify. </td>
                        </tr>
                        <tr>
                            <td>isActive (Required)</td>
                            <td>string</td>
                            <td>Enter "Y" if you want to re-activate and enter "N" for delete </td>
                        </tr>
                        <tr>
                            <td>operation (Required)</td>
                            <td>string</td>
                            <td>Enter "reactive" for re-activate mailbox and "" or "delete" for delete mail </td>
                        </tr>
                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p> Mailbox Delete / Re-acitivate Sucessfully.</p></li>
                </ul>          
            </section>
            <hr>
                
            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>8) Add Teammates/member : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using inboxAccess() method we can add teammeber/member.</p>
                </div>

                <ul>
                    <li>Api : inboxAccess</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>member_name (Required)</td>
                            <td>string</td>
                            <td>Enter email id of member. </td>
                        </tr>
                        
                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Member Added Sucessfully.</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>8) Invite Teammates/member : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using inviteTeammeber() method we assign mailbox's to teammaber. So by using this member have one or many mailbox's access at a time.</p>
                </div>

                <ul>
                    <li>Api : inviteTeammeber</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>member_id (Required)</td>
                            <td>string</td>
                            <td>Enter Member Id. </td>
                        </tr>
                        
                        <tr>
                            <td>member_mailbox_id (Required)</td>
                            <td>string</td>
                            <td>Enter Mailbox Id which you want to assign to particular member. </td>
                        </tr>

                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Member Added  and invited Sucessfully.</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>9) Compose Mail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using composeMail() method we can send mail from our system just we need to pass valid email id and in from email id feild need to pass assign mail id.</p>
                </div>

                <ul>
                    <li>Api : composeMail</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>send_mail_to (Required)</td>
                            <td>string</td>
                            <td>Enter mail id , of do you want send mail. </td>
                        </tr>
                        
                        <tr>
                            <td>send_mail_from (Required)</td>
                            <td>string</td>
                            <td>Enter your mail id , and make sure enter email id which is assign by admin. </td>
                        </tr>

                        <tr>
                            <td>send_mail_cc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for cc </td>
                        </tr>

                        <tr>
                            <td>send_mail_bcc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for bcc </td>
                        </tr>

                        <tr>
                            <td>send_mail_subject (optional)</td>
                            <td>string</td>
                            <td>Enter your subject for mail </td>
                        </tr>

                        <tr>
                            <td>send_mail_content (Required)</td>
                            <td>string</td>
                            <td>Enter content of your mail </td>
                        </tr>
                        <tr>
                            <td>send_mail_attachement_id (optional)</td>
                            <td>string</td>
                            <td>If have attachment enter file name </td>
                        </tr>

                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Mail has been send succesfully.</p></li>
                </ul>          
            </section>
            <hr>
            
            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>10) Assign / Re-assign Mail Ticket : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using assignTicketToMem() method admin can assign or re-assign ticket to user.</p>
                </div>

                <ul>
                    <li>Api : assignTicketToMem</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_id (Required)</td>
                            <td>string</td>
                            <td>Enter mail id . </td>
                        </tr>
                        
                        <tr>
                            <td>mail_member_id (Required)</td>
                            <td>string</td>
                            <td>Enter member id , to whom do you want to assign. </td>
                        </tr>

                        <tr>
                            <td>mail_conversation_id (Required)</td>
                            <td>string</td>
                            <td>Enter Conversation Id</td>
                        </tr>

                        <tr>
                            <td>flag (Required)</td>
                            <td>string</td>
                            <td>Enter "reAssign" to Re assign a ticket and " " or "assign " to assign ticket</td>
                        </tr>

                        

                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Mail Has Been Assign to "xyz@gmail.com".</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>11) Forward Mail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using forwardAndClos() method We can forward particular mail to whom do you want.</p>
                </div>

                <ul>
                    <li>Api : forwardAndClos</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    <tr>
                            <td>send_mail_to (Required)</td>
                            <td>string</td>
                            <td>Enter mail id , of do you want send mail. </td>
                        </tr>
                        
                        <tr>
                            <td>send_mail_from (Required)</td>
                            <td>string</td>
                            <td>Enter your mail id , and make sure enter email id which is assign by admin. </td>
                        </tr>

                        <tr>
                            <td>send_mail_cc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for cc </td>
                        </tr>

                        <tr>
                            <td>send_mail_bcc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for bcc </td>
                        </tr>

                        <tr>
                            <td>send_mail_subject (optional)</td>
                            <td>string</td>
                            <td>Enter your subject for mail </td>
                        </tr>

                        <tr>
                            <td>send_mail_content (Required)</td>
                            <td>string</td>
                            <td>Enter content of your mail </td>
                        </tr>

                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Mail Has Been Forwarded Successfully.</p></li>
                </ul>          
            </section>
            <hr>

            
            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>12) Reply Mail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using replyTomail() method We can give reply to particular mail.</p>
                </div>

                <ul>
                    <li>Api : replyTomail</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>
                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    <tr>
                            <td>send_mail_to (Required)</td>
                            <td>string</td>
                            <td>Enter mail id , of do you want send mail. </td>
                        </tr>
                        
                        <tr>
                            <td>send_mail_from (Required)</td>
                            <td>string</td>
                            <td>Enter your mail id , and make sure enter email id which is assign by admin. </td>
                        </tr>

                        <tr>
                            <td>send_mail_cc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for cc </td>
                        </tr>

                        <tr>
                            <td>send_mail_bcc (optional)</td>
                            <td>string</td>
                            <td>Enter your mail id for bcc </td>
                        </tr>

                        <tr>
                            <td>send_mail_subject (optional)</td>
                            <td>string</td>
                            <td>Enter your subject for mail </td>
                        </tr>

                        <tr>
                            <td>send_mail_content (Required)</td>
                            <td>string</td>
                            <td>Enter content of your mail </td>
                        </tr>

                    </table>
			    </div>
                <ul class="margin_top_20">
                    <li>Result : <p>Reply Has Been Send Successfully.</p></li>
                </ul>          
            </section>
            <hr>

            
            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>13) View All Member : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using ViewTeamMates() method We get all member.</p>
                </div>

                <ul>
                    <li>Api : ViewTeamMates</li>
                    <li>Method : GET</li>
                    <li>Parameters :</li>
                </ul>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Get All all team member.</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>14) Modify Member : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using modifyMember() method We get all member.</p>
                </div>

                <ul>
                    <li>Api : modifyMember</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>member_mailbox_id (Required)</td>
                            <td>Int </td>
                            <td>Enter mailbox id . </td>
                        </tr>
                        
                        <tr>
                            <td>member_name (Required)</td>
                            <td>string</td>
                            <td>Enter member name. </td>
                        </tr>

                        <tr>
                            <td>member_id (Required)</td>
                            <td>int</td>
                            <td>Enter member Id</td>
                        </tr>

                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Member detail has been modified successfully..</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>15)Star Mail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using starredMail() method We star mail to show it as important mail.</p>
                </div>

                <ul>
                    <li>Api : starredMail</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_id (Required)</td>
                            <td>string </td>
                            <td>Enter mail converation id . </td>
                        </tr>
                        
                        <tr>
                            <td>starred_mail_action (Required)</td>
                            <td>string</td>
                            <td>Enter value active. </td>
                        </tr>

                        <tr>
                            <td>starred_createdBy (Required)</td>
                            <td>int</td>
                            <td>Enter email id of who star this mail</td>
                        </tr>

                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Mail Mark As Star</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>16)UnStar Mail : </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using unstarredmail() method We remove mail as star.</p>
                </div>

                <ul>
                    <li>Api : unstarredmail</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_id (Required)</td>
                            <td>string </td>
                            <td>Enter mail converation id . </td>
                        </tr>
                        
                        <tr>
                            <td>starred_mail_action (Required)</td>
                            <td>string</td>
                            <td>Enter value de-active. </td>
                        </tr>

                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Un Starred Mail</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>17)Set Reminder: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using setReminder() method We can set reminder for particular mail.</p>
                </div>

                <ul>
                    <li>Api : setReminder</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>conversation_id (Required)</td>
                            <td>string </td>
                            <td>Enter mail converation id . </td>
                        </tr>
                        
                        <tr>
                            <td>createdBy (Required)</td>
                            <td>string</td>
                            <td>Enter email id of user, whom set reminder. </td>
                        </tr>

                        <tr>
                            <td>reminder_date_time (Required)</td>
                            <td>string</td>
                            <td>Enter date of reminder. </td>
                        </tr>

                        <tr>
                            <td>reminder_flag (Required)</td>
                            <td>string</td>
                            <td>Enter "active". </td>
                        </tr>


                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Reminder Set Sucessfully</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>18)Mark as Read: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using makeunread() method We can mark mail as unread.</p>
                </div>

                <ul>
                    <li>Api : makeunread</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_conversation_id (Required)</td>
                            <td>string </td>
                            <td>Enter mail converation id . </td>
                        </tr>
                        
                        <tr>
                            <td>mail_is_open (Required)</td>
                            <td>string</td>
                            <td>Enter "Y" as value , if mail is read. </td>
                        </tr>

                        <tr>
                            <td>reminder_date_time (Required)</td>
                            <td>string</td>
                            <td>Enter date of reminder. </td>
                        </tr>

                        <tr>
                            <td>mail_openAt (Required)</td>
                            <td>string</td>
                            <td>Enter date and time when mail has been open. </td>
                        </tr>
                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Mail Mark As Unread !</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>18)Trash Mail: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using trash() method We can trash mail.</p>
                </div>

                <ul>
                    <li>Api : trash</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>mail_conversation_id (Required)</td>
                            <td>string </td>
                            <td>Enter mail converation id . </td>
                        </tr>
                        
                        <tr>
                            <td>mail_status (Required)</td>
                            <td>string</td>
                            <td>Enter mail status. </td>
                        </tr>

                        <tr>
                            <td>mail_flag (Required)</td>
                            <td>string</td>
                            <td>Enter flag ("delete"). </td>
                        </tr>

                        <tr>
                            <td>useremail (Required)</td>
                            <td>string</td>
                            <td>Enter Email id of user. </td>
                        </tr>
                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Mail has been trash !</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>19)All Trash Mail: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using TrashMail() method We get all trash mail list with there detail.</p>
                </div>

                <ul>
                    <li>Api : TrashMail</li>
                    <li>Method : GET</li>
                    
                </ul>
                <ul class="margin_top_20">
                    <li>Result : <p>Get all trash mails!</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>20)Multidelete Mail: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using multiDelete() method We can delete multiple mails at same time.</p>
                </div>

                <ul>
                    <li>Api : multiDelete</li>
                    <li>Method : POST</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>checkboxVal (Required)</td>
                            <td>int </td>
                            <td>Enter comma seprated mail id  . </td>
                        </tr>
                        
                        <tr>
                            <td>useremail (Required)</td>
                            <td>string</td>
                            <td>Enter user mail id. </td>
                        </tr>

                        <tr>
                            <td>mail_status (Required)</td>
                            <td>string</td>
                            <td>Enter status ("delete"). </td>
                        </tr>

                        <tr>
                            <td>mail_flag (Required)</td>
                            <td>string</td>
                            <td>Enter flag. </td>
                        </tr>
                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p>Mail has been deleted !</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>21)Get read and unread mail: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using get_read_unread_mail() method We get all read and unread mail by filter  .</p>
                </div>

                <ul>
                    <li>Api : get_read_unread_mail</li>
                    <li>Method : GET</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>flag (Required)</td>
                            <td>int </td>
                            <td>Enter flag read/unread  if you want display only read mail then set flag read  and you want to display unread mail then set unread. </td>
                        </tr>
                    </table>
			    </div>
                
                <ul class="margin_top_20">
                    <li>Result : <p> Get Read/ Unread mails</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>22)Update Reminder: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using updReminder() method just pass this api , at that time it will automatically update all reminder status by checking date .</p>
                </div>

                <ul>
                    <li>Api : updReminder</li>
                    <li>Method : GET</li>
                    <li>Parameters :</li>
                </ul>
                <ul class="margin_top_20">
                    <li>Result : <p> Reminder updated</p></li>
                </ul>          
            </section>
            <hr>

            <section id="addmailbox">
                <div class="getInboxAPiHd">
                    <h6 style="color: #004382;"><strong>23)Reminder Filter: </strong></h6>
                </div>
                <div class="getInboxDescri">
                    <p>By using reminderFilter() method we can filter reminder .</p>
                </div>

                <ul>
                    <li>Api : reminderFilter</li>
                    <li>Method : GET</li>
                    <li>Parameters :</li>
                </ul>

                <div class="table margin_top_20">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>filterBy (Required)</td>
                            <td>string </td>
                            <td>Enter asc or desc for filter reminder. </td>
                        </tr>
                    </table>
			    </div>

                <ul class="margin_top_20">
                    <li>Result : <p> Reminder updated</p></li>
                </ul>          
            </section>
            <hr>

        </div>
    </div>
</div>
