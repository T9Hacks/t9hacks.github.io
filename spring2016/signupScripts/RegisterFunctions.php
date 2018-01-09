<?php 

date_default_timezone_set('America/Denver');

function registerPerson($db, $resultArray, $errorMessages, $inputs, $key, $typeCode) {
	
	// create index keys for result array
	include 'resultArrayIndex.php';

	// get type
	$isParticipant = false;
	$isMentor = false;
	$isFriend = false;
	$isParticipantFriend = false;
	$isMentorFriend= false;
	$isFriend1 = false;
	$isFriend2 = false;
	$isFriend3 = false;
	
	if($typeCode == 1)
		$isParticipant = true;
	else if($typeCode == 2)
		$isMentor = true;
	else if($typeCode >= 3) {
		$isFriend = true;
		
		if($typeCode >= 6)
			$isMentorFriend = true;
		else
			$isParticipantFriend = true;
			
		if($typeCode == 3 || $typeCode == 6)
			$isFriend1 = true;
		else if($typeCode == 4 || $typeCode == 7)
			$isFriend2 = true;
		else if($typeCode == 5 || $typeCode == 8)
			$isFriend3 = true;
	}
		
	
	// get inputs
	$inputNames = $inputs['inputNames'];
	$numReqFilledInputs = $inputs['numReqFilledInputs'];
	$numReqPresentInputs = $inputs['numReqPresentInputs'];
	
	
	
	// set initial keys
	if($isParticipant) 
		$resultArray[$PARTICIPANT_KEY] = $key;
	else if($isMentor) 
		$resultArray[$MENTOR_KEY] = $key;
	else if($isFriend1) 
		$resultArray[$FRIEND_1_KEY] = $key;
	else if($isFriend2) 
		$resultArray[$FRIEND_2_KEY] = $key;
	else if($isFriend3) 
		$resultArray[$FRIEND_3_KEY] = $key;
	
	
	
	
	
	
	/* ************************************ */
	/* 		Test For Remaining Inputs		*/
	/* ************************************ */
	// add to counter if does not exist
	$doesNotExist = 0;
	$doesNotExistNames = "";
	$i = 0;
	foreach($inputNames as $name) {
		if( $i < $numReqPresentInputs && !array_key_exists($name, $_POST) ) {
			$doesNotExist++;
			$doesNotExistNames .= $name;
		}
	$i++;
	}
				
	// test - missing inputs
	if($doesNotExist != 0) {
		
		// bad - missing inputs
		if($isParticipant || $isMentor) {
			$resultArray[$SELF_INPUTS_MISSING] = 1;
			$resultArray[$MESSAGE] = $errorMessages[$SELF_INPUTS_MISSING];
		} else if($isFriend) {
			$resultArray[$FRIEND_INPUTS_MISSING] = 1;
			$resultArray[$MESSAGE] = $errorMessages[$FRIEND_INPUTS_MISSING];
		}
		$resultArray[$DETAIL_MESSAGE] = $doesNotExistNames;
		
	// success - missing inputs
	} else {
		
		// good - missing participant inputs
		if($isParticipant || $isMentor)
			$resultArray[$SELF_INPUTS_MISSING] = 0;
		else if($isFriend)
			$resultArray[$FRIEND_INPUTS_MISSING] = 0;
		
		
		
		/* ******************************** */
		/* 		Get Inputs from Names		*/
		/* ******************************** */
		// get form input values
		$inputValues = array();
		if($isParticipant || $isFriend) {
			foreach($inputNames as $name) {
				// agreement
				if($name == "agree")
					$inputValues[$name] = 1;
				// text
				else 
					$inputValues[$name] = $_POST[$name];
			}
		} else if($isMentor) {
			$i=0;
			foreach($inputNames as $name) {
				if($name == "agree")
					$inputValues[$name] = 1;
				else if($i < $numReqPresentInputs)
					$inputValues[$name] = $_POST[$name];
				else 
					$inputValues[$name] = (array_key_exists($name, $_POST) ? 1 : 0);
				$i++;
			}
		}
		/*printArray($_POST);
		printArray($inputNames);
		printArray($inputValues);*/
		
		// set level of complete
		$isNew = ($key == -1);
		$isComplete = (!$isNew);
		
		
		
		/* ******************************** */
		/* 		Test For Empty Inputs		*/
		/* ******************************** */
		// count empty inputs
		$emptyInputs = 0;
		$i=0;
		if(!empty($inputValues)) {
			foreach($inputValues as $k => $v) {
				if($i < $numReqFilledInputs)
					if( $v == null || empty($v) || $v == "" || removeWhiteSpace($v) == "" )
						$emptyInputs++;
				$i++;
			}
		}		
		
		// test - empty inputs
		if($emptyInputs != 0) {
			
			// bad - empty inputs
			if($isParticipant || $isMentor) {
				$resultArray[$SELF_INPUTS_EMPTY] = 1;
				$resultArray[$MESSAGE] = $errorMessages[$SELF_INPUTS_EMPTY];
			} else if($isFriend) {
				$resultArray[$FRIEND_INPUTS_EMPTY] = 1;
				$resultArray[$MESSAGE] = $errorMessages[$FRIEND_INPUTS_EMPTY];
			}
		
		// success - empty inputs
		} else {
			
			// good - empty inputs
			if($isParticipant || $isMentor)
				$resultArray[$SELF_INPUTS_EMPTY] = 0;
			else if($isFriend)
				$resultArray[$FRIEND_INPUTS_EMPTY] = 0;
			
			
			
			
			
			/* ******************************** */
			/* 		Process Input Values		*/
			/* ******************************** */
			
			// process email for mentor and participant
			if($isParticipant || $isMentor)
				$inputValues['email'] = strtolower(removeWhiteSpace($inputValues['email']));
			
			// process name and email for friend
			else if($isFriend) {
				$inputValues['friendName'] = $inputValues['name'];
				
				if ($isFriend1) {
					$inputValues['name'] = $inputValues['friendName1'];
					$inputValues['email'] = strtolower(removeWhiteSpace($inputValues['friendEmail1']));
				} else if ($isFriend2) {
					$inputValues['name'] = $inputValues['friendName2'];
					$inputValues['email'] = strtolower(removeWhiteSpace($inputValues['friendEmail2']));
				} else if ($isFriend3) {
					$inputValues['name'] = $inputValues['friendName3'];
					$inputValues['email'] = strtolower(removeWhiteSpace($inputValues['friendEmail3']));
				}
			}
					
					
					
					
			
			/* ******************************************** */
			/* 		Test For Email Already Registered		*/
			/* ******************************************** */
			$email = $inputValues['email'];
			$numEmailUsed = 0;
			
			// test only id new
			if($isNew) {
				// test - participant email used
				if( $db->participantEmailRegistered($email) ) {
					$numEmailUsed++;
					// bad - participant email used
					$resultArray[$PARTICIPANT_EMAIL_USED] = 1;
					$resultArray[$MESSAGE] = $errorMessages[$PARTICIPANT_EMAIL_USED];
				}
				// test - participant email used
				if( $db->mentorEmailRegistered($email) ) {
					$numEmailUsed++;
					// bad - participant email used
					$resultArray[$MENTOR_EMAIL_USED] = 1;
					$resultArray[$MESSAGE] = $errorMessages[$MENTOR_EMAIL_USED];
				}
			}
			
			// test - any email used
			if($numEmailUsed == 0) {
				
				// good - any email used
				$resultArray[$PARTICIPANT_EMAIL_USED] = 0;
				$resultArray[$MENTOR_EMAIL_USED] = 0;
				
				
				
		
				/* **************************************** */
				/* 		Participant Upload File Script		*/
				/* **************************************** */
				$fileUploadErrors = 0;
				if($isParticipant) {
					if(empty($_FILES["resume"]["name"])) {
						$inputValues['resume'] = $inputValues['resumeName'];
						
					} else {
						//echo "uploading resume";
						
						// get unique date
						$date = date("YmdHis");
						$fileNameAddition = "___" . $date;
						
						// get names and extensions
						$defaultFileName = basename($_FILES["resume"]["name"]);
						$tmpFileName = $_FILES["resume"]["tmp_name"];
						$fileType = pathinfo($defaultFileName, PATHINFO_EXTENSION);
						$extensionPos = strrpos($defaultFileName, '.'); // find position of the last dot, so where the extension starts
						
						// test - file size
						$maxsize = 2097152;
						if( ($_FILES['resume']['size'] >= $maxsize) || ($_FILES["resume"]["size"] == 0) ) {
							// bad - file size
							$fileUploadErrors++;
							$resultArray[$FILE_SIZE_TOO_LARGE] = 1;
							$resultArray[$MESSAGE] = $errorMessages[$FILE_SIZE_TOO_LARGE];
						// success - file size
						} else {
							// good - file size
							$resultArray[$FILE_SIZE_TOO_LARGE] = 0;
						}
	
						// get updated name
						$updatedFileName = substr($defaultFileName, 0, $extensionPos) . $fileNameAddition . substr($defaultFileName, $extensionPos);
						$inputValues['resume'] = $updatedFileName;
						
						
						// test - successful upload
						$targetFile = "../hidden/resumes/" . $updatedFileName;
						if( !move_uploaded_file($tmpFileName, $targetFile) ) {
							// bad - successful upload
							$fileUploadErrors++;
							$resultArray[$FILE_UPLOAD_ERROR] = 1;
							$resultArray[$MESSAGE] = $errorMessages[$FILE_UPLOAD_ERROR];
						// success - successful upload
						} else {
							// good - successful upload
							$resultArray[$FILE_UPLOAD_ERROR] = 0;
						}
						
					} // end else not empty resume -> so upload it
				} // end if participant
				
				// test - file upload
				if($fileUploadErrors == 0){
					
					// good - file upload
					
					
					
					
			
					/* **************************** */
					/* 		Create Record Test		*/
					/* **************************** */
					// create key
					if($isNew) {
						$keyPrefix = ($isParticipant || $isParticipantFriend) ? "P-" : "M-";
						$key = $keyPrefix . substr(str_shuffle("abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789"), 0, 6);
						
						// set new keys
						if($isParticipant) 
							$resultArray[$PARTICIPANT_KEY] = $key;
						else if($isMentor) 
							$resultArray[$MENTOR_KEY] = $key;
						else if($isFriend1) 
							$resultArray[$FRIEND_1_KEY] = $key;
						else if($isFriend2) 
							$resultArray[$FRIEND_2_KEY] = $key;
						else if($isFriend3) 
							$resultArray[$FRIEND_3_KEY] = $key;
					}
					//printArray($inputValues); die();
					// add record
					$insertResult = false;
					if($isParticipant)
						$insertResult = $db->addParticipant($inputValues, $key, $isNew);
					else if($isMentor)
						$insertResult = $db->addMentor($inputValues, $key, $isNew);
					else if($isParticipantFriend)
						$insertResult = $db->addParticipantFriend($inputValues, $key);
					else if($isMentorFriend)
						$insertResult = $db->addMentorFriend($inputValues, $key);
					
					// test - insert record
					if( !$insertResult ) {
						// bad - insert record
						if($isParticipant || $isMentor) {
							$resultArray[$SELF_RECORD_ERROR] = 1;
							$resultArray[$MESSAGE] = $errorMessages[$SELF_RECORD_ERROR];
						} else {
							$resultArray[$FRIEND_RECORD_ERROR] = 1;
							$resultArray[$MESSAGE] = $errorMessages[$FRIEND_RECORD_ERROR];
						}
						
					// success - insert record
					} else {
						
						// good - insert record
						if($isParticipant || $isMentor)
							$resultArray[$SELF_RECORD_ERROR] = 0;
						else if($isFriend)
							$resultArray[$FRIEND_RECORD_ERROR] = 0;
				
							
						
						/* ******************************** */
						/* 		Send Self Email Test		*/
						/* ******************************** */
						$emailSuccess = false;
						
						// send email
						$emailResult = false;
						if($isNew){
							if($isParticipant || $isMentor)
								$emailResult = EmailHelperClass::createAndSendEmail_Confirmation($inputValues, $key, $isParticipant);
							else if ($isFriend)
								$emailResult = EmailHelperClass::createAndSendEmail_RegistrationNotice($inputValues, $key, $isParticipant);
						} else {
							$emailResult = true;
						}
						
						// test - send self email
						if( !$emailResult ) {
							// bad - send self email
							if($isParticipant || $isMentor) {
								$resultArray[$SELF_EMAIL_ERROR] = 1;
								$resultArray[$MESSAGE] = $errorMessages[$SELF_EMAIL_ERROR];
							} else if($isFriend) {
								$resultArray[$FRIEND_EMAIL_ERROR] = 1;
								$resultArray[$MESSAGE] = $errorMessages[$FRIEND_EMAIL_ERROR];
							}
							
						// success - send self email
						} else {
							// good - send self email
							if($isParticipant || $isMentor) 
								$resultArray[$SELF_EMAIL_ERROR] = 0;
							else if($isFriend)
								$resultArray[$FRIEND_EMAIL_ERROR] = 0;
							
							$emailSuccess = true;
						}
						
							
						// test - email success - final test?
						if($emailSuccess) {
							// good - complete registration !!!
							if($isParticipant)
								$resultArray[$PARTICIPANT_SUCCESS] = 1;
							else if($isMentor)
								$resultArray[$MENTOR_SUCCESS] = 1;
							else if($isFriend1)
								$resultArray[$FRIEND_1_SUCCESS] = 1;
							else if($isFriend2)
								$resultArray[$FRIEND_2_SUCCESS] = 1;
							else if($isFriend3)
								$resultArray[$FRIEND_3_SUCCESS] = 1;
							
						} // end else for send self email
						
						
							
					} // end else for insert self record test
					
				} // end else file upload test
				
				
					
			} // end else for participant and mentor email already used test
			
		} // end else for empty inputs test
		
	} // end else for missing inputs test
	

	return array("resultArray" => $resultArray, "inputValues" => $inputValues);
	
}





function getPersonData($isParticipant, $key) {
	include 'GeneralHelper.php';
	include 'DBHelperClass.php';

	// create database helper
	$db = new DBHelperClass();
	
	// get person data
	$datas = array();
	if($isParticipant)
		$datas = $db->getPeople($isParticipant, $key);
	else
		$datas = $db->getPeople($isParticipant, $key);
	
	// close database helper
	$db->close();
	
	// check if empty
	if(empty($datas))
		return array("success" => false);
	$data = $datas[0];
	
	return array("success" => true, "data" => $data);
}


function unregisterPerson($isParticipant, $key) {
	include 'DBHelperClass.php';
	
	// create database helper
	$db = new DBHelperClass();
	
	// unregister
	$ret = $db->cancelRegistration($isParticipant, $key);
	
	// close database helper
	$db->close();
	
	return $ret;
}

function reRegisterPerson($isParticipant, $key) {
	include 'DBHelperClass.php';
	
	// create database helper
	$db = new DBHelperClass();
	
	// unregister
	$ret = $db->redoRegistration($isParticipant, $key);
	
	// close database helper
	$db->close();
	
	return $ret;
}


?>