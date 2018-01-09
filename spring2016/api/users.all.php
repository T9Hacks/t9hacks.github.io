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
	if($db->loginToken($_GET["token"])) {
	//if(false) {
		
		// create an array for people
		$people = array("participants" => array(), "mentors" => array());
		
		// fields desired
		$fields = array("id", "key", "name", "email", "phone", "shirt", "checked_in");
		
		// get participants
		$participants = $db->getParticipants();
		foreach($participants as $id => $participant) {
			if($participant["approved"] == 1 && $participant["unregistered"] == 0) {
				foreach($fields as $field) {
					$people["participants"][$participant["id"]][$field] = $participant[$field];
				}
			}
		}
		
		// get mentors
		$mentors = $db->getMentors();
		foreach($mentors as $id => $mentor) {
			if($mentor["unregistered"] == 0) {
				//$people["participants"][] = $mentor;
				foreach($fields as $field) {
					$people["mentors"][$mentor["id"]][$field] = $mentor[$field];
				}
			}
		}
		
		// close database helper
		$db->close();
		
		// json encode array
		$result["result"] = "success";
		$result["data"] = $people;
		
		
	} else {
		$result["data"] = "Error: Token did not match.";
	}
	
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
