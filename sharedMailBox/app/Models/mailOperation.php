<?php 
namespace App\Models;

use CodeIgniter\Model;

class mailOperation extends Model{

	public function saveMails($data){

		$result = $this->db
                    ->table('mails')
                    ->insert($data);
        return $result;
			   
	}

	public function getMailData(){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_flag != 'assigned' AND mail_status != 'deleted'");

		$result = $query->getResultArray();

        return $result;
	}

	public function getMailbyMailbox($mailbox_id){
		$db = db_connect();
		$query = $db->query("select DISTINCT mail_conversation_id from mails where mail_flag != 'assigned' AND mail_mailbox_id='$mailbox_id' AND mail_status != 'deleted' AND  mail_folder_name ='' ");

		$result = $query->getResultArray();

        return $result;
	}

	public function getMailbyFolder($mailbox_id , $folder_name){
		$db = db_connect();
		$query = $db->query("select DISTINCT mail_conversation_id from mails where mail_flag != 'assigned' AND mail_mailbox_id='$mailbox_id' AND mail_status != 'deleted' AND  mail_folder_name ='$folder_name' ");

		$result = $query->getResultArray();

        return $result;
	}

	public function getMailById($id){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_id=$id");
		// print_r($query);

		$result = $query->getResultArray();
		// echo '<pre>';
		// print_r($result);
		// die();
		return $result;
	}

	public function saveSendMail($data){

		// $arrayCount = sizeof($data);
		// for($i=0; $i < $arrayCount; $i++){

		// 	// echo '$i=='.$i;
		// 	// echo '<pre>';
		// 	// print_r($data[$i]);
		// 	if($data[$i] != '' && $data[$i] != NULL){
		// 		$result = $this->db
	    //                 ->table('sendmail_details')
	    //                 ->insert($data[$i]);
	    //         return $result;
	    //     }	
		// }

		$result = $this->db
	                    ->table('sendmail_details')
	                    ->insert($data);
	            return $result;

        
	}

