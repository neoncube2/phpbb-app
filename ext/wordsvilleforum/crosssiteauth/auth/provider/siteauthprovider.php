<?php

// From https://area51.phpbb.com/docs/dev/3.1.x/extensions/tutorial_authentication.html#authentication-providers

namespace wordsvilleforum\crosssiteauth\auth\provider;

class siteauthprovider extends \phpbb\auth\provider\base
{
	protected $db;
	
    public function __construct(\phpbb\db\driver\driver_interface $db)
    {
        $this->db = $db;
    }

    /**
     * {@inheritdoc}
     */
    public function login($username, $crossSiteAuthKey)
    {
        // Auth plugins get the password untrimmed.
        // For compatibility we trim() here.
        $crossSiteAuthKey = trim($crossSiteAuthKey);

        // do not allow empty password
        if (!$crossSiteAuthKey)
        {
            return array(
                'status'    => LOGIN_ERROR_PASSWORD,
                'error_msg' => 'NO_PASSWORD_SUPPLIED',
                'user_row'  => array('user_id' => ANONYMOUS),
            );
        }

        if (!$username)
        {
            return array(
                'status'    => LOGIN_ERROR_USERNAME,
                'error_msg' => 'LOGIN_ERROR_USERNAME',
                'user_row'  => array('user_id' => ANONYMOUS),
            );
        }

        $username_clean = utf8_clean_string($username);
		
        $sql = 'SELECT * FROM ' . USERS_TABLE . " WHERE username_clean = '" . $this->db->sql_escape($username_clean) . "'";
		$result = $this->db->sql_query($sql);
        $row = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);
		
		if($row === false) {
			$status = LOGIN_SUCCESS_CREATE_PROFILE;
			
			// Apparently if the user_type is 0, the account is enabled, and if it's 1, it's disabled.
			// Thanks to https://www.phpbb.com/community/viewtopic.php?f=71&t=1967515&start=15#p12248865 for this!
			
			$row = array(
				'username' => $username,
				'user_email' => 'not yet set',
				'group_id' => 2, // Registered users group
				'user_type' => 0
			);
		}
		else {
			$status = LOGIN_SUCCESS;
		}
		
		return array(			
			'status'    => $status,
			'error_msg' => false,
			'user_row'  => $row
		);
    }
}