<?php
// -------------------------------------------------------------
//
// $Id$
//
// FILENAME  : ucp_remind.php
// STARTED   : Mon May 19, 2003
// COPYRIGHT : � 2003 phpBB Group
// WWW       : http://www.phpbb.com/
// LICENCE   : GPL vs2.0 [ see /docs/COPYING ] 
// 
// -------------------------------------------------------------

class ucp_remind extends module 
{
	function ucp_remind($id, $mode)
	{
		global $censors, $config, $db, $user, $auth, $SID, $template, $phpbb_root_path, $phpEx;

		if (isset($_POST['submit']))
		{
			$username = (!empty($_POST['username'])) ? trim($_POST['username']) : '';
			$email = (!empty($_POST['email'])) ? trim($_POST['email']) : '';

			$sql = 'SELECT user_id, username, user_email, user_active, user_lang
				FROM ' . USERS_TABLE . "
				WHERE user_email = '" . $db->sql_escape($email) . "'
					AND username = '" .  . $db->sql_escape($username) . "'";
			if ($result = $db->sql_query($sql))
			{
				if ($row = $db->sql_fetchrow($result))
				{
					if (!$row['user_active'])
					{
						trigger_error($lang['ACCOUNT_INACTIVE']);
					}

					$server_url = generate_board_url();
					$username = $row['username'];

					$user_actkey = $this->gen_rand_string(10);
					$key_len = 54 - strlen($server_url);
					$key_len = ($str_len > 6) ? $key_len : 6;
					$user_actkey = substr($user_actkey, 0, $key_len);
					$user_password = $this->gen_rand_string(false);

					$sql = 'UPDATE ' . USERS_TABLE . "
						SET user_newpasswd = '" . md5($user_password) . "', user_actkey = '$user_actkey'
						WHERE user_id = " . $row['user_id'];
					$db->sql_query($sql);

					include($phpbb_root_path . 'includes/emailer.'.$phpEx);
					$emailer = new emailer();

					$emailer->use_template('user_activate_passwd', $row['user_lang']);
					$emailer->to($row['user_email']);

					$emailer->assign_vars(array(
						'SITENAME'	=> $config['sitename'],
						'USERNAME'	=> $username,
						'PASSWORD'	=> $user_password,
						'EMAIL_SIG'	=> str_replace('<br />', "\n", "-- \n" . $config['board_email_sig']),

						'U_ACTIVATE'	=> $server_url . "/ucp.$phpEx?mode=activate&k=$user_actkey")
					);
					$emailer->send();
					$emailer->reset();

					meta_refresh(3, "index.$phpEx$SID");

					$message = $lang['PASSWORD_UPDATED'] . '<br /><br />' . sprintf($lang['RETURN_INDEX'],  '<a href="' . "index.$phpEx$SID" . '">', '</a>');

					trigger_error($message);
				}
				else
				{
					trigger_error($lang['NO_EMAIL']);
				}
			}
			else
			{
				trigger_error('Could not obtain user information for sendpassword', E_USER_ERROR);
			}
		}
		else
		{
			$username = '';
			$email = '';
		}

		$template->assign_vars(array(
			'USERNAME'	=> $username,
			'EMAIL'		=> $email)
		);
	}
}

?>