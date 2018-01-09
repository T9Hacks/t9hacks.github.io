<?php 

include_once 'DBHelperClass.php';
include_once 'EmailHelperClass.php';

$isSession = false;

// check if session
if(array_key_exists("t9hacks_login", $_COOKIE) && $_COOKIE["t9hacks_login"] == 1) {
	
	// set session
	$isSession = true;
	
	// create helper
	$db = new DBHelperClass();
	
	// make submit
	if(array_key_exists("action", $_POST) && array_key_exists("id", $_POST) && array_key_exists("type", $_POST)) {
		$id = $_POST["id"];
		$type = $_POST["type"];
			
		switch($_POST["action"]) {
			case "delete":
				$db->updateRecord(($type == 1), $id, "deleted", 1);
				break;
			case "approve":
				$db->updateRecord(($type == 1), $id, "approved", 1);
				if($type==1)
					EmailHelperClass::createAndSendEmail_Approval($db->getPeopleFromId(($type == 1), $id));
				break;
			case "wait":
				$db->updateRecord(($type == 1), $id, "approved", 3);
				break;
			case "reject":
				$db->updateRecord(($type == 1), $id, "approved", 2);
				if($type == 1)
					EmailHelperClass::createAndSendEmail_Rejection($db->getPeopleFromId(($type == 1), $id));
				break;
			case "checkIn":
				$db->updateRecord(($type == 1), $id, "checked_in", 1);
				break;
			case "unCheckIn":
				$db->updateRecord(($type == 1), $id, "checked_in", 0);
				break;
			case "cancel":
				$db->updateRecord(($type == 1), $id, "unregistered", 1);
				break;
			case "activate":
				$db->updateRecord(($type == 1), $id, "unregistered", 0);
				break;
			case "reminder1" :
				if($type == 1) {
					$db->updateRecord(($type == 1), $id, "reminder_num", 1);
					EmailHelperClass::createAndSendEmail_ReminderToCompleteRegistration1($db->getPeopleFromId(($type == 1), $id));
				}
				break;
			case "reminder2" :
				if($type == 1) {
					$db->updateRecord(($type == 1), $id, "reminder_num", 2);
					EmailHelperClass::createAndSendEmail_ReminderToCompleteRegistration2($db->getPeopleFromId(($type == 1), $id));
				}
				break;
				
			case "markFemale":
				$db->updateRecord(($type == 1), $id, "set_gender", 1);
				break;
			case "markMale":
				$db->updateRecord(($type == 1), $id, "set_gender", 2);
				break;
			case "markX":
				$db->updateRecord(($type == 1), $id, "set_gender", 3);
				break;
			case "markCU":
				$db->updateRecord(($type == 1), $id, "set_college", 1);
				break;
			case "markCO":
				$db->updateRecord(($type == 1), $id, "set_college", 2);
				break;
			case "markUS":
				$db->updateRecord(($type == 1), $id, "set_college", 3);
				break;
			case "markWorld":
				$db->updateRecord(($type == 1), $id, "set_college", 4);
				break;
				
			case "2weeksparticipants" :
				$db->updateRecord(($type == 1), $id, "sent_2_weeks", 1);
				EmailHelperClass::createAndSendEmail_Reminder2WeeksParticipants($db->getPeopleFromId(($type == 1), $id));
				break;
			case "2weeksparticipantsfar" :
				$db->updateRecord(($type == 1), $id, "sent_2_weeks", 1);
				EmailHelperClass::createAndSendEmail_Reminder2WeeksParticipantsFar($db->getPeopleFromId(($type == 1), $id));
				break;
			case "2weeksmentors" :
				$db->updateRecord(($type == 1), $id, "sent_2_weeks", 1);
				EmailHelperClass::createAndSendEmail_Reminder2WeeksMentors($db->getPeopleFromId(($type == 1), $id));
				break;
				
			case "tomorrowparticipants" :
				$db->updateRecord(($type == 1), $id, "sent_tomorrow", 1);
				EmailHelperClass::createAndSendEmail_ReminderTomorrowParticipants($db->getPeopleFromId(($type == 1), $id));
				break;
			case "tomorrowmentors" :
				$db->updateRecord(($type == 1), $id, "sent_tomorrow", 1);
				EmailHelperClass::createAndSendEmail_ReminderTomorrowMentors($db->getPeopleFromId(($type == 1), $id));
				break;
				
			case "confirmed" :
				$db->updateRecord(($type == 1), $id, "confirmed_attending", 1);
				break;
			case "unconfirmed" :
				$db->updateRecord(($type == 1), $id, "confirmed_attending", 0);
				break;
			default: break;
		}
		//die();
		header('Location: view.php');
		$db->close();
	}
	
	
	
	// run sql stmt
	if(array_key_exists("exe", $_POST) && $_POST["exe"] == 1) {
		// check if exe
		if(array_key_exists("exeStmt", $_POST)) {
			// get exeStmt
			$exe = $_POST["exeStmt"];
			
			// check in id
			$db->runExe($exe);
			
			// close helper
			$db->close();
			
			// relocate to same page without post data
			header('Location: view.php');
		}
	}
	
	// get participants
	$participants = $db->getParticipants();
	
	// get mentors
	$mentors = $db->getMentors();
	
	// close helper
	$db->close();

// no session
} else {
	
	// check if loggin in
	if(array_key_exists("login", $_POST) && $_POST["login"] == 1) {
		
		// check if username and login exists
		if(array_key_exists("username", $_POST) && array_key_exists("password", $_POST)) {
			
			// get data
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			// create helper
			$db = new DBHelperClass();
			
			// check if correct login
			if($db->login($username, $password)) {
				// correct, so set cookie
				setcookie("t9hacks_login", "1", time()+(60*60*24));
				
				// close helper
				$db->close();
				
			// relocate to same page without post data
			header('Location: view.php');
			}
			
			// close helper
			$db->close();
		}
		
	}
	
}




