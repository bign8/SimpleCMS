<?php
	require_once('/home/sleepdia/libinc/PHPMailer/PHPMailerAutoload.php');

	$mail = new PHPMailer();

	$mail->addAddress('yworman@qwestoffice.net', 'Yvette Worman');
	$mail->addAddress('morgan@sdinc1.net', 'Morgan');
	//$mail->addAddress('andy@allord.info', 'Andy Allord');
	$mail->addBCC('admin@sleepdiag.com');

	// $mail->setFrom(config::webprog, config::webprogFrom);
	$fromName = $_POST['fName']." ".$_POST['lName'];
	$mail->setFrom($_POST['uEmail'], $fromName);

	$mail->isHTML(true); // Set email format to HTML

	$html = '<table cellspacing="0" cellpadding="0" style="width: 768px;">';
	$html .= '<tbody>';
	$html .= '<tr><td colspan="6" style="border: solid thin black; font-weight: bold; color: white; background-color: #0c371d;">Personal Information</td></tr>';
	$html .= '<tr>';
	$html .= '<td>First Name:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['fName'].'</td>';
	$html .= '<td>Last Name:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['lName'].'</td>';
	$html .= '<td colspan="2">&nbsp;</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width: 10%;">Date of Birth:</td>';
	$html .= '<td style="border-bottom: solid thin black; width: 23%;">'.$_POST['dob'].'</td>';
	$html .= '<td style="width: 10%;">Phone:</td>';
	$html .= '<td style="border-bottom: solid thin black; width: 24%;">'.$_POST['phone'].'</td>';
	$html .= '<td style="width: 10%;">Email:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['uEmail'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>Address:</td>';
	$html .= '<td colspan="5" style="border-bottom: solid thin black;">'.$_POST['address1'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>&nbsp;</td>';
	$html .= '<td colspan="5" style="border-bottom: solid thin black;">'.$_POST['address2'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>City:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['city'].'</td>';
	$html .= '<td>State:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['state'].'</td>';
	$html .= '<td>Zip Code:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['zipCode'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<tr><td colspan="6">&nbsp;</td></tr>';
	$html .= '<td colspan="6" style="border: solid thin black; font-weight: bold; color: white; background-color: #0c371d;">Insurance Information</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>Provider:</td>';
	$html .= '<td colspan="5" style="border-bottom: solid thin black;">'.$_POST['insName'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>ID Number:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['idNum'].'</td>';
	$html .= '<td>Grp. Num.:</td>';
	$html .= '<td style="border-bottom: solid thin black;">'.$_POST['grpName'].'</td>';
	$html .= '<td colspan="2">&nbsp;</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<tr><td colspan="6">&nbsp;</td></tr>';
	$html .= '<td colspan="6" style="border: solid thin black; font-weight: bold; color: white; background-color: #0c371d;">Order Information</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td colspan="6" id="cartDetails">';

	$items = explode(",", $_POST['items']);
	for($i = 0; $i < count($items); $i++){
		$html .= $items[$i].'<br />';
	}

	$html .= '</td>';
	$html .= '</tr>';
	$html .= '</tbody>';
	$html .= '</table>';

	$mail->Subject = 'Sleep Diagnostics Order Request';
	$mail->Body    = $html;
	$mail->AltBody = strip_tags($html);

	if(!$mail->send()) {
		$l1 = 'Message could not be sent.'."\r\n";
		$l2 = 'Mailer Error: ' . $mail->ErrorInfo; // debug
		$file = 'orderError.txt';
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
		$mail->addAddress($_POST['uEmail'], $fromName);
		$mail->setFrom('yworman@qwestoffice.net','Yvette Worman');
		$rEmailHTML = "Below is a copy of the information you provided to Sleep Diagnostics. You will get a response as soon as possible.<br /><br />".$html;
		$mail->Subject = 'Copy of You Sleep Diagnostics Order Request';
		$mail->Body = $rEmailHTML;
		$mail->AltBody = strip_tags($rEmailHTML);
		if($mail->send()){
			echo $numSent++;
		} else {
			$l1 = 'Confirmation Message could not be sent.'."\r\n";
			$l2 = 'Total Emails Sent: '.$numSent."\r\n";
			$l3 = 'Mailer Error: ' . $mail->ErrorInfo . "\r\n"; // debug
			$file = 'orderError.txt';
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