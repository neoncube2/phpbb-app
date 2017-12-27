<?php

define('TEST_LOGIN_KEY_URL', 'https://wordsvillebackend.azurewebsites.net/api/get-user-info');

// Thanks to https://www.phpbb.com/community/viewtopic.php?p=4012075#p4012075 for much of this code!
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
 
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

function redirectToIndex() {
	header('Location: /', true, 303);
	
	exit;
}

$probablyShouldNotHappenMessage = ' This probably shouldn\'t happen, so please feel free to contact me at eliblack3@hotmail.com to let me know about this.';

if($user->data['is_registered'])
{
	redirectToIndex();
}
else
{
    $loginKey = request_var('login_key', '', true);
	
	if($loginKey === '') {
		echo 'It looks like the login key wasn\'t specified.' . $probablyShouldNotHappenMessage;
		exit;
	}
	
	$userInfoRaw = file_get_contents(TEST_LOGIN_KEY_URL . '/' . urlencode($loginKey));
	
	$userInfo = json_decode($userInfoRaw);
	
	if(!$userInfo || !$userInfo->username) {
		echo 'Something went wrong retrieving your info from the backend server. If this persists, please feel free to let me know at eliblack3@hotmail.com';
		exit;
	}
	
	$username = $userInfo->username;
	
    $result = $auth->login($username, $loginKey, true, false, true);

    if ($result['status'] == LOGIN_SUCCESS)
    {
		redirectToIndex();
    }
	
	echo '<strong>Failed to log in due to an unhandled or unknown error.</strong><br><br>Please feel free to contact me at eliblack3@hotmail.com if this persists.';
}
?>