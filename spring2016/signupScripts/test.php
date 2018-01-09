<?php 

include_once 'emailHelperClass.php';

// test key for all
$key = "Test Key";

$styles = EmailHelperClass::getEmailStyles();
$linkStyles = $styles['linkStyles'];

$header = EmailHelperClass::createEmailHeader();
$footer = EmailHelperClass::createEmailFooter("[[NAME]]");
	
	
// create input values for all
$inputValues = array(
	"name"		=> "Tester McTesterson",
	"email"		=> "test@email.com",
	"shirt"		=> "Medium",
	"comment"	=> "None",
	
	"area"		=> "Web Dev",
	"dinner"	=> 0,
	"breakfast"	=> 0,
	"lunch"		=> 1,
	
	"friendName"=> "Friend of Tester",
	"link"		=> "",
);

foreach ( $inputValues as $key => $value ) { $$key = $value; }
$link = "www.t9hacks.org/signupPages/signup-participant2.php?key=$key";


// test confirmation email
if(false) {
	echo EmailHelperClass::createEmail_Confirmation($inputValues, $key, true);
	echo EmailHelperClass::createEmail_Confirmation($inputValues, $key, false);
}

// test registration email
if(false) {
	echo EmailHelperClass::createEmail_RegistrationNotice($inputValues, $key, true);
	echo EmailHelperClass::createEmail_RegistrationNotice($inputValues, $key, false);
}

// test registration email
if(false) {
	echo EmailHelperClass::createEmail_Approval("a");
	echo EmailHelperClass::createEmail_Rejection("a");
	echo EmailHelperClass::createEmail_ReminderToCompleteRegistration("a", "key");
}


// reminder
if(true) {
	
	// create email message
	$message = file_get_contents("emails/2weeksparticipant.php");
	
	// replace variables
	$message = str_replace("[[HEADER]]", $header, $message);
	$message = str_replace("[[FOOTER]]", $footer, $message);
	$message = str_replace("[[LINKSTYLES]]", $linkStyles, $message);
	$message = str_replace("[[NAME]]", $name, $message);
	$message = str_replace("[[LINK]]", $link, $message);
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
	$message = str_replace("[[DISTANCE_REQ]]", $dist, $message);
	
	echo $message;

	
	
		
	// create email message
	$message = file_get_contents("emails/2weeksparticipant.php");
	
	// replace variables
	$message = str_replace("[[HEADER]]", $header, $message);
	$message = str_replace("[[FOOTER]]", $footer, $message);
	$message = str_replace("[[LINKSTYLES]]", $linkStyles, $message);
	$message = str_replace("[[NAME]]", $name, $message);
	$message = str_replace("[[LINK]]", $link, $message);
	$message = str_replace("[[DISTANCE_REQ]]", "", $message);
	
	echo $message;
	
	
	
	
	// create email message
	$message = file_get_contents("emails/2weeksmentor.php");
	
	// replace variables
	$message = str_replace("[[HEADER]]", $header, $message);
	$message = str_replace("[[FOOTER]]", $footer, $message);
	$message = str_replace("[[LINKSTYLES]]", $linkStyles, $message);
	$message = str_replace("[[NAME]]", $name, $message);
	$message = str_replace("[[LINK]]", $link, $message);
	$message = str_replace("[[DISTANCE_REQ]]", "", $message);
	
	echo $message;

}

?>