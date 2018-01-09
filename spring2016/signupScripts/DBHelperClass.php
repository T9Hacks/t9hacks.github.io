<?php

class DBHelperClass {
	var $conn = null;
	
	function __construct() {
		
		try {
			$sqlFile = 'sqlite:../../protected/db.sqlite';
			
			$this->conn = new PDO($sqlFile, "", "");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			
		} catch(PDOException $e) {
			//echo "Connection failed: <pre>" . print_r($e, true) . '</pre>';
		}
		
		// set correct time size
		date_default_timezone_set('America/Denver');
		//die();
	}
	
	function addParticipant($inputValues, $key, $isNew) {
		// get current datetime
		$datetime = date("Y-m-d H:i:s");
		
		// prepare statement
		if($isNew) {
			$prepStmt = "INSERT INTO `t9hacks_participants` 
				(
					`key`, 
					`name`, 
					`email`, 
					`college`, 
					`major`, 
					`phone`, 
					`gender`,
					`linkedin`, 
					`resume`, 
					`website`, 
					`github`, 
					`company`, 
					`position`, 
					`facebook`, 
					`twitter`, 
					`shirt`, 
					`comment`, 
					`coc_agree`,
					`datetime`, 
					`complete`
				) 
				VALUES (
					:key, 
					:name, 
					:email, 
					:college, 
					:major, 
					:phone, 
					:gender, 
					:linkedin, 
					:resume, 
					:website, 
					:github, 
					:company, 
					:position, 
					:facebook, 
					:twitter, 
					:shirt, 
					:comment, 
					:coc_agree, 
					:datetime, 
					1
				)";
		} else {
			$prepStmt = "UPDATE `t9hacks_participants` 
				SET `name` 		= :name, 
					`email` 	= :email, 
					`college`	= :college, 
					`major`		= :major, 
					`phone`		= :phone, 
					`gender`	= :gender,
					`linkedin`	= :linkedin, 
					`resume`	= :resume, 
					`website`	= :website, 
					`github`	= :github, 
					`company`	= :company, 
					`position`	= :position, 
					`facebook`	= :facebook, 
					`twitter`	= :twitter, 
					`shirt`		= :shirt, 
					`comment`	= :comment, 
					`coc_agree`	= :coc_agree,
					`datetime`	= :datetime, 
					`complete`	= 1 
				WHERE key = :key";
		}
		$stmt = $this->conn->prepare($prepStmt);
		$stmt->bindParam(':key', 		$key);
		$stmt->bindParam(':name', 		$inputValues['name']);
		$stmt->bindParam(':email', 		$inputValues['email']);
		$stmt->bindParam(':college', 	$inputValues['college']);
		$stmt->bindParam(':major', 		$inputValues['major']);
		$stmt->bindParam(':phone', 		$inputValues['phone']);
		$stmt->bindParam(':gender', 	$inputValues['gender']);
		$stmt->bindParam(':linkedin', 	$inputValues['linkedin']);
		$stmt->bindParam(':resume', 	$inputValues['resume']);
		$stmt->bindParam(':website', 	$inputValues['website']);
		$stmt->bindParam(':github',		$inputValues['github']);
		$stmt->bindParam(':company', 	$inputValues['company']);
		$stmt->bindParam(':position', 	$inputValues['position']);
		$stmt->bindParam(':facebook',	$inputValues['facebook']);
		$stmt->bindParam(':twitter', 	$inputValues['twitter']);
		$stmt->bindParam(':shirt', 		$inputValues['shirt']);
		$stmt->bindParam(':comment',	$inputValues['comment']);
		$stmt->bindParam(':coc_agree',	$inputValues['agree']);
		$stmt->bindParam(':datetime', 	$datetime);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		//echo $updateCount; echo ($isNew) ? "yes" : "no"; die();
		return($updateCount>0);
	}
	
