<?php

require_once('../lib/index.php');

if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'contactUs':
			$mail = new mail();
			$mail->sendContactForm();
			break;
	}
}

$page = new PageClass();
echo $page->Run( );

echo 'fin';
