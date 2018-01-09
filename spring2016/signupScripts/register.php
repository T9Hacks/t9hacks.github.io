<?php

/*
header('Access-Control-Allow-Origin: *');

// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","mail.example.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set('sendmail_from', 'example@YourDomain.com');

//$emailValidation = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

*/

// set correct time zone
date_default_timezone_set('America/Denver');



// global variables
$isParticipant = false;
$isMentor = false;
$isFriend = false;
$allInputValues = array();

include 'resultArrayIndex.php';

// create error messages
$errorMessages = array(
	$HIDDEN_INPUTS_MISSING => "There was a problem with your form. It looks like pieces of it are missing. Please refresh the page and start again. (Error A01)",
	$HONEYPOT_FILLED => "There was a problem verifying that you are human. If a field says to leave it blank, please do so. (Error A02)",
	$WRONG_SIGNUP_TYPE => "There was a problem with your form. It looks like you are trying to sign-up as a type of person that doesn't exist. Please refresh the page and start again. (Error A03)",
	$WRONG_NUM_FRIENDS => "There was a problem with your form.  It looks like you are trying to register too many friends.  Please refresh the page and start again. (Error A04)",
	
	$PARTICIPANT_EMAIL_USED => "It looks like the email you are trying to register with has already been used to register a participant.  Please check your email for a confirmation ticket or an invitation to complete the registeration process. (Error B01)",
	$MENTOR_EMAIL_USED => "It looks like the email you are trying to register with has already been used to register a mentor.  Please check your email for a confirmation ticket or an invitation to complete the registeration process. (Error B02)",
	
	$SELF_INPUTS_MISSING => "There was a problem with your form. It looks like pieces of it are missing. Please refresh the page and start again. (Error C01)",
	$SELF_INPUTS_EMPTY => "There was a problem with your registration.  Please check to make sure you have the required information entered in the form. (Error C02)",
	$SELF_RECORD_ERROR => "There was a problem submitting your registration. Please refresh the page and start again. (Error C03)",
	$SELF_EMAIL_ERROR => "There was a problem sending a confirmation to your email.  Please check the email you entered and resubmit the form. (Error C04)",
	
	$FRIEND_INPUTS_MISSING => "There was a problem with your form. It looks like pieces of it are missing. Please refresh the page and start again. (Error D01)",
	$FRIEND_INPUTS_EMPTY => "There was a problem with your registration.  Please check to make sure you have the required information entered in the form. (Error D02)",
	$FRIEND_RECORD_ERROR => "There was a problem submitting your registration. Please refresh the page and start again. (Error D03)",
	$FRIEND_EMAIL_ERROR => "There was a problem sending a confirmation to your email.  Please check the email you entered and resubmit the form. (Error D04)",
	
	$FILE_SIZE_TOO_LARGE => "The file you are trying to upload is too large.  Please limit your file uploads to 2MB. (Error E01)",
	$FILE_UPLOAD_ERROR => "There was an error uploading your file.  Please re-choose the file and submit the form again. (Error E02)",
	
	$END_SUCCESS => "SUCCESS!!!",
);

// create skelton result array
$resultArray = array(
	$SUCCESS 			=> false, 
	$MESSAGE			=> "Start",
	$DETAIL_MESSAGE		=> "",
	$PARTICIPANT		=> -1,
	$MENTOR				=> -1,
		
	$HIDDEN_INPUTS_MISSING	=> -1,
	$HONEYPOT_FILLED 		=> -1,
	$WRONG_SIGNUP_TYPE		=> -1,
	$WRONG_NUM_FRIENDS		=> -1,
		
	$PARTICIPANT_EMAIL_USED	=> -1,
	$MENTOR_EMAIL_USED		=> -1,
	
	$SELF_INPUTS_MISSING 	=> -1,
	$SELF_INPUTS_EMPTY 		=> -1,
	$SELF_RECORD_ERROR		=> -1,
	$SELF_EMAIL_ERROR		=> -1,
	$PARTICIPANT_SUCCESS	=> -1,
	$MENTOR_SUCCESS			=> -1,
	$PARTICIPANT_KEY		=> -1,
	$MENTOR_KEY				=> -1,
	
	$FILE_SIZE_TOO_LARGE	=> -1,
	$FILE_UPLOAD_ERROR		=> -1,
	
	$FRIENDS_TOTAL			=> -1,
	$FRIEND_INPUTS_MISSING 	=> -1,
	$FRIEND_INPUTS_EMPTY 	=> -1,
	$FRIEND_RECORD_ERROR	=> -1,
	$FRIEND_EMAIL_ERROR		=> -1,
	$FRIEND_GEN_SUCCESS		=> -1,
	$FRIEND_1_SUCCESS		=> 0,
	$FRIEND_2_SUCCESS		=> 0,
	$FRIEND_3_SUCCESS		=> 0,
	$FRIEND_1_KEY			=> -1,
	$FRIEND_2_KEY			=> -1,
	$FRIEND_3_KEY			=> -1,
);


