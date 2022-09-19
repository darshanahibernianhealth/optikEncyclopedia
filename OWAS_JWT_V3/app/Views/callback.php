<?php

//require "vendor/autoload.php";
// echo 'ROOTPATH='.ROOTPATH;
// die();
require ROOTPATH."init.php";


/*use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'hiberniansso.us.auth0.com',
  'client_id' => 'PXmEdrMXZ5bwkiJ5D5oLdxrhWbLH0xSm',  //'KPFp4FTuurQfQwOAC7qLrH6hjV0XrLZK', 
  'client_secret' => 'DYDwGAlcH_Xc8fWVCo_nSaRE9cVBTiHVlC0vuV7y-tDwR14FIv9w50FVXHc6Phxk', //'mIcb1yz0kk7wdc496VXXftH06ZEqU_2XQ7Cn37iKe7ZZCIiyTnuw79AdnyngN0MO',
  'redirect_uri' => 'https://hibernianhealth.com/callback.php',//'http://exercise.org/callback.php',
  'audience' => 'https://hiberniansso.us.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);*/

$userinfo = $auth0->getUser();
if(!$userinfo)
{
	die("Error while logging you in, Please try again");
}
else
{
	var_dump($userinfo);
}

?>
