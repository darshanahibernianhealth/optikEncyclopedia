<?php 
 // declare(strict_types=1);

// require_once ROOTPATH.'vendor\autoload.php';

// use PhpImap\Exceptions\ConnectionException;
require_once ROOTPATH . 'vendor\php-imap\php-imap\src\PhpImap\Mailbox.php';
require_once ROOTPATH . 'vendor\php-imap\php-imap\src\PhpImap\Imap.php';



$imap = new PhpImap\Imap();

// $mailbox = new PhpImap\Mailbox(
// 	'{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX', // IMAP server and mailbox folder
// 	'darshanawaghmare9696@gmail.com', // Username for the before configured mailbox
// 	'nrvytwognqwitgrc' // Password for the before configured username
// );

$mailbox = new PhpImap\Mailbox(
    '{imap.mail.outlook.com:993/imap/tls/novalidate-cert}INBOX', // IMAP server and mailbox folder
    'sso.mailbox@hibernianhealth.com', // Username for the before configured mailbox
    '5KH*BXYslk6R' // Password for the before configured username
);

try {
	// Get all emails (messages)
	// PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
	$mailsIds = $mailbox->searchMailbox('ALL');
} catch(PhpImap\Exceptions\ConnectionException $ex) {
	echo "IMAP connection failed: " . implode(",", $ex->getErrors('all'));
	die();
}

// If $mailsIds is empty, no emails could be found
if(!$mailsIds) {
	die('Mailbox is empty');
}

// Get the first message
// If '__DIR__' was defined in the first line, it will automatically
// save all attachments to the specified directory
$mail = $mailbox->getMail($mailsIds[0]);

// Show, if $mail has one or more attachments
echo "\nMail has attachments? ";
if($mail->hasAttachments()) {
	echo "Yes\n";
} else {
	echo "No\n";
}

// Print all information of $mail
// print_r($mail);

// If you don't need to grab attachments you can significantly increase performance of your application
$mailbox->setAttachmentsIgnore(true);

// get the list of folders/mailboxes
$folders = $mailbox->getMailboxes('*');

print_r($folders);

// loop through mailboxs
// foreach($folders as $folder) {

// 	// switch to particular mailbox
// 	$mailbox->switchMailbox($folder['fullpath']);

// 	// search in particular mailbox
// 	$mails_ids[$folder['fullpath']] = $mailbox->searchMailbox('SINCE "1 Oct 2022" BEFORE "3 Oct 2022"');
// }

 $mail_ids = $mailbox->searchMailbox('SINCE "1 Oct 2022" BEFORE "2 Oct 2022"');

// print_r($mail_ids);

// die();
    foreach ($mail_ids as $mail_id) {
        // echo "+------ P A R S I N G ------+\n";
print_r($mail_id);

// die();
        $email = $mailbox->getMail(
            $mail_id, // ID of the email, you want to get
            false // Do NOT mark emails as seen (optional)
        );

        echo 'from-name: '.(string) ($email->fromName ?? $email->fromAddress)."\n";
        echo 'from-email: '.(string) $email->fromAddress."\n";
        echo 'to: '.(string) $email->toString."\n";
        echo 'subject: '.(string) $email->subject."\n";
        echo 'message_id: '.(string) $email->messageId."\n";

        // echo 'mail has attachments? ';
        // if ($email->hasAttachments()) {
        //     echo "Yes\n";
        // } else {
        //     echo "No\n";
        // }

        // if (!empty($email->getAttachments())) {
        //     echo \count($email->getAttachments())." attachements\n";
        // }
        // if ($email->textHtml) {
        //     echo "Message HTML:\n".$email->textHtml;
        // } else {
        //     echo "Message Plain:\n".$email->textPlain;
        // }

        // if (!empty($email->autoSubmitted)) {
        //     // Mark email as "read" / "seen"
        //     $mailbox->markMailAsRead($mail_id);
        //     echo "+------ IGNORING: Auto-Reply ------+\n";
        // }

        // if (!empty($email_content->precedence)) {
        //     // Mark email as "read" / "seen"
        //     $mailbox->markMailAsRead($mail_id);
        //     echo "+------ IGNORING: Non-Delivery Report/Receipt ------+\n";
        // }
    }

?>
