<?php

// Partly from https://area51.phpbb.com/docs/dev/3.1.x/extensions/tutorial_events.html#php-core-events-listeners

namespace wordsvilleforum\crosssiteauth\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class change_login_and_register_links_listener implements EventSubscriberInterface
{
	const SITE_LOGIN_URL = 'https://wordsville.azurewebsites.net/login/forum';
	
    static public function getSubscribedEvents()
    {
        return array(
            'core.login_box_before' => 'override_login_box',
        );
    }

    public function override_login_box($event)
    {
		header('Location: ' . self::SITE_LOGIN_URL, true, 303);
		
		exit;
    }
}