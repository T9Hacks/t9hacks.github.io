<!DOCTYPE html>
<html>
<head>

	<title>T9Hacks - Sign Up</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php 
		include "../includes/css.php"; 
		css("signup");
		facebookMeta(4);
	?>
	
	<?php 
		// get post data
		$numFriends = 0;
		// check if post data exists
		if(array_key_exists("n", $_GET)) {
			$n = $_GET['n'];
			// check if data is between 0 and 3
			if($n >= 0 && $n <= 2) {
				$numFriends = $n;
			}
		}
		
		// get key
		$key = null;
		$newReg = true;
		$completeReg = false;
		$unregistered = false;
		$data = array();
		// check if key exists
		if(array_key_exists("key", $_GET)) {
			$key = $_GET['key'];
			$numFriends = 0;
			
			// get data
			include '../signupScripts/RegisterFunctions.php';
			$returnData = getPersonData(false, $key);
			//echo '<pre>'.print_r($data, true).'</pre>'; //die();
			
			// check if true key
			if($returnData["success"]) {
				$data = $returnData["data"];
				// set returning person
				$newReg = false;
				$completeReg = ($data["complete"] == 1);
				$unregistered = ($data["unregistered"] == 1);
			} else {
				$key = null;
			}
		}
	?>
	
</head>
<body id="page-top" class="index hackathon">

	<!-- Navigation -->
	<?php include "../includes/nav-simple.php"; nav(true); ?>
	
	
	<section id="signup" class="bg-trianglePurple">
		<div class="container">
		
			<div class="row">
				<div class="column12">
					<div class="signupTitle">
						<h1>Sign Up for T9Hacks</h1>
					</div>
				</div>
			</div>
		
		
			<div class="row signupTop" id="mentorTop">
				<div class="signupWrapper">
				
					<div class="row">
						<div class="column12">
							<h2>Mentor Sign Up</h2>
							<p>20-21 February 2016</p>
						</div>
					</div>
				
					
					<?php if(!$unregistered) { ?>
						<div id="mentorLoading" class="signupLoading"><i class="fa fa-spinner fa-pulse"></i></div>
						
						<form id="mentorForm" class="signupForm" action="../signupScripts/register.php" method="post" enctype="multipart/form-data">
						
							<div id="mentorResult" class="signupResult"></div>
						
							<?php 
							if($numFriends > 0) {
							?>
								<hr class="noTop"/>
								<div class="row">
									<div class="column12">
										<h3>Your Information</h3>
									</div>
								</div>
							<?php 
							}
							
							if($newReg) {
								?>
								
								<div class="row">
									<p class="column12">
										Thank you for volunteering as a mentor! To sign up we need your name, email, and phone number.
									</p>
								</div>
								<?php 
							} else if ($completeReg) {
								?>
								<div class="row">
									<p class="column12">
										Congratulations!  You have completed your mentor registraton.
									</p>
								</div>
								<hr class="noTop"/>
								
								<?php 
							} else {
								?>
								<div class="row">
									<p class="column12">
										Please complete your registration as a mentor.  To sign up we need your name, email, and phone number.
									</p>
								</div>
								<?php 
							}
							?>
							
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-user"></i><input type="text" placeholder="Name (Required)" name="name" id="mentorName" value="<?php echo (!is_null($key)) ? $data["name"] : ""; ?>"/>
									</div>
								</div>
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-envelope-o"></i><input type="text" placeholder="Email (Required)" name="email" id="mentorEmail" value="<?php echo (!is_null($key)) ? $data["email"] : ""; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-mobile"></i><input type="text" placeholder="Phone Number (Required)" name="phone" id="mentorPhone" value="<?php echo (!is_null($key)) ? $data["phone"] : ""; ?>"/>
									</div>
								</div>
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-transgender-alt"></i>
										<input type="text" placeholder="Gender (Required)" name="gender" id="mentorGender" value="<?php echo (!is_null($key)) ? $data["gender"] : ""; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-building-o"></i>
										<input type="text" placeholder="Company/Organization" name="company" id="mentorCompany" value="<?php echo (!is_null($key)) ? $data["company"] : ""; ?>"/>
									</div>
								</div>
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-group"></i>
										<input type="text" placeholder="Position" name="position" id="mentorPosition" value="<?php echo (!is_null($key)) ? $data["position"] : ""; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="row">
								<p class="column12">
									As a mentor, you will be working with groups in particular topics.  What area would you like to be a mentor for? (Examples: Graphic Design, Electronics, iOS Development)
								</p>
								
								<div class="fieldWrapper column12 areas">
									<div class="fieldInput">
										<i class="fa fa-tasks"></i>
										<input type="text" placeholder="Area (required)" name="area" id="mentorArea" value="<?php echo (!is_null($key)) ? $data["area"] : ""; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="fieldWrapper column12 meals">
									<div class="column12 alpha">
										<p>We will be providing food for everyone who comes to the hackathon.  Which meals are you planning on being present for?</p>
									</div>
									<div class="fieldCheckbox">
										<input class="tgl tgl-flip" name="dinner" id="mentorDinner" type="checkbox" <?php echo (!is_null($key) && $data['dinner'] == 1 ) ? 'checked="checked"' : ""; ?>>
		   								<label class="tgl-btn" data-tg-off="Dinner on the 20th" data-tg-on="Dinner on the 20th" for="mentorDinner"></label>
									</div>
									<div class="fieldCheckbox">
										<input class="tgl tgl-flip" name="breakfast" id="mentorBreakfast" type="checkbox" <?php echo (!is_null($key) && $data['breakfast'] == 1 ) ? 'checked="checked"' : ""; ?>>
		   								<label class="tgl-btn" data-tg-off="Breakfast on the 21st" data-tg-on="Breakfast on the 21st" for="mentorBreakfast"></label>
									</div>
									<div class="fieldCheckbox">
										<input class="tgl tgl-flip" name="lunch" id="mentorLunch" type="checkbox" <?php echo (!is_null($key) && $data['lunch'] == 1 ) ? 'checked="checked"' : ""; ?>>
		   								<label class="tgl-btn" data-tg-off="Lunch on the 21st" data-tg-on="Lunch on the 21st" for="mentorLunch"></label>
									</div>
								</div>
							</div>
							
							<div class="row">
								<p class="column12">
									As a participant of T9Hacks, you will receive a free T9Hacks t-shirt.  This t-shirt will be in a standard unisex size.  
									What size would you like?
								</p>
								
								<div class="fieldWrapper column12">
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-xs' type='radio' name="shirt" value="X-Small" <?php echo (!is_null($key) && $data['shirt'] == "X-Small" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='X-Small' data-tg-on='X-Small' for='shirt-xs'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-s' type='radio' name="shirt" value="Small" <?php echo (!is_null($key) && $data['shirt'] == "Small" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='Small' data-tg-on='Small' for='shirt-s'></label>
									</div>
									<div class="fieldRadio">
										<?php 
											$checked = "";
											if(is_null($key)|| $data['shirt'] == "Medium" || empty($data['shirt']) || is_null($data['shirt'])) {
												$checked = 'checked="checked"';
											}
										?>
										<input class="tgl tgl-flip" id='shirt-med' type='radio' name="shirt" value="Medium" <?php echo $checked; ?>>
		   								<label class='tgl-btn' data-tg-off='Medium' data-tg-on='Medium' for='shirt-med'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-lg' type='radio' name="shirt" value="Large" <?php echo (!is_null($key) && $data['shirt'] == "Large" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='Large' data-tg-on='Large' for='shirt-lg'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-xl' type='radio' name="shirt" value="X-Large" <?php echo (!is_null($key) && $data['shirt'] == "X-Large" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='X-Large' data-tg-on='X-Large' for='shirt-xl'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-xxl' type='radio' name="shirt" value="XX-Large" <?php echo (!is_null($key) && $data['shirt'] == "XX-Large" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='XX-Large' data-tg-on='XX-Large' for='shirt-xxl'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='shirt-none' type='radio' name="shirt" value="None" <?php echo (!is_null($key) && $data['shirt'] == "None" ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='None' data-tg-on='None' for='shirt-none'></label>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="fieldWrapper column12">
									<div class="fieldInput">
										<i class="fa fa-edit"></i>
										<input type="text" placeholder="Additional information (dietary restrictions, accommodations, etc)" name="comment" value="<?php echo (!is_null($key)) ? $data["comment"] : ""; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="fieldWrapper column12">
									<div class="fieldRadio">
										<p>I agree to follow the <a href="http://static.mlh.io/docs/mlh-code-of-conduct.pdf" target="_blank">MLH Code of Conduct</a>.</p>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id="agree" type="checkbox" name="agree" value="agree" <?php echo (!is_null($key) && $data['coc_agree'] == 1 ) ? 'checked="checked"' : ""; ?>>
		   								<label class='tgl-btn' data-tg-off='Agree' data-tg-on='Agree' for="agree"></label>
									</div>
									
								</div>
							</div>
							
							<?php 
							if($numFriends > 0) {
								?>
								<hr/>
								<hr/>
								<div class="row">
									<div class="column12">
										<h3>Colleague Registration</h3>
										<p>
											By registering your colleague(s), you will start their registration.  They will then be sent an 
											email asking them to complete this process.
										</p>
									</div>
								</div>
								<?php 
								for($i=0; $i<$numFriends; $i++) {
									$fid = $i+1;
									?>
									<hr/>
									<div class="row">
										<div class="column12">
											<h3>Colleague #<?php echo $fid; ?></h3>
										</div>
									</div>
									<div class="row">
										<div class="fieldWrapper column6">
											<div class="fieldInput"><i class="fa fa-user"></i><input type="text" placeholder="Name" name="friendName<?php echo $fid; ?>" id="friendName<?php echo $fid; ?>" /></div>
										</div>
										<div class="fieldWrapper column6">
											<div class="fieldInput"><i class="fa fa-envelope-o"></i><input type="text" placeholder="Email" name="friendEmail<?php echo $fid; ?>" id="friendEmail<?php echo $fid; ?>" /></div>
										</div>
									</div>
									<?php
								}
								?>
								<hr/>
								<?php 
							}
							?>
							
							<div class="row">
								<div class="fieldWrapper column12">
									<a href="signup-mentor1.php" class="backBtn"><i class="fa fa-angle-double-left"></i> Back</a>
									<input type="text" name="honeypot" placeholder="Leave Blank" class="honeypot" />
									<input type="hidden" name="type" id="type" value="mentor" />
									<input type="hidden" name="key" id="key" value="<?php echo ( !is_null($key) ? $key : "-1" ); ?>" />
									<input type="hidden" name="friends" value="<?php echo $numFriends; ?>"/>
									<button id="mentorConfirmationBtn" class="btn btn-l right confirmationBtn">Confirmation &nbsp;<i class="fa fa-arrow-circle-o-right"></i></button>
								</div>
							</div>
							
							<?php 
							if(!$newReg) {
								?>
								<hr class="noTop"/>
								<div class="row">
									<div class="column12">
										<p>
											<a href="#" class="btn btn-med btn-subtle cancelRegBtn" id="mentorCancelRegBtn">Cancel my mentor registration for T9Hacks.</a>
										</p>
										<div class="cancelConfirm">
											<p>Are you sure you want to cancel your registration? <a href="#" class="btn btn-med btn-subtle cancelRegConfirm" id="mentorCancelRegConfirm">Yes</a></p>
										</div>
									</div>
								</div>
								<?php 
							}
							?>
							
						</form>
					
						<div id="mentorConfirmation" class="signupConfirmation">
							
							<div class="row">
								<p class="column12">
									Please confirm your registeration information and submit when you are done.  An email will be sent to you with your confirmation.
								</p>
							</div>
							
							<?php 
							if($numFriends > 0) {
							?>
								<hr class="noTop"/>
								<div class="row">
									<div class="column12">
										<h3>Your Information</h3>
									</div>
								</div>
							<?php 
							}
							?>
							
							<div class="row">
								<div class="column2">&nbsp;</div>
								<div class="column8">
									<table class="confirmationTable">
									<tbody>
										<tr><td>Name</td>		<td id="name"></td></tr>
										<tr><td>Email</td>		<td id="email"></td></tr>
										<tr><td>Phone</td>		<td id="phone"></td></tr>
										<tr><td>Gender</td>		<td id="gender"></td></tr>
										<tr><td>Company</td>	<td id="company"></td></tr>
										<tr><td>Position</td>	<td id="position"></td></tr>
										
										<tr><td>Area</td>		<td id="area"></td></tr>
										
										<tr><td>Dinner on the 20th</td>		<td id="dinner"></td></tr>
										<tr><td>Breakfast on the 21st</td>	<td id="breakfast"></td></tr>
										<tr><td>Lunch on the 21st</td>		<td id="lunch"></td></tr>
										
										<tr><td>Shirt</td>		<td id="shirt"></td></tr>
										
										<tr><td>Comment</td>	<td id="comment"></td></tr>
									</tbody>
									</table>
								</div>
							</div>
							
							<?php 
							if($numFriends > 0) {
								for($i=0; $i<$numFriends; $i++) {
									$fid = $i+1;
									?>
									<hr/>
									<div class="row">
										<div class="column12">
											<h3>Colleague #<?php echo $fid; ?></h3>
										</div>
									</div>
									<div class="row">
										<div class="column2">&nbsp;</div>
										<div class="column8">
											<table class="confirmationTable">
											<tbody>
												<tr><td>Name</td>		<td id="fName<?php echo $fid; ?>"></td></tr>
												<tr><td>Email</td>		<td id="fEmail<?php echo $fid; ?>"></td></tr>
											</tbody>
											</table>
										</div>
									</div>
									<?php
								}
								?>
								<hr/>
								<?php 
							}
							?>
							
							<div class="row">
								<div class="fieldWrapper column12">
									<a href="signup.php" id="mentorBack" class="backBtn backToEditBtn"><i class="fa fa-angle-double-left"></i> Back to Edit</a>
									<button id="mentorSubmitBtn" class="btn btn-l right" data-friends="<?php echo $numFriends; ?>">Submit &nbsp;<i class="fa fa-arrow-circle-o-right"></i></button>
								</div>
							</div>
							
						</div>
					
					<?php 
					} // end if for unregistered
					else {
						?>
						<div class="row">
							<div class="column12">
								<p>
									Our records show that you have canceled your registration.  Would you like to re-register with T9Hacks?
									<a href="#" class="btn btn-med btn-subtle reRegBtn" id="mentorReRegBtn">Yes</a>
									<input type="hidden" name="type" id="type" value="mentor" />
									<input type="hidden" name="key" id="key" value="<?php echo ( !is_null($key) ? $key : "-1" ); ?>" />
								</p>
								<br/>
								<br/>
								<p><a href="../index.php" class="btn btn-l"><i class="fa fa-arrow-circle-o-left"></i> &nbsp;Back to Home</a></p>
							</div>
						</div>
						<?php 
					}	
					?>
					
					
				</div> <!-- end signupWrapper -->
			</div> <!-- end participantSignup -->
			
		</div>
	</section>
	
	
	
	<!-- Footer -->
	<?php include "../includes/footer.php"; footer(true); ?>
	
	
	<!-- Javascript -->
	<?php include "../includes/js.php"; js(true); ?>
	<script src="../js/signup.js"></script>
	
	
</body>
</html>