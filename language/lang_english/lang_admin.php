<?php

// --------------------
// Main Admin section/s
// --------------------

//
// Index
//
$lang['Admin'] = "Administration";
$lang['Not_admin'] = "You are not authorised to administer this board";
$lang['Welcome_phpBB'] = "Welcome to phpBB";
$lang['Admin_intro'] = "Thank you for choosing phpBB as your forum solution. This screen will give you a quick overview of all the various statistics of your board. You can get back to this page by clicking on the <u>Admin Index</u> link in the left pane. To return to the index of your board, click the phpBB logo also in the left pane. The other links on the left hand side of this screen will allow you to control every aspect of your forum experience, each screen will have instructions on how to use the tools.";
$lang['Forum_stats'] = "Forum Statistics";
$lang['Admin_Index'] = "Admin Index";
$lang['Preview_forum'] = "Preview Forum";

$lang['Statistic'] = "Statistic";
$lang['Value'] = "Value";
$lang['Number_posts'] = "Number of posts";
$lang['Posts_per_day'] = "Posts per day";
$lang['Number_topics'] = "Number of topics";
$lang['Topics_per_day'] = "Topics per day";
$lang['Number_users'] = "Number of users";
$lang['Users_per_day'] = "Users per day";
$lang['Board_started'] = "Board started";
$lang['Avatar_dir_size'] = "Avatar directory size";
$lang['Database_size'] = "Database size";
$lang['Gzip_compression'] ="Gzip compression";
$lang['Not_available'] = "Not available";


//
// DB Utils
//
$lang['Database_Utilities'] = "Database Utilities";
$lang['Restore'] = "Restore";
$lang['Backup'] = "Backup";
$lang['Restore_explain'] = "This will perform a full restore of all phpBB tables from a saved file. If your server supports it you may upload a gzip compressed text file and it will automatically be decompressed. <b>WARNING</b> This will overwrite any existing data. The restore may take a long time to process please do not move from this page till it is complete.";
$lang['Backup_explain'] = "Here you can backup all your phpBB related data. If you have any additional custom tables in the same database with phpBB that you would like to back up as well please enter their names seperated by commas in the Additional Tables textbox below. If your server supports it you may also gzip compress the file to reduce its size before download.";
$lang['Backup_options'] = "Backup options";
$lang['Start_backup'] = "Start Backup";
$lang['Full_backup'] = "Full backup";
$lang['Structure_backup'] = "Structure Only backup";
$lang['Data_backup'] = "Data only backup";
$lang['Additional_tables'] = "Additional tables";
$lang['Gzip_compress'] = "Gzip compress file";
$lang['Select_file'] = "Select a file";
$lang['Start_Restore'] = "Start Restore";
$lang['Restore_success'] = "The Database has been successfully restored.<br /><br />Your board should be back to the state it was when the backup was made.";
$lang['Backup_download'] = "Your download will start shortly please wait till it begins";
$lang['Backups_not_supported'] = "Sorry but database backups are not currently supported for your database system";

$lang['Restore_Error_uploading'] = "Error in uploading the backup file";
$lang['Restore_Error_filename'] = "Filename problem, please try an alternative file";
$lang['Restore_Error_decompress'] = "Cannot decompress a gzip file, please upload a plain text version";
$lang['Restore_Error_no_file'] = "No file was uploaded";


//
// Auth pages
//
$lang['Administrator'] = "Administrator";
$lang['User'] = "User";
$lang['Group'] = "Group";
$lang['Forum'] = "Forum";
$lang['Select_a'] = "Select a"; // followed by on the entries above
$lang['Auth_Control'] = "Authorisation Control"; // preceeded by one of the above options
$lang['Look_up'] = "Look up"; // preceeded by one of the above options

