<?php
/***************************************************************************
 *                              memberlist.php
 *                            -------------------
 *   begin                : Friday, May 11, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id$
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

// Start session management
$user->start();
$user->setup();
$auth->acl($user->data);
// End session management


// Can this user view profiles/memberslist?
if (!$auth->acl_gets('u_viewprofile', 'a_'))
{
	trigger_error($user->lang['NO_VIEW']);
}


// Grab data
$mode = (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : '';

$start = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
$form = (!empty($_GET['form'])) ? $_GET['form'] : 0;
$field = (isset($_GET['field'])) ? $_GET['field'] : 'username';

$sort_key = (!empty($_REQUEST['sk'])) ? htmlspecialchars($_REQUEST['sk']) : 'c';
$sort_dir = (!empty($_REQUEST['sd'])) ? htmlspecialchars($_REQUEST['sd']) : 'a';

$username = (!empty($_REQUEST['username'])) ? trim($_REQUEST['username']) : '';
$email = (!empty($_REQUEST['email'])) ? trim($_REQUEST['email']) : '';
$icq = (!empty($_REQUEST['icq'])) ? intval($_REQUEST['icq']) : '';
$aim = (!empty($_REQUEST['aim'])) ? trim($_REQUEST['aim']) : '';
$yahoo = (!empty($_REQUEST['yahoo'])) ? trim($_REQUEST['yahoo']) : '';
$msn = (!empty($_REQUEST['msn'])) ? trim($_REQUEST['msn']) : '';

$joined_select = (!empty($_REQUEST['joined_select'])) ? $_REQUEST['joined_select'] : 'lt';
$active_select = (!empty($_REQUEST['active_select'])) ? $_REQUEST['active_select'] : 'lt';
$count_select = (!empty($_REQUEST['count_select'])) ? $_REQUEST['count_select'] : 'eq';
$joined = (!empty($_REQUEST['joined'])) ? explode('-', trim($_REQUEST['joined'])) : array();
$active = (!empty($_REQUEST['active'])) ? explode('-', trim($_REQUEST['active'])) : array();
$count = (!empty($_REQUEST['count'])) ? intval($_REQUEST['count']) : '';
$ipdomain = (!empty($_REQUEST['ip'])) ? trim($_REQUEST['ip']) : '';


// Grab rank information for later
$sql = "SELECT * 
	FROM " . RANKS_TABLE . " 
	ORDER BY rank_special, rank_min DESC";
$result = $db->sql_query($sql, 120);

$ranksrow = array();
while ($row = $db->sql_fetchrow($result))
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);


// Memberlist sorting
$sort_key_text = array('a' => $user->lang['SORT_USERNAME'], 'b' => $user->lang['SORT_LOCATION'], 'c' => $user->lang['SORT_JOINED'], 'd' => $user->lang['SORT_POST_COUNT'], 'e' => $user->lang['SORT_EMAIL'], 'f' => $user->lang['WEBSITE'], 'g' => $user->lang['ICQ'], 'h' => $user->lang['AIM'], 'i' => $user->lang['MSNM'], 'j' => $user->lang['YIM'], 'k' => $user->lang['SORT_LAST_ACTIVE']);
$sort_key_sql = array('a' => 'username', 'b' => 'user_from', 'c' => 'user_regdate', 'd' => 'user_posts', 'e' => 'user_email', 'f' => 'user_website', 'g' => 'user_icq', 'h' => 'user_aim', 'i' => 'user_msnm', 'j' => 'user_yim', 'k' => 'user_lastvisit');

$sort_dir_text = array('a' => $user->lang['ASCENDING'], 'd' => $user->lang['DESCENDING']);

$s_sort_key = '<select name="sk">';
foreach ($sort_key_text as $key => $value)
{
	$selected = ($sort_key == $key) ? ' selected="selected"' : '';
	$s_sort_key .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
}
$s_sort_key .= '</select>';

$s_sort_dir = '<select name="sd">';
foreach ($sort_dir_text as $key => $value)
{
	$selected = ($sort_dir == $key) ? ' selected="selected"' : '';
	$s_sort_dir .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
}
$s_sort_dir .= '</select>';




// Additional sorting options for user search
$where_sql = '';
if ($mode == 'searchuser')
{
	$find_key_match = array('lt' => '<', 'gt' => '>', 'eq' => '=');

	$find_count = array('lt' => $user->lang['LESS_THAN'], 'eq' => $user->lang['EQUAL_TO'], 'gt' => $user->lang['MORE_THAN']);
	$s_find_count = '';
	foreach ($find_count as $key => $value)
	{
		$selected = ($count_select == $key) ? ' selected="selected"' : '';
		$s_find_count .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
	}

	$find_time = array('lt' => $user->lang['BEFORE'], 'gt' => $user->lang['AFTER']);
	$s_find_join_time = '';
	foreach ($find_time as $key => $value)
	{
		$selected = ($joined_select == $key) ? ' selected="selected"' : '';
		$s_find_join_time .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
	}

	$s_find_active_time = '';
	foreach ($find_time as $key => $value)
	{
		$selected = ($active_select == $key) ? ' selected="selected"' : '';
		$s_find_active_time .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
	}

	$where_sql .= ($username) ? " AND username LIKE '" . str_replace('*', '%', $db->sql_escape($username)) ."'" : '';
	$where_sql .= ($email) ? " AND user_email LIKE '" . str_replace('*', '%', $db->sql_escape($email)) ."' " : '';
	$where_sql .= ($icq) ? " AND user_icq LIKE '" . str_replace('*', '%', $db->sql_escape($icq)) ."' " : '';
	$where_sql .= ($aim) ? " AND user_aim LIKE '" . str_replace('*', '%', $db->sql_escape($aim)) ."' " : '';
	$where_sql .= ($yahoo) ? " AND user_yim LIKE '" . str_replace('*', '%', $db->sql_escape($yahoo)) ."' " : '';
	$where_sql .= ($msn) ? " AND user_msnm LIKE '" . str_replace('*', '%', $db->sql_escape($msn)) ."' " : '';
	$where_sql .= ($joined) ? " AND user_regdate " . $find_key_match[$joined_select] . " " . gmmktime(0, 0, 0, intval($joined[1]), intval($joined[2]), intval($joined[0])) : '';
	$where_sql .= ($count) ? " AND user_posts " . $find_key_match[$count_select] . " $count " : '';
	$where_sql .= ($active) ? " AND user_lastvisit " . $find_key_match[$active_select] . " " . gmmktime(0, 0, 0, $active[1], intval($active[2]), intval($active[0])) : '';

	if (!empty($ipdomain))
	{
		$ips = (preg_match('#[a-z]#', $ipdomain)) ? implode(', ', preg_replace('#([0-9]{1,3}\.[0-9]{1,3}[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})#', "'\\1'", gethostbynamel($ipdomain))) : "'" . str_replace('*', '%', $ipdomain) . "'";

		$sql = "SELECT DISTINCT poster_id 
			FROM " . POSTS_TABLE . " 
			WHERE poster_ip " . ((preg_match('#%#', $ips)) ? 'LIKE' : 'IN') . " ($ips)";
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			$ip_sql = '';
			do
			{
				$ip_sql .= (($ip_sql != '') ? ', ' : '') . $row['poster_id'];
			}
			while ($row = $db->sql_fetchrow($result));

			$where_sql .= " AND user_id IN ($ip_sql)";
		}
		else
		{
			// A minor fudge but it does the job :D
			$where_sql .= " AND user_id IN ('-1')";
		}
	}
}
else
{
	$where_sql = ' AND user_active = 1';
}

// Sorting and order
$order_by = $sort_key_sql[$sort_key] . '  ' . (($sort_dir == 'a') ? 'ASC' : 'DESC');

// Count the users ...
$sql = "SELECT COUNT(user_id) AS total_users
	FROM " . USERS_TABLE . "
	WHERE user_id <> " . ANONYMOUS . "
	$where_sql";
$result = $db->sql_query($sql);

$total_users = ($row = $db->sql_fetchrow($result)) ? $row['total_users'] : 0;

// Pagination string
$pagination_url = ($mode == 'searchuser') ? "memberlist.$phpEx$SID&amp;mode=searchuser&amp;form=$form&amp;field=$field&amp;username=" . urlencode($username) . "&amp;email=" . urlencode($email) . "&amp;icq=$icq&amp;aim=" . urlencode($aim) . "&amp;yahoo=" . urlencode($yahoo) . "&amp;msn=" . urlencode($msn) . "&amp;joined=" . urlencode(implode('-', $joined)) . "&amp;active=" . urlencode(implode('-', $active)) . "&amp;count=$count&amp;ip=" . urlencode($ipdomain)  . "&amp;sd=$sort_dir&amp;sk=$sort_key&amp;joined_select=$joined_select&amp;active_select=$active_select&amp;count_select=$count_select" : "memberlist.$phpEx$SID&amp;mode=$mode&amp;sk=$sort_key&amp;sd=$sort_dir";

// Some search user specific data
if ($mode == 'searchuser')
{
	$template->assign_vars(array(
		'USERNAME'	=> $username,
		'EMAIL'		=> $email,
		'ICQ'		=> $icq,
		'AIM'		=> $aim,
		'YAHOO'		=> $yahoo,
		'MSNM'		=> $msn,
		'JOINED'	=> implode('-', $joined),
		'ACTIVE'	=> implode('-', $active),
		'COUNT'		=> $count,  
		'IP'		=> $ipdomain, 

		'S_SEARCH_USER' 		=> true,
		'S_FORM_NAME' 			=> $form,
		'S_FIELD_NAME' 			=> $field,
		'S_COUNT_OPTIONS' 		=> $s_find_count,
		'S_SORT_OPTIONS' 		=> $s_sort_key,
		'S_USERNAME_OPTIONS'	=> $username_list,
		'S_JOINED_TIME_OPTIONS' => $s_find_join_time,
		'S_ACTIVE_TIME_OPTIONS' => $s_find_active_time,
		'S_SEARCH_ACTION' 		=> "memberslist.$phpEx$SID&amp;mode=searchuser&amp;field=$field")
	);
}

// Do the SQL thang
$sql = "SELECT username, user_id, user_viewemail, user_posts, user_regdate, user_rank, user_from, user_website, user_email, user_icq, user_aim, user_yim, user_msnm, user_avatar, user_avatar_type, user_allowavatar, user_lastvisit
	FROM " . USERS_TABLE . "
	WHERE user_id <> " . ANONYMOUS . "
	$where_sql
	ORDER BY $order_by
	LIMIT $start, " . $config['topics_per_page'];
$result = $db->sql_query($sql);

if ($row = $db->sql_fetchrow($result))
{
	$i = 0;
	do
	{
		$username = $row['username'];
		$user_id = intval($row['user_id']);

		$from = (!empty($row['user_from'])) ? $row['user_from'] : '&nbsp;';
		$joined = $user->format_date($row['user_regdate'], $user->lang['DATE_FORMAT']);
		$posts = ($row['user_posts']) ? $row['user_posts'] : 0;

		$poster_avatar = '';
		if ($row['user_avatar_type'] && $user_id && $row['user_allowavatar'])
		{
			switch($row['user_avatar_type'])
			{
				case USER_AVATAR_UPLOAD:
					$poster_avatar = ($config['allow_avatar_upload']) ? '<img src="' . $config['avatar_path'] . '/' . $row['user_avatar'] . '" alt="" border="0" />' : '';
					break;

				case USER_AVATAR_REMOTE:
					$poster_avatar = ($config['allow_avatar_remote']) ? '<img src="' . $row['user_avatar'] . '" alt="" border="0" />' : '';
					break;

				case USER_AVATAR_GALLERY:
					$poster_avatar = ($config['allow_avatar_local']) ? '<img src="' . $config['avatar_gallery_path'] . '/' . $row['user_avatar'] . '" alt="" border="0" />' : '';
					break;
			}
		}

		$rank_title = $rank_img = '';
		foreach ($ranksrow as $rank)
		{
			if (empty($row['user_rank']) && $row['user_posts'] >= $rank['rank_min'])
			{
				$rank_title = $rank['rank_title'];
				$rank_img = (!empty($rank['rank_image'])) ? '<img src="' . $rank['rank_image'] . '" border="0" alt="' . $rank_title . '" title="' . $rank_title . '" /><br />' : '';
				break;
			}

			if (!empty($rank['rank_special']) && $row['user_rank'] == $rank['rank_id'])
			{
				$rank_title = $rank['rank_title'];
				$rank_img = (!empty($rank['rank_image'])) ? '<img src="' . $rank['rank_image'] . '" border="0" alt="' . $rank_title . '" title="' . $rank_title . '" /><br />' : '';
				break;
			}
		}

		if ($row['user_viewemail'] || $auth->acl_get('a_'))
		{
			$email_uri = ($config['board_email_form']) ? "ucp.$phpEx$SID&amp;mode=email&amp;u=" . $user_id : 'mailto:' . $row['user_email'];

			$email_img = '<a href="' . $email_uri . '">' . $user->img('icon_email', $user->lang['Send_email']) . '</a>';
			$email = '<a href="' . $email_uri . '">' . $user->lang['Send_email'] . '</a>';
		}
		else
		{
			$email_img = '&nbsp;';
			$email = '&nbsp;';
		}

		$temp_url = "ucp.$phpEx$SID&amp;mode=viewprofile&amp;u=$user_id";
		$profile_img = '<a href="' . $temp_url . '">' . $user->img('icon_profile', $user->lang['Read_profile']) . '</a>';
		$profile = '<a href="' . $temp_url . '">' . $user->lang['Read_profile'] . '</a>';

		$temp_url = "privmsg.$phpEx$SID&amp;mode=post&amp;u=$user_id";
		$pm_img = '<a href="' . $temp_url . '">' . $user->img('icon_pm', $user->lang['Send_private_message']) . '</a>';
		$pm = '<a href="' . $temp_url . '">' . $user->lang['Send_private_message'] . '</a>';

		$www_img = ($row['user_website']) ? '<a href="' . $row['user_website'] . '" target="_userwww">' . $user->img('icon_www', $user->lang['Visit_website']) . '</a>' : '';
		$www = ($row['user_website']) ? '<a href="' . $row['user_website'] . '" target="_userwww">' . $user->lang['Visit_website'] . '</a>' : '';

		if (!empty($row['user_icq']))
		{
			$icq_status_img = '<a href="http://wwp.icq.com/' . $row['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $row['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
			$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $row['user_icq'] . '">' . $user->img('icon_icq', $user->lang['ICQ']) . '</a>';
			$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $row['user_icq'] . '">' . $user->lang['ICQ'] . '</a>';
		}
		else
		{
			$icq_status_img = '';
			$icq_img = '';
			$icq = '';
		}

		$aim_img = ($row['user_aim']) ? '<a href="aim:goim?screenname=' . $row['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $user->img('icon_aim', $user->lang['AIM']) . '</a>' : '';
		$aim = ($row['user_aim']) ? '<a href="aim:goim?screenname=' . $row['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $user->lang['AIM'] . '</a>' : '';

		$temp_url = "ucp.$phpEx$SID&amp;mode=viewprofile&amp;u=$user_id";
		$msn_img = ($row['user_msnm']) ? '<a href="' . $temp_url . '">' . $user->img('icon_msnm', $user->lang['MSNM']) . '</a>' : '';
		$msn = ($row['user_msnm']) ? '<a href="' . $temp_url . '">' . $user->lang['MSNM'] . '</a>' : '';

		$yim_img = ($row['user_yim']) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $row['user_yim'] . '&amp;.src=pg">' . $user->img('icon_yim', $user->lang['YIM']) . '</a>' : '';
		$yim = ($row['user_yim']) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $row['user_yim'] . '&amp;.src=pg">' . $user->lang['YIM'] . '</a>' : '';

		$temp_url = "search.$phpEx$SID&amp;search_author=" . urlencode($username) . "&amp;showresults=posts";
		$search_img = '<a href="' . $temp_url . '">' . $user->img('icon_search', $user->lang['Search_user_posts']) . '</a>';
		$search = '<a href="' . $temp_url . '">' . $user->lang['Search_user_posts'] . '</a>';

		$template->assign_block_vars('memberrow', array(
			'ROW_NUMBER'	=> $i + ($start + 1),
			'USERNAME'		=> $username,
			'FROM'			=> $from,
			'JOINED'		=> $joined,
			'POSTS'			=> $posts,
			'AVATAR_IMG'	=> $poster_avatar,
			'PROFILE_IMG'	=> $profile_img,
			'PROFILE'		=> $profile,
			'SEARCH_IMG'	=> $search_img,
			'SEARCH'		=> $search,
			'PM_IMG'		=> $pm_img,
			'PM'			=> $pm,
			'EMAIL_IMG'		=> $email_img,
			'EMAIL'			=> $email,
			'WWW_IMG'		=> $www_img,
			'WWW'			=> $www,
			'ICQ_STATUS_IMG'=> $icq_status_img,
			'ICQ_IMG'		=> $icq_img,
			'ICQ'			=> $icq,
			'AIM_IMG'		=> $aim_img,
			'AIM'			=> $aim,
			'MSN_IMG'		=> $msn_img,
			'MSN'			=> $msn,
			'YIM_IMG'		=> $yim_img,
			'YIM'			=> $yim,
			'ACTIVE'		=> $row['user_last_active'],
			'RANK_TITLE'	=> $rank, 
			'RANK_IMG'		=> $rank_img, 

			'S_ROW_COUNT'	=> $i,

			'U_VIEWPROFILE'		=> "ucp.$phpEx$SID&amp;mode=viewprofile&amp;u=$user_id")
		);

		$i++;
	}
	while ($row = $db->sql_fetchrow($result));
}

// Generate page
$template->assign_vars(array(
	'PAGINATION' 	=> generate_pagination($pagination_url, $total_users, $config['topics_per_page'], $start),
	'PAGE_NUMBER' 	=> on_page($total_users, $config['topics_per_page'], $start),

	'U_FIND_MEMBER'		=> "memberlist.$phpEx$SID&amp;mode=searchuser", 
	'U_SORT_USERNAME'	=> "memberlist.$phpEx$SID&amp;sk=a&amp;sd=" . (($sort_key == 'a' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_FROM'		=> "memberlist.$phpEx$SID&amp;sk=b&amp;sd=" . (($sort_key == 'b' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_JOINED'		=> "memberlist.$phpEx$SID&amp;sk=c&amp;sd=" . (($sort_key == 'c' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_POSTS'		=> "memberlist.$phpEx$SID&amp;sk=d&amp;sd=" . (($sort_key == 'd' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_EMAIL'		=> "memberlist.$phpEx$SID&amp;sk=e&amp;sd=" . (($sort_key == 'e' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_WEBSITE'	=> "memberlist.$phpEx$SID&amp;sk=f&amp;sd=" . (($sort_key == 'f' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_ICQ'		=> "memberlist.$phpEx$SID&amp;sk=g&amp;sd=" . (($sort_key == 'g' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_AIM'		=> "memberlist.$phpEx$SID&amp;sk=h&amp;sd=" . (($sort_key == 'h' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_MSN'		=> "memberlist.$phpEx$SID&amp;sk=i&amp;sd=" . (($sort_key == 'i' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_YIM'		=> "memberlist.$phpEx$SID&amp;sk=j&amp;sd=" . (($sort_key == 'j' && $sort_dir == 'a') ? 'd' : 'a'), 
	'U_SORT_ACTIVE'		=> "memberlist.$phpEx$SID&amp;sk=k&amp;sd=" . (($sort_key == 'k' && $sort_dir == 'a') ? 'd' : 'a'), 

	'S_MODE_SELECT' => $s_sort_key,
	'S_ORDER_SELECT'=> $s_sort_dir,
	'S_MODE_ACTION' => "memberlist.$phpEx$SID&amp;mode=$mode&amp;form=$form")
);


// Output the page
$page_title = $user->lang['Memberlist'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'memberlist_body.html')
);
make_jumpbox('viewforum.'.$phpEx);

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>