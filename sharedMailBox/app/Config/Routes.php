<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//SHARED MAILBOX ROUTES
$routes->get('/', 'Home::index');
$routes->get('imap_connect', 'Home::imap_connect');
$routes->get('detailMail', 'Home::detailMail');
$routes->get('compose', 'Home::compose');
$routes->get('assigned', 'Home::assignedMails');
$routes->get('assignDetailMailView', 'Home::assignDetailMailView');
$routes->get('addTeamMateView', 'Home::addTeamMateView');
$routes->post('inboxAccess', 'Home::inboxAccess');
$routes->get('getInbox', 'Home::getInbox');
$routes->get('getSendMail', 'Home::getSendMail');
$routes->get('allSendMails', 'Home::allSendMails');
$routes->get('sentMailDetail', 'Home::sentMailDetail');
$routes->get('mailbox', 'Home::mailbox');
$routes->post('addMailbox', 'Home::addMailbox');
$routes->get('getAllMailBox', 'Home::getAllMailBox');
$routes->get('editMailboxView/(:any)', 'Home::editMailboxView');
$routes->post('modifyMailbox', 'Home::modifyMailbox');
$routes->get('deleteMailbox', 'Home::deleteMailbox');
$routes->get('getAllDeletedMailBox', 'Home::getAllDeletedMailBox');
$routes->post('composeMail', 'Home::composeMail');
$routes->post('inviteTeammeber', 'Home::inviteTeammeber');
$routes->get('assignTicketToMem', 'Home::assignTicketToMem');
$routes->get('mineMails/(:any)', 'Home::mineMails');
$routes->get('mineMail', 'Home::mineMails');
$routes->get('getmaildetails', 'Home::getmaildetails');
$routes->post('forwardAndClos', 'Home::forwardAndClos');
$routes->get('replyTomail', 'Home::replyTomail');
$routes->get('ViewTeamMates', 'Home::ViewTeamMates');
$routes->get('editTemMateView/(:any)', 'Home::editTemMateView');
$routes->post('modifyMember', 'Home::modifyMember');
$routes->get('starredMail', 'Home::starredMail');
$routes->get('getStarredMail', 'Home::getStarredMail');
$routes->get('unstarredmail', 'Home::unstarredmail');
$routes->get('setReminder', 'Home::setReminder');
$routes->get('Reminder', 'Home::reminders');
$routes->get('markunread', 'Home::makeunread');
$routes->get('trash', 'Home::trash');
$routes->get('TrashMail', 'Home::TrashMail');
$routes->get('checkFromEmailId', 'Home::checkFromEmailId');
$routes->get('reAssignTicket', 'Home::reAssignTicket');
$routes->get('refresh', 'Home::refresh');
$routes->post('displayMailbox', 'Home::displayMailbox');
$routes->get('multiDelete', 'Home::multiDelete');
$routes->get('searchMails', 'Home::searchMails');
$routes->get('refreshSideBar', 'Home::refreshSideBar');
$routes->get('get_read_unread_mail', 'Home::get_read_unread_mail');
$routes->post('advanceSearch', 'Home::advanceSearch');
$routes->get('updReminder', 'Home::updReminder');
$routes->get('reminderFilter', 'Home::reminderFilter');
$routes->get('createRule', 'Home::createRule');
$routes->get('microsoft_bearer_token', 'Home::microsoft_bearer_token');
$routes->get('ByFolder/(:any)', 'Home::getDataByFolder');



//DOCUMENTATION ROUTES 
$routes->get('apiDocument', 'documentController::apiDocument');
$routes->get('documentation', 'documentController::documentation');

//user  reminderFilter     
// $routes->get('user', 'UserController::index');
// $routes->get('userdetailMail', 'UserController::userdetailMail');
// $routes->get('usercompose', 'UserController::usercompose');
// $routes->get('userassigned', 'UserController::userassigned');
// $routes->get('userassignDetailMailView', 'UserController::userassignDetailMailView');


/* sentMailDetail   createRule
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
