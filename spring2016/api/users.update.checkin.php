<?php

include_once '../signupScripts/DBHelperClass.php';
include_once '../signupScripts/GeneralHelper.php';

$result = array();
$result["result"] = "failure";
$result["data"] = "Error: Unknown";

// check if token exists
if(array_key_exists("token", $_GET)) {
	
	// create database helper
	$db = new DBHelperClass();
	
	// test token
	if(!$db->loginToken($_GET["token"])) {
		$result["data"] = "Error: Token did not match.";
	} else {
		
		if(!array_key_exists("id", $_GET)) {
			$result["data"] = "Error: No id identifer.";
		} else {
			
			if(!array_key_exists("key", $_GET)) {
				$result["data"] = "Error: No key identifer.";
			} else {
				
				if(!array_key_exists("badge", $_GET)) {
					$result["data"] = "Error: No badge identifer.";
				} else {
					
					$id = $_GET["id"];
					$key = $_GET["key"];
					$badge = $_GET["badge"];
					
					$res_checkin = $db->updateRecordIdKey($id, $key, "checked_in", 1);
					
					if(!$res_checkin) {
						$result["data"] = "Error: Could not check person in.";
					} else {
						
						$res_badge = $db->updateRecordIdKey($id, $key, "badge_id", $badge);
						
						if(!$res_badge) {
							$result["data"] = "Error: Could not update badge.";
							$res_checkin = $db->updateRecordIdKey($id, $key, "checked_in", 0);
						} else {
						
							// get all the checked in people
							$people = array("participants" => array(), "mentors" => array());
							
							// fields desired
							$fields = array("id", "key", "name", "checked_in");
							
							// get participants
							$participants = $db->getParticipants();
							foreach($participants as $id => $participant) {
								if($participant["approved"] == 1 && $participant["unregistered"] == 0 && $participant["checked_in"] == 1) {
									foreach($fields as $field) {
										$people["participants"][$participant["id"]][$field] = $participant[$field];
									}
								}
							}
							
							// get mentors
							$mentors = $db->getMentors();
							foreach($mentors as $id => $mentor) {
								if($mentor["unregistered"] == 0 && $mentor["checked_in"] == 1) {
									//$people["participants"][] = $mentor;
									foreach($fields as $field) {
										$people["mentors"][$mentor["id"]][$field] = $mentor[$field];
									}
								}
							}
			
							// json encode array
							$result["result"] = "success";
							$result["data"] = $people;
							
						} // end check for update badge
						
					} // end check check in
				}
				
			} // end check for key identifer	
			
		}	// end check for id identifer	
		
	} // end check for token
	
	
	// close database helper
	$db->close();
	
} else {
	$result["data"] = "Error: No Token sent.";
}


$jsonResult = json_encode($result, JSON_PRETTY_PRINT);

// print array to screen as results
if(array_key_exists("readable", $_GET) && strtolower($_GET["readable"]) == "true") {
	echo'<pre>';
	print_r($jsonResult);
	echo'</pre>';
} else {
	print_r($jsonResult);
}
