<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
require_once ROOTPATH . 'vendor\ddeboer\imap\src\Server.php';
// require_once ROOTPATH . 'vendor\ddeboer\imap\src\ServerInterface.php';
use CodeIgniter\Config\Services;

use Ddeboer\Imap\Server;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Flag\Unseen;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Http;
use Microsoft\Graph\Model;
use GuzzleHttp\Client;
use App\Models\mailOperation;

require_once ROOTPATH . 'vendor\autoload.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set("memory_limit", "256M");
// set_time_limit(0);
// ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
ini_set('max_execution_time', '1200'); // for infinite time of execution

class Home extends BaseController
{
    use ResponseTrait;

    // protected $session;

    public function index()
    {
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());
        $getuser = session()->get('user');
        // print_r( $user);
        $user = $getuser['useremail'];
        $role = $getuser['role'];

        $mailOperation = new mailOperation();
        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        $MailboxCount = sizeof($mailbox_id);
        $resultArr = array();
         for($i = 0; $i <  $MailboxCount; $i++){
            if($mailbox_id[$i] != '' && $mailbox_id[$i] != NULL){

                // $getMailboxById = $mailOperation->getMailboxById($mailbox_id[$i]);

                // $mailbox_email_id = $getMailboxById->mailbox_email_id;
                $getMailbyMailbox[] = $mailOperation->getMailbyMailbox($mailbox_id[$i]);
                $getMailboxColor[] = $mailOperation->getMailboxById($mailbox_id[$i]);

                // print_r($getMailbyMailbox)

                // $result[] = json_encode($getMailbyMailbox);

            }
        }

        foreach($getMailbyMailbox as $row){
            foreach($row as $rowData){
                $conversation_id = $rowData['mail_conversation_id'];
                $getRecordByConId[] = $mailOperation->getRecordByConId($conversation_id);
            }
        }

        $result['allMails'] = json_encode($getRecordByConId);
        $result['mailbox_color'] = json_encode($getMailboxColor);

