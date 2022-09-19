<?php
// require_once "../vendor/autoload.php";
// echo 'ROOTPATH=='.ROOTPATH;
// die();

require_once ROOTPATH . 'vendor\autoload.php';

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'hiberniansso.us.auth0.com',
  'client_id' => '6be5KOW9GYiodLvMBC2ltA32sHOTEwKz',//'KPFp4FTuurQfQwOAC7qLrH6hjV0XrLZK',
  'client_secret' => 'M8vVI0p-fyFzADxWRYzHUSukfK0y0wN_nyYxn5lie-Zcm82iq9WJgX4CBRYUFFod',//'mIcb1yz0kk7wdc496VXXftH06ZEqU_2XQ7Cn37iKe7ZZCIiyTnuw79AdnyngN0MO',
  'redirect_uri' => 'http://localhost:8080/callback',//http://exercise.org/callback.php',
  'audience' => 'https://hiberniansso.us.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);

?>
