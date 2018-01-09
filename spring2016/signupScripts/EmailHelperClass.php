<?php 

class EmailHelperClass {
	
	/* 
	 * Create headers for all emails sent
	 */
	function createHeaders($subject, $sendTo, $replyTo = "Brittany Ann Kos <brittany.kos@colorado.edu>") {
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-Type: text/html; charset=ISO-8859-1";
		$headers[] = "To: $sendTo";
		$headers[] = "Bcc: brittany.kos@colorado.edu";
		$headers[] = "From: \"T9Hacks\" <no-reply@t9hacks.org>";
		$headers[] = "Subject: $subject";
		$headers[] = "Reply-To: $replyTo";
		$headers[] = "X-Mailer: PHP/" . phpversion();
		
		$h = implode("\r\n", $headers);
		
		return $h;
	}
	
	function getEmailStyles() {
		$styles['linkStyles'] = "color: #3A98C2; font-weight: normal;";
		return $styles;
	}
	
	function createEmailHeader() {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$header = "
			<html>
				<head></head>
				<body style='background: #DAC8DA;'>
					<div style='width: 100%; background: #DAC8DA; padding: 20px;' >
						<table style='
							width: 600px; 
							max-width: 600px; 
							margin: 0 auto; 
							background: white; 
							border-collapse: collapse;
							font-family:helvetica,arial,sans-serif;
							font-size:13px; 
							color: #500050;
							line-height: 1.4em;
						'>
		";
		return $header;
	}
	
	function createEmailFooter($name) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$footer = "
							<tr><td style='padding: 0 30px;'>
								<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
							</td></tr>
							
							<tr><td style='padding: 10px 30px;'>
								<h2 style='padding: 0; margin: 0;font-weight: normal;color: #331155;'>About this event</h2>
								<div style='float: left;width: 60%;'>
									<p style='margin: 10px 0 5px'>
										<a href='http://www.t9hacks.org' style='$linkStyles' target='_blank' wotsearchprocessed='true'>T9Hacks</a>
									</p>
									<div>
										<p style='color: #553377;font-weight: bold;'>When</p>
										<p>
											Saturday, February 20, 2016 at 3:00 AM (MST) &nbsp;&ndash;&nbsp; 
											Sunday, February 21, 2016 at 6:00 PM (MST)
										</p>
									</div>
									<div>
										<p style='color: #553377;font-weight: bold;'>Where</p>
										<p>
											<a href='https://www.google.com/maps?q=ATLAS+Institute,+University+of+Colorado+Boulder&um=1&ie=UTF-8&sa=X&ved=0ahUKEwitkd7m0-zJAhVC5iYKHUNyDcsQ_AUIBygB' style='$linkStyles' target='_blank' wotsearchprocessed='true'>
												ATLAS Institute, University of Colorado Boulder
											</a>
										</p>
										<p>
											Black Box Experimental Studio
										</p>
									</div>
								</div>
								<div style='float: right;width: 40%;'>
									<p style=''>
										<a style='padding-left: 10px; display: block;' target='_blank' href='https://www.google.com/maps?q=ATLAS+Institute,+University+of+Colorado+Boulder&um=1&ie=UTF-8&sa=X&ved=0ahUKEwitkd7m0-zJAhVC5iYKHUNyDcsQ_AUIBygB'>
											<img style='width: 100%;' src='http://www.t9hacks.org/images/map_atlas.png'>
										</a>
									</p>
								</div>
							</td></tr>
							
							<tr><td style='padding: 0 30px;'>
								<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
							</td></tr>
							
							<tr><td style='padding: 10px 30px 30px;'>
								<h2 style='padding: 0; margin: 0;font-weight: normal;color: #331155;'>Questions about this event?</h2>
								<p>
									Contact Brittany at 
									<a href='mailto:brittany.kos@colorado.edu?subject=T9Hacks+-+Question+from+$name' style='$linkStyles' target='_blank' wotsearchprocessed='true'>brittany.kos@colorado.edu</a>
									or Jessie at 
									<a href='mailto:jessica.albarian@colorado.edu ?subject=T9Hacks+-+Question+from+$name' style='$linkStyles' target='_blank' wotsearchprocessed='true'>jessica.albarian@colorado.edu </a>
								</p>
							</td></tr>
						