        // print_r($finalArr); 'allMails'
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\unassign',$result)
            .view('sharedMail\footer');
    }

    public function getDataByFolder(){

        $id = ($this->request->uri->getSegments());
        $id = $id[1];

        $countResult['allCount'] = json_encode($this->sidebarOptionValue());
        $getuser = session()->get('user');
        // print_r( $user);
        $user = $getuser['useremail'];
        $role = $getuser['role'];

        $mailOperation = new mailOperation();
        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        $MailboxCount = sizeof($mailbox_id);
        $resultArr = array();
         for($i = 0; $i <  $MailboxCount; $i++){
            if($mailbox_id[$i] != '' && $mailbox_id[$i] != NULL){

                // $getMailboxById = $mailOperation->getMailboxById($mailbox_id[$i]);

                // $mailbox_email_id = $getMailboxById->mailbox_email_id;
                $getMailbyMailbox[] = $mailOperation->getMailbyFolder($mailbox_id[$i],$id);
                $getMailboxColor[] = $mailOperation->getMailboxById($mailbox_id[$i]);

                // print_r($getMailbyMailbox)

                // $result[] = json_encode($getMailbyMailbox);

            }
        }

        foreach($getMailbyMailbox as $row){
            foreach($row as $rowData){
                $conversation_id = $rowData['mail_conversation_id'];
                $getRecordByConId[] = $mailOperation->getRecordByConId($conversation_id);
            }
        }

        $result['allMails'] = json_encode($getRecordByConId);
        $result['mailbox_color'] = json_encode($getMailboxColor);

        // print_r($finalArr); 'allMails'
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\folderMail',$result)
            .view('sharedMail\footer');

        

    }

    public function displayMailbox(){
        print_r($_REQUEST);
        // return view('sharedMail\mailbox', $_REQUEST);
    }

    public function imap_connect(){
        return view('imap_connector');
    }

    public function detailMail(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        // $id = ($this->request->uri->getSegments());
        // $id = $id[1];
        $id = $this->request->getVar('mail_id');
        $flag = $this->request->getVar('flag');

        $mailOperation = new mailOperation();
        $getMailsById = $mailOperation->getMailById($id);


        foreach($getMailsById as $row){
           $mailConversationId = $row['mail_conversation_id'];
           $mail_mail_id = $row['mail_mail_id'];
        }

        $getMailByConvId = $mailOperation->getMailByConvId($mailConversationId);
        $getSendItmByConvId = $mailOperation->getSendItmByConvId($mailConversationId);

        $mail_openAt = date("m/d/Y h:i:s a", time());
        $data = array(
            "mail_is_open" => "Y",
            "mail_openAt" => $mail_openAt
        );
        $updateMailOpen = $mailOperation->updateMails($id,$data);
        $teammebers = $mailOperation->allTeammember();

        $getAttachmentByMailtId = $mailOperation->getAttachmentByMailtId($mail_mail_id); 
        $getReminderByConvID = $mailOperation->getReminderByConvID($mailConversationId);
        $getStarMaiByConvId = $mailOperation->getStarMaiByConvId($mailConversationId);

        // $members = $teammebers;
        // print_r($teammebers);die();

        $result1 = $getMailByConvId;
        $result2 = $getSendItmByConvId;
       

        // return view('sharedMail\head') 
        //     .view('sharedMail\top_header')
        //     .view('sharedMail\sidebar',$countResult)
        //     .view('sharedMail\mailbox',$ArrayResult)
        //     .view('sharedMail\footer');

       

        // $data['allData'] = $ArrayResult;

        // print_r($data);

        if($flag == 'singleClick'){
            $ArrayResult['finalResult'] = array_merge($getMailByConvId,$getSendItmByConvId);
            $ArrayResult['teammember'] = $mailOperation->allTeammember();
            $ArrayResult['attachments'] = $mailOperation->getAttachmentByMailtId($mail_mail_id);
            $ArrayResult['reminder'] = $mailOperation->getReminderByConvID($mailConversationId);
            $ArrayResult['starMail'] = $getStarMaiByConvId;

            echo json_encode($ArrayResult);
        } else{
            $ArrayResult['finalResult'] = json_encode(array_merge($result1,$result2));
            $ArrayResult['teammember'] = json_encode($teammebers);
            $ArrayResult['attachments'] = json_encode($getAttachmentByMailtId);
            $ArrayResult['reminder'] = json_encode($getReminderByConvID);
            $ArrayResult['starMail'] = json_encode($getStarMaiByConvId);

            return view('sharedMail\head') 
                .view('sharedMail\mailDetailViewDublClk',$ArrayResult)
                .view('sharedMail\footer');
        }

        
    }
    public function compose(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\compose')
            .view('sharedMail\footer');
    }
    public function assignedMails(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $mailOperation = new mailOperation();
        $getAllAssignMails = $mailOperation->getAllAssignMails();

        foreach($getAllAssignMails as $rowData){
                $mail_conversation_id = $rowData['mail_conversation_id'];

                $getAllAssignMailByConvId[] = $mailOperation->getAllAssignMailByConvId($mail_conversation_id);
        }

        // echo '<pre>';
        // print_r($getAllAssignMailByConvId);

        $result['assignMails'] = json_encode($getAllAssignMailByConvId);

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\assigned',$result)
            .view('sharedMail\footer');
    }
    public function assignDetailMailView(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        // $id = ($this->request->uri->getSegments());
        // $id = $id[1];

        $id = $this->request->getVar('mail_id');

        $mailOperation = new mailOperation();
        $getMailsById = $mailOperation->getMailById($id);


        foreach($getMailsById as $row){
           $mailConversationId = $row['mail_conversation_id'];
           $mail_mail_id = $row['mail_mail_id'];
           $member_id = $row['member_id'];
        }

        $getMailByConvId = $mailOperation->getMailByConvId($mailConversationId);
        $getSendItmByConvId = $mailOperation->getSendItmByConvId($mailConversationId);
        $getMemberById = $mailOperation->getMemberById($member_id);
        

        $mail_openAt = date("m/d/Y h:i:s a", time());
        $data = array(
            "mail_is_open" => "Y",
            "mail_openAt" => $mail_openAt
        );
        $updateMailOpen = $mailOperation->updateMails($id,$data);
        $teammebers = $mailOperation->allTeammember();

        $getAttachmentByMailtId = $mailOperation->getAttachmentByMailtId($mail_mail_id); 
        $getReminderByConvID = $mailOperation->getReminderByConvID($mailConversationId);
        $getStarMaiByConvId = $mailOperation->getStarMaiByConvId($mailConversationId);

        // $members = $teammebers;
        // print_r($teammebers);die();

        $result1 = $getMailByConvId;
        $result2 = $getSendItmByConvId;
        $ArrayResult['finalResult'] = array_merge($result1,$result2);
        $ArrayResult['teammember'] = $teammebers;
        $ArrayResult['attachments'] = $getAttachmentByMailtId;
        $ArrayResult['reminder'] = $getReminderByConvID;
        $ArrayResult['teammemberName'] = $getMemberById;
        $ArrayResult['starMail'] = $getStarMaiByConvId;

        echo json_encode($ArrayResult);

        // return view('sharedMail\head') 
        //     .view('sharedMail\top_header')
        //     .view('sharedMail\sidebar',$countResult)
        //     .view('sharedMail\assignDetailMail', $ArrayResult)
        //     .view('sharedMail\footer');
    }
    public function addTeamMateView(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\addTeamMates')
            .view('sharedMail\footer');
    }
    public function inboxAccess(){

        // print_r(session()->get('user'));
        // die();
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $member_name = $this->request->getVar('member_name');
        $member_createdAt = date("m/d/Y h:i:s a", time());
        $user = session()->get('user');
        $useremail = $user['useremail'];
        $mamber_createdBy = $useremail;

        $data = array(
                'member_name' => $member_name,
                'member_createdBy' => $mamber_createdBy,
                'member_createdAt' => $member_createdAt
        );

        $mailOperation = new mailOperation();
        $insertTemamember = $mailOperation->addTeammates($data);
        $getMemberId = $mailOperation->getMemberId($member_name);
        $mailbox = $mailOperation->getAllMailbox();

        $result['member_id'] = json_encode($getMemberId);
        $result['mailbox'] = json_encode($mailbox);

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\inboxAccess', $result)
            .view('sharedMail\footer');
    }
    public function microsoft_bearer_token(){
        $guzzle = new \GuzzleHttp\Client();
        $url = 'https://login.microsoftonline.com/9b84e5ef-4bf5-4899-946d-6f293750e872/oauth2/v2.0/token';
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => '6d203976-eb87-46a3-be35-0ddaa1c1c325',
                'client_secret' => 'e2w8Q~mQeD1COeryICdC3tTN5hxEGSUb5kTFXc9x',
                'scope' => 'https://graph.microsoft.com/.default',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents());

        $accessToken = $token->access_token;

        // echo '$accessToken=='.$accessToken;

        return $accessToken;
        // print_r($accessToken);
        // $this->core_model->update_config("microsoft_graph_bearer", array("value" => $accessToken));
    }

    public function getInbox(){

        $mail_subject_contains = getenv('mail_subject_contains');
        $arraySubject = explode(',', $mail_subject_contains);

        $getuser = session()->get('user');
        // print_r( $user);
        $user = $getuser['useremail'];
        $role = $getuser['role'];
        // echo '<pre>';
        // echo '$user=='.$user.'<br>';
        // echo '$role=='.$role.'<br>';
        $mailOperation = new mailOperation();
        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        // print_r($mailbox_id);

        $MailboxCount = sizeof($mailbox_id);
        // echo '<pre>';
        // echo '$MailboxCount=='.$MailboxCount.'<br>';

        for($j = 0; $j < $MailboxCount; $j++){
            // echo '$jj=1='.$j;
            if($mailbox_id[$j] != '' && $mailbox_id[$j] != NULL){
                // echo '$i=='.$i;
                $getMailboxById = $mailOperation->getMailboxById($mailbox_id[$j]);
                // print_r($getMailboxById);
                // $mailbox_email_id = $getMailboxById->mailbox_email_id;

                foreach($getMailboxById as $row){
                    $mailbox_email_id = $row['mailbox_email_id'];
                }
                
                // echo '$mailbox_email_id=='.$mailbox_email_id.'<br>';
                $Home = new Home();
                $token =  $Home->microsoft_bearer_token();

                // echo '$token'.$token;

                $userClient = new Graph();
                $userClient = $userClient->setAccessToken($token);
                // Only request specific properties
                $select = '\$select=from';
                // Sort by received time, newest first
                $orderBy = '\$orderBy=receivedDateTime DESC';
                $value = '\$value=jpg';

                 $requestUrl = 'https://graph.microsoft.com/v1.0/users/'.$mailbox_email_id.'/mailFolders/inbox/messages?'.$select.'&'.$orderBy;


                $result = $userClient->createCollectionRequest('GET', $requestUrl)
                                               ->setReturnType(Model\Message::class)
                                               ->setPageSize(25);

                $page = $result->getPage();

                // echo '<pre>';
                // print_r($page);
                // $sizeof = sizeof($page);
                // echo '$sizeof=='.$sizeof.'<br>';
                // die();

                 $i=0;
                foreach ($page as $message){
                
                // print_r($page);
                    // echo '$i=='.$i;
                    $mailOperation = new mailOperation();
                    $getMailData = $mailOperation->getMailData();
                     foreach($getMailData as $row){
                         $mail_conversation_id = $row['mail_conversation_id'];
                         $mail_mail_id_prev = $row['mail_mail_id'];
                         $mail_to = $row['mail_to'];
                         $mail_from = $row['mail_from'];
                    }
                    $conversation_id = $message->getConversationId();
                    $mail_mail_id = $message->getId();
                    // echo '$conversation_id=='.$conversation_id;

                    // $getConversationId = $mailOperation->getMailByConvId($conversation_id); // get result of array
                    // $getConversationId = $mailOperation->getMailResultByConvId($conversation_id); // get result of row

                    $getConversationId = $mailOperation->getMailResultByMailId($mail_mail_id);

                // print_r($getConversationId);
                    if($getConversationId != '' && $getConversationId != NULL){

                        $conv_id = $getConversationId['mail_conversation_id'];
                        $mail_mail_present_id = $getConversationId['mail_mail_id'];

                        //$conv_id === $conversation_id

                        if($mail_mail_present_id === $mail_mail_id){
                            //
                        } 
                    } else{
                        // echo 'insert';
                        $mail_mail_id = $message->getId();
                        $subject = $message->getSubject();
                        $senderEmailId = $message->getFrom()->getEmailAddress()->getAddress();
                        $senderName = $message->getFrom()->getEmailAddress()->getName();
                        // $status = $status;
                        $receivedTime = $message->getReceivedDateTime()->format(\DateTimeInterface::RFC2822);
                        $content = $message->getBody()->getContent();
                        $isRead =  $message->getIsRead();
                        $bodyPreview = $message->getBodypreview();
                        if($isRead == '1'){
                            $msgRead = 'Y';
                        }else{
                             $msgRead = 'N';
                        }
                        $toReceiDetails = $message->getToRecipients();
                        $conversation_id = $message->getConversationId();
                        $sizeToReceipt = sizeof($toReceiDetails);

                        // $attachments = $message->getAttachments();
                        $readAttachment = $message->getHasAttachments();
                        if($readAttachment == '1'){
                                $hasAttachments = 'Y';
                        } else{
                            $hasAttachments = 'N';
                        }

                        for($i=0; $i < $sizeToReceipt; $i++){
                            // echo '$i=='.$i;
                           $toReceipt = $toReceiDetails[$i]['emailAddress'];
                           $toReceiptName = $toReceipt['name'];
                           $toReceiptAddress = $toReceipt['address'];

                        }
                        $getMailbox = $mailOperation->getMailboxByEamil($toReceiptAddress);
                        if($getMailbox != '' && $getMailbox != NULL){

                           $mail_mailbox_id = $getMailbox['mailbox_id'];
                           $mail_mailbox_color = $getMailbox['mailbox_color'];
                        } else{
                            $mail_mailbox_id = '';
                            $mail_mailbox_color = '';
                        }

                        if($readAttachment == '1'){
  
                            $request = "/users/".$mailbox_email_id."/messages/".$mail_mail_id."/attachments";
                            $attachments = $userClient->createCollectionRequest("GET", $request)
                                 ->setReturnType(Model\Attachment::class)
                                 ->execute();

                            foreach($attachments as $attachmentRow){
                                $myArray = (array) $attachmentRow;
                                // print_r($myArray);
                               foreach($myArray as $rowAttach){
                                
                                $id = $rowAttach['id'];
                                $lastModifiedDateTime = $rowAttach['lastModifiedDateTime'];
                                $name = $rowAttach['name'];
                                $contentType = $rowAttach['contentType'];
                                $size = $rowAttach['size'];
                                $contentId = $rowAttach['contentId'];
                                $contentBytes = $rowAttach['contentBytes'];

                                // echo '$mail_mail_id=='.$mail_mail_id.'<br>';
                                // print_r($rowAttach);

                                $getAttachmentByContentId = $mailOperation->getAttachmentByContentId($id);

                                if($getAttachmentByContentId == '' || $getAttachmentByContentId == NULL){

                                    $dataArray = array(
                                        'attachment_mail_mail_id' => $mail_mail_id,
                                        'attatchment_type' => $contentType,
                                        'attachment_name' => $name,
                                        'attachment_size' => $size,
                                        'attachment_content_id' => $contentId,
                                        'attachment_bytes' => $contentBytes,
                                        'attachment_main_id' => $id
                                    );

                                    // print_r($dataArray);
                                    $saveAttachment = $mailOperation->saveAttachment($dataArray);

                                } else{

                                }

                               }
                            }
                        }

                        $checkTicketAssign = $mailOperation->getMyAsiRecByConvId($conversation_id);

                        if($checkTicketAssign != '' && $checkTicketAssign != NULL){

                            $mail_flag = 'assigned';
                            $member_id = $checkTicketAssign[0]['member_id'];
                        } else{
                            $mail_flag = '';
                            $member_id = '';
                        }

                        $sizeOf = sizeof($arraySubject);

                        for($subCount=0; $subCount<$sizeOf ; $subCount++){
                            
                            if( strpos( $subject, $arraySubject[$subCount] ) !== false) {
                                $folder_name = $arraySubject[$subCount];
                            } 
                            
                        }

                        $dataArray = array(
                            'mail_to' =>  $toReceiptAddress,
                            'mail_from' => $senderEmailId,
                            'mail_subject' => $subject,
                            'mail_content' => $content,
                            'mail_recivedAt' => $receivedTime,
                            'mail_is_open' => $msgRead,
                            'mail_to_name' => $toReceiptName,
                            'mail_from_name' => $senderName,
                            'mail_conversation_id' => $conversation_id,
                            'mail_mailbox_id' => $mail_mailbox_id,
                            'mail_mail_id' => $mail_mail_id,
                            'mail_has_attachment' => $hasAttachments,
                            'mail_bodyPreview' => $bodyPreview,
                            'mail_flag' => $mail_flag,
                            'member_id' => $member_id,
                            'mail_folder_name' => $folder_name
                        );

                        $flag = 'Insert';
                        $mailOperation = new mailOperation();
                        $saveMailData = $mailOperation->saveMails($dataArray); 
                    }
                
                $i++;
                }
            }
        }
        
    }

    public function getSendMail(){

        $getuser = session()->get('user');
        // print_r( $user);
        $user = $getuser['useremail'];
        $role = $getuser['role'];

        // echo '$user=='.$user;

        $mailOperation = new mailOperation();
        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        $MailboxCount = sizeof($mailbox_id);

        // print_r($mailbox_id);
        // echo '$MailboxCount=='.$MailboxCount;

        for($j = 0; $j < $MailboxCount; $j++){
            // echo '<pre>';
            // echo '$jj=='.$j;
            // echo '$mailbox_id==='.$mailbox_id[$j];
            $getMailboxById = $mailOperation->getMailboxById($mailbox_id[$j]);

            // print_r($getMailboxById);

            foreach($getMailboxById as $row){
                $mailbox_email_id = $row['mailbox_email_id'];
                // echo '$mailbox_email_id=11='.$mailbox_email_id;
            } 

            // echo '$mailbox_email_id=='.$mailbox_email_id .'<br>';

            $Home = new Home();
            $token =  $Home->microsoft_bearer_token();

            $userClient = new Graph();
            $userClient = $userClient->setAccessToken($token);

            $select = '\$select=from';
            // Sort by received time, newest first
            $orderBy = '\$orderBy=receivedDateTime DESC';
            $value = '\$value=jpg';

            $requestUrl = 'https://graph.microsoft.com/v1.0/users/'.$mailbox_email_id.'/mailFolders/sentitems/messages?'.$select.'&'.$orderBy;

            $result = $userClient->createCollectionRequest('GET', $requestUrl)
                                           ->setReturnType(Model\Message::class)
                                           ->setPageSize(25);

          
            $page = $result->getPage();

            // echo '<pre>';
            // print_r($page);
            // die();

            $i=0;

            foreach ($page as $message) {
                $conversation_id = $message->getConversationId();
                $mail_mail_id = $message->getId();

                $mailOperation = new mailOperation();
                // $getSendItmByConvId = $mailOperation->getSendItmByConvId($conversation_id);
                // $getSendItmByConvId = $mailOperation->getSendMailResultByConvId($conversation_id);
                $getSendItmByConvId = $mailOperation->getSendMailByMailId($mail_mail_id);

                if($getSendItmByConvId != '' && $getSendItmByConvId != NULL){
                    $send_conversation_id = $getSendItmByConvId['send_conversation_id'];
                    $send_mail_mail_id = $getSendItmByConvId['send_mail_mail_id'];
 
                            //$send_conversation_id === $conversation_id
                    if($send_mail_mail_id === $mail_mail_id){
                       
                    }
                   
                } else{
                        // echo 'insert';
                        // $send_mail_mail_id = $message->getId();
                        $subject = $message->getSubject();
                        $senderEmailId = $message->getFrom()->getEmailAddress()->getAddress();
                        $senderName = $message->getFrom()->getEmailAddress()->getName();
                        // $status = $status;
                        $receivedTime = $message->getReceivedDateTime()->format(\DateTimeInterface::RFC2822);
                        $SendDateTime = $message->getSentDateTime()->format(\DateTimeInterface::RFC2822);
                        $content = $message->getBody()->getContent();
                        $isRead =  $message->getIsRead();
                        $toReceiDetails = $message->getToRecipients();
                        // print_r($toReceiDetails);
                        $sizeToReceipt = sizeof($toReceiDetails);
                        // echo '$sizeToReceipt='.$sizeToReceipt;
                        for($i=0; $i < $sizeToReceipt; $i++){
                            // echo '$i=='.$i;
                           $toReceipt = $toReceiDetails[$i]['emailAddress'];
                           $toReceiptName = $toReceipt['name'];
                           $toReceiptAddress = $toReceipt['address'];

                        }

                        $getMailbox = $mailOperation->getMailboxByEamil($senderEmailId);
                        if($getMailbox != '' && $getMailbox != NULL){

                           $mail_mailbox_id = $getMailbox['mailbox_id'];
                           $mail_mailbox_color = $getMailbox['mailbox_color'];
                        } else{
                            $mail_mailbox_id = '';
                            $mail_mailbox_color = '';
                        }

                         $dataArray = array(
                            'send_mail_to' =>  $toReceiptAddress,
                            'send_mail_from' => $senderEmailId,
                            'send_mail_subject' => $subject,
                            'send_mail_content' => $content,
                            'send_mail_dateTime' => $SendDateTime,
                            'send_conversation_id' => $conversation_id,
                            'send_mail_name' => $senderName,
                            'send_mail_to_name' => $toReceiptName,
                            'send_mail_mailbox_id' => $mail_mailbox_id,
                            'send_mail_mail_id' => $mail_mail_id
                        );
                        
                        $flag = 'insert';
                        $mailOperation = new mailOperation();
                        $saveMailData = $mailOperation->saveSendMail($dataArray);
                }
                // echo '$i='.$i;
                $i++;
            }
            // echo '$i===='.$i;
        }

        // echo '<pre>';
        // print_r($dataArray);
        // if($flag == 'insert'){
        //     if($dataArray != '' && $dataArray != NULL){

        //         $mailOperation = new mailOperation();
        //         $saveMailData = $mailOperation->saveSendMail($dataArray); 

        //         return $saveMailData;
        //     }
        // }
    }

    public function allSendMails(){

        // $homeController = new Home();
        // $getInbox = $homeController->getInbox();
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $homeController = new Home();
        $getInbox = $homeController->getInbox();
        $getSendMail = $homeController->getSendMail();

        $getuser = session()->get('user');
        // print_r( $user);
        $user = $getuser['useremail'];
        $role = $getuser['role'];

        $mailOperation = new mailOperation();

        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        $MailboxCount = sizeof($mailbox_id);
        for($i = 0; $i <  $MailboxCount; $i++){
            if($mailbox_id[$i] != '' && $mailbox_id[$i] != NULL){
                $getSendMailByMailbox[] = $mailOperation->getSendMailByMailbox($mailbox_id[$i]);
                $getMailboxColor[] = $mailOperation->getMailboxById($mailbox_id[$i]);
            }
        }
        // print_r($getSendMailByMailbox);
        // die();
         foreach($getSendMailByMailbox as $row){
            foreach($row as $rowData){
                // echo '<pre>';
                // print_r($rowData['mail_conversation_id']);
                // die();
                $conversation_id = $rowData['send_conversation_id'];
                $getSendRecordByConvId[] = $mailOperation->getSendRecordByConvId($conversation_id);
            }
        }
        // echo '<pre>';
        // print_r($getSendMailByMailbox);
        // die();

        $result['allSentMails'] = json_encode($getSendRecordByConvId);
        $result['mailbox_color'] = json_encode($getMailboxColor);

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\sentMail',$result)
            .view('sharedMail\footer');
    }

    public function sentMailDetail(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        // $id = ($this->request->uri->getSegments());
        // $id = $id[1];
        $send_mail_id = $this->request->getVar('mail_id');

        $mailOperation = new mailOperation();
        $getMailsById = $mailOperation->getSentMailById($send_mail_id);

        // print_r($getMailsById);
        // die();

        foreach($getMailsById as $row){
           $mailConversationId = $row['mail_conversation_id'];
        }

        $getSendItmByConvId = $mailOperation->getSendItmByConvId($mailConversationId);
        $getMailByConvId = $mailOperation->getMailByConvId($mailConversationId);

        $result1 = $getSendItmByConvId;
        $result2 = $getMailByConvId;
        $ArrayResult['finalResult'] = array_merge($result1,$result2);
        $ArrayResult['starMail'] = $mailOperation->getStarMaiByConvId($mailConversationId);

        // print_r($ArrayResult);
        // die();
        echo json_encode($ArrayResult);

        // return view('sharedMail\head') 
        //     .view('sharedMail\top_header')
        //     .view('sharedMail\sidebar',$countResult)
        //     .view('sharedMail\sendMailDetailView',$ArrayResult)
        //     .view('sharedMail\footer');
    }

    public function mailbox(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

         return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\addMailbox')
            .view('sharedMail\footer');
    }

    public function addMailbox(){
        $mailOperation = new mailOperation();

        $mailbox_name = $this->request->getVar('mailbox_name');
        $mailbox_color = $this->request->getVar('mailbox_color');
        $mailbox_email_id = $this->request->getVar('mailbox_email_id');
        $isActive = $this->request->getVar('isActive');

        $checkEmail = $this->valid_email($mailbox_email_id);
        $getValidMailboxId = $mailOperation->getValidMailboxId($mailbox_email_id);

        $mailbox_createdAt = date("m/d/Y h:i:s a", time());
        
        if( $getValidMailboxId != '' &&  $getValidMailboxId != NULL){
            session()->setFlashData('mailbox_create', 'Email ID Already Exist !');
            return redirect()->to(base_url('mailbox'));
        }

        if(($mailbox_name != '' && $mailbox_name != NULL) && ($mailbox_color != '' && $mailbox_color != NULL) && ($checkEmail != 'false') && ($getValidMailboxId == '' || $getValidMailboxId == NULL)){

            $dataArray = array(
                'mailbox_name' => $mailbox_name,
                'mailbox_color' => $mailbox_color,
                'mailbox_email_id' => $mailbox_email_id,
                'mailbox_createdAt' => $mailbox_createdAt,
                'isActive' => $isActive
            );

            $result = $mailOperation->saveMailBox($dataArray);

            if($result){

                session()->setFlashData('mailbox_create', 'Mailbox Added Sucessfully !');
                return redirect()->to(base_url('mailbox'));

            }

        } else{
            session()->setFlashData('mailbox_create', 'Email ID Already Exist !');
            return redirect()->to(base_url('mailbox'));
        }

    }

    public function getAllMailBox(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $mailOperation = new mailOperation();
        $allMailbox = $mailOperation->getAllMailbox();

        $result['allMailbox'] = json_encode($allMailbox);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\showAllMailbox',$result)
                .view('sharedMail\footer');
    }

    public function editMailboxView(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $id = ($this->request->uri->getSegments());
        $id = $id[1];

        $mailOperation = new mailOperation();
        $mailBoxData = $mailOperation->getMailboxById($id);

        $result['mailBoxData'] = json_encode($mailBoxData);

        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\sidebar',$countResult)
            .view('sharedMail\modifyMailbox',$result)
            .view('sharedMail\footer');
    }

    public function modifyMailbox(){
        $mailbox_id = $this->request->getVar('mailbox_id');
        $mailbox_name = $this->request->getVar('mailbox_name');
        $mailbox_color = $this->request->getVar('mailbox_color');
        $mailbox_email_id = $this->request->getVar('mailbox_email_id');
        $isActive = $this->request->getVar('isActive');

        $checkEmail = $this->valid_email($mailbox_email_id);
        $mailbox_createdAt = date("m/d/Y h:i:s a", time());

        // echo '$mailbox_name='.$mailbox_name;
        // echo 'mailbox_color=='.$mailbox_color;
        // echo 'mailbox_email_id=='.$mailbox_email_id;

        if(($mailbox_name != '' && $mailbox_name != NULL) && ($mailbox_color != '' && $mailbox_color != NULL) && ($checkEmail != 'false')){

            $dataArray = array(
                'mailbox_name' => $mailbox_name,
                'mailbox_color' => $mailbox_color,
                'mailbox_email_id' => $mailbox_email_id,
                'mailbox_createdAt' => $mailbox_createdAt,
                'isActive' => $isActive
            );

            $dataMailArray = array(
                    'mail_mailbox_color' => $mailbox_color
            );

            $mailOperation = new mailOperation();
            $result = $mailOperation->modifyMailBox($dataArray,$mailbox_id);
            $updateMailByMailboxId = $mailOperation->updateMailByMailboxId($mailbox_id, $dataMailArray);


            if($result){

                session()->setFlashData('mailbox_modify', 'Mailbox Updated Sucessfully !');
                 return redirect()->to(base_url('getAllMailBox'));

            }

        }

    }

    public function deleteMailbox(){
        $mailbox_id = $this->request->getVar('mailbox_id');
        $isActive = $this->request->getVar('isActive');
        $operation = $this->request->getVar('operation');

        $dataArray = array(
                'isActive' => $isActive
            );

        // echo '$mailbox_id=='.$mailbox_id;
        // echo ''


        $mailOperation = new mailOperation();
        $result = $mailOperation->modifyMailBox($dataArray,$mailbox_id);

        if($result){

            if($operation == 'reactive'){
                 $msg = 'Mailbox Re-Activeated Sucessfully !';
            }else{
                 $msg = 'Mailbox Deleted Sucessfully !';
            }
           
            echo json_encode($msg);

        }

    }

    public function getAllDeletedMailBox(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $mailOperation = new mailOperation();
        $allMailbox = $mailOperation->getDeletedMail();

        $result['allDeletedMailbox'] = json_encode($allMailbox);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\showAllDeletedMailbox',$result)
                .view('sharedMail\footer');
    }

    public function composeMail(){

        $send_mail_to = $this->request->getVar('send_mail_to');
        $send_mail_cc = $this->request->getVar('send_mail_cc');
        $send_mail_bcc = $this->request->getVar('send_mail_bcc');
        $send_mail_from = $this->request->getVar('send_mail_from');
        $send_mail_subject = $this->request->getVar('send_mail_subject');
        $send_mail_content = $this->request->getVar('send_mail_content');
        $operation = $this->request->getVar('operation');
        // $send_mail_attachement_id = $this->request->getVar('send_mail_attachement_id');

        $attachment=$_FILES["send_mail_attachement_id"]["tmp_name"];

        if( $attachment != '' &&  $attachment != NULL){
            $attachment_content_type = mime_content_type($attachment);
            $attachement_name = $_FILES["send_mail_attachement_id"]["name"];
            
             // echo '$send_mail_attachement_id=='.$attachment;
            // echo '$attachment_content_type=='.$attachment_content_type;
            $params = "";
            if($attachment_content_type == 'image/jpeg' || $attachment_content_type == 'image/png' || $attachment_content_type == 'video/mp4'){
                $content= file_get_contents($_FILES["send_mail_attachement_id"]["tmp_name"]);
                // $params = [Convert]::ToBase64String([IO.File]::ReadAllBytes($attachment));
                $params = base64_encode($content);
            }else{
                $str= file_get_contents($_FILES["send_mail_attachement_id"]["tmp_name"]);

                if(strlen($str)=='0'){
                    $cc = fopen("temp.txt","r");
                }
                $params = base64_encode($str);
               
            } 
        }

       // echo '$params=='.$params;

       // die();

         if( $attachment != '' &&  $attachment != NULL){
            $bodyJson = array('message' =>  array(
                                                    'toRecipients'  => array(array('emailAddress' =>  array(
                                                                                                        'address' => $send_mail_to
                                                                                                      )
                                                                                    )),

                                                    'body'       => array(
                                                                            'contentType'   => 'html',
                                                                            'content'       =>  $send_mail_content
                                                                        ),

                                                    'subject' => $send_mail_subject,
                                                    'attachments'  => array(array(
                                                        '@odata.type' => '#microsoft.graph.fileAttachment',
                                                        'name' =>  $attachement_name,
                                                        'contentType' => $attachment_content_type,
                                                        'contentBytes' => $params
                                                                                    ))
                                                    
                                                )

                );

         }else{

            $bodyJson = array('message' =>  array(
                                                    'toRecipients'  => array(array('emailAddress' =>  array(
                                                                                                        'address' => $send_mail_to
                                                                                                      )
                                                                                    )),

                                                    'body'       => array(
                                                                            'contentType'   => 'html',
                                                                            'content'       =>  $send_mail_content
                                                                        ),

                                                    'subject' => $send_mail_subject
                                                    
                                                )

                            );

         }

        
        $bodyJ = json_encode($bodyJson);

        $Home = new Home();
        $token =  $Home->microsoft_bearer_token();

        $userClient = new Graph();
        $userClient = $userClient->setAccessToken($token);

        $requestUrl = 'https://graph.microsoft.com/v1.0/users/'.$send_mail_from.'/sendMail';
        // echo "<br> requestUrl=$requestUrl";  https://graph.microsoft.com/v1.0/users/$MsgFrom/sendMail
        $result = $userClient->createRequest('POST', $requestUrl);
        // echo"<br> result  <Pre>";print_r($result);echo "</pre>";
        $finalResult = $result->attachBody($bodyJ)->execute();

        if($finalResult){
            session()->setFlashdata("message", "Message has been send sucessfully !");
            session()->markAsFlashdata("message", "Message has been send sucessfully !");
            return redirect()->to(base_url('/'));
        }

    }

    public function inviteTeammeber(){
        $member_id = $this->request->getVar('member_id');

        // echo 'member_id='.$member_id;

        $member_mailbox_id = $this->request->getVar('member_mailbox_id');
        $chk=""; 

        foreach($member_mailbox_id as $chk1)  
        {  
            $chk .= $chk1 . ",";  
        } 
        $fianlCheckbox = rtrim($chk,',');
        $data = array(
            'member_mailbox_id' => $fianlCheckbox
        );

        // print_r($data);
        // die();

        $mailOperation = new mailOperation();
        $updateMember =  $mailOperation->updateMemberAccess($member_id, $data);

        if($updateMember){
            return redirect()->to(base_url('/'));
        }

    }

    public function assignTicketToMem(){
        $mail_id = $this->request->getVar('mail_id');
        $mail_member_id = $this->request->getVar('mail_member_id');
        $mail_conversation_id = $this->request->getVar('mail_conversation_id');
        $status = $this->request->getVar('status');
        $flag = $this->request->getVar('flag');

        $assignDate = date("m/d/Y h:i:s a", time());

        $user = session()->get('user');
        $useremail = $user['useremail'];

        
        $mailOperation = new mailOperation();
        // if($assignTicket){
            if($flag == 'reAssign'){
                $dataArray = array('member_id' => $mail_member_id,
                'mail_flag' => $status,
                'mail_assignBy' => $useremail,
                'mail_AssignAt' => $assignDate);

                $mailOperation = new mailOperation();
                $assignTicket = $mailOperation->assignTicket($mail_conversation_id, $dataArray);

                $getMemberName = $mailOperation->getMemberById($mail_member_id);

                $updAssignArray = array(
                                    
                                    'assign_member_id' => $mail_member_id,
                                    'assign_member_name' => $getMemberName['member_name'],
                                    'assign_datetime' => $assignDate,
                                    'assign_by' => $useremail
                );

                $updateAssignMail = $mailOperation->updateAssignMail($updAssignArray,$mail_conversation_id);

                $data = 'This Mail Re-assign to '.$getMemberName['member_name'];
                echo json_encode($data);
            } else{

                $mailOperation = new mailOperation();

                $getMemberName = $mailOperation->getMemberById($mail_member_id);

                $dataArray = array('member_id' => $mail_member_id,
                'mail_flag' => $status,
                'mail_assignBy' => $useremail,
                'mail_AssignAt' => $assignDate);

                $assignTicket = $mailOperation->assignTicket($mail_conversation_id, $dataArray);

                $dataAssign = array(
                    'assign_mail_conv_id' => $mail_conversation_id,
                    'assign_member_id' => $mail_member_id,
                    'assign_member_name' => $getMemberName['member_name'],
                    'assign_datetime' => $assignDate,
                    'assign_by' => $useremail
                );

                $setAssignMail = $mailOperation->setAssignMail($dataAssign);

                $data = 'This mail assign to '.$getMemberName['member_name'];
                echo json_encode($data);
            }
        // }
    }

    public function mineMails(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $id = ($this->request->uri->getSegments());
        $id = $id[1];
        // echo '$id=='.$id;
        // die();

        $mailOperation = new mailOperation();

        if($id == 'mine'){
            $user = session()->get('user');
            $useremail = $user['useremail'];

            $getMemberId = $mailOperation->getMemberId($useremail);
            $member_Id = $getMemberId['member_id'];
            $member_name = $getMemberId['member_name'];

            $result['member_name'] = json_encode($member_name);
        } else{
            $member_Id = $id;
            $member = $mailOperation->getMemberById($member_Id);
            $member_name = $member['member_name'];

            // echo '$member_name=='.$member_name;
            // die();
        }

        $getMails = $mailOperation->getMailsByMember($member_Id);
        foreach($getMails as $row){
            $mail_conversation_id = $row['mail_conversation_id'];

            $getMyAsiRecByConvId[] = $mailOperation->getMyAsiRecByConvId($mail_conversation_id);
        }
        $result['getMineMails'] = json_encode($getMyAsiRecByConvId);
        $result['member_name'] = json_encode($member_name);
        

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\mineMails',$result)
                .view('sharedMail\footer');

    }

    public function getmaildetails(){
        $mail_conversation_id = $this->request->getVar('mail_conversation_id');

        $mailOperation = new mailOperation();
        $getMails = $mailOperation->getMailByConvId($mail_conversation_id);

        $result['mails'] = $getMails;
        // print_r($getMails);

        echo json_encode($result);
        // die();

    }

     public function forwardAndClos(){

        $send_mail_to = $this->request->getVar('send_mail_to');
        $send_mail_cc = $this->request->getVar('send_mail_cc');
        $send_mail_bcc = $this->request->getVar('send_mail_bcc');
        $send_mail_from = $this->request->getVar('send_mail_from');
        $send_mail_subject = $this->request->getVar('send_mail_subject');
        $send_mail_content = $this->request->getVar('send_mail_content');

        $bodyJson = array('message' =>  array(
                                                'toRecipients'  => array(array('emailAddress' =>  array(
                                                                                                    'address' => $send_mail_to
                                                                                                    )
                                                                                )),

                                                'body'       => array(
                                                                        'contentType'   => 'html',
                                                                        'content'       =>  $send_mail_content
                                                                    ),

                                                'subject' => $send_mail_subject
                                                
                                            )

                        );

   

        
        $bodyJ = json_encode($bodyJson);

        $Home = new Home();
        $token =  $Home->microsoft_bearer_token();

        $userClient = new Graph();
        $userClient = $userClient->setAccessToken($token);

        $requestUrl = 'https://graph.microsoft.com/v1.0/users/'.$send_mail_from.'/sendMail';
        // echo "<br> requestUrl=$requestUrl";  https://graph.microsoft.com/v1.0/users/$MsgFrom/sendMail
        $result = $userClient->createRequest('POST', $requestUrl);
        // echo"<br> result  <Pre>";print_r($result);echo "</pre>";
        $finalResult = $result->attachBody($bodyJ)->execute();

        if($finalResult){
             return redirect()->to(base_url('/'));
        }


    }

    public function replyTomail(){

        $send_mail_to = $this->request->getVar('send_mail_to');
        $send_mail_cc = $this->request->getVar('send_mail_cc');
        $send_mail_bcc = $this->request->getVar('send_mail_bcc');
        $send_mail_from = $this->request->getVar('send_mail_from');
        $send_mail_subject = $this->request->getVar('send_mail_subject');
        $send_mail_content = $this->request->getVar('send_mail_content');
        $mail_conversation_id = $this->request->getVar('mail_conversation_id');

        $mailOperation = new mailOperation();
        $getMailByConvIdByOrder = $mailOperation->getMailByConvIdByOrder($mail_conversation_id);

        $mail_mail_id = $getMailByConvIdByOrder['mail_mail_id'];

        // echo json_encode($mail_mail_id);
        // die();

         $bodyJson = array('message' =>  array(
                                                    'toRecipients'  => array(array('emailAddress' =>  array(
                                                                                                        'address'   => $send_mail_to
                                                                                                      )
                                                                                    )),
                                                    'body'       => array(
                                                                            'contentType'   => 'html',
                                                                            'content'       =>  $send_mail_content
                                                                        )
                                                )
                            );
          $bodyJ = json_encode($bodyJson);
          // echo "<br>body J -$bodyJ";

        $Home = new Home();
        $token =  $Home->microsoft_bearer_token();

        $userClient = new Graph();
        $userClient = $userClient->setAccessToken($token);

        $requestUrl = 'https://graph.microsoft.com/v1.0/users/'.$send_mail_from.'/messages/'.$mail_mail_id.'/reply';
        // echo "<br> requestUrl=$requestUrl";
        $result = $userClient->createRequest('POST', $requestUrl);
        // echo"<br> result  <Pre>";print_r($result);echo "</pre>";
        $finalResult = $result->attachBody($bodyJ)->execute();
    
    }

    public function ViewTeamMates(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $mailOperation = new mailOperation();
        $allTeammember = $mailOperation->allTeammember();

        foreach($allTeammember as $row){
            $member_mailbox_id = $row['member_mailbox_id'];

            $mailbox_id = explode(',',$member_mailbox_id);

            // print_r($mailbox_id);
            $mailboxNm="";

            for($i=0; $i < count($mailbox_id); $i++){

                $getMailboxById = $mailOperation->getMailboxById($mailbox_id[$i]);

                

                foreach($getMailboxById as $mailboxRow){
                    $mailbox_name = $mailboxRow['mailbox_name'];

                    $mailboxNm .= $mailbox_name.",";  
                }

            }
            // echo '$mailboxNm=1='.$mailboxNm;
          $mailbox[] = rtrim($mailboxNm);

        }

        // print_r($mailbox);

        // die();

        $result['allTeammember'] = json_encode($allTeammember);
        $result['mailbox'] = json_encode($mailbox);


        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\ViewTeamMates',$result)
                .view('sharedMail\footer');
    }

    public function editTemMateView(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $id = ($this->request->uri->getSegments());
        $id = $id[1];

        $mailOperation = new mailOperation();
        $getMemberById = $mailOperation->getMemberById($id);
        $getAllMailbox = $mailOperation->getAllMailbox();

        $result['memberById'] = json_encode($getMemberById);
        $result['getAllMailbox'] = json_encode($getAllMailbox);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\modifyTeamMates',$result)
                .view('sharedMail\footer');
    }

    public function modifyMember(){
        $checkbox = $this->request->getVar('member_mailbox_id');
        $member_name = $this->request->getVar('member_name');
        $member_id = $this->request->getVar('member_id');
        $chk=""; 

        foreach($checkbox as $chk1)  
        {  
            $chk .= $chk1 . ",";  
        } 
        $fianlCheckbox = rtrim($chk,',');

        $dataArray = array(
            'member_name' => $member_name,
            'member_mailbox_id' => $fianlCheckbox
        );

        $mailOperation = new mailOperation();
        $updateMember = $mailOperation->updateTeamMember($member_id, $dataArray);

        if($updateMember){
            session()->setFlashData('member_modify', 'Member Updated Sucessfully !');
            return redirect()->to(base_url('ViewTeamMates'));
        }
    }

    public function starredMail(){
        $user = session()->get('user');
        $useremail = $user['useremail'];

        $mailOperation = new mailOperation();

        $mail_id = $this->request->getVar('mail_id');
        $starred_mail_action = $this->request->getVar('starred_mail_action');
        $starred_date_time = date("m/d/Y h:i:s a", time());
        $starred_createdBy = $this->request->getVar('starred_createdBy');
        $flag = $this->request->getVar('flag');

        $getStarredMailById = $mailOperation->getStarredMailById($mail_id);

        if($getStarredMailById == '' || $getStarredMailById == null){
            $dataarray = array(
                'starred_mail_mail_id' => $mail_id,
                'starred_date_time' => $starred_date_time,
                'starred_mail_action' => $starred_mail_action,
                'starred_createdBy' => $useremail
            );

            $mailOperation = new mailOperation();
            $addStarredMail = $mailOperation->addStarredMail($dataarray);
        }

        
        $getStarredMail = $mailOperation->getStarredMailById($mail_id);

        $starred_mail_id = $getStarredMail['starred_mail_id'];

        // if($flag == "inboxMail"){

            $getMailResultByConvId = $mailOperation->getMailResultByConvId($mail_id);

            if($getMailResultByConvId != '' && $getMailResultByConvId != null){
                 $data = array(
                    'isStarred' => 'yes',
                    'starred_mail_id' => $starred_mail_id,
                    'mail_conversation_id' => $mail_id
                );

                $updateMail = $mailOperation->updateMailByConv($data);
            }
            
            $getSendRecordByConvId = $mailOperation->getSendRecordByConvId($mail_id);

            if($getSendRecordByConvId != '' && $getSendRecordByConvId != NULL){
                $data = array(
                    'isStarred' => 'yes',
                    'starred_mail_id' => $starred_mail_id
                );

                $updateSendMailByConv = $mailOperation->updateSendMailByConv($data, $mail_id);
            }
        // }
       

        $countResult = $this->sidebarOptionValue();

        echo json_encode($countResult['starmailCount']);
    }

    public function getStarredMail(){

        $user = session()->get('user');
        $useremail = $user['useremail'];

        $countResult['allCount'] = json_encode($this->sidebarOptionValue());

        $mailOperation = new mailOperation();
        $getStarMailByUser = $mailOperation->getStarMailByUser($useremail);

        foreach($getStarMailByUser as $rowData){
            // print_r($rowData['starred_mail_mail_id']);
            $starred_mail_mail_id = $rowData['starred_mail_mail_id'];

            $getMailResultByMailId[] = $mailOperation->getMailByConvId($starred_mail_mail_id);

        }

        $result['starredmails'] = json_encode($getMailResultByMailId);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\starredmail',$result)
                .view('sharedMail\footer');
    }

    public function unstarredmail(){

        $mail_id = $this->request->getVar('mail_id');
        $starred_mail_action = $this->request->getVar('starred_mail_action');

        $mailArray = array(
            'isStarred' => 'No',
            'starred_mail_id' => '',
            'mail_conversation_id' => $mail_id
        );

        $mailOperation = new mailOperation();
        $updateMail = $mailOperation->updateMailByConv($mailArray);

        $deleteStarredMail = $mailOperation->deleteStarredMail($mail_id);

        // $msg = 'Un Starred';
        // echo json_encode($msg);

        $countResult = $this->sidebarOptionValue();

        echo json_encode($countResult['starmailCount']);
    }

    public function setReminder(){
        $conversation_id = $this->request->getVar('conversation_id');
        $createdBy = $this->request->getVar('createdBy');
        $reminder_date_time = $this->request->getVar('reminder_date_time');
        $reminder_flag = $this->request->getVar('reminder_flag');
        $createdAt = date("m/d/Y h:i:s a", time());

        $mailOperation = new mailOperation();
        $getReminderByConvID = $mailOperation->getReminderByConvID($conversation_id);

        if($getReminderByConvID == '' || $getReminderByConvID == null){
            $dataArray = array(
            'reminder_mail_conv_id' => $conversation_id,
            'reminder_flag' => $reminder_flag,
            'reminder_createdBy' => $createdBy,
            'reminder_createdAt' => $createdAt,
            'reminder_date_time' => $reminder_date_time
            );

            // print_r($dataArray);

            $setReminder = $mailOperation->setReminder($dataArray);

            $getReminderByConv = $mailOperation->getReminderByConvID($conversation_id);

            $reminder_id = $getReminderByConv['reminder_id'];

            $mailDataArray = array(
                'mail_reminder_id' => $reminder_id,
                'mail_conversation_id' => $conversation_id
            );

            $updateMail = $mailOperation->updateMailByConv($mailDataArray);

            $msg = 'Reminder Set Sucessfully';
            echo json_encode($msg);
        } else{

            $dataArray = array(
            'reminder_flag' => $reminder_flag,
            'reminder_createdBy' => $createdBy,
            'reminder_createdAt' => $createdAt,
            'reminder_date_time' => $reminder_date_time
            );

            $updateReminder = $mailOperation->updateReminder($dataArray, $conversation_id);

            $msg = 'Reminder Is Update';
            echo json_encode($msg);
        }

    }

    public function reminders(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());
        $mailOperation = new mailOperation();

        $user = session()->get('user');
        $useremail = $user['useremail'];

        $getReminder = $mailOperation->getReminder($useremail);
        $result['reminders'] = json_encode($getReminder);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\reminderList',$result)
                .view('sharedMail\footer');

    }

    public function makeunread(){
        $mail_conversation_id = $this->request->getVar('mail_conversation_id');
        $mail_is_open = $this->request->getVar('mail_is_open');
        $mail_openAt = $this->request->getVar('mail_openAt');

        $dataArray = array(
            "mail_conversation_id" => $mail_conversation_id,
            "mail_is_open" => $mail_is_open,
            "mail_openAt" => $mail_openAt
        );

        $mailOperation = new mailOperation();
        $updateMailByConv = $mailOperation->updateMailByConv($dataArray);

        $msg = "Mail Mark As Unread !";
        echo json_encode($msg);
    }

    public function trash(){
        // $user = session()->get('user');
        // $useremail = $user['useremail'];

        $mail_conversation_id = $this->request->getVar('mail_conversation_id');
        $mail_status = $this->request->getVar('mail_status');
        $mail_flag = $this->request->getVar('mail_flag');
        $useremail = $this->request->getVar('useremail');

        $dataArray = array(
            "mail_conversation_id" => $mail_conversation_id,
            "mail_status" => $mail_status,
            "mail_flag" => $mail_flag,
            "mail_deletedBy" => $useremail
        );

        $mailOperation = new mailOperation();
        $updateMailByConv = $mailOperation->updateMailByConv($dataArray);

        $msg = "Mail has been trash !" ;
        echo json_encode($dataArray);
    }

    public function TrashMail(){
        $countResult['allCount'] = json_encode($this->sidebarOptionValue());
        $mailOperation = new mailOperation();

        $getTrashMail = $mailOperation->getTrashMail();
        $result['trashMails'] = json_encode($getTrashMail);

        return view('sharedMail\head') 
                .view('sharedMail\top_header')
                .view('sharedMail\sidebar',$countResult)
                .view('sharedMail\showTrashMails',$result)
                .view('sharedMail\footer');
    }

    public function checkFromEmailId(){
        $email_id = $this->request->getVar('from_email_id');

        $mailOperation = new mailOperation(); 
        $getMailboxByEamil = $mailOperation->getMailboxByEamil($email_id);

        if($getMailboxByEamil != '' && $getMailboxByEamil != NULL){
            $return = 'true';
        } else{
            $return = 'false';
        }

        echo json_encode($return);
    }

    public function refresh(){
        // echo json_encode('hello');

        $homeController = new Home();
        $getInbox = $homeController->getInbox();
        $getSendMail = $homeController->getSendMail();
        $updReminder = $homeController->updReminder();
        // echo json_encode('hello');
    }

    public function multiDelete(){
        // $user = session()->get('user');
        // $useremail = $user['useremail'];

        $checkboxVal = $this->request->getVar('checkboxVal');
        $useremail = $this->request->getVar('useremail');
         // var_dump($checkboxVal);

         $chrArr = explode(',',$checkboxVal);

        $mail_status = $this->request->getVar('mail_status');
        $mail_flag = $this->request->getVar('mail_flag');
        $currentDate = date("m/d/Y h:i:s a", time());

        // $checkboxCount = sizeof($chkArr);

        // echo json_encode(array_values($checkboxVal));
        $i=0;
        foreach ($chrArr as $row) { 
           
         // echo json_encode('$i='.$i);
            // print_r($row);
           $firstResult = substr($row, 1, -1);
           $mail_conversation_id = substr($firstResult, 1, -1);

           // echo '$rowFirst=='.$rowFirst;

           $dataArray = array(
                "mail_conversation_id" => $mail_conversation_id,
                "mail_status" => $mail_status,
                "mail_flag" => $mail_flag,
                "mail_deletedBy" => $useremail,
                "mail_deleteAt" => $currentDate
            );

            // print_r($dataArray);        

            $mailOperation = new mailOperation();
            $updateMailByConv = $mailOperation->updateMailByConv($dataArray);

        }
    }

    public function searchMails(){

        $mailbox = session()->get('mailbox_session');
        $mailbox_id = $mailbox['user_mailbox_id'];
        $mailBoxCnt = sizeof($mailbox_id);

        $mailOperation = new mailOperation();

        $query = $this->request->getVar('query');
        $search_mails_from = $this->request->getVar('search_mails_from');
        // $search_folder_name = $this->request->getVar('search_folder_name');

        if($search_mails_from == 'allInMails' || $search_mails_from == 'inboxFolder'){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $allInMailByFromName['allSearchData'] = $mailOperation->allInMailByFromName($query, $mailbox_id[$cnt]);
            }

            echo json_encode($allInMailByFromName);
        }

        if($search_mails_from == 'allSendMails' || $search_mails_from == 'sendFolder'){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $allSendMailByToName['allSearchData'] = $mailOperation->allSendMailByToName($query,$mailbox_id[$cnt]);
            }

            echo json_encode($allSendMailByToName);
        }

        if($search_mails_from == 'allAssignMails' || $search_mails_from == 'assignFolder'){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $allSeachAssignMail['allSearchData'] = $mailOperation->allSeachAssignMail($query,$mailbox_id[$cnt]);
            }

            echo json_encode($allSeachAssignMail);
        }

        if($search_mails_from == 'allFolder' ){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $searchAllByQuery['allSearchData'] = $mailOperation->searchMailByQuery($query, $mailbox_id[$cnt]);
                $searchAllByQuery['allSearchData'] = $mailOperation->searchSendMailByQury($query, $mailbox_id[$cnt]);
            }
           

            echo json_encode($searchAllByQuery);
        }

        if($search_mails_from == 'mineFolder'){
            $user = session()->get('user');
            $useremail = $user['useremail'];

            $getMemberId = $mailOperation->getMemberId($useremail);
            $member_Id = $getMemberId['member_id'];

            $searchMineMails['allSearchData'] = $mailOperation->searchMineMails($member_Id, $query);
            echo json_encode($searchMineMails);
        }

        if($search_mails_from == 'starFolder'){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $searchStartMails['allSearchData'] = $mailOperation->searchStartMails($query, $mailbox_id[$cnt]);
            }

            echo json_encode($searchStartMails);

        }

        if($search_mails_from == 'reminderFolder'){

            for($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                $searchReminder['allSearchData'] = $mailOperation->searchReminder($query,$mailbox_id[$cnt]);
            }
            echo json_encode($searchReminder);
        }

        if($search_mails_from == 'trashFolder'){
            
            $searchTrashMail['allSearchData'] = $mailOperation->searchTrashMail($query);
            echo json_encode($searchTrashMail);
        }

    }

    // public function refreshSideBar(){
    //     $countResult['allCount'] = json_encode($this->sidebarOptionValue());
    // }

    public function get_read_unread_mail(){
        $mailOperation = new mailOperation();

        $flag = $this->request->getVar('flag');

        if($flag == 'read_mail'){
            $readAllMails['allReadMail'] = $mailOperation->readAllMails();
            // foreach($readAllMails as $row){

            // }

            echo json_encode($readAllMails);
        }

        if($flag == 'un_read_mail'){
            $UnreadAllMails['allUnreadMails'] = $mailOperation->UnreadAllMails();

            echo json_encode($UnreadAllMails);
        }
    }

    // $condition = '';
    public function advanceSearch(){

        $mailbox = session()->get('mailbox_session');
        $mailbox_id = $mailbox['user_mailbox_id'];
        $mailBoxCnt = sizeof($mailbox_id);

        $condition = '';
        $sendMailCond = '';

        $mailOperation = new mailOperation();

        $advanceFolderSelect = $this->request->getVar('advanceFolderSelect');
        $advanceFromMail = $this->request->getVar('advanceFromMail');
        $advanceToMail = $this->request->getVar('advanceToMail');
        $advanceCcMail = $this->request->getVar('advanceCcMail');
        $advanceSubject = $this->request->getVar('advanceSubject');
        $advanceMailStartDate = $this->request->getVar('advanceMailStartDate');
        $advanceMailEndDate = $this->request->getVar('advanceMailEndDate');
        $Attachment = $this->request->getVar('advanceAttachment');
        $advanceReminder = $this->request->getVar('advanceReminder');
  

            if($advanceFromMail != '' && $advanceFromMail != NULL){
                 $condition = '';
                if($advanceFolderSelect == 'sendFolder'){
                    $condition = "send_mail_name='$advanceFromMail'";
                } else{
                    if($advanceFolderSelect == 'allFolder'){
                        $condition = "mail_from_name='$advanceFromMail'";
                        $sendMailCond = "send_mail_name='$advanceFromMail'";
                    }else{
                         $condition .= $condition ."AND mail_from_name='$advanceFromMail'";
                    }
                   
                }

            } 
            if($advanceToMail != '' && $advanceToMail != NULL){
                if($advanceFolderSelect == 'sendFolder'){
                    $condition = $condition ."AND send_mail_to_name='$advanceToMail'";
                } else{
                    if($advanceFolderSelect == 'allFolder'){
                        $condition = $condition ."AND mail_to_name='$advanceToMail'";
                        $sendMailCond = $sendMailCond ."AND send_mail_to_name='$advanceToMail'";
                    } else{
                        $condition .= $condition ."AND mail_to_name='$advanceToMail'";
                    }
                    
                }  

            } 
            if($advanceCcMail != '' && $advanceCcMail != NULL){
                if($advanceFolderSelect == 'sendFolder'){
                    $condition = $condition ."AND send_mail_cc='$advanceToMail'";
                } else{
                    if($advanceFolderSelect == 'allFolder'){
                         $condition = $condition ."AND mail_cc='$advanceToMail'";
                         $sendMailCond = $sendMailCond ."AND send_mail_cc='$advanceToMail'";
                    }else{
                        $condition .= $condition ."AND mail_cc='$advanceToMail'"; 
                    }
                }
            } 
            if($advanceSubject != '' && $advanceSubject != NULL){
                if($advanceFolderSelect == 'sendFolder'){
                    $condition = $condition ."AND send_mail_subject='$advanceSubject'";
                } else{
                    if($advanceFolderSelect == 'allFolder'){
                        $condition = $condition ."AND mail_subject='$advanceSubject'"; 
                        $sendMailCond = $sendMailCond ."AND send_mail_subject='$advanceSubject'";
                    }else{
                        $condition .= $condition ."AND mail_subject='$advanceSubject'"; 
                    }
                }
                
            }
            if($Attachment == "on"){
                if($advanceFolderSelect != 'sendFolder'){
                    if($advanceFolderSelect == 'allFolder'){
                        $advanceAttachment = 'Y';
                        $condition = $condition ."AND mail_has_attachment='$advanceAttachment'";
                        $sendMailCond = $sendMailCond . '';
                    }else{
                        $advanceAttachment = 'Y';
                        $condition .= $condition ."AND mail_has_attachment='$advanceAttachment'"; 
                    }
                   
                }
            }
           
            if(($advanceMailStartDate != '' && $advanceMailStartDate != null) && ($advanceMailEndDate != '' && $advanceMailEndDate != null)){

                $startDate = date('d-m-Y',strtotime($advanceMailStartDate));
                $endDate = date('d-m-Y', strtotime($advanceMailEndDate));

                if($advanceFolderSelect == 'sendFolder'){
                    $condition .= $condition ."AND send_mail_dateTime BETWEEN $startDate AND $endDate";
                } else{
                    if($advanceFolderSelect == 'allFolder'){
                        $condition = $condition ."AND mail_recivedAt BETWEEN $startDate AND $endDate";
                        $sendMailCond = $sendMailCond ."AND send_mail_dateTime BETWEEN $startDate AND $endDate";
                    } else{
                        $condition .= $condition ."AND mail_recivedAt BETWEEN $startDate AND $endDate";
                    }
                    
                } 
            }

             if ($advanceReminder != '' && $advanceReminder != null) {
                 if($advanceFolderSelect != 'sendFolder'){
                    if($advanceFolderSelect == 'allFolder'){
                        $condition = $condition ."AND mail_reminder_id != '0'";
                        $sendMailCond = $sendMailCond . '';
                    }else{
                        $condition .= $condition ."AND mail_reminder_id != '0'";
                    }
                 }
            } 
        
        if($advanceFolderSelect == 'inboxFolder'){

            if($advanceReminder == 'on'){
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advancSeachInbox[] = $mailOperation->advanceSearchByReminder($condition, $mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advancSeachInbox;
               
                 $condition = '';

            }else{
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advancSeachInbox[] = $mailOperation->advancSeachInbox($condition, $mailbox_id[$cnt]);
                }
                // print_r( $advancSeachInbox);
                $finalResult['allSearchData'] = $advancSeachInbox;
                 $condition = '';
            }
            echo json_encode($finalResult);

        }

        if($advanceFolderSelect == 'mineFolder'){
            $user = session()->get('user');
            $useremail = $user['useremail'];

            $getMemberId = $mailOperation->getMemberId($useremail);
            $member_Id = $getMemberId['member_id'];

            if($advanceReminder == 'on'){
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advanceSearchByMine[] = $mailOperation->advanceMineSerchByReminder($member_Id,$condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advancSeachInbox;
                 $condition = '';

            }else{
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advanceSearchByMine[] = $mailOperation->advanceSearchByMine($member_Id,$condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advanceSearchByMine;
                 $condition = '';
            }
            echo json_encode($finalResult);

        }

        if($advanceFolderSelect == 'assignFolder'){

            if($advanceReminder == 'on'){
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advancesearchByAssign[] = $mailOperation->advSearchByAssiRemin($condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advanceSearchByMine;
                $condition = '';
            } else{
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advancesearchByAssign[] = $mailOperation->advancesearchByAssign($condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advancesearchByAssign;
                $condition = '';
            }

            echo json_encode($finalResult);
            
        }

        if($advanceFolderSelect == 'starFolder'){

            if($advanceReminder == 'on'){
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advanceSerByStar[] = $mailOperation->advanceSrhStarRemi($condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advanceSerByStar;
                $condition = '';
            }else{
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advanceSerByStar[] = $mailOperation->advanceSerByStar($condition,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advanceSerByStar;
                $condition = '';
            }

            echo json_encode($finalResult);
        }

        if($advanceFolderSelect == 'reminderFolder'){
            for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
             $advanceSearByReminder[] = $mailOperation->advanceSearByReminder($condition,$mailbox_id[$cnt]);
            }
            $finalResult['allSearchData'] = $advanceSearByReminder;
            $condition = '';
            echo json_encode($finalResult);
        }

        if($advanceFolderSelect == 'trashFolder'){
            $advanceTrashSearch['allSearchData'] = $mailOperation->advanceTrashSearch($condition);
            $condition = '';
            echo json_encode($advanceTrashSearch);
        }

        if($advanceFolderSelect == 'sendFolder'){
            for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
             $advanceSendMailSerch[] = $mailOperation->advanceSendMailSerch($condition,$mailbox_id[$cnt]);
            }
            $finalResult['allSearchData'] = $advanceSendMailSerch;
            $condition = '';
            echo json_encode($finalResult);
        }

        if($advanceFolderSelect == 'allFolder' ){
            if($advanceReminder == 'on'){
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    $advAllFolderSerch[] = $mailOperation->advSrchByAllFolderRemi($condition,$mailbox_id[$cnt]);
                    $advAllFolderSerch[] = $mailOperation->advanceSendMailSerch($sendMailCond,$mailbox_id[$cnt]);
                }
                $finalResult['allSearchData'] = $advAllFolderSerch;
                $condition = '';
                $sendMailCond = '';
            }else{
                for ($cnt = 0; $cnt < $mailBoxCnt; $cnt++){
                    // echo '$cnt=='.$cnt;
                    $advAllFolderSerch[] = $mailOperation->advSerchAllfoldMail($condition,$mailbox_id[$cnt]);
                    $advAllFolderSerch[] = $mailOperation->advanceSendMailSerch($sendMailCond,$mailbox_id[$cnt]);
                }
                // print_r($advAllFolderSerch);
                $finalResult['allSearchData'] = $advAllFolderSerch;
                $condition = '';
                $sendMailCond = '';
            }  
             $condition = '';
             $sendMailCond = '';
            echo json_encode($finalResult); 
        }
    }

    public function updReminder(){
        $mailOperation = new mailOperation();

        // $systemDate = strftime('%F'); 
        $systemDate =  date('Y-m-d');   
        $getAllReminder = $mailOperation->getAllReminder();

        foreach($getAllReminder as $rowReminder){
            $reminder_flag = $rowReminder['reminder_flag'];
            $reminder_date_time = $rowReminder['reminder_date_time'];

            // echo '$systemDate =='.$systemDate;
            // echo '$reminder_date_time==' .$reminder_date_time;

            // die();

            if($systemDate > $reminder_date_time){
                $reminder_id = $rowReminder['reminder_id'];

                $dataArray = array('reminder_flag' => 'de-activate');

                $updReminderById = $mailOperation->updReminderById($reminder_id, $dataArray);
                // echo '<pre>';
                // echo '$reminder_id=='.$reminder_id.'<br>';
            }
        }
    }

    public function reminderFilter(){

        $filterBy = $this->request->getVar('filterBy');

        if($filterBy == 'ascOrder'){
            $OrderBy = "ASC";
        }

        if($filterBy == 'descOrder'){
            $OrderBy = "DESC";
        }


        $mailOperation = new mailOperation();
        $sortReminder['reminderFilterResult'] = $mailOperation->sortReminder($OrderBy);

        echo json_encode($sortReminder);
    }

    public function createRule(){

        $bodyJson = array(
            
                "displayName" => "gayatri",
                "sequence" => "2",
                "isEnabled" => true,
                "conditions" => array(
                    "subjectContains" => array("Gayatri")
                    // "importance" => array("low")
                ),
                "actions" => array(
                    // "delete" => true,
                    "copyToFolder" => "AAMkADFjMjFlZmQ1LTA2YjktNGE1YS1hNGNjLTkzYTgxMWU3MDZkOAAuAAAAAABMTu7ebji7QIH-KdntQGDfAQBnF_ZaH0LOQaVjrpubUDD7AAC9fXMKAAA=",
                    "stopProcessingRules" => true
                )
        );

        $bodyJ = json_encode($bodyJson);


        // print_r( $bodyJ);
        // die();

        $Home = new Home();
        $token =  $Home->microsoft_bearer_token();

        $userClient = new Graph();
        $userClient = $userClient->setAccessToken($token);

        // $requestUrl = "https://graph.microsoft.com/v1.0/users/darshana.waghmare@hibernianhealth.com/mailFolders/inbox/messageRules";
        $requestUrl = "https://graph.microsoft.com/v1.0/users/darshana.waghmare@hibernianhealth.com/mailFolders/inbox/messageRules";
        $result = $userClient->createRequest('POST', $requestUrl);
        $finalResult = $result->attachBody($bodyJ)->execute();

        var_dump($finalResult);
        

    }

    
}