	function addParticipantFriend($inputValues, $key) {
		// get current datetime
		$datetime = date("Y-m-d H:i:s");
		
		// prepare statement
		$prepStmt = "INSERT INTO `t9hacks_participants` 
				(`key`, `name`, `email`, `datetime`, `complete`) 
				VALUES (:key, :name, :email, :datetime, 0)";
		$stmt = $this->conn->prepare($prepStmt);
		$stmt->bindParam(':key', 		$key);
		$stmt->bindParam(':name', 		$inputValues['name']);
		$stmt->bindParam(':email', 		$inputValues['email']);
		$stmt->bindParam(':datetime', 	$datetime);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	function addMentor($inputValues, $key, $isNew) {
		// get current datetime
		$datetime = date("Y-m-d H:i:s");
		
		// prepare statement
		if($isNew) {
			$prepStmt = "INSERT INTO `t9hacks_mentors` 
				(
					`key`, 
					`name`, 
					`email`, 
					`phone`, 
					`gender`, 
					`company`, 
					`position`, 
					`breakfast`, 
					`lunch`, 
					`dinner`, 
					`area`, 
					`shirt`,
					`comment`, 
					`coc_agree`, 
					`datetime`, 
					`complete`
				)  
				VALUES (
					:key, 
					:name, 
					:email, 
					:phone, 
					:gender, 
					:company, 
					:position, 
					:breakfast, 
					:lunch, 
					:dinner, 
					:area, 
					:shirt,
					:comment, 
					:coc_agree, 
					:datetime, 
					1
				)";
		} else {
			$prepStmt = "UPDATE `t9hacks_mentors` 
				SET `name`				= :name, 
					`email`				= :email, 
					`phone`				= :phone, 
					`gender`			= :gender,
					`company`			= :company, 
					`position`			= :position, 
					`breakfast`			= :breakfast, 
					`lunch`				= :lunch, 
					`dinner`			= :dinner, 
					`area`				= :area, 
					`shirt`				= :shirt, 
					`comment`			= :comment, 
					`coc_agree`			= :coc_agree,
					`datetime`			= :datetime, 
					`complete`			= 1 
				WHERE `key` = :key";
		}
		$stmt = $this->conn->prepare($prepStmt);
		$stmt->bindParam(':key', 			$key);
		$stmt->bindParam(':name', 			$inputValues['name']);
		$stmt->bindParam(':email', 			$inputValues['email']);
		$stmt->bindParam(':phone', 			$inputValues['phone']);
		$stmt->bindParam(':gender', 		$inputValues['gender']);
		$stmt->bindParam(':company', 		$inputValues['company']);
		$stmt->bindParam(':position', 		$inputValues['position']);
		$stmt->bindParam(':breakfast',		$inputValues['breakfast']);
		$stmt->bindParam(':lunch', 			$inputValues['lunch']);
		$stmt->bindParam(':dinner', 		$inputValues['dinner']);
		$stmt->bindParam(':area',			$inputValues['area']);
		$stmt->bindParam(':shirt',			$inputValues['shirt']);
		$stmt->bindParam(':comment',		$inputValues['comment']);
		$stmt->bindParam(':coc_agree',		$inputValues['agree']);
		$stmt->bindParam(':datetime', 		$datetime);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	function addMentorFriend($inputValues, $key) {
		// get current datetime
		$datetime = date("Y-m-d H:i:s");
		
		// prepare statement
		$prepStmt = "INSERT INTO `t9hacks_mentors` 
				(`key`, `name`, `email`, `datetime`, `complete`)  
				VALUES (:key, :name, :email, :datetime, 0)";
		$stmt = $this->conn->prepare($prepStmt);
		$stmt->bindParam(':key', 			$key);
		$stmt->bindParam(':name', 			$inputValues['name']);
		$stmt->bindParam(':email', 			$inputValues['email']);
		$stmt->bindParam(':datetime', 		$datetime);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	
	
	// getters 
	function getParticipants($key = null) {
		return $this->getPeopleFromKey(1, $key);
	}
	
	function getMentors($key = null) {
		return $this->getPeopleFromKey(0, $key);
	}
	
	function getPeopleFromKey($isParticipant, $key = null) {
		return $this->getPeople($isParticipant, $key, null);
	}
	
	function getPeopleFromId($isParticipant, $id = null) {
		return $this->getPeople($isParticipant, null, $id);
	}
	
	function getPeople($isParticipant, $key = null, $id = null) {
		// prepare statement
		$table = ($isParticipant) ? "`t9hacks_participants`" : "`t9hacks_mentors`";
		if(is_null($key) && is_null($id)) {
			$stmt = $this->conn->prepare("SELECT * FROM $table");
		} else if(is_null($key)) {
			$stmt = $this->conn->prepare("SELECT * FROM $table WHERE `id` = :id");
			$stmt->bindParam(':id', $id);
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM $table WHERE `key` = :key");
			$stmt->bindParam(':key', $key);
		}
		
		// run
		$stmt->execute();
		
		// store data in array
		$people = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
			$people[] = $row;
		}
		
		return $people;
	}
	
	
	
	function participantEmailRegistered($email) {
		$sql = "SELECT COUNT(*) AS c FROM `t9hacks_participants` WHERE `email` = :email AND `deleted` = 0 AND `unregistered` = 0";
		return $this->emailRegistered($email, $sql);
	}
	
	function mentorEmailRegistered($email) {
		$sql = "SELECT COUNT(*) AS c FROM `t9hacks_mentors` WHERE `email` = :email AND `deleted` = 0 AND `unregistered` = 0";
		return $this->emailRegistered($email, $sql);
	}
	
	function emailRegistered($email, $sql) {
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $email);
		
		// run
		$stmt->execute();
		
		// store data in array
		$pCount = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
			$pCount = $row;
		}
		
		//print_r($pCount); die();
		// test if email used
		return ($pCount["c"] != 0);
	}
	
	
	
	
	function updateRecord($isParticipant, $id, $column, $value) {
		$table = ($isParticipant) ? "`t9hacks_participants`" : "`t9hacks_mentors`";
		$stmt = $this->conn->prepare("UPDATE $table SET $column = :value WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':value', $value);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	function updateRecordIdKey($id, $key, $column, $value) {
		$isParticipant = ( substr($key, 0, 1) == "P" );
		$table = ($isParticipant) ? "`t9hacks_participants`" : "`t9hacks_mentors`";
		$stmt = $this->conn->prepare("UPDATE $table SET $column = :value WHERE `id` = :id AND `key` = :key");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':key', $key);
		$stmt->bindParam(':value', $value);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	function cancelRegistration($isParticipant, $key) {
		$table = ($isParticipant) ? "`t9hacks_participants`" : "`t9hacks_mentors`";
		$stmt = $this->conn->prepare("UPDATE $table SET `unregistered` = 1 WHERE `key` = :key");
		$stmt->bindParam(':key', $key);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	function redoRegistration($isParticipant, $key) {
		$table = ($isParticipant) ? "`t9hacks_participants`" : "`t9hacks_mentors`";
		$stmt = $this->conn->prepare("UPDATE $table SET `unregistered` = 0 WHERE `key` = :key");
		$stmt->bindParam(':key', $key);
		
		// use exec() because no results are returned
		$stmt->execute();
		
		// echo a message to say the UPDATE succeeded
		$updateCount = $stmt->rowCount();
		return($updateCount>0);
	}
	
	
	
	
	function login($username, $password) {
		$passwordHash = sha1($password);
		
		$stmt = $this->conn->prepare("SELECT COUNT(*) AS c FROM `t9hacks_users` WHERE `username` = :username AND `password_hash` = :passwordHash");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':passwordHash', $passwordHash);
		$stmt->execute();
		
		// store data in array
		$pCount = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
			$pCount = $row;
		}
		
		// test if email used
		return ($pCount["c"] == 1);
	}
	
	
	function loginToken($token) {
		
		$stmt = $this->conn->prepare("SELECT COUNT(*) AS c FROM `t9hacks_users` WHERE `password_hash` = :token");
		$stmt->bindParam(':token', $token);
		$stmt->execute();
		
		// store data in array
		$pCount = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
			$pCount = $row;
		}
		
		// test if email used
		return ($pCount["c"] == 1);
	}
	
	
	
	function runExe($exe) {
		$stmt = $this->conn->prepare($exe);
		$stmt->execute();
	}
	
	
	function close() {
		$conn = null;
	}
	
}