	public function getSendItmByConvId($conversationId){
		$db = db_connect();
		$query = $db->query("select send_mail_to as mail_to, send_mail_from as mail_from, send_mail_subject as mail_subject, send_mail_content as mail_content, send_mail_dateTime as mail_recivedAt, send_mail_name as mail_from_name, 
		send_conversation_id as mail_conversation_id, isStarred, send_mail_mail_id as mail_mail_id from sendmail_details where send_conversation_id='$conversationId'");

		$result = $query->getResultArray();

		return $result;
	}

	public function getSendMailResultByConvId($conversationId){

		$db = db_connect();
		$query = $db->query("select send_mail_to as mail_to, send_mail_from as mail_from, send_mail_subject as mail_subject, send_mail_content as mail_content, send_mail_dateTime as mail_recivedAt, send_mail_name as mail_from_name, 
			send_conversation_id as mail_conversation_id, isStarred, send_mail_mail_id as mail_mail_id from sendmail_details where send_conversation_id='$conversationId'");

		$result = $query->getRowArray();

		return $result;

	}

	public function getSendMailByMailId($send_mail_mail_id){
		$db = db_connect();
		$query = $db->query("select * from sendmail_details where send_mail_mail_id='$send_mail_mail_id'");

		$result = $query->getRowArray();

		return $result;
	}

	public function allSendMails(){
		$db = db_connect();
		$query = $db->query("select * from sendmail_details");

		$result = $query->getResultArray();

        return $result;
	}

	public function getSendMailByMailbox($mailbox_id){
		$db = db_connect();
		$query = $db->query("select DISTINCT send_conversation_id from sendmail_details where send_mail_mailbox_id='$mailbox_id'");

		$result = $query->getResultArray();

        return $result;
	}

	public function getSentMailById($id){
		$db = db_connect();
		$query = $db->query("select send_mail_to as mail_to, send_mail_from as mail_from, send_mail_subject as mail_subject, send_mail_content as mail_content, send_mail_dateTime as mail_recivedAt, send_mail_name as mail_from_name, send_conversation_id as mail_conversation_id, isStarred, send_mail_mail_id as mail_mail_id from sendmail_details where send_mail_id=$id");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function getMailByConvId($conversationId){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_conversation_id='$conversationId'");

		$result = $query->getResultArray();

		return $result;
	}

	public function getMailResultByConvId($conversationId){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_conversation_id='$conversationId'");

		$result = $query->getRowArray();

		return $result;
	}
	public function getMailByConvIdByOrder($conversationId){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_conversation_id='$conversationId' ORDER BY mail_id DESC");

		$result = $query->getRowArray();

		return $result;
	}
	public function getMailResultByMailId($mail_mail_id){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_mail_id='$mail_mail_id'");

		$result = $query->getRowArray();

		return $result;
	}

	public function getMailByToMail($mail_to){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` WHERE mail_to='$mail_to' ORDER BY mail_id DESC LIMIT 0,1");

		$result = $query->getRowArray();

		return $result;
	}

	public function updateMailByConv($data){
		// $countData = sizeof($data);
		// echo '$content =='.$data['mail_content'] ;
		// echo '$conver=== '.$data['mail_conversation_id'];

		// if($data['mail_content'] != '' && $data['mail_content'] != NULL){
			// echo '<pre>';
			// print_r($data);
			$result = $this->db
		            ->table('mails')
		            ->where('mail_conversation_id', $data['mail_conversation_id'])
		            ->update($data);

			return $result;	
		// }
		
	}

	public function updateMailByMailMailId($data,$mail_mail_id){
		
			$result = $this->db
		            ->table('mails')
		            ->where('mail_mail_id', $mail_mail_id)
		            ->update($data);

			return $result;	
		
	}
	public function updateSendMailByConv($data, $conversationId){
		$result1 = $this->db
		            ->table('sendmail_details')
		            ->where('send_conversation_id', $conversationId)
		            ->update($data);

		return $result1;	
	}

	public function saveMailBox($data){

		$result = $this->db
                    	->table('mailbox')
                    	->insert($data);
        return $result;

	}

	public function getAllMailbox(){

		$db = db_connect();
		$query = $db->query("select * from mailbox where isActive='Y'");

		$result = $query->getResultArray();

		return $result;

	}

	public function getMailboxById($id){

		$db = db_connect();
		$query = $db->query("select * from mailbox where mailbox_id=$id AND isActive='Y'");

		$result = $query->getResultArray();

		return $result;
	}

	public function modifyMailBox($data, $id){

		$result1 = $this->db
            ->table('mailbox')
            ->where('mailbox_id', $id)
            ->update($data);

        return $result1;
	}

	public function getDeletedMail(){
		$db = db_connect();
		$query = $db->query("select * from mailbox where isActive='N'");

		$result = $query->getResultArray();

		return $result;
	}

	public function getMailboxByEamil($email){
		$db = db_connect();
		$query = $db->query("select * from mailbox where mailbox_email_id='$email' && isActive='Y'");

		$result = $query->getRowArray();

		return $result;
	}

	public function getValidMailboxId($email){
		$db = db_connect();
		$query = $db->query("select * from mailbox where mailbox_email_id='$email'");

		$result = $query->getRowArray();

		return $result;
	}

	public function updateMails($mail_id,$data){
		$result1 = $this->db
            ->table('mails')
            ->where('mail_id', $mail_id)
            ->update($data);

        return $result1;
	}

	public function addTeammates($data){
		$result = $this->db
                    ->table('teammates')
                    ->insert($data);

       	return $result;
	}

	public function getMemberId($email){
		$db = db_connect();
		$query = $db->query("select * from teammates where member_name='$email'");

		$result = $query->getRowArray();

		return $result;
	}

	public function updateMemberAccess($id, $data){
		$result1 = $this->db
            ->table('teammates')
            ->where('member_id', $id)
            ->update($data);

        return $result1;
	}

	public function allTeammember(){
		$db = db_connect();
		$query = $db->query("select * from teammates where member_mailbox_id != '' ");

		$result = $query->getResultArray();

		return $result;
	}

	public function getMemberById($member_id){
		$db = db_connect();
		$query = $db->query("select * from teammates where member_id='$member_id'");

		$result = $query->getRowArray();

		return $result;
	}

	public function assignTicket($mailId, $data){
		$result1 = $this->db
            ->table('mails')
            ->where('mail_conversation_id', $mailId)
            ->update($data);

        return $result1;
	}

	public function getMailsByMember($member_Id){

		$db = db_connect();
		$query = $db->query("select DISTINCT mail_conversation_id from mails where member_Id=$member_Id AND mail_flag='assigned'");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function getAllAssignMails(){

		$db = db_connect();
		$query = $db->query("select DISTINCT m.mail_conversation_id FROM mails as m INNER JOIN teammates as t ON m.member_id = t.member_id WHERE m.mail_flag='assigned' ");

		$result = $query->getResultArray();

		return $result;
	}

	public function getAllAssignMailByConvId($conversation_id){
		$db = db_connect();
		$query = $db->query("select m.mail_id, m.mail_to, m.mail_from, m.mail_subject, m.mail_from_name, m.mail_to_name, m.mail_recivedAt,m.mail_conversation_id, t.member_name, t.member_Id FROM mails as m INNER JOIN teammates as t ON m.member_id = t.member_id WHERE m.mail_flag='assigned' AND m.mail_conversation_id='$conversation_id' ORDER BY mail_id DESC LIMIT 0,1");

		$result = $query->getResultArray();

		return $result;	
	}

	public function memberCount(){
		
		$db = db_connect();
		$query = $db->query("select COUNT(DISTINCT m.mail_conversation_id) as mailCount, t.member_name, t.member_Id FROM teammates as t LEFT JOIN mails as m ON m.member_id = t.member_id GROUP BY t.member_Id");

		$result = $query->getResultArray();

		return $result;
	}

	public function updateTeamMember($member_id, $dataArray){
		$result1 = $this->db
            ->table('teammates')
            ->where('member_id', $member_id)
            ->update($dataArray);

        return $result1;
	}

	public function addStarredMail($data){
		$result = $this->db
                    ->table('starred_mail')
                    ->insert($data);

       	return $result;
	}

	public function getStarredMailById($starred_mail_mail_id){
		$db = db_connect();
		$query = $db->query("select * from starred_mail where starred_mail_action='active' and 
			starred_mail_mail_id='$starred_mail_mail_id'");
		// print_r($query);

		$result = $query->getRowArray();

		return $result;
	}

	public function getStarMailByUser($useremail){
		$db = db_connect();
		$query = $db->query("select * from starred_mail where starred_mail_action='active' and starred_createdBy='$useremail'");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function getAllStarredMail(){
		$db = db_connect();
		$query = $db->query("select * from mails where isStarred='yes'");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function deleteStarredMail($starred_mail_mail_id){
		$result1 = $this->db
            ->table('starred_mail')
            ->where('starred_mail_mail_id', $starred_mail_mail_id)
            ->delete();

        return $result1;
	}

	public function getAttachmentByContentId($mainId){
		$db = db_connect();
		// $query = $db->query("select * from attachments where attachment_content_id='$contentId'");
		$query = $db->query("select * from attachments where attachment_main_id='$mainId'");
		// print_r($query);

		$result = $query->getRowArray();

		return $result;
	}

	public function saveAttachment($data){
		$result = $this->db
                    ->table('attachments')
                    ->insert($data);

       	return $result;
	}

	public function getAttachmentByMailtId($mail_id){

		$db = db_connect();
		$query = $db->query("select * from attachments where attachment_mail_mail_id='$mail_id'");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function setReminder($dataArray){
		$result = $this->db
                    ->table('reminder')
                    ->insert($dataArray);

       	return $result;
	}

	public function getReminderByConvID($conversation_id){
		$db = db_connect();
		$query = $db->query("select * from reminder where reminder_mail_conv_id='$conversation_id'");
		// print_r($query);

		$result = $query->getRowArray();

		return $result;
	}

	public function getReminder($useremail){
		$db = db_connect();
		$query = $db->query("select r.reminder_date_time, m.mail_subject, m.mail_id, m.mail_to,m.mail_from, m.mail_to_name, m.mail_from_name from reminder as r LEFT JOIN mails as m ON r.reminder_mail_conv_id=m.mail_conversation_id where reminder_createdBy='$useremail'");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function updateReminder($dataArray,$reminder_conv_id){
		$result1 = $this->db
            ->table('reminder')
            ->where('reminder_mail_conv_id', $reminder_conv_id)
            ->update($dataArray);

        return $result1;
	}

	public function getTrashMail(){
		$db = db_connect();
		$query = $db->query("select * from mails where mail_status = 'deleted'");

		$result = $query->getResultArray();

        return $result;
	}

	public function getRecordByConId($conversation_id){

		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` WHERE mail_conversation_id='$conversation_id' AND mail_flag!='assigned' ORDER BY mail_recivedAt DESC LIMIT 0,1");

		$result = $query->getResultArray();

        return $result;
	}

	public function getMyAsiRecByConvId($conversation_id){

		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` WHERE mail_conversation_id='$conversation_id' AND mail_flag='assigned'");

		$result = $query->getResultArray();

        return $result;
	}

	public function getSendRecordByConvId($conversation_id){
		
		$db = db_connect();
		$query = $db->query("SELECT * FROM `sendmail_details` WHERE send_conversation_id='$conversation_id' ORDER BY send_mail_dateTime DESC LIMIT 0,1");

		$result = $query->getResultArray();

        return $result;
	}

	public function getStarByUser($useremail){

		//SELECT m.isStarred, m.mail_id FROM `mails` as m INNER JOIN starred_mail as s ON m.starred_mail_id = s.starred_mail_id WHERE starred_createdBy='darshana@gmail.com'

		$db = db_connect();
		$query = $db->query("SELECT m.isStarred, m.mail_id FROM `mails` as m INNER JOIN starred_mail as s ON m.starred_mail_id = s.starred_mail_id WHERE starred_createdBy='$useremail'");

		$result = $query->getResultArray();

        return $result;

	}

	public function getStarMaiByConvId($convId){

		$db = db_connect();
		$query = $db->query("select * from starred_mail where starred_mail_mail_id='$convId'");

		$result = $query->getResultArray();

        return $result;
	}

	public function updateMailByMailboxId($mailbox_id, $data){
		$result1 = $this->db
            ->table('mails')
            ->where('mail_mailbox_id', $mailbox_id)
            ->update($data);

        return $result1;
	}

	public function allInMailByFromName($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id  where mail_mailbox_id='$mailbox_id' AND mail_flag != 'assigned' AND mail_status != 'deleted' AND (mail_from_name LIKE '%$query%' ) LIMIT 20");

		$result = $query->getResultArray();

        return $result;
	}

	public function allSendMailByToName($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select send_mail_id as mail_id, send_mail_to as mail_from, send_mail_from as mail_to, send_mail_subject as mail_subject, send_mail_name as mail_from_name, send_mail_to_name as mail_from_name, send_mail_bodyPreview as mail_bodyPreview, send_mail_dateTime as mail_recivedAt, b.mailbox_color from sendmail_details as s INNER JOIN mailbox as b ON s.send_mail_mailbox_id = b.mailbox_id where send_mail_mailbox_id='$mailbox_id' AND (send_mail_to_name LIKE '%$query%') LIMIT 0,20");

		$result = $query->getResultArray();

        return $result;
	}

	public function allSeachAssignMail($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_mailbox_id='$mailbox_id' AND mail_flag='assigned' AND (mail_from_name LIKE '%$query%' OR mail_to_name LIKE '%$query%') LIMIT 20");

		$result = $query->getResultArray();

		return $result;
	}

	public function readAllMails(){

		$db = db_connect();
		$query = $db->query("select mail_id, mail_from_name, mail_conversation_id, mail_subject, mail_from, mail_recivedAt, mail_bodyPreview, mail_content, b.mailbox_color FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_is_open='Y' ORDER BY mail_id DESC");

		$result = $query->getResultArray();

		return $result;

	}

	public function UnreadAllMails(){

		$db = db_connect();
		$query = $db->query("select mail_id, mail_from_name, mail_conversation_id, mail_subject, mail_from, mail_recivedAt, mail_bodyPreview, mail_content, b.mailbox_color FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_is_open='N' ORDER BY mail_id DESC");

		$result = $query->getResultArray();

		return $result;

	}

	public function searchValueInAllTbl($query){

		$db = db_connect();
		$query = $db->query("(select * FROM mails where (mail_from_name LIKE '%$query%' OR mail_to_name LIKE '%$query%') ORDER BY mail_from_name ASC) UNION (select send_mail_id as mail_id, send_mail_to as mail_from, send_mail_from as mail_to, send_mail_subject as mail_subject, send_mail_name as mail_from_name, send_mail_to_name as mail_from_name, send_mail_bodyPreview as mail_bodyPreview from sendmail_details where  (send_mail_to_name LIKE '%$query%' OR send_mail_name LIKE '%$query%') ORDER BY send_mail_to_name ASC) ");

		$result = $query->getResultArray();

		return $result;

	}

	public function searchMineMails($member_Id, $query){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where member_Id='$member_Id' AND mail_flag='assigned' AND (mail_from_name LIKE '%$query%' ) LIMIT 20");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function searchStartMails($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where isStarred='yes' AND mail_mailbox_id='$mailbox_id' AND (mail_from_name LIKE '%$query%' ) LIMIT 20 ");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	// public function searchStartMails($query){
	// 	$db = db_connect();
	// 	$query = $db->query("select * from mails where isStarred='yes' AND (mail_from_name LIKE '%$query%' ) LIMIT 20 ");
	// 	// print_r($query);

	// 	$result = $query->getResultArray();

	// 	return $result;
	// }

	public function searchReminder($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_reminder_id != '0' AND mail_mailbox_id='$mailbox_id' AND (mail_from_name LIKE '%$query%' ) LIMIT 20 ");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function searchTrashMail($query){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_status = 'deleted' AND (mail_from_name LIKE '%$query%' ) LIMIT 20");

		$result = $query->getResultArray();

        return $result;
	}

	public function advancSeachInbox($condition,$mailbox_id){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_flag != 'assigned' AND mail_status != 'deleted' AND mail_mailbox_id='$mailbox_id' $condition");

		$result = $query->getResultArray();

        return $result;

	}

	public function advanceSearchByReminder($condition,$mailbox_id){
		// echo "SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND mail_flag != 'assigned' AND mail_status != 'deleted' AND mail_mailbox_id='$mailbox_id' $condition";
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND mail_flag != 'assigned' AND mail_status != 'deleted' AND mail_mailbox_id='$mailbox_id' $condition");

		$result = $query->getResultArray();

        return $result;
	}

	public function advanceSearchByMine($member_Id, $condition,$mailbox_id){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where member_Id='$member_Id' AND mail_flag='assigned' AND mail_mailbox_id='$mailbox_id' $condition ");


		$result = $query->getResultArray();

		return $result;

	}

	public function advanceMineSerchByReminder($member_Id, $condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND member_Id='$member_Id' AND mail_mailbox_id='$mailbox_id' AND mail_flag='assigned' $condition");

		$result = $query->getResultArray();

        return $result;
	}

	public function advancesearchByAssign($condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_flag='assigned' AND mail_mailbox_id='$mailbox_id' $condition");

		$result = $query->getResultArray();

		return $result;
	}

	public function advSearchByAssiRemin($condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND mail_mailbox_id='$mailbox_id' AND mail_flag='assigned' $condition");

		$result = $query->getResultArray();

        return $result;
	}

	public function advanceSerByStar($condition,$mailbox_id){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where isStarred='yes' AND mail_mailbox_id='$mailbox_id' $condition");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;

	}

	public function advanceSrhStarRemi($condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND isStarred='yes' AND mail_mailbox_id='$mailbox_id' $condition");

		$result = $query->getResultArray();

        return $result;
	}

	public function advanceSearByReminder($condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND mail_reminder_id != '0' AND mail_mailbox_id='$mailbox_id' $condition ");
		// print_r($query);

		$result = $query->getResultArray();

		return $result;
	}

	public function advanceTrashSearch($condition){

		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id where mail_status = 'deleted' $condition");

		$result = $query->getResultArray();

        return $result;

	}

	public function advanceSendMailSerch($condition,$mailbox_id){

		// echo "send=select send_mail_id as mail_id, send_mail_to as mail_from, send_mail_from as mail_to, send_mail_subject as mail_subject, send_mail_name as mail_from_name, send_mail_to_name as mail_from_name, send_mail_bodyPreview as mail_bodyPreview, send_mail_dateTime as mail_recivedAt from sendmail_details where send_mail_mailbox_id='$mailbox_id' AND $condition";

		$db = db_connect();
		$query = $db->query("select send_mail_id as mail_id, send_mail_to as mail_from, send_mail_from as mail_to, send_mail_subject as mail_subject, send_mail_name as mail_from_name, send_mail_to_name as mail_from_name, send_mail_bodyPreview as mail_bodyPreview, send_mail_dateTime as mail_recivedAt, b.mailbox_color from sendmail_details as s INNER JOIN mailbox as b ON s.send_mail_mailbox_id = b.mailbox_id where send_mail_mailbox_id='$mailbox_id' AND $condition");

		$result = $query->getResultArray();

        return $result;

	}

	public function searchSendMailByQury($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select send_mail_id as mail_id, send_mail_to as mail_from, send_mail_from as mail_to, send_mail_subject as mail_subject, send_mail_name as mail_from_name, send_mail_to_name as mail_from_name, send_mail_bodyPreview as mail_bodyPreview, send_mail_dateTime as mail_recivedAt, b.mailbox_color from sendmail_details as s  INNER JOIN mailbox as b ON s.send_mail_mailbox_id = b.mailbox_id 
		WHERE send_mail_mailbox_id='$mailbox_id' AND send_mail_to LIKE '%$query%' LIMIT 20");

		$result = $query->getResultArray();

        return $result;
	}

	public function searchMailByQuery($query,$mailbox_id){
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id WHERE mail_mailbox_id='$mailbox_id' AND mail_from_name LIKE '%$query%' LIMIT 20");

		$result = $query->getResultArray();

        return $result;
	}

	public function advSrchByAllFolderRemi($condition,$mailbox_id){
		$db = db_connect();
		$query = $db->query("SELECT * FROM `mails` LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE r.reminder_flag='active' AND mail_mailbox_id='$mailbox_id' AND $condition");

		$result = $query->getResultArray();

        return $result;
	}

	public function advSerchAllfoldMail($condition,$mailbox_id){
		// echo "select * from mails WHERE mail_mailbox_id='$mailbox_id' AND $condition";
		$db = db_connect();
		$query = $db->query("select mail_id,mail_from, mail_to,mail_subject, mail_from_name, mail_to,mail_to_name, mail_bodyPreview, mail_recivedAt, b.mailbox_color  FROM mails as m INNER JOIN mailbox as b ON m.mail_mailbox_id = b.mailbox_id WHERE mail_mailbox_id='$mailbox_id' AND $condition");
		$result = $query->getResultArray();

        return $result;
	}

	public function getAllReminder(){

		$db = db_connect();
		$query = $db->query("select * from reminder WHERE reminder_flag='active'");
		$result = $query->getResultArray();

        return $result;
	}

	public function updReminderById($reminder_id, $dataArray){

		$result1 = $this->db
            ->table('reminder')
            ->where('reminder_id', $reminder_id)
            ->update($dataArray);

        return $result1;

	}

	public function sortReminder($orderBy){

		$db = db_connect();
		$query = $db->query("SELECT m.mail_from_name, m.mail_id, m.mail_to_name,m.mail_bodyPreview, m.mail_subject, r.reminder_flag, r.reminder_date_time FROM mails as m LEFT JOIN reminder as r ON mail_reminder_id=r.reminder_id WHERE m.mail_reminder_id != '' ORDER BY r.reminder_date_time $orderBy");

		$result = $query->getResultArray();

        return $result;

	}

	public function setAssignMail($data){

		print_r($data);
		
		$result = $this->db
                    ->table('assign_mail_details')
                    ->insert($data);
        return $result;
	}

	public function updateAssignMail($data, $conversation_id){

		$result1 = $this->db
            ->table('assign_mail_details')
            ->where('assign_mail_conv_id', $conversation_id)
            ->update($data);

        return $result1;

	}

}
?>