						</table>
					</div>
				</body>
			</html>
		";
		return $footer;
	}
	
	
	
	
	
	
	
	/* 
	 * Create and send confirmation emails for friends of participant and mentors
	 */
	function createAndSendEmail_RegistrationNotice($inputValues, $key, $isParticipant) {
		// create subject
		$subject = "A friend registered you for T9Hacks! Please complete your registration.";
		
		// create email message
		$message = EmailHelperClass::createEmail_RegistrationNotice($inputValues, $key, $isParticipant);
		
		// create headers
		$email = $inputValues['email'];
		$sendTo = $inputValues['name'] . " <$email>";
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	
/*
	 * Create email message - registration for participant and mentor
	 */
	function createEmail_RegistrationNotice($inputValues, $key, $isParticipant) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$name = $inputValues['name'];
		$friendName = $inputValues['friendName'];
		$link = "www.t9hacks.org/signupPages/signup-participant2.php?key=$key";
		
		if($isParticipant) {
			$intro = "This is your application notice for T9Hacks Spring 2016";
			
			$note = "
					<p>
						Your friend, $friendName, started your application for 
						<a href='www.t9hacks.org' style='$linkStyles' target='_blank' wotsearchprocessed='true'>T9Hacks</a>.
					</p>
					<p>
						T9Hacks is a 24 hour women's hackathon promoting gender diversity in technology.  It is held
						at the University of Colorado Boulder's ATLAS Institute on Feb 20-21.  T9Hacks brings students together 
						for a weekend of creativity, building, and hacking.
					</p>
					<p>
						Your friend has started your application, but to be considered for a spot at T9Hacks you will need to 
						complete your registration form.  
					</p>
					<p>
						Click on this link: 
						<br/>
						<a href='$link' style='$linkStyles' target='_blank' wotsearchprocessed='true'>$link</a> 
						<br/>
						(or copy and paste it into a web browser)  
						to go to the application page.
					</p>
					";
			
		} else {
			$intro = "This is your registration notice for T9Hacks Spring 2016";
			
			$note = "
					<p>
						Your colleague, $friendName, registered you as a mentor for 
						<a href='www.t9hacks.org' style='$linkStyles' target='_blank' wotsearchprocessed='true'>T9Hacks</a>.
					</p>
					<p>
						T9Hacks is a 24 hour women's hackathon promoting gender diversity in technology.  It is held
						at the University of Colorado Boulder's ATLAS Institute on Feb 20-21.  T9Hacks brings students together 
						for a weekend of creativity, building, and hacking.
					</p>
					<p>
						Your colleague has reserved you 
						a spot at T9Hacks, but to participate as a mentor, you will need to complete the process.  
					</p>
					<p>
						Click on this link: 
						<br/>
						<a href='$link' style='$linkStyles' target='_blank' wotsearchprocessed='true'>$link</a> 
						<br/>
						(or copy and paste it into a web browser)  
						to go to the registration page.
					</p>
					<p>
						We look forward to seeing you there!
					</p>
					";
		}
		
		$message = EmailHelperClass::createEmailHeader() . "
			<tr><td style='padding: 20px 20px 0 20px;'>
				<h2>Hi $name,</h2>
				<p>$intro</p>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
			</td></tr>
				
			<tr><td style='padding: 0 20px;'>
				$note
			</td></tr>
		" . EmailHelperClass::createEmailFooter($name);
		
		return $message;
	}
	
	
	
	
	
	
	
	
	
	/* 
	 * Create and send confirmation emails for participant and mentors
	 */
	function createAndSendEmail_Confirmation($inputValues, $key, $isParticipant) {
		// create subject
		$subject = "";
		if($isParticipant)
			$subject = "Your Application Ticket for T9Hacks Spring 2016";
		else 
			$subject = "Your Registration Confirmation for T9Hacks Spring 2016";
		
		// create email message
		$message = EmailHelperClass::createEmail_Confirmation($inputValues, $key, $isParticipant);
		
		// create headers
		$email = $inputValues['email'];
		$sendTo = $inputValues['name'] . " <$email>";
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	
	/*
	 * Create email message - confirmation for participant and mentor
	 */
	function createEmail_Confirmation($inputValues, $key, $isParticipant) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$name = $inputValues['name'];
		
		if($isParticipant) {
			$intro = "This is your application for T9Hacks Spring 2016";
			$ticketName = "Application Ticket";
			$ticketType = "Hacker Participant";
			$extras = "
				
			";
			$link = "www.t9hacks.org/signupPages/signup-participant2.php?key=".$key;
			
		} else {
			$intro = "This is your signup confirmation for T9Hacks Spring 2016";
			$ticketName = "Ticket";
			$ticketType = "Mentor";
			$extras = "
				<tr><td style='padding: 5px 10px;'>Dinner on the 20th: </td><td style='padding: 5px 10px;'>" . ($inputValues['dinner']==1?"Yes":"No") . "</td></tr>
				<tr><td style='padding: 5px 10px;'>Breakfast on the 21st: </td><td style='padding: 5px 10px;'>" . ($inputValues['breakfast']==1?"Yes":"No") . "</td></tr>
				<tr><td style='padding: 5px 10px;'>Lunch on the 21st: </td><td style='padding: 5px 10px;'>" . ($inputValues['lunch']==1?"Yes":"No") . "</td></tr>
				<tr><td style='padding: 5px 10px;'>Area: </td><td style='padding: 5px 10px;'>" . $inputValues['area'] . "</td></tr>
			";
			$link = "www.t9hacks.org/signupPages/signup-mentor2.php?key=".$key;
		}
		
		$message = EmailHelperClass::createEmailHeader() . "
			<tr><td style='padding: 20px 20px 0 20px;'>
				<h2>Hi $name,</h2>
				<p>$intro</p>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<h3>$ticketName</h3>
			</td></tr>
			<tr><td style='padding: 0 20px 20px;'>
				<table style='background: #AA88AA; border: 2px solid #553377; color: white; width: 98%; border-collapse: collapse;'>
					<tr style='background: #553377;'><td style='padding: 10px;'>Order Code: $key</td><td style='padding: 10px;'></td></tr>
					<tr><td style='padding: 5px 10px;'>Name: </td>	<td style='padding: 5px 10px;'>$name</td></tr>
					<tr><td style='padding: 5px 10px;'>Type: </td>	<td style='padding: 5px 10px;'>$ticketType</td></tr>
					$extras
					<tr><td style='padding: 5px 10px;'>Shirt Size: </td><td style='padding: 5px 10px;'>" . $inputValues['shirt'] . "</td></tr>
					<tr><td style='padding: 5px 10px;'>Comments: </td><td style='padding: 5px 10px;'>" . $inputValues['comment'] . "</td></tr>
				</table>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<p>
					You can edit your registration details by clicking on this link: 
					<br/>
					<a href='$link' style='$linkStyles' target='_blank' wotsearchprocessed='true'>$link</a> 
					<br/>
					(or by copying and pasting it into a web browser).
				</p>
			</td></tr>";
			
		if(!$isParticipant) {
			$message .= "
				<tr><td style='padding: 10px 20px;'>
					<p>
						We require that mentors be present for at least 2 hours during the hackathon.  For more specific 
						information about mentorship at T9Hacks, please visit our 
						<a href='http://t9hacks.org/documents/T9Hacks_MentorGuide.pdf' target='_blank' style='$linkStyles'>Mentor Guide</a>.
					</p>
				</td></tr>
			";
		}
				
		$message .= EmailHelperClass::createEmailFooter($name);
		
		return $message;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* 
	 * Create and send approval emails for participants
	 */
	function createAndSendEmail_Approval($personRecord) {
		$name = $personRecord[0]["name"];
		$email = $personRecord[0]["email"];
		$sendTo = $name . " <$email>";
		
		// create subject
		$subject = "Welcome to T9Hacks!";
		
		// create email message
		$message = EmailHelperClass::createEmail_Approval($name);
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	/*
	 * Create email message - confirmation for participant and mentor
	 */
	function createEmail_Approval($name) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$message = EmailHelperClass::createEmailHeader() . "
			<tr><td style='padding: 20px 20px 0 20px;'>
				<h2>Hi $name,</h2>
				<p>Welcome to T9Hacks!</p>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
			</td></tr>
				
			<tr><td style='padding: 0 20px;'>
				<p style='padding: 0 0 10px;'>
					We are amazed by the incredible number and quality of applications for T9Hack's first hackathon and  
					we are excited to invite you to this spring's edition!
				</p>
				<p style='padding: 0 0 10px;'>
					We will be sending out more information about the hackathon as the event draws closer.  Please be on 
					the lookout for future emails coming from the T9Hacks team.  We look forward to seeing you there!
				</p>
				<p style='padding: 0 0 10px;'>
					Best,
					<br/>
					The T9Hacks Team
				</p>
			</td></tr>
			" . EmailHelperClass::createEmailFooter($name);
		
		return $message;
	}
	
	
	
	/* 
	 * Create and send approval emails for participants
	 */
	function createAndSendEmail_Rejection($personRecord) {
		$name = $personRecord[0]["name"];
		$email = $personRecord[0]["email"];
		$sendTo = $name . " <$email>";
		
		// create subject
		$subject = "Thanks for applying to T9Hacks";
		
		// create email message
		$message = EmailHelperClass::createEmail_Rejection($name);
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	function createEmail_Rejection($name) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$message = EmailHelperClass::createEmailHeader() . "
			<tr><td style='padding: 20px 20px 0 20px;'>
				<h2>Hi $name,</h2>
				<p>Thanks for applying to T9Hacks.</p>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<p style='padding: 0 0 10px;'>
					We are amazed at how many participants and supporters signed up for T9Hack's first hackathon! 
					Unfortunately, we were unable to invite you to this spring's edition. We're limited by the size of 
					the our hackathon space and with the ever-increasing number of applicants, we unfortunately can't accept 
					everyone.
				</p>
				<p style='padding: 0 0 10px;'>
					We're going to continue working on making T9Hacks even more accessible (and possibly even larger), so 
					definitely do apply for the next T9Hacks! We are planning on growing more every year, so definitely apply 
					again next Spring when we will try our best to continue scaling up. We hope to see you at the next one, 
					and we'll try our hardest to continue growing the hacker community.
				</p>
				<p style='padding: 0 0 10px;'>
					Best,
					<br/>
					The T9Hacks Team
				</p>
			</td></tr>
		" . EmailHelperClass::createEmailFooter($name);
		
		return $message;
	}
	
	
	
	
	function createAndSendEmail_ReminderToCompleteRegistration1($personRecord) {
		$subject = "Reminder: Please complete your application for T9Hacks";
		EmailHelperClass::createAndSendEmail_ReminderToCompleteRegistration($personRecord, $subject, true);
	}
	function createAndSendEmail_ReminderToCompleteRegistration2($personRecord) {
		$subject = "Last Chance: Please complete your application for T9Hacks!";
		EmailHelperClass::createAndSendEmail_ReminderToCompleteRegistration($personRecord, $subject, false);
	}
	function createAndSendEmail_ReminderToCompleteRegistration($personRecord, $subject, $isFirst) {
		// get person's data
		$name = $personRecord[0]["name"];
		$email = $personRecord[0]["email"];
		$key = $personRecord[0]["key"];
		$reminderNum = $personRecord[0]["reminder_num"];
		
		// create send to
		$sendTo = $name . " <$email>";
		
		// create email message
		$message = EmailHelperClass::createEmail_ReminderToCompleteRegistration($name, $key, $isFirst);
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	function createEmail_ReminderToCompleteRegistration($name, $key, $isFirst) {
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		
		$link = "www.t9hacks.org/signupPages/signup-participant2.php?key=$key";
		
		$tagline = ($isFirst) ? "This is your second application notice for T9Hacks Spring 2016!" : "This is your last application notice for T9Hacks Spring 2016!" ;
		
		$lastChanceMessage = ($isFirst) ? "" : "If you do not complete your registration form by the end of Sunday, February 7, 2016, we will remove your registration.";
		
		$message = EmailHelperClass::createEmailHeader() . "
			<tr><td style='padding: 20px 20px 0 20px;'>
				<h2>Hi $name,</h2>
				<p>$tagline</p>
			</td></tr>
			
			<tr><td style='padding: 0 20px;'>
				<hr style='margin: 10px 0;border-color:transparent;border-top-color:#500050;border-top-style:dotted;'/>
			</td></tr>
				
			<tr><td style='padding: 0 20px;'>
				<p>
					Your friend started your application for 
					<a href='www.t9hacks.org' style='$linkStyles' target='_blank' wotsearchprocessed='true'>T9Hacks</a>.
				</p>
				<p>
					T9Hacks is a 24 hour women's hackathon promoting gender diversity in technology.  It is held
					at the University of Colorado Boulder's ATLAS Institute on Feb 20-21.  T9Hacks brings students together 
					for a weekend of creativity, building, and hacking.
				</p>
				<p><b>
					Your friend has started your application, but to be considered for a spot at T9Hacks you will need to 
					complete your registration form.  $lastChanceMessage
				</b></p>
				<p>
					Click on this link: 
					<br/>
					<a href='$link' style='$linkStyles' target='_blank' wotsearchprocessed='true'>$link</a> 
					<br/>
					(or copy and paste it into a web browser)  
					to go to the application page.
				</p>
				<p>
					Thank you,<br/>
					T9Hacks Team
				</p>
			</td></tr>
		" . EmailHelperClass::createEmailFooter($name);
		
		return $message;
	}
	
	
	
	
	
	
	
	
	
	
	
	function createAndSendEmail_Reminder2WeeksParticipants($personRecord) {
		EmailHelperClass::createAndSendEmail_ReminderTimeAway($personRecord, "2weeksp");
	}
	function createAndSendEmail_Reminder2WeeksParticipantsFar($personRecord) {
		EmailHelperClass::createAndSendEmail_ReminderTimeAway($personRecord, "2weekspfar");
	}
	function createAndSendEmail_Reminder2WeeksMentors($personRecord) {
		EmailHelperClass::createAndSendEmail_ReminderTimeAway($personRecord, "2weeksm");
	}
	
	function createAndSendEmail_ReminderTomorrowMentors($personRecord) {
		EmailHelperClass::createAndSendEmail_ReminderTimeAway($personRecord, "tomorrowm");
	}
	function createAndSendEmail_ReminderTomorrowParticipants($personRecord) {
		EmailHelperClass::createAndSendEmail_ReminderTimeAway($personRecord, "tomorrowp");
	}
	
	
	function createAndSendEmail_ReminderTimeAway($personRecord, $time) {
		// get person's data
		$name = $personRecord[0]["name"];
		$email = $personRecord[0]["email"];
		$key = $personRecord[0]["key"];
		if($time == "2weeksp" || $time == "2weekspfar" || $time == "tomorrowp")
			$link = "www.t9hacks.org/signupPages/signup-participant2.php?key=$key";
		else if($time == "2weeksm" || $time == "tomorrowm")
			$link = "www.t9hacks.org/signupPages/signup-mentor2.php?key=$key";
		
		// create send to
		$sendTo = $name . " <$email>";
		
		// create subject
		$subject = "";
		if($time == "2weeksp" || $time == "2weeksm")
			$subject = "Reminder for T9Hacks";
		else if($time == "2weekspfar")
			$subject = "Updates for T9Hacks - RESPONSE REQUIRED";
		else if ($time == "tomorrowm" || $time == "tomorrowp")
			$subject = "Reminder for T9Hacks Spring 2016";
		
		
		// create email message
		$styles = EmailHelperClass::getEmailStyles();
		$linkStyles = $styles['linkStyles'];
		if($time == "2weeksp" || $time == "2weekspfar")
			$message = file_get_contents("emails/2weeksparticipant.php");
		else if($time == "2weeksm")
			$message = file_get_contents("emails/2weeksmentor.php");
		else if($time == "tomorrowp")
			$message = file_get_contents("emails/tomorrowparticipant.php");
		else if($time == "tomorrowm")
			$message = file_get_contents("emails/tomorrowmentor.php");
		
		// replace variables
		$message = str_replace("[[NAME]]", $name, $message);
		$message = str_replace("[[LINK]]", $link, $message);
		$message = str_replace("[[LINKSTYLES]]", $linkStyles, $message);
		$message = str_replace("[[HEADER]]", EmailHelperClass::createEmailHeader(), $message);
		$message = str_replace("[[FOOTER]]", EmailHelperClass::createEmailFooter($name), $message);
		$event = new DateTime('2016-02-20');
		$today = new DateTime(date("Y-m-d"));
		$interval = $today->diff($event);
		$daysAway = $interval->format('%d');
		$message = str_replace("[[TIME]]", $daysAway . " days ", $message);
		//echo $daysAway;
		if($time == "2weeksp" || $time == "2weekspfar") {
			$dist = "";
			if($time == "2weekspfar") {
				$dist = "
					<li style='padding: 0 0 20px;'>
						<p style='margin: 0; padding: 0;'>
							<b style='color: #553377;font-size: 1.2em;'>CONFIRM THAT YOU ARE COMING!</b>  We noticed
							that you are traveling to T9Hacks from out of state.  We require confirmation from participants
							that are traveling from a distance. Keep in mind that we we cannot cover or reimburse any 
							travel costs.  Please confirm with Brittany (brittany.kos@colorado.edu) if you are attending or 
							not.  If we do not hear from you by the end of Monday, February 8, 2016, we will remove your 
							registration.
						</p>
					</li>
						";
			} 
			$message = str_replace("[[DISTANCE_REQ]]", $dist, $message);
		}
		//echo $message; die();
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	 * Create and send email for every registration
	 */
	function createAndSendEmail_Register($resultArray, $inputValues) {
		// res
		$res = ( ($resultArray['SUCCESS'] == 1) ? "Success" : "Failure" );
		
		// create subject
		$subject = "ATLAS T9Hacks – Register Message – $res";
		
		// create message
		$message = "<html><head></head><body><h1>$res</h1><table>";
		
		$message .= "<tr><td colspan='2'><h2>Register Error Results</h2></td></tr>";
		foreach($resultArray as $key => $value) {
			$message .= "<tr><td>$key</td><td>$value</td></tr>";
		}
		
		if(array_key_exists("participant", $inputValues)) {
			$message .= "<tr><td colspan='2'><h2>Input Values - Participant</h2></td></tr>";
			foreach($inputValues["participant"] as $key => $value) {
				$message .= "<tr><td>$key</td><td>$value</td></tr>";
			}
		}
		
		if(array_key_exists("mentor", $inputValues)) {
			$message .= "<tr><td colspan='2'><h2>Input Values - Mentor</h2></td></tr>";
			foreach($inputValues["mentor"] as $key => $value) {
				$message .= "<tr><td>$key</td><td>$value</td></tr>";
			}
		}
		
		if(array_key_exists("friends", $inputValues)) {
			$message .= "<tr><td colspan='2'><h2>Input Values - Friends</h2></td></tr>";
			foreach($inputValues["friends"] as $k => $friend) {
				foreach($friend as $key => $value)
					$message .= "<tr><td>$key</td><td>$value</td></tr>";
			}
		}
		
		if(array_key_exists("extra", $inputValues)) {
			$message .= "<tr><td colspan='2'><h2>Input Values - Extra</h2></td></tr>";
			foreach($inputValues["extra"] as $key => $value)
				$message .= "<tr><td>$key</td><td>$value</td></tr>";
		}
		
		if(array_key_exists("post", $inputValues)) {
			$message .= "<tr><td colspan='2'><h2>Input Values - Post</h2></td></tr>";
			foreach($inputValues["post"] as $key => $value)
				$message .= "<tr><td>$key</td><td>$value</td></tr>";
		}
		
		$message .= "</table></body></html>";
		//echo $message; die();
		
		// create send to
		$sendTo = "Brittany <britkos@gmail.com>";
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	
	/*
	 * Create and send email for every sponsor notice
	 */
	function createAndSendEmail_Sponsor($resultArray, $inputValues) {
		// res
		$res = ( ($resultArray['SUCCESS'] == 1) ? "Success" : "Failure" );
		
		// create subject
		$subject = "ATLAS T9Hacks – Sponsor Message – $res";
		
		
		// create message
		$message = "<html><head></head><body><h1>$res</h1><table>";
		
		$message .= "<tr><td colspan='2'><h2>Sponsor Error Results</h2></td></tr>";
		foreach($resultArray as $key => $value) {
			$message .= "<tr><td>$key</td><td>$value</td></tr>";
		}
		
		$message .= "<tr><td colspan='2'><h2>Input Values</h2></td></tr>";
		foreach($inputValues as $key => $value) {
			$message .= "<tr><td>$key</td><td>$value</td></tr>";
		}
		
		$message .= "</table></body></html>";
		//echo $message; die();
		
		
		// create send to
		$sendTo = "Brittany <britkos@gmail.com>";
		
		// create headers
		$headers = EmailHelperClass::createHeaders($subject, $sendTo);
		
		// send email
		$emailResult = mail($sendTo, $subject, $message, $headers);
		
		// return result
		return $emailResult;
	}
	
	
	
	
	
	
	/*
	 * Create and send email for index page sponsor interest
	 */
	function createAndSendEmail_SponsorEmail($sponsorName, $sponsorEmail, $sponsorMessage) {
		// create subject
		$sendSubject = "T9Hacks - Sponsor Question";
		
		// create message
		$sendMessage = "<html><head></head><body><table style='border-collapse: collapse'>";
		$sendMessage .= "<tr><td><b>Name: </b></td><td><p>$sponsorName</p></td></tr>";
		$sendMessage .= "<tr><td><b>Email: </b></td><td><p>$sponsorEmail</p></td></tr>";
		$sendMessage .= "<tr><td><b>Message: </b></td><td><p>$sponsorMessage</p></td></tr>";
		$sendMessage .= "</table></body></html>";
		
		// create sender's reply to
		$replyTo = "$sponsorName <$sponsorEmail>";
		
		// create send to
		//$sendTo = 'Brittany Ann Kos <brittany.kos@colorado.edu>, Jessie Albarian <jessica.albarian@colorado.edu>';
		$sendTo = 'Brittany Ann Kos <brittany.kos@colorado.edu>';
		
		// create headers
		$sendHeaders = EmailHelperClass::createHeaders($sendSubject, $sendTo, $replyTo);
		
		// send email
		$emailResult = mail($sendTo, $sendSubject, $sendMessage, $sendHeaders);
		
		// return result
		return ($emailResult);
	}
	
	
	
	
	
} // end class
	
	
?>