$lang['Group_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each user group. Do not forget when changing group permissions that individual user permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['User_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each individual user. Do not forget when changing user permissions that group permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['Forum_auth_explain'] = "Here you can alter the authorisation levels of each forum. You will have both a simple and advanced method for doing this, advanced offers greater control of each forum operation. Remember that changing the permission level of forums will affect which users can carry out the various operations within them.";

$lang['Simple_mode'] = "Simple Mode";
$lang['Advanced_mode'] = "Advanced Mode";
$lang['Moderator_status'] = "Moderator status";

$lang['Allowed_Access'] = "Allowed Access";
$lang['Disallowed_Access'] = "Disallowed Access";
$lang['Is_Moderator'] = "Is Moderator";
$lang['Not_Moderator'] = "Not Moderator";

$lang['Conflict_warning'] = "Authorisation Conflict Warning";
$lang['Conflict_message_userauth'] = "This user still has access/moderator rights to this forum via group membership. You may want to alter the group authorisation or remove this user the group to fully prevent them having access/moderator rights. The groups granting rights are noted below.";
$lang['Conflict_message_groupauth'] = "The following user/s still have access/moderator rights to this forum via their user auth settings. You may want to alter the user authorisation/s to fully prevent them having access/moderator rights. The users granted rights are noted below.";

$lang['has_moderator_status'] = "has moderator status on";
$lang['has_access_status'] = "has access status to";
$lang['grants_access_status'] = "grants access status to";
$lang['grants_moderator_status'] = "grants moderator status to";
$lang['for_this_user'] = "for this user";

$lang['Submit_changes'] = "Submit changes";
$lang['Reset_changes'] = "Reset changes";

$lang['Public'] = "Public";
$lang['Private'] = "Private";
$lang['Registered'] = "Registered";
$lang['Administrators'] = "Administrators";
$lang['Hidden'] = "Hidden";

$lang['View'] = "View";
$lang['Read'] = "Read";
$lang['Post'] = "Post";
$lang['Reply'] = "Reply";
$lang['Edit'] = "Edit";
$lang['Delete'] = "Delete";
$lang['Sticky'] = "Sticky";
$lang['Announce'] = "Announce"; 
$lang['Vote'] = "Vote";
$lang['Pollcreate'] = "Poll create";

$lang['Permissions'] = "Permissions";
$lang['Simple_Permission'] = "Simple Permission";

$lang['This_user_is'] = "This user is a"; // followed by User/Administrator and then next line
$lang['and_belongs_groups'] = "and belongs to the following groups"; // followed by list of groups

$lang['Group_has_members'] = "This group has the following members";

$lang['Forum_auth_updated'] = "Forum permissions updated";
$lang['User_auth_updated'] = "User permissions updated";
$lang['Group_auth_updated'] = "Group permissions updated";
$lang['return_forum_auth_admin'] = "to return to the forum permissions panel";
$lang['return_group_auth_admin'] = "to return to the group permissions panel";
$lang['return_user_auth_admin'] = "to return to the user permissions panel";


//
// Banning
//
$lang['Ban_control'] = "Ban Control";
$lang['Ban_explain'] = "Here you can control the banning of users. You can achieve this by banning either or both of a specific user or an individual or range of IP addresses or hostnames. These methods prevent a user from even reaching the index page of your board. To prevent a user from registering under a different username you can also specify a banned email address. Please note that banning an email address alone will not prevent that user from being able to logon or post to your board, you should use one of the first two methods to achieve this.";
$lang['Ban_explain_warn'] = "Please note that entering a range of IP addresses results in all the addresses between the start and end being added to the banlist. Attempts will be made to minimise the number of addresses added to the database by introducing wildcards automatically where appropriate. If you really must enter a range try to keep it small or better yet state specific addresses.";

$lang['Ban_username'] = "Ban one or more specific users";
$lang['Ban_username_explain'] = "You can ban multiple users in one go using the appropriate combination of mouse and keyboard for your computer and browser";
$lang['Ban_IP'] = "Ban one or more IP addresses or hostnames";
$lang['IP_hostname'] = "IP addresses or hostnames";
$lang['Ban_IP_explain'] = "To specify several different IP's or hostnames separate them with commas. To specify a range of IP addresses separate the start and end with a hyphen (-), to specify a wildcard use *";
$lang['Ban_email'] = "Ban one or more email addresses";
$lang['Ban_email_explain'] = "To specify more than one email address separate them with commas. To specify a wildcard username use *, for example *@hotmail.com";

$lang['Unban_username'] = "Un-ban one more specific users";
$lang['Unban_username_explain'] = "You can unban multiple users in one go using the appropriate combination of mouse and keyboard for your computer and browser";
$lang['Unban_IP'] = "Un-ban one or more IP addresses";
$lang['Unban_IP_explain'] = "You can unban multiple IP addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";
$lang['Unban_email'] = "Un-ban one or more email addresses";
$lang['Unban_email_explain'] = "You can unban multiple email addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['No_banned_users'] = "No banned users";
$lang['No_banned_ip'] = "No banned IP addresses";
$lang['No_banned_email'] = "No banned email addresses";
$lang['No_unban'] = "Leave list unchanged";

$lang['Ban_update_sucessful'] = "The banlist has been updated sucessfully";


//
// Configuration
//
$lang['General_Config'] = "General Configuration";
$lang['Config_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side.";
$lang['General_settings'] = "General Board Settings";
$lang['Site_name'] = "Site name";
$lang['Site_desc'] = "Site description";
$lang['Acct_activation'] = "Enable account activation";

$lang['Abilities_settings'] = "User/Forum Ability Settings";
$lang['Flood_Interval'] = "Flood Interval";
$lang['Flood_Interval_explain'] = "Number of seconds a user must wait between posts"; 
$lang['Board_email_form'] = "User email via board";
$lang['Board_email_form_explain'] = "Users send email to each other via this board";
$lang['Topics_per_page'] = "Topics Per Page";
$lang['Posts_per_page'] = "Posts Per Page";
$lang['Hot_threshold'] = "Hot Threshold";
$lang['Default_style'] = "Default Style";
$lang['Override_style'] = "Override user style";
$lang['Override_style_explain'] = "Replaces users style with the default";
$lang['Default_language'] = "Default Language";
$lang['Date_format'] = "Date Format";
$lang['System_timezone'] = "System Timezone";
$lang['Enable_gzip'] = "Enable GZip Compression";
$lang['Enable_prune'] = "Enable Forum Pruning";
$lang['Allow_HTML'] = "Allow HTML";
$lang['Allow_BBCode'] = "Allow BBCode";
$lang['Allowed_tags'] = "Allowed HTML tags";
$lang['Allowed_tags_explain'] = "Seperate tags with commas";
$lang['Allow_smilies'] = "Allow Smilies";
$lang['Smilies_path'] = "Smilies Storage Path";
$lang['Smilies_path_explain'] = "Path under your phpBB root dir, e.g. images/smilies";
$lang['Allow_sig'] = "Allow Signatures";
$lang['Max_sig_length'] = "Maximum signature length";
$lang['Max_sig_length_explain'] = "Most number of characters allowed in a users signature";
$lang['Allow_name_change'] = "Allow Name Change";
$lang['Avatar_settings'] = "Avatar Settings";
$lang['Allow_local'] = "Allow local gallery avatars";
$lang['Allow_remote'] = "Allow remote avatars";
$lang['Allow_remote_explain'] = "Avatars linked from another website";
$lang['Allow_upload'] = "Allow avatar uploading";
$lang['Max_filesize'] = "Max. Avatar File Size";
$lang['Max_filesize_explain'] = "For uploaded avatar files";
$lang['Max_avatar_size'] = "Max. Avatar Size";
$lang['Max_avatar_size_explain'] = "(height x width)";
$lang['Avatar_storage_path'] = "Avatar Storage Path";
$lang['Avatar_storage_path_explain'] = "Path under your phpBB root dir, e.g. images/avatars";
$lang['Avatar_gallery_path'] = "Avatar Gallery Path";
$lang['Avatar_gallery_path_explain'] = "Path under your phpBB root dir for pre-loaded images, e.g. images/avatars/gallery";
$lang['COPPA_settings'] = "COPPA Settings";
$lang['COPPA_fax'] = "COPPA Fax Number";
$lang['COPPA_mail'] = "COPPA Mailing Address";
$lang['COPPA_mail_explain'] = "This is the mailing address where parents will send COPPA registration forms";
$lang['Email_settings'] = "Email Settings";
$lang['Admin_email'] = "Admin Email Address";
$lang['Email_sig'] = "Email Signature";
$lang['Email_sig_explain'] = "This text will be attached to all emails the board sends";
$lang['Use_SMTP'] = "Use SMTP for delivery";
$lang['Use_SMTP_explain'] = "Say yes if you want or have to send email via a server instead of the local mail function";
$lang['SMTP_server'] = "SMTP Server Address";

$lang['Disable_privmsg'] = "Private Messaging";
$lang['Inbox_limits'] = "Max posts in Inbox";
$lang['Sentbox_limits'] = "Max posts in Sentbox";
$lang['Savebox_limits'] = "Max posts in Savebox";


//
// Forum Management
//
$lang['Forum_admin'] = "Forum Administration";
$lang['Forum_admin_explain'] = "From this panel you can add, delete, edit, re-order and re-synchronise categories and forums";
$lang['Edit_forum'] = "Edit forum";
$lang['Create_forum'] = "Create new forum";
$lang['Create_category'] = "Create new category";
$lang['Remove'] = "Remove";
$lang['Action'] = "Action";
$lang['Update_order'] = "Update Order";
$lang['Config_updated'] = "Forum Configuration Updated Sucessfully";
$lang['Edit'] = "Edit";
$lang['Delete'] = "Delete";
$lang['Move_up'] = "Move up";
$lang['Move_down'] = "Move down";
$lang['Resync'] = "Resync";
$lang['No_mode'] = "No mode was set";
$lang['Forum_edit_delete_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side";


//
// Smiley Management
//
$lang['smiley_return'] = "Return to smiley listing";
$lang['smiley_del_success'] = "The smiley was successfully removed";
$lang['smiley_title'] = "Smiles Editing Utility";
$lang['smiley_code'] = "Smiley Code";
$lang['smiley_url'] = "Smiley Image File";
$lang['smiley_emot'] = "Smiley Emotion";
$lang['smiley_add_success'] = "The smiley was successfully added";
$lang['smiley_edit_success'] = "The smiley was successfully updated";
$lang['smile_add'] = "Add a new Smiley";
$lang['smile_desc'] = "From this page you can add, remove and edit the emoticons or smileys your users can use in their posts and private messages.";
$lang['smiley_config'] = "Smiley Configuration";
$lang['Smile'] = "Smile";
$lang['Emotion'] = "Emotion";
$lang['Select_pak'] = "Select Pak File";
$lang['replace_existing'] = "Replace Existing Smiley";
$lang['keep_existing'] = "Keep Existing Smiley";
$lang['smiley_import_inst'] = "You should unzip the smiley package and upload all files to the proper Smiley directory for your installation.  Then select the correct information in this form to import the smiley pack.";
$lang['smiley_import'] = "Smiley Pack Import";
$lang['choose_smile_pak'] = "Choose the correct Smile Pack .pak file";
$lang['import'] = "Import Smileys";
$lang['smile_conflicts'] = "What should be done in case of conflicts";
$lang['del_existing_smileys'] = "Delete all existing smileys before import";
$lang['import_smile_pack'] = "Import Smiley Pack";
$lang['export_smile_pack'] = "Create Smiley Pack";
$lang['export_smiles'] = "To create a smiley pack from your currently installed smileys, <a href='admin_smilies.php?mode=export&send_file=1'>Click Here</a> to download the smiles.pak file.  Name this file appropriately making sure to keep the .pak file extension.  Then create a zip file containing all of your smiley images plus this .pak configuration file.";
$lang['smiley_import_success'] = "The smiley pack was imported successfully!";


//
// User Management
//
$lang['User_admin'] = "Administration";
$lang['User_admin_explain'] = "Here you can change your user's information and certain specific options. To modify the users permissions please use the user and group permissions system.";
$lang['User_delete'] = "Delete this user";
$lang['User_delete_explain'] = "Click here to delete this user, this cannot be undone.";
$lang['User_deleted'] = "User was successfully deleted.";
$lang['User_status'] = "User is active";
$lang['User_allowpm'] = "Can send Private Messages";
$lang['User_allowavatar'] = "Can display avatar";
$lang['Admin_avatar_explain'] = "Here you can see and delete the user's current avatar.";
$lang['User_special'] = "Special admin-only fields";
$lang['User_special_explain'] = "These fields are not able to be modified by the users.  Here you can set their status and other options that are not given to users.";


//
// Group Management
//
$lang['Group_admin_explain'] = "From this panel you can administer all your usergroups, you can; delete, create and edit existing groups. You may choose moderators, toggle open/closed group status and set the group name and description";
$lang['Error_updating_groups'] = "There was an error while updating the groups";
$lang['Updated_group'] = "The group was successfully updated";
$lang['Added_new_group'] = "The new group was successfully created";
$lang['Deleted_group'] = "The group was successfully deleted";
$lang['New_group'] = "Create new group";
$lang['Edit_group'] = "Edit group";
$lang['group_name'] = "Group name";
$lang['group_description'] = "Group description";
$lang['group_moderator'] = "Group moderator";
$lang['group_status'] = "Group status";
$lang['group_open'] = "Open group";
$lang['group_closed'] = "Closed group";
$lang['group_hidden'] = "Hidden group";
$lang['group_delete'] = "Delete group";
$lang['group_delete_check'] = "Delete this group";
$lang['submit_group_changes'] = "Submit Changes";
$lang['reset_group_changes'] = "Reset Changes";
$lang['No_group_name'] = "You must specify a name for this group";
$lang['No_group_moderator'] = "You must specify a moderator for this group";
$lang['No_group_mode'] = "You must specify a mode for this group, open or closed";
$lang['delete_group_moderator'] = "Delete the old group moderator?";
$lang['delete_moderator_explain'] = "If you're changing the group moderator, check this box to remove the old moderator from the group.  Otherwise, do not check it, and the user will become a regular member of the group.";


//
// Prune Administration
//
$lang['Forum_Prune'] = "Forum Prune";
$lang['Forum_Prune_explain'] = "This will delete any topic which has not been posted to within the number of days you select. If you do not enter a number then all topics will be deleted. It will not remove topics in which polls are still running nor will it remove announcements. You will need to remove these topics manually.";
$lang['Do_Prune'] = "Do Prune";
$lang['All_Forums'] = "All Forums";
$lang['prune_days'] = "Remove topics that have not been posted to in";
$lang['Prune_topics_not_posted'] = "Prune topics that haven't been posted to in the last";
$lang['prune_freq'] = 'Check for topic age every';
$lang['Set_prune_data'] = "You have turned on auto-prune for this forum but did not set a frequency or number of days to prune. Please go back and do so";
$lang['Topics_pruned'] = "Topics pruned";
$lang['Posts_pruned'] = "Posts pruned";
$lang['Prune_success'] = "Pruning of forums was successful";


//
// Word censor
//
$lang['Word_censor'] = "Word Censor";
$lang['Word'] = "Word";
$lang['Replacement'] = "Replacement";
$lang['Add_new_word'] = "Add new word";
$lang['Update_word'] = "Update word censor";
$lang['Words_title'] = "Word Censors";
$lang['Words_explain'] = "From this control panel you can add, edit, and remove words that will be automatically censored on your forums. Wildcards (*) are accepted in the word field! (i.e.: *test*, test*, *test, and test are all valid)";
$lang['Must_enter_word'] = "You must enter a word and it's replacement!";
$lang['No_word_selected'] = "No word selected for editing";
$lang['Word_updated'] = "The selected word censor has been successfully updated";
$lang['Word_added'] = "The word censor has been successfully added";
$lang['Word_removed'] = "The selected word censor has been successfully removed";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Here you can email a message to either all of your users, or all users of a specific group.  To do this, an email will be sent out to the administrative email address supplied, with a blind carbon copy sent to all receptients.  If you are emailing a large group of people, please be patient after submiting and DO NOT stop the page halfway through.  It is normal for amass emailing to take a long time.";
$lang['Compose'] = "Compose";


//
// Install Process
//
$lang['Welcome_install'] = "Welcome to phpBB 2 Installation";
$lang['Initial_config'] = "Basic Configuration";
$lang['DB_config'] = "Database Configuration";
$lang['Admin_config'] = "Admin Configuration";
$lang['Installer_Error'] = "An error has occured during installation";
$lang['Previous_Install'] = "A previous installation has been detected";
$lang['Inst_Step_0'] = "Thank you for choosing phpBB 2. In order to complete this install please fill out the details requested below. Please note that the database you install into should already exist";
$lang['Start_Install'] = "Start Install";
$lang['Default_lang'] = "Default board language";
$lang['DB_Host'] = "Database Server Hostname";
$lang['DB_Name'] = "Your Database Name";
$lang['Database'] = "Your Database";
$lang['Install_lang'] = "Choose Language for Installation";
$lang['dbms'] = "Database Type";
$lang['Inst_Step_1'] = "Your database tables have been created and filled with some basic default data.  Please enter your chosen phpBB Admin Username and Password.";
$lang['Create_User'] = "Create User";
$lang['Inst_Step_2'] = "Your admin username has been created.  At this point your basic installation is complete. You will now be taken to a screen which will allow you to administer your new installation. Please be sure to check the General Configuration details and make any required changes. Thank you for choosing phpBB 2.";
$lang['Finish_Install'] = "Finish Installation";
$lang['Install_db_error'] = "An error occured trying to update the database";
$lang['ODBC_Instructs'] = "Someone please write some odbc instructions in the \$lang['ODBC_Instructs'] variable!";
$lang['Table_Prefix'] = "Prefix for tables in database";
$lang['Unwriteable_config'] = "Your config file is unwriteable at present. A copy of the config file will be downloaded to your when you click the button below. You should upload this file to the same directory as phpBB 2. Once this is done you should log in using the administrator name and password you provided on the previous form and visit the admin control centre (a link will appear at the bottom of each screen once logged in) to check the general configuration. Thank you for choosing phpBB 2.";
$lang['Download_config'] = "Download Config";
$lang['ftp_choose'] = "Choose Download Method";
$lang['Attempt_ftp'] = "Attempt to ftp config file into place:";
$lang['Send_file'] = "Just send the file to me and I'll ftp it manually:";
$lang['ftp_option'] = "<br />Since the ftp extensions are loaded in php you may will also be given the option of first trying to automatically ftp the config file into place.";
$lang['ftp_instructs'] = "You have chosen to attempt to ftp the file to your phpBB installation automagically.  Please enter the information below to facilitate this process. Note that the FTP Path should be the exact path via ftp to your phpBB2 installation as if you were ftping to it.";
$lang['ftp_path'] = "FTP Path to phpBB2:";
$lang['ftp_username'] = "Your FTP Username:";
$lang['ftp_password'] = "Your FTP Password:";
$lang['Transfer_config'] = "Start Transfer";
$lang['ftp_info'] = "Enter Your FTP Information";
$lang['Install'] = "Install";
$lang['Upgrade'] = "Upgrade";
$lang['Install_Method'] = 'Choose your installation method';


//
// Ranks admin
//
$lang['Must_select_rank'] = "Sorry, you didn't select a rank.  Please go back and try again.";
$lang['No_assigned_rank'] = "No special rank assigned";
$lang['Ranks_title'] = "Rank Administration";
$lang['Ranks_explain'] = "Here you can add, edit, view, and delete ranks. This is also a place to create custom ranks";
$lang['Rank_title'] = "Rank Title";
$lang['Rank_special'] = "Is special rank";
$lang['Rank_minimum'] = "Minimum Posts";
$lang['Rank_maximum'] = "Maximum Posts";
$lang['Rank_updated'] = "The rank was successfully updated";
$lang['Rank_added'] = "The rank was successfully added";
$lang['Rank_removed'] = "The rank was successfully deleted";
$lang['Add_new_rank'] = "Add new rank";
$lang['Rank_image'] = "Rank Image";
$lang['Rank_image_explain'] = "This is the place to set a custom image for everyone in the rank. You can specify either a relative or absolute path to the image";
$lang['return_rank_admin'] = "to return to rank admin";


//
// Disallow Username Admin
//
$lang['Add'] = "Add";
$lang['disallowed_deleted'] = "The disallowed username has successfully been removed";
$lang['disallowed_already'] = "The username you are trying to disallow has already been disallowed, or a user currently exists that this would disallow";
$lang['disallow_successful'] = "The disallowed username has successfully been added";
$lang['Disallow_control'] = "Username Disallow Control";
$lang['disallow_instructs'] = "Here you can control usernames which will not be allowed to be used.  Disallowed usernames are allowed to contain a wildcard character of '*'.  Please note that you will not be allowed to specify a username to disallow if that username has already been registered.  You must first delete that username, and then disallow it.";
$lang['del_disallow'] = "Remove a Disallowed Username";
$lang['del_disallow_explain'] = "You can remove a disallowed username by selecting the username from this list and clicking submit";
$lang['add_disallow'] = "Add a disallowed username";
$lang['add_disallow_explain'] = "You can disallow a username using the wildcard character '*' to match any character";
$lang['no_disallowed'] = "No Disallowed Usernames";


//
// Styles Admin
//
$lang['Styles_admin'] = "Styles Administration";
$lang['Styles_explain'] = "Using this facility you can add, remove and manage styles (templates and themes) available to your users.";
$lang['Styles_addnew_explain'] = "The following list contains all the themes that are available for the templates you currently have. The items on this list HAVE NOT yet been installed into the phpBB database. To install a theme simply click the 'install' link beside a selected entry";
$lang['Style'] = "Style";
$lang['Template'] = "Template";
$lang['Install'] = "Install";
$lang['Confirm_delete_style'] = "Are you sure you want to delete this style?";
$lang['Style_removed'] = "The selected style has been removed from the database. To fully remove this style from your system you must delete the appropriate directory from your templates directory.";
$lang['Theme_installed'] = "The selected theme has been installed successfully";
$lang['Export_themes'] = "Export Themes";
$lang['Download_theme_cfg'] = "The exporter could not write the theme information file. Click the button below to download this file with your browser. Once you have downloaded it you can transer it to your templates dir and package your template for distribution if you choose.";
$lang['No_themes'] = "The template you selected has no themes attached to it. Click on the 'Create New' link to the left to create one.";
$lang['Download'] = "Download";
$lang['No_template_dir'] = "Could not open template dir, it may be unreadable by the webserver or may not exist";
$lang['Export_explain'] = "In this panel you will be able to export the theme data for a selected template. Select the template from the list below and the script will create the theme configuration file and attempt to save it to the selected template directory. If it cannot save the file itself it will give you the option to download it. In order for the script to save the file you must give write access to the webserver for the selected template dir. For more information on this see the phpBB users guide.";
$lang['Select_template'] = "Select a Template";
$lang['Theme_info_saved'] = "The theme information for the selected template has been saved. You should now return the permissions on the theme_info.cfg and/or selected template directory to READ ONLY.";
$lang['Edit_theme'] = "Edit Theme";
$lang['Edit_theme_explain'] = "In the form below you can edit the settings for the selected theme.";
$lang['Create_theme'] = "Create Theme";
$lang['Create_theme_explain'] = "Use the form below to create a new theme for a selected template. When referancing color HEX codes DO NOT include the pound sign (#), ie: CCCCCC is valid, #CCCCCC is NOT.";
$lang['Theme_settings'] = "Theme Settings";
$lang['Theme_element'] = "Theme Element";
$lang['Simple_name'] = "Simple Name";
$lang['Value'] = "Value";
$lang['Stylesheet'] = "CSS Stylesheet";
$lang['Background_image'] = "Background Image";
$lang['Background_color'] = "Background Color";
$lang['Theme_name'] = "Theme Name";
$lang['Link_color'] = "Link Color";
$lang['VLink_color'] = "Visited Link Color";
$lang['ALink_color'] = "Active Link Color";
$lang['HLink_color'] = "Hilighted Link Color";
$lang['Tr_color1'] = "Table Row Color 1";
$lang['Tr_color2'] = "Table Row Color 2";
$lang['Tr_color3'] = "Table Row Color 3";
$lang['Tr_class1'] = "Table Row Class 1";
$lang['Tr_class2'] = "Table Row Class 2";
$lang['Tr_class3'] = "Table Row Class 3";
$lang['Th_color1'] = "Table Header Color 1";
$lang['Th_color2'] = "Table Header Color 2";
$lang['Th_color3'] = "Table Header Color 3";
$lang['Th_class1'] = "Table Header Class 1";
$lang['Th_class2'] = "Table Header Class 2";
$lang['Th_class3'] = "Table Header Class 3";
$lang['Td_color1'] = "Table Cell Color 1";
$lang['Td_color2'] = "Table Cell Color 2";
$lang['Td_color3'] = "Table Cell Color 3";
$lang['Td_class1'] = "Table Cell Class 1";
$lang['Td_class2'] = "Table Cell Class 2";
$lang['Td_class3'] = "Table Cell Class 3";
$lang['fontface1'] = "Font Face 1";
$lang['fontface2'] = "Font Face 2";
$lang['fontface3'] = "Font Face 3";
$lang['fontsize1'] = "Font Size 1";
$lang['fontsize2'] = "Font Size 2";
$lang['fontsize3'] = "Font Size 3";
$lang['fontcolor1'] = "Font Color 1";
$lang['fontcolor2'] = "Font Color 2";
$lang['fontcolor3'] = "Font Color 3";
$lang['span_class1'] = "Span Class 1";
$lang['span_class2'] = "Span Class 2";
$lang['span_class3'] = "Span Class 3";
$lang['Theme_updated'] = "The selected theme has been updated. Don't forget to export the new theme settings to the theme configuration file!";
$lang['Theme_created'] = "Theme created! Don't forget to export the new theme settings to the theme configuration file!";
$lang['Cannot_remove_style'] = "The style you have selected is the current forum wide default style. Therefor, you cannot remove it. Please change the default style and try again.";

?>