<?php

require_once('/home/sleepdia/libinc/PHPMailer/PHPMailerAutoload.php');

class mail extends PHPMailer {

	function __construct() {
		parent::__construct();

		$this->SMTPDebug = 2; // DEBUG: show SMTP debugging status

		//$this->IsSMTP();
		//$this->Host = config::smtpServer;
		//$this->Port = config::smtpPort;
		//$this->SMTPAuth = config::smtpAuth;
		//$this->Username = config::smtpUser;
		//$this->Password = config::smtpPass;
		//$this->SMTPSecure = 'ssl';

		$this->setFrom(config::webprog, config::webprogFrom);
		$this->isHTML(true); // Set email format to HTML
	}

	public function sendContactForm() {
		$this->addAddress('admin@sleepdiag.com');

		$HTML = <<<END
<table cellspacing="0" cellpadding="0" style="width: 360px;">
	<tbody>
		<tr>
			<td colspan="3">
				<strong>Name:</strong><br/>
				{$_REQUEST['name']}<br/>&nbsp;
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
				<strong>Phone:</strong><br/>
				{$_REQUEST['phone']}<br/>&nbsp;
			</td>
			<td colspan="2">
				<strong>Email:</strong><br/>
				{$_REQUEST['email']}<br/>&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<strong>Address:</strong><br/>
				{$_REQUEST['address']}<br/>&nbsp;
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
				<strong>City:</strong><br/>
				{$_REQUEST['city']}<br/>&nbsp;
			</td>
			<td style="width: 20%;">
				<strong>State:</strong><br/>
				{$_REQUEST['state']}<br/>&nbsp;
			</td>
			<td>
				<strong>Zip Code:</strong><br/>
				{$_REQUEST['zip_code']}<br/>&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<strong>Comments:</strong><br/>
				{$_REQUEST['comments']}<br/>&nbsp;
			</td>
		</tr>
	</tbody>
</table>
END;


		$this->Subject = 'Contact Form';
		$this->Body    = $HTML;
		$this->AltBody = strip_tags($HTML);

		if(!$this->send()) {
			echo 'Message could not be sent.'."<br/>\r\n";
			echo 'Mailer Error: ' . $this->ErrorInfo; // debug
		} else {
			echo 'Message has been sent';
		}
		exit;
	}
}
