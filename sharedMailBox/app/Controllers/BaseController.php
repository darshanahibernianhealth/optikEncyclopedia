<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\mailOperation;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function __construct(){

    //Do magic task here
        // session_start();
        $userArray = array(
            'useremail' => 'darshana.waghmare@hibernianhealth.com',
            'username' => 'darshana waghmare',
            'role' => 'admin'
        );
        
        // $userArray = array(
        //     'useremail' => 'darshana@gmail.com',
        //     'username' => 'darshana khedkar',
        //     'role' => 'user'
        // );
        session()->set('user', $userArray);

        $getuser = session()->get('user');

        $user = $getuser['useremail'];

        $mailOperation = new mailOperation();
        $getMemberId = $mailOperation->getMemberId($user);

        $member_mailbox_id =  $getMemberId['member_mailbox_id'];
        $mailbox_id = explode(',',$member_mailbox_id);

        $array = array('user_mailbox_id' => $mailbox_id);

        session()->set('mailbox_session', $array);

    }

    // public function setSesMailbox(){
        

    // }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function valid_email($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = 'true';
        } else{
                $response = 'false';
            }
        return $response;
    }

    public function sidebarOptionValue(){
        $user = session()->get('user');
        $useremail = $user['useremail'];

        $mailOperation = new mailOperation();
        $getMailboxByEamil = $mailOperation->getMemberId($useremail);
        $member_mailbox_id = $getMailboxByEamil['member_mailbox_id'];

        $mailbox_id = explode(',',$member_mailbox_id);

        $MailboxCount = sizeof($mailbox_id);
        for($i=0; $i<$MailboxCount; $i++){
            // echo 'mailbixid=='.$mailbox_id[$i];
            $result['getAllMailCount'] = count($mailOperation->getMailbyMailbox($mailbox_id[$i]));
        }

        $getMemberId = $mailOperation->getMemberId($useremail);
        $member_Id = $getMemberId['member_id'];
        $result['getAllMineCount'] = count($mailOperation->getMailsByMember($member_Id));

        $result['getAllAssignCount'] = count($mailOperation->getAllAssignMails());

        $result['memberCount'] = $mailOperation->memberCount();

        $result['reminderCount'] = count($mailOperation->getReminder($useremail));

        $result['starmailCount'] = count($mailOperation->getStarMailByUser($useremail));
        $result['trashMailCount'] = count($mailOperation->getTrashMail());

        // print_r($result);

        return $result;
    }
}
