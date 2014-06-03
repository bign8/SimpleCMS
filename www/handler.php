<?php

require_once('../libinc/site_inc.php');

if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'contactUs':
			$mail = new mail();
			$mail->sendContactForm();
			break;
	}
}

$page = new PageClass();
echo $page->Run();

// echo 'finished';