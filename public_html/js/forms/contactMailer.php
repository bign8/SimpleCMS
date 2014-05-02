<?php
	require_once('/home/sleepdia/libinc/PHPMailer/PHPMailerAutoload.php');

	$mail = new PHPMailer();

	$mail->addAddress('yworman@qwestoffice.net', 'Yvette Worman');
	//$mail->addAddress('andy@allord.info', 'Andy Allord');
	$mail->addBCC('admin@sleepdiag.com');

	// $mail->setFrom(config::webprog, config::webprogFrom);
	$mail->setFrom($_POST['email'], $_POST['name']);

	$mail->isHTML(true); // Set email format to HTML

	$html = '<table cellspacing="0" cellpadding="0" style="width: 468px;">';
	$html .= '<tbody><tr><td colspan="3"><strong>Name:</strong><br/>'.$_POST['name'].'<br/>&nbsp;</td></tr>';
	$html .= '<tr><td style="width: 50%;"><strong>Phone:</strong><br/>'.$_POST['phone'].'<br/>&nbsp;</td><td colspan="2"><strong>Email:</strong><br/>'.$_POST['email'].'<br/>&nbsp;</td></tr>';
	$html .= '<tr><td colspan="3"><strong>Address:</strong><br/>'.$_POST['address'].'<br/>&nbsp;</td></tr>';
	$html .= '<tr><td style="width: 50%;"><strong>City:</strong><br/>'.$_POST['city'].'<br/>&nbsp;</td><td style="width: 20%;"><strong>State:</strong><br/>'.$_POST['state'].'<br/>&nbsp;</td><td><strong>Zip Code:</strong><br/>'.$_POST['zip_code'].'<br/>&nbsp;</td></tr>';
	$html .= '<tr><td colspan="3"><strong>Comments:</strong><br/>'.nl2br($_POST['comments']).'<br/>&nbsp;</td></tr></tbody></table>';

	$mail->Subject = 'Sleep Diagnostics Contact Request';
	$mail->Body    = $html;
	$mail->AltBody = strip_tags($html);

	if(!$mail->send()) {
		$l1 = 'Message could not be sent.'."\r\n";
		$l2 = 'Mailer Error: ' . $mail->ErrorInfo; // debug
		$file = 'mailError.txt';
		$handle = fopen($file, 'a') or die;
		fwrite($handle, "\r\n");
		fwrite($handle, date("Y-m-d h:m"));
		fwrite($handle, $l1);
		fwrite($handle, $l2);
		fwrite($handle, "\r\n");
		fclose($handle);
		echo "failed";
	} else {
		$numSent = 1;
		$mail->ClearAllRecipients();
		$mail->addAddress($_POST['email'], $_POST['name']);
		$mail->setFrom('yworman@qwestoffice.net','Yvette Worman');
		$rEmailHTML = "Below is a copy of the information you provided to Sleep Diagnostics. You will get a response from them as soon as possible.<br /><br />".$html;
		$mail->Subject = 'Copy of You Sleep Diagnostics Contact Request';
		$mail->Body = $rEmailHTML;
		$mail->AltBody = strip_tags($rEmailHTML);
		if($mail->send()){
			echo $numSent++;
		} else {
			$l1 = 'Confirmation Message could not be sent.'."\r\n";
			$l2 = 'Total Emails Sent: '.$numSent."\r\n";
			$l3 = 'Mailer Error: ' . $mail->ErrorInfo . "\r\n"; // debug
			$file = 'mailError.txt';
			$handle = fopen($file, 'a') or die;
			fwrite($handle, "\r\n");
			fwrite($handle, date("Y-m-d h:m"));
			fwrite($handle, $l1);
			fwrite($handle, $l2);
			fwrite($handle, $l3);
			fwrite($handle, "\r\n");
			fclose($handle);
			echo $numSent;
		}
	}
?>