//echo '<pre>' . print_r($participants, true) . '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>T9Hacks - Database</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php include "../includes/css.php"; css(true); ?>
	<link href="../css/adminView.css" rel="stylesheet">
	
</head>
<body>

	<?php 
	if(!$isSession) {
		?>
		<form action="view.php" method="post">
			<label>Username</label>
			<input type="text" name="username" />
			<label>Password</label>
			<input type="password" name="password" />
			<input type="hidden" name="login" value="1">
			<input type="submit" value="Login"/>
		</form>
		<?php 
	} else if($isSession) {
		$shirtCounts = array();
		$shirtTypes = array("X-Small", "Small", "Medium", "Large", "X-Large", "XX-Large", "None", "", "Total");
		foreach($shirtTypes as $key => $type) {
			$shirtCounts[0]["all"][$type] = 0;
			$shirtCounts[0]["admitted"][$type] = 0;
			$shirtCounts[1][$type] = 0;
		}
		
		$dinnerCount = 0;
		$breakfastCount = 0;
		$lunchCount = 0;
		
	?>
		
		<div class="filterButtons">
			<div class="filterGroup tabs">
				<div class="tabBtn active" id="participantsBtn">Participants</div>
				<div class="tabBtn" id="mentorsBtn">Mentors</div>
				<div class="tabBtn" id="extrasBtn">Extras</div>
			</div> 
			
			<div class="filterGroup">
				<div class="filterBtn active" id="allFilterBtn" data-self="all">All<span></span></div>
			</div>
			
			<div class="filterGroup">
				<div class="specialFilterBtn">Toggle Special Filters</div>
			</div>
			<div class="specialFilterGroup">
				<div class="filterGroup">
					<div class="filterBtn" id="sendTomorrowFilterBtn" data-self="sendTomorrow">Send Tomorrow<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="definitelyApprovedFilterBtn" data-self="definitelyApproved">Definitely Approved<span></span></div>
					<div class="filterBtn" id="definitelyNotApprovedFilterBtn" data-self="definitelyNotApproved">Definitely Not Approved<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="definitelyConfirmedFilterBtn" data-self="definitelyConfirmed">Definitely Confirmed<span></span></div>
					<div class="filterBtn" id="definitelyNotConfirmedFilterBtn" data-self="definitelyNotConfirmed">Definitely Not Confirmed<span></span></div>
				</div>
			</div>
			
			<div class="filterGroup">
				<div class="specificFilterBtn">Toggle Specific Filters</div>
			</div>
			<div class="specificFilterGroup" style="display: none;">
				<div class="filterGroup">
					<div class="filterBtn" id="send2weeksFilterBtn" data-self="send2weeks">Send 2 Weeks<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="approvedFilterBtn" data-self="approved">Approved Admission<span></span></div>
					<div class="filterBtn" id="rejectedFilterBtn" data-self="rejected">Rejected Admission<span></span></div>
					<div class="filterBtn" id="waitFilterBtn" data-self="wait">Wait Admission<span></span></div>
					<div class="filterBtn" id="undecidedFilterBtn" data-self="undecided">Undecided Admission<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="completeFilterBtn" data-self="complete">Registration Complete<span></span></div>
					<div class="filterBtn" id="incompleteFilterBtn" data-self="incomplete">Registration Incomplete<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="activeRegFilterBtn" data-self="activeReg">Active Registration<span></span></div>
					<div class="filterBtn" id="canceledRegFilterBtn" data-self="canceledReg">Canceled Registration<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="confirmedFilterBtn" data-self="confirmed">Confirmed Registration<span></span></div>
					<div class="filterBtn" id="unconfirmedFilterBtn" data-self="unconfirmed">Unconfirmed Registration<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="checkedInFilterBtn" data-self="checkedIn">Checked-in<span></span></div>
					<div class="filterBtn" id="notCheckedInFilterBtn" data-self="notCheckedIn">Not Checked-in<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="genderFemaleFilterBtn" data-self="genderFemale">Women<span></span></div>
					<div class="filterBtn" id="genderMaleFilterBtn" data-self="genderMale">Men<span></span></div>
					<div class="filterBtn" id="genderXFilterBtn" data-self="genderX">X<span></span></div>
					<div class="filterBtn" id="genderUnknownFilterBtn" data-self="genderUnknown">Unknown<span></span></div>
				</div>
				<div class="filterGroup">
					<div class="filterBtn" id="collegeCUFilterBtn" data-self="collegeCU">CU<span></span></div>
					<div class="filterBtn" id="collegeCOFilterBtn" data-self="collegeCO">CO<span></span></div>
					<div class="filterBtn" id="collegeUSFilterBtn" data-self="collegeUS">US<span></span></div>
					<div class="filterBtn" id="collegeWorldFilterBtn" data-self="collegeWorld">World<span></span></div>
					<div class="filterBtn" id="collegeUnknownFilterBtn" data-self="collegeUnknown">Unknown<span></span></div>
				</div>
			</div>
			
			<div class="filterGroup">
				<a href="downloadViewCSV.php" class="btn btn-l" target="_blank">Download CSV</a>
			</div>
		</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		<div class="tabSectionWrapper">
		
			<div id="participantsDiv" class="peopleSection">
			
				<?php 
				$num = 1;
				foreach($participants as $personKey => $person) {
					// only print row if deleted is false
					if($person["deleted"] == 0) {
					?>
					
						<div class="person all <?php 
							if($person["approved"] == 1) echo "approved ";
								else if($person["approved"] == 2) echo "rejected ";
								else if($person["approved"] == 3) echo "wait ";
								else echo "undecided ";
							echo ($person["complete"] == 1) ? "complete " : "incomplete ";
							echo ($person["unregistered"] == 1) ? "canceledReg " : "activeReg ";
							echo ($person["confirmed_attending"] == 1) ? "confirmed " : "unconfirmed ";
							echo ($person["checked_in"] == 1) ? "checkedIn " : "notCheckedIn ";
							if($person["set_gender"] == 1) echo "genderFemale ";
								else if($person["set_gender"] == 2) echo "genderMale ";
								else if($person["set_gender"] == 3) echo "genderX ";
								else echo "genderUnknown ";
							if($person["set_college"] == 1) echo "collegeCU ";
								else if($person["set_college"] == 2) echo "collegeCO ";
								else if($person["set_college"] == 3) echo "collegeUS ";
								else if($person["set_college"] == 4) echo "collegeWorld ";
								else echo "collegeUnknown ";
							echo ($person["approved"] == 1 && $person["sent_2_weeks"] == 0) ? "send2weeks " : "sent2weeks ";
							echo ($person["approved"] == 1 && $person["unregistered"] == 0 && $person["sent_tomorrow"] == 0) ? "sendTomorrow " : "sentTomorrow ";
							echo( $person["approved"] == 1 && $person["complete"] == 1 && $person["unregistered"] == 0) ? "definitelyApproved " : "definitelyNotApproved ";
							echo( $person["approved"] == 1 && $person["complete"] == 1 && $person["unregistered"] == 0 && $person["confirmed_attending"] == 1) ? "definitelyConfirmed " : "definitelyNotConfirmed ";
						?>">
						
							<div class="beg">
								<div class="cell-name column4"><?php echo $person["name"]; ?></div>
								<div class="cell-email column4"><?php echo $person["email"]; ?></div>
								<div class="cell-gender column4">
									<?php 
									if($person["set_gender"] == 1) echo "Female"; 
									else if ($person["set_gender"] == 2) echo "Male"; 
									else if($person["set_gender"] == 3) echo "Other Gendered";
									?>
								</div>
							</div>
							
							<div class="status column12">
								<div class="cell-key">
									Key: 
									<a href="../signupPages/signup-participant2.php?key=<?php echo $person["key"]; ?>" target="_blank">
										<?php echo $person["key"]; ?>
									</a>
								</div>
								<div class="cell-complete"><?php echo ($person["complete"] == 1) ? "Registration Complete" : "Registration Incomplete"; ?></div>
								<div class="cell-unregistered"><?php echo ($person["unregistered"] == 1) ? "Registration Canceled" : "Registration Active"; ?></div>
								<div class="cell-approved"><?php echo ($person["approved"] == 1) ? "Approved Admission" : ( ($person["approved"] == 0) ? "Undecided Admission" : "Rejected Admission"); ?></div>
								<div class="cell-checked-in"><?php echo ($person["checked_in"] == 1) ? "Checked-in" : "Not checked-in"; ?></div>
								<div class="">ID: <?php echo $person["id"]; ?></div>
								<div class="">Badge: <?php echo (is_null($person["badge_id"]) ? "No Badge" : $person["badge_id"]); ?></div>
							</div>
							
							<div class="other">
								<div class="cell-phone column4">Phone: <?php echo $person["phone"]; ?></div>
								<div class="cell-college column4">College: <?php echo $person["college"]; ?></div>
								<div class="cell-major column4">Major: <?php echo $person["major"]; ?></div>
								
								<div class="cell-shirt column4">Shirt Size: <?php echo $person["shirt"]; ?></div>
								<div class="cell-company column4">Company: <?php echo $person["company"]; ?></div>
								<div class="cell-position column4">Position: <?php echo $person["position"]; ?></div>
								
								<div class="cell-linkedin column4"><?php echo ($person["linkedin"] == "") ? "No Linkedin" : "<a href='" . $person["linkedin"] . "' target='_blank'>" . $person["linkedin"] . "</a>"; ?></div>
								<div class="cell-resume column4"><?php echo ($person["resume"] == "") ? "No Resume" : "<a href='../hidden/resumes/" . $person["resume"] . "' target='_blank'>" . $person["resume"] . "</a>"; ?></div>
								<div class="cell-website column4"><?php echo ($person["website"] == "") ? "No Website" : "<a href='" . $person["website"] . "' target='_blank'>" . $person["website"] . "</a>"; ?></div>
								<div class="cell-github column4"><?php echo ($person["github"] == "") ? "No Github" : "<a href='" . $person["github"] . "' target='_blank'>" . $person["github"] . "</a>"; ?></div>
								<div class="cell-facebook column4"><?php echo ($person["facebook"] == "") ? "No Facebook" : "<a href='" . $person["facebook"] . "' target='_blank'>" . $person["facebook"] . "</a>"; ?></div>
								<div class="cell-twitter column4"><?php echo ($person["twitter"] == "") ? "No Twitter" : "<a href='" . $person["twitter"] . "' target='_blank'>" . $person["twitter"] . "</a>"; ?></div>
								
								<div class="cell-gender column4">Gender: <?php echo $person["gender"]; ?></div>
								<div class="cell-comment column8">Comments: <?php echo $person["comment"]; ?></div>
							</div>
							
							<div class="actionBtns column12">
								<form action="view.php" method="POST">
								
									<input type="hidden" name="id" value="<?php echo $person["id"]; ?>">
									<input type="hidden" name="type" value="1">
									
									<input type="hidden" name="action" class="actionAction" value="">
									
									<button type="submit" class="btn actionBtn deleteBtn" data-action="delete">Delete</button>
									
									<?php if($person["approved"] == 0 || $person["key"] == "P-cdyRYz") { ?>
										<button type="submit" class="btn actionBtn approveBtn" data-action="approve">Approve</button>
										<button type="submit" class="btn actionBtn waitBtn" data-action="wait">Wait</button>
										<button type="submit" class="btn actionBtn rejectBtn" data-action="reject">Reject</button>
									<?php } else if($person["approved"] == 1) { ?>
										<button type="submit" class="btn actionBtn rejectBtn" data-action="reject">Reject</button>
									<?php } else if($person["approved"] == 2) { ?>
										<button type="submit" class="btn actionBtn approveBtn" data-action="approve">Approve</button>
									<?php }  else if($person["approved"] == 3) { ?>
										<button type="submit" class="btn actionBtn approveBtn" data-action="approve">Approve</button>
										<button type="submit" class="btn actionBtn rejectBtn" data-action="reject">Reject</button>
									<?php } ?>
									
									<?php if($person["checked_in"] == 0) { ?>
										<button type="submit" class="btn actionBtn checkInBtn" data-action="checkIn">Check-In</button>
									<?php } else { ?>
										<button type="submit" class="btn actionBtn unCheckInBtn" data-action="unCheckIn">Un-Check-In</button>
									<?php } ?>
									
									<?php if($person["unregistered"] == 0) { ?>
										<button type="submit" class="btn actionBtn unregisterBtn" data-action="cancel">Cancel Registration</button>
									<?php } else { ?>
										<button type="submit" class="btn actionBtn registerBtn" data-action="activate">Activate Registration</button>
									<?php } ?>
									
									<?php if( ($person["complete"] == 0 && $person["reminder_num"] == 0) || $person["key"] == "P-cdyRYz" ) { ?>
										<button type="submit" class="btn actionBtn reminderRegBtn" data-action="reminder1">Reminder to complete Registration</button>
									<?php } ?>
									<?php if( ($person["complete"] == 0 && $person["reminder_num"] == 1) || $person["key"] == "P-cdyRYz" ) { ?>
										<button type="submit" class="btn actionBtn reminderRegBtn" data-action="reminder2">Reminder to complete Registration Last Chance</button>
									<?php } ?>
									
									<br/>
									
									<?php if( ($person["set_gender"] == 0 && $person["complete"] == 1) || $person["key"] == "P-cdyRYz") { ?>
										<button type="submit" class="btn actionBtn setFemaleBtn" data-action="markFemale">Mark as Female</button>
										<button type="submit" class="btn actionBtn setMaleBtn" data-action="markMale">Mark as Male</button>
										<button type="submit" class="btn actionBtn setXBtn" data-action="markX">Mark as X</button>
									<?php } ?>
									
									<?php if( ($person["set_college"] == 0 && $person["complete"] == 1) || $person["key"] == "P-cdyRYz") { ?>
										<button type="submit" class="btn actionBtn setCUBtn" data-action="markCU">Mark as CU</button>
										<button type="submit" class="btn actionBtn setCOBtn" data-action="markCO">Mark as CO</button>
										<button type="submit" class="btn actionBtn setUSBtn" data-action="markUS">Mark as US</button>
										<button type="submit" class="btn actionBtn setWorldBtn" data-action="markWorld">Mark as World</button>
									<?php } ?>
									
										<button type="submit" class="btn actionBtn " data-action="2weeksparticipants">2 weeks away participants</button>
										<button type="submit" class="btn actionBtn " data-action="2weeksparticipantsfar">2 weeks away participants far</button>
									
										<button type="submit" class="btn actionBtn" data-action="tomorrowparticipants">tomorrow participants</button>
									
									
									<?php if( ($person["confirmed_attending"] == 0) || $person["key"] == "P-cdyRYz") { ?>
										<button type="submit" class="btn actionBtn " data-action="confirmed">Confirmed Attending</button>
									<?php } 
									if(($person["confirmed_attending"] == 1) || $person["key"] == "P-cdyRYz") { ?>
										<button type="submit" class="btn actionBtn " data-action="unconfirmed">Un-Confirmed Attending</button>
									<?php }?>
									
								</form>
							</div>
							
						</div>
					<?php 
					}
					
					$num++;
					
					$shirtCounts[0]["all"][$person["shirt"]]++;
					if($person["shirt"] != "") {
						$shirtCounts[0]["all"]["Total"]++;
					}
					if($person["approved"] == 1) {
						$shirtCounts[0]["admitted"][$person["shirt"]]++;
						$shirtCounts[0]["admitted"]["Total"]++;
					}
					
				}
				?>
				
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div id="mentorsDiv" class="peopleSection">
				
				<?php 
				$num = 1;
				foreach($mentors as $personKey => $person) {
					// only print row if deleted is false
					if($person["deleted"] == 0) {
					?>
					
						<div class="person all <?php 
							echo ($person["complete"] == 1) ? "complete " : "incomplete ";
							echo ($person["unregistered"] == 1) ? "canceledReg " : "activeReg ";
							echo ($person["confirmed_attending"] == 1) ? "confirmed " : "unconfirmed ";
							echo ($person["checked_in"] == 1) ? "checkedIn " : "notCheckedIn ";
							if($person["set_gender"] == 1) echo "genderFemale ";
								else if($person["set_gender"] == 2) echo "genderMale ";
								else if($person["set_gender"] == 3) echo "genderX ";
								else echo "genderUnknown ";
							echo ($person["sent_2_weeks"] == 0) ? "send2weeks " : "sent2weeks ";
							echo ($person["sent_tomorrow"] == 0 && $person["unregistered"] == 0) ? "sendTomorrow " : "sentTomorrow ";
						?>">
						
							<div class="beg">
								<div class="cell-name column4"><?php echo $person["name"]; ?></div>
								<div class="cell-email column4"><?php echo $person["email"]; ?></div>
								<div class="cell-gender column4">
									<?php 
									if($person["set_gender"] == 1) echo "Female"; 
									else if ($person["set_gender"] == 2) echo "Male"; 
									else if($person["set_gender"] == 3) echo "Other Gendered";
									?>
								</div>
							</div>
							
							<div class="status column12">
								<div class="cell-key">
									<a href="../signupPages/signup-mentor2.php?key=<?php echo $person["key"]; ?>" target="_blank">
										<?php echo $person["key"]; ?>
									</a>
								</div>
								<div class="cell-complete"><?php echo ($person["complete"] == 1) ? "Registration Complete" : "Registration Incomplete"; ?></div>
								<div class="cell-unregistered"><?php echo ($person["unregistered"] == 1) ? "Canceled Registration" : "Registration Active"; ?></div>
								<div class="cell-checked-in"><?php echo ($person["checked_in"] == 1) ? "Checked-in" : "Not checked-in"; ?></div>
							</div>
							
							<div class="other">
								<div class="cell-phone column4">Phone: <?php echo $person["phone"]; ?></div>
								<div class="cell-company column4">Company: <?php echo $person["company"]; ?></div>
								<div class="cell-position column4">Position: <?php echo $person["position"]; ?></div>
								
								<div class="cell-shirt column4">Shirt Size: <?php echo $person["shirt"]; ?></div>
								<div class="cell-area column8">Area: <?php echo $person["area"]; ?></div>
								<div></div>
								
								<div class="cell-dinner column4">Dinner: <?php echo ($person["dinner"] == 1) ? "Yes" : "No"; ?></div>
								<div class="cell-breakfast column4">Breakfast: <?php echo ($person["breakfast"] == 1) ? "Yes" : "No"; ?></div>
								<div class="cell-lunch column4">Lunch: <?php echo ($person["lunch"] == 1) ? "Yes" : "No"; ?></div>
								
								<div class="cell-gender column4">Gender: <?php echo $person["gender"]; ?></div>
								<div class="cell-comment column8">Comment: <?php echo $person["comment"]; ?></div>
							</div>
							
							<div class="actionBtns column12">
								<form action="view.php" method="POST">
								
									<input type="hidden" name="id" value="<?php echo $person["id"]; ?>">
									<input type="hidden" name="type" value="2">
									
									<input type="hidden" name="action" class="actionAction" value="">
									
									<button type="submit" class="btn actionBtn deleteBtn" data-action="delete">Delete</button>
									
									<?php if($person["checked_in"] == 0) { ?>
										<button type="submit" class="btn actionBtn checkInBtn" data-action="checkIn">Check-In</button>
									<?php } else { ?>
										<button type="submit" class="btn actionBtn unCheckInBtn" data-action="unCheckIn">Un-Check-In</button>
									<?php } ?>
									
									<?php if($person["unregistered"] == 0) { ?>
										<button type="submit" class="btn actionBtn unregisterBtn" data-action="cancel">Cancel Registration</button>
									<?php } else { ?>
										<button type="submit" class="btn actionBtn registerBtn" data-action="activate">Re-Activate Registration</button>
									<?php } ?>
									
									<br/>
									
									<?php if($person["set_gender"] == 0 && $person["complete"] == 1) { ?>
										<button type="submit" class="btn actionBtn setFemaleBtn" data-action="markFemale">Mark as Female</button>
										<button type="submit" class="btn actionBtn setMaleBtn" data-action="markMale">Mark as Male</button>
										<button type="submit" class="btn actionBtn setXBtn" data-action="markX">Mark as X</button>
									<?php } ?>
									
										<button type="submit" class="btn actionBtn" data-action="2weeksmentors">2 weeks away mentors</button>
										<button type="submit" class="btn actionBtn" data-action="tomorrowmentors">tomorrow mentors</button>
									
									<?php if( ($person["confirmed_attending"] == 0) || $person["key"] == "M-aKgmYU") { ?>
										<button type="submit" class="btn actionBtn " data-action="confirmed">Confirmed Attending</button>
									<?php } 
									if(($person["confirmed_attending"] == 1) || $person["key"] == "M-aKgmYU") { ?>
										<button type="submit" class="btn actionBtn " data-action="unconfirmed">Un-Confirmed Attending</button>
									<?php }?>
									
								</form>
							</div>
							
						</div>
					<?php 
					}
					
					$num++;
					
					$shirtCounts[1][$person["shirt"]]++;
					if($person["shirt"] != "")
						$shirtCounts[1]["Total"]++;
					
					if($person["dinner"] == 1) $dinnerCount++;
					if($person["breakfast"] == 1) $breakfastCount++;
					if($person["lunch"] == 1) $lunchCount++;
				}
				?>
				
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div id="extrasDiv" class="peopleSection">
				<div class="row">
					<div class="column12">
						<a href="#" class="extraBtn">Extra</a>
					</div>
					<div class="column12 extraDiv" style="display: none;">
						<form action="view.php" method="POST">
							<textarea name="exeStmt" style="width: 100%;"></textarea>
							<input type="hidden" name="exe" value="1">
							<button type="submit" class="btn btn-med">Submit</button>
						</form>
					</div>
				</div>
				<?php 
				$shirtCounts[0]["all"]["Unknown"] = $shirtCounts[0]["all"][""];
				unset($shirtCounts[0]["all"][""]);
				
				$shirtCounts[0]["admitted"]["Unknown"] = $shirtCounts[0]["admitted"][""];
				unset($shirtCounts[0]["admitted"][""]);
				
				$shirtCounts[1]["Unknown"] = $shirtCounts[1][""];
				unset($shirtCounts[1][""]);
				
				//echo "<pre>" . print_r($shirtCounts, true) . "</pre>"; 
				?>
				<div class="row">
					<div class="column12">
						<h2>Participant T-Shirt Counts</h2>
						<table class="counts">
							<thead>
								<tr>
									<td></td>
									<?php foreach($shirtCounts[0]["all"] as $type => $count) {
										echo "<td>" . $type . "</td>";
									}?>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Admitted</td>
									<?php foreach($shirtCounts[0]["admitted"] as $type => $count) {
										if($type != "Unknown" && $type != "Total")
											echo "<td>" . $count . " (" . round(($count/$shirtCounts[0]["admitted"]["Total"])*100, 0) . "%)</td>";
										else
											echo "<td>" . $count . "</td>";
									}?>
								</tr>
								<tr>
									<td>All</td>
									<?php foreach($shirtCounts[0]["all"] as $type => $count) {
										if($type != "Unknown" && $type != "Total")
											echo "<td>" . $count . " (" . round(($count/$shirtCounts[0]["all"]["Total"])*100, 0) . "%)</td>";
										else
											echo "<td>" . $count . "</td>";
									}?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="column12">
						<h2>Mentor T-Shirt Counts</h2>
						<table class="counts">
							<thead>
								<tr>
									<td></td>
									<?php foreach($shirtCounts[1] as $type => $count) {
										echo "<td>" . $type . "</td>";
									}?>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>All</td>
									<?php foreach($shirtCounts[1] as $type => $count) {
										if($type != "Unknown" && $type != "Total")
											echo "<td>" . $count . " (" . round(($count/$shirtCounts[1]["Total"])*100, 0) . "%)</td>";
										else
											echo "<td>" . $count . "</td>";
									}?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="column12">
						<h2>Mentor Meal Counts</h2>
						<table class="counts">
							<thead>
								<tr>
									<td>Dinner</td>
									<td>Breakfast</td>
									<td>Lunch</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $dinnerCount; ?></td>
									<td><?php echo $breakfastCount; ?></td>
									<td><?php echo $lunchCount; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		
		</div> <!-- end tabSectionWrapper -->
		
	<?php 
	}	// end if for session
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- Javascript -->
	<?php include "../includes/js.php"; js(true); ?>
	
	<script>
	// show/hide tabs
	$("#participantsBtn").click(function(event){
		$(".peopleSection").hide();
		$("#participantsDiv").show();
		$(this).parent().children().removeClass("active");
		$(this).addClass("active");
		doCounters(true);
	});
	$("#mentorsBtn").click(function(event){
		$(".peopleSection").hide();
		$("#mentorsDiv").show();
		$(this).parent().children().removeClass("active");
		$(this).addClass("active");
		doCounters(false);
	});
	$("#extrasBtn").click(function(event){
		$(".peopleSection").hide();
		$("#extrasDiv").show();
		$(this).parent().children().removeClass("active");
		$(this).addClass("active");
	});
	
	
	// filters
	$("#allFilterBtn").click(function(event){
		$(".person").show();
		$(".filterBtn").removeClass("active");
		$(this).addClass("active");
	});
	$(".filterBtn").click(function(event){
		event.preventDefault();
		if($(this).hasClass("active")) {
			$(this).removeClass("active");
		} else {
			$(this).parent().children().removeClass("active");
			$(this).addClass("active");
		}
		$("#allFilterBtn").removeClass("active");
		toggleFilters();
		doCounters($("#participantsBtn").hasClass("active"));
	});

	function toggleFilters() {
		var sectionDiv = ($("#participantsBtn").hasClass("active")) ? "#participantsDiv " : "#mentorsDiv ";
		
		$(sectionDiv+".person").show();

		if($("#send2weeksFilterBtn").hasClass("active"))			$(sectionDiv + ".sent2weeks").hide();
		if($("#sendTomorrowFilterBtn").hasClass("active"))			$(sectionDiv + ".sentTomorrow").hide();
		if($("#definitelyApprovedFilterBtn").hasClass("active"))	$(sectionDiv + ".definitelyNotApproved").hide();
		if($("#definitelyNotApprovedFilterBtn").hasClass("active"))	$(sectionDiv + ".definitelyApproved").hide();
		if($("#definitelyConfirmedFilterBtn").hasClass("active"))	$(sectionDiv + ".definitelyNotConfirmed").hide();
		if($("#definitelyNotConfirmedFilterBtn").hasClass("active"))	$(sectionDiv + ".definitelyConfirmed").hide();
		
		
		if($("#approvedFilterBtn").hasClass("active"))		$("				.rejected,	.wait,	.undecided	").hide();
		if($("#rejectedFilterBtn").hasClass("active"))		$(".approved,				.wait,	.undecided	").hide();
		if($("#waitFilterBtn").hasClass("active"))			$(".approved,	.rejected,			.undecided	").hide();
		if($("#undecidedFilterBtn").hasClass("active"))		$(".approved,	.rejected,	.wait				").hide();

		if($("#completeFilterBtn").hasClass("active"))		$(".incomplete").hide();
		if($("#incompleteFilterBtn").hasClass("active"))	$(".complete").hide();

		if($("#activeRegFilterBtn").hasClass("active"))		$(".canceledReg").hide();
		if($("#canceledRegFilterBtn").hasClass("active"))	$(".activeReg").hide();

		if($("#confirmedFilterBtn").hasClass("active"))		$(".unconfirmed").hide();
		if($("#unconfirmedFilterBtn").hasClass("active"))	$(".confirmed").hide();

		if($("#checkedInFilterBtn").hasClass("active"))		$(".notCheckedIn").hide();
		if($("#notCheckedInFilterBtn").hasClass("active"))	$(".checkedIn").hide();

		if($("#genderFemaleFilterBtn").hasClass("active"))	$(".genderMale, .genderX, .genderUnknown").hide();
		if($("#genderMaleFilterBtn").hasClass("active"))	$(".genderFemale, .genderX, .genderUnknown").hide();
		if($("#genderXFilterBtn").hasClass("active"))		$(".genderFemale, .genderMale, .genderUnknown").hide();
		if($("#genderUnknownFilterBtn").hasClass("active"))	$(".genderFemale, .genderMale, .genderX").hide();

		if($("#collegeCUFilterBtn").hasClass("active"))		$(".collegeCO, .collegeUS, .collegeWorld, .collegeUnknown").hide();
		if($("#collegeCOFilterBtn").hasClass("active"))		$(".collegeCU, .collegeUS, .collegeWorld, .collegeUnknown").hide();
		if($("#collegeUSFilterBtn").hasClass("active"))		$(".collegeCU, .collegeCO, .collegeWorld, .collegeUnknown").hide();
		if($("#collegeWorldFilterBtn").hasClass("active"))	$(".collegeCU, .collegeCO, .collegeUS, .collegeUnknown").hide();
		if($("#collegeUnknownFilterBtn").hasClass("active"))$(".collegeCU, .collegeCO, .collegeUS, .collegeWorld").hide();
	}
	
	
	// counters
	doCounters(true);
	function doCounters(isParticipant) {
		$(".filterBtn").each(function(){
			var sectionDiv = (isParticipant) ? "#participantsDiv " : "#mentorsDiv ";
			var divToCount = sectionDiv + "." + $(this).attr("data-self");
			var count = 0;
			var size = 0;
			$(divToCount).each(function(){
				if( $(this).is(":visible") )
					count++;
			});
			size = $(divToCount).size();
			
			$(this).find("span").html("<b>" + count + "</b> / " + size + "");
		});
	}
	

	// action buttons
	$(".actionBtn").click(function(event){
		var y = confirm("Are you sure you want to to that?  This is permanent.");
		if(!y) 
			event.preventDefault();
		else  
			$(".actionAction").val($(this).attr("data-action"));
	});



	$(".extraBtn").click(function(event){
		$(".extraDiv").toggle();
	});




	$(".specialFilterBtn").click(function(){ $(".specialFilterGroup").slideToggle(); });
	$(".specificFilterBtn").click(function(){ $(".specificFilterGroup").slideToggle(); });
	
	</script>
	
	
</body>
</html>