include 'GeneralHelper.php';
include 'DBHelperClass.php';
include 'EmailHelperClass.php';
include 'RegisterFunctions.php';

//printArray($resultArray);


/* ************************************ */
/* 		Test For Hidden Inputs			*/
/* ************************************ */
$allInputValues["post"] = $_POST;
// test - hiden inputs
if( !array_key_exists('honeypot', $_POST) || !array_key_exists('type', $_POST) || !array_key_exists('friends', $_POST) || !array_key_exists('key', $_POST) ) {
	
	// bad - hiden inputs
	$resultArray[$HIDDEN_INPUTS_MISSING] = 1;
	$resultArray[$MESSAGE] = $errorMessages[$HIDDEN_INPUTS_MISSING];

// success - hiden inputs
} else {
	
	// good - hidden inputs
	$resultArray[$HIDDEN_INPUTS_MISSING] = 0;
	
	
	
	/* ******************************** */
	/* 			Get hidden data			*/
	/* ******************************** */
	// get hidden data
	$type		= $_POST["type"];		$allInputValues["extra"]["type"] 		= $type;
	$numFriends	= $_POST['friends'];	$allInputValues["extra"]["numFriends"]	= $numFriends;
	$key		= $_POST["key"];		$allInputValues["extra"]["key"] 		= $key;
	
	
	
	/* ************************************************ */
	/* 			Test For Correct Number of Friends		*/
	/* ************************************************ */
	// test - num friends
	if( $numFriends != 0 && $numFriends != 1 && $numFriends != 2 && $numFriends != 3) {
		
		// bad - num friends
		$resultArray[$WRONG_NUM_FRIENDS] = 1;
		$resultArray[$MESSAGE] = $errorMessages[$WRONG_NUM_FRIENDS];
			
	// success - num friends
	} else {
		
		// good - num friends
		$resultArray[$WRONG_NUM_FRIENDS] = 0;
		$resultArray[$FRIENDS_TOTAL] = $numFriends;
		
		
		
		/* ******************************** */
		/* 			Test Honeypot			*/
		/* ******************************** */
		// test - honeypot
		if( !empty($_POST['honeypot']) ) {
			
			// bad - honeypot
			$resultArray[$HONEYPOT_FILLED] = 1;
			$resultArray[$MESSAGE] = $errorMessages[$HONEYPOT_FILLED];
		
		// success - honeypot
		} else {
			
			// good - honeypot
			$resultArray[$HONEYPOT_FILLED] = 0;
			
			
			
			/* **************************************** */
			/* 		Test For Correct Signup Type		*/
			/* **************************************** */
			// test - signup type
			if( $type != "participant" && $type != "mentor") {
				
				// bad - signup type
				$resultArray[$WRONG_SIGNUP_TYPE] = 1;
				$resultArray[$MESSAGE] = $errorMessages[$WRONG_SIGNUP_TYPE];
				
			// success - signup type
			} else {
				
				// good - signup type
				$resultArray[$WRONG_SIGNUP_TYPE] = 0;
				
				
				// create database helper
				$db = new DBHelperClass();
				
				
				
				/* ************************************ */
				/* 		Participant Registration		*/
				/* ************************************ */
				// test - participant flag
				if($type == "participant") {
				
					// success - participant flag
					$resultArray[$PARTICIPANT] = 1;
					$resultArray[$MENTOR] = 0;
					$isParticipant = true;
					
					// input data
					$inputNames = array(
							"name", "email", "college", "major", "phone", "gender", 
							"linkedin", "website", "github", "company", "position", "facebook", "twitter", "shirt", "comment", "agree", 
							"resumeName"
					);
					$inputs = array(
						'inputNames'	=> $inputNames, 
						'numReqFilledInputs'	=> 6,
						'numReqPresentInputs'	=> 16,
					);					
					
					// register participant
					$results = registerPerson($db, $resultArray, $errorMessages, $inputs, $key, 1);
					$resultArray = $results["resultArray"];
					$allInputValues["participant"] = $results["inputValues"];
					
					
				/* **************************** */
				/* 		Mentor Registration		*/
				/* **************************** */
				// test - mentor flag
				} else if($type == "mentor") {
					
					// success - mentor flag
					$resultArray[$PARTICIPANT] = 0;
					$resultArray[$MENTOR] = 1;
					$isMentor = true;
					
					// input data
					$inputNames = array(
							"name", "email", "phone", "gender", "area", 
							"company", "position", "comment", "shirt", "agree", 
							"breakfast", "lunch", "dinner"
					);
					$inputs = array(
						'inputNames'	=> $inputNames, 
						'numReqFilledInputs'	=> 5,	
						'numReqPresentInputs'	=> 10,						
					);
					
					
					// register mentor
					$results = registerPerson($db, $resultArray, $errorMessages, $inputs, $key, 2);
					$resultArray = $results["resultArray"];
					$allInputValues["mentor"] = $results["inputValues"];
				}
				
				
				/* **************************** */
				/* 		Friends Registeration	*/
				/* **************************** */
				// see if want to register friends
				if($numFriends > 0) {
					
					// success - friend flag
					$isFriend = true;
					
					for($i = 0; $i<$numFriends; $i++) {
						$fid = $i+1;
						// input data
						$inputNames = array("name", "friendName".$fid, "friendEmail".$fid);
						$inputs = array(
							'inputNames'	=> $inputNames, 
							'numReqInputs'	=> 2,	
							'numTextInputs'	=> 2,						
						);
						
						// register friend
						$typeCode = (3 + $i) + ($isParticipant ? 0 : 3);
						$results = registerPerson($db, $resultArray, $errorMessages, $inputs, $key, $typeCode);
						$resultArray = $results["resultArray"];
						$allInputValues["friends"][] = $results["inputValues"];
					}
				}
				
					
				
				/* ************ */
				/* 		End		*/
				/* ************ */
				$end = false;
				//printArray($resultArray);
				if($isParticipant && $resultArray[$PARTICIPANT_SUCCESS] == 1) 
					$end = true;
				else if ($isMentor && $resultArray[$MENTOR_SUCCESS] == 1) 
					$end = true;
				else if ($isFriend) {
					$friendSuccesCount = $resultArray[$FRIEND_1_SUCCESS] + $resultArray[$FRIEND_2_SUCCESS] + $resultArray[$FRIEND_3_SUCCESS];
					echo $friendSuccesCount;
					if($friendSuccesCount == $numFriends) {
						$resultArray[$FRIEND_GEN_SUCCESS] = 1;
						$end = true;
					}
				}
				
					// end
				if($end) {
					$resultArray[$MESSAGE] = $errorMessages[$END_SUCCESS];
					$resultArray[$SUCCESS] = true;
				}
				
				
				
				// close database helper
				$db->close();
				
				
				
				
				
			} // end - signup test
			
		} // end - honeypot
		
	} // end - num friends
	
} //end - hidden inputs
	



// json encode array
$jsonResult = json_encode($resultArray);

// print array to screen as results
print_r($jsonResult); 

// send registration an email
//printArray($allInputValues); die();
EmailHelperClass::createAndSendEmail_Register($resultArray, $allInputValues);


die();


?>