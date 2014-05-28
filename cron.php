<?php
/**
*
* @package phpBB3
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
*/
define('IN_PHPBB', true);
define('IN_CRON', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Do not update users last page entry
$user->session_begin(false);
$auth->acl($user->data);

function output_image()
{
	// Output transparent gif
	header('Cache-Control: no-cache');
	header('Content-type: image/gif');
	header('Content-length: 43');

	echo base64_decode('R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');

	// Flush here to prevent browser from showing the page as loading while
	// running cron.
	flush();
}

// Thanks to various fatal errors and lack of try/finally, it is quite easy to leave
// the cron lock locked, especially when working on cron-related code.
//
// Attempt to alleviate the problem by doing setup outside of the lock as much as possible.
//
// If DEBUG is defined and cron lock cannot be obtained, a message will be printed.

$cron_type = request_var('cron_type', '');

// Comment this line out for debugging so the page does not return an image.
output_image();

$cron_lock = $phpbb_container->get('cron.lock_db');
if ($cron_lock->acquire())
{
	$cron = $phpbb_container->get('cron.manager');

	$task = $cron->find_task($cron_type);
	if ($task)
	{
		if ($task->is_parametrized())
		{
			$task->parse_parameters($request);
		}
		if ($task->is_ready())
		{
			$task->run();
			garbage_collection();
		}
	}
	$cron_lock->release();

}
else
{
	if (defined('DEBUG'))
	{
		echo $user->lang('CRON_LOCK_ERROR') . "\n";
	}
}
