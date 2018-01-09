<!DOCTYPE html>
<html>
<head>

	<title>T9Hacks - Slack</title>

	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php 
		$error = "Unknown";
		
		if( (array_key_exists("signup", $_POST) && $_POST["signup"] == "7") && 
			(array_key_exists("honeypot", $_POST) && $_POST["honeypot"] == "") && 
			(array_key_exists("email", $_POST)) && 
			(array_key_exists("first_name", $_POST)) && 
			(array_key_exists("last_name", $_POST)) && 
			(array_key_exists("type", $_POST))  
		) {
			//echo "Yes, post<br/>";
			include_once 'signupScripts/GeneralHelper.php';
			
			// get all the data from the post
			$numErrors = 0;
			
			$email = $_POST["email"];
			$email = removeWhiteSpace(strtolower($email));
			if($email == "" || empty($email)) {
				$numErrors++;
				$error .= " Email was empty. ";
			}
			
			$first_name = $_POST["first_name"];
			$first_name = removeWhiteSpace(strtolower($first_name));
			if($first_name == "" || empty($first_name)) {
				$numErrors++;
				$error .= " First name was empty. ";
			}
			
			$last_name = $_POST["last_name"];
			$last_name = removeWhiteSpace(strtolower($last_name));
			if($last_name == "" || empty($last_name)) {
				$numErrors++;
				$error .= " Last name was empty. ";
			}
			
			$type = $_POST["type"];
			if($type == "" || empty($type) || ($type != "Mentor" && $type != "Participant")) {
				$numErrors++;
				$error .= " Type was not filled out. ";
			}
			
			if(array_key_exists('success', $_GET)) {
				$numErrors++;
			}
			
			if($numErrors == 0) {
				//echo "no errors<br/>";
				// post data
				date_default_timezone_set('America/Denver');
				mb_internal_encoding("UTF-8");
				
				$previouslyInvitedEmailsFile = 'hidden/invitedSlackEmails.json';
				
				
				
				// your slack team/host name 
				$slackHostName = "t9hacks";
				/*
				$slackInviteUrl='
					https://'.$slackHostName.'.slack.com/api/users.admin.invite?
					t='.time() . '&
					revoke=20693134598&
					crumb=s-1454996336-ba0e1e0d75-%C3%A2%C2%98%C2%83';
				*/
				$slackInviteUrl = 'https://'.$slackHostName.'.slack.com/api/users.admin.invite?t='.time()."&";
				
				$slackAuthToken = "xoxp-13821960546-13962991233-20693200199-3cb0f725eb";
				//$slackAuthToken = "xoxs-13821960546-13962991233-16399315156-2697197ad4";
				
				$slackAutoJoinChannels ='C0DQ5UB3L';
				
				
				
				
				
				
				
				if(@!file_get_contents($previouslyInvitedEmailsFile)) {
					$previouslyInvitedEmails = array();
				}
				else {
					$previouslyInvitedEmails = json_decode(file_get_contents($previouslyInvitedEmailsFile), true);
				}
				//echo "previouslyInvitedEmails array:";
				//printArray($previouslyInvitedEmails);
				$offset = count($previouslyInvitedEmails);
				
				
				
				$shouldInviteUser = 0;
				
				$user['email'] = $email;
				$user['first_name'] = $first_name;
				$user['last_name'] = $last_name;
				$user['type'] = $type;
				//echo "user array:";
				//printArray($user);
				
				if(empty($previouslyInvitedEmails))
					$shouldInviteUser = true;
				else {
					$previousEmail = 0;
					foreach ($previouslyInvitedEmails as $key => $invitedUser) {
						if ($invitedUser["email"] == $user["email"]) {
							$previousEmail++;
						}
					}
					//echo $previousEmail . "<br/>";
					$shouldInviteUser = ($previousEmail == 0) ? 1 : 0;
				}


				if($shouldInviteUser == 1) {
					//echo "beg loop<br/>"; die();
					//echo date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - Inviting to ".$slackHostName." Slack\n\n";
					//echo "user array:";
					//printArray($user);
					
					$fields = array(
						'email' 		=> $user['email'],
						'first_name'	=> urlencode($user['first_name']),
						'last_name'		=> urlencode($user['last_name']),
						'channels' 		=> urlencode($slackAutoJoinChannels),
						'token' 		=> urlencode($slackAuthToken),
						'set_active' 	=> urlencode('true'),
						'_attempts' 	=> '1'
					);
					//echo "fields array:";
					//printArray($fields);
				
					
					// url-ify the data for the POST
					$fields_string = '';
					foreach($fields as $key=>$value) { 
						$fields_string .= $key.'='.$value.'&'; 
					}
					rtrim($fields_string, '&');
					$slackInviteUrl .= $fields_string;
					//echo $slackInviteUrl;
					
					$replyRaw = do_post_request($slackInviteUrl, null, null);
					$reply = json_decode($replyRaw, true);
					
					
					
					if($reply['ok'] == false) {
						$error .= " Slack error: " . $reply['error'] . " ";
						header("Location: slack.php?success=0&erros=$error");
						//echo date('c') . " - " . $user['first_name'] . " " . $user['last_name'] . " - " . $user['email'] . " - " . "Error: " . $reply['error'] . "<br/>";
					}
					else {
						//echo date('c') . " - " . $user['first_name'] . " " . $user['last_name'] . " - " . $user['email'] . " - " . "Invited successfully" . "<br/>";
					}
					
					
					array_push($previouslyInvitedEmails, $user);
					
					//echo "end loop<br/>";
				} // end foreach
				else {
					//echo "already in array<br/>";
					$error .= " Email was already used to sign up (check your email for an invitation from Slack). ";
					//echo $error; die();
					header("Location: slack.php?success=0&error=$error");
					die();
				}
				
				
				file_put_contents($previouslyInvitedEmailsFile, json_encode($previouslyInvitedEmails));
				
				//die();
				header("Location: slack.php?success=1");
				die();
			} else {
				//echo "errors: $numErrors<br/>";
				header("Location: slack.php?success=0&error=$error");
				die();
			}
			//echo "end<br/>";
			
		}
		
		
		
		$success = -1;
		if(array_key_exists("success", $_GET)) {
			$success = $_GET["success"];
			$error = (array_key_exists("error", $_GET)) ? $_GET["error"] : $error;
		}
	
	
		
		
		
		// straight from: http://wezfurlong.org/blog/2006/nov/http-post-from-php-without-curl/
		function do_post_request($url, $data, $optional_headers = null)
		{
		  $params = array('http' => array(
		              'method' => 'POST',
		              'content' => $data
		            ));
		  if ($optional_headers !== null) {
		    $params['http']['header'] = $optional_headers;
		  }
		  $ctx = stream_context_create($params);
		  $fp = @fopen($url, 'rb', false, $ctx);
		  if (!$fp) {
		    throw new Exception("Problem with $url, $php_errormsg");
		  }
		  $response = @stream_get_contents($fp);
		  if ($response === false) {
		    throw new Exception("Problem reading data from $url, $php_errormsg");
		  }
		  return $response;
		}




	
		include "includes/css.php"; 
		css("slack");
	?>

</head>
<body id="page-top" class="index hackathon">

	<!-- Navigation -->
	<?php include "includes/nav-simple.php"; nav(); ?>


	<section id="scheduleUpdated" class="bg-lightPurple">
		<div class="container">
			
			<div class="row">
				<div class="column12">
					<h1>Slack Sign Up</h1>
				</div>
			</div>
			
			
			<div class="row signupTop" id="mentorTop">
				<div class="signupWrapper">
				
					<div class="row">
						<div class="column12">
							<h2>Sign up for the T9Hacks slack!</h2>
							<p>Open to all participants and mentors!</p>
						</div>
					</div>
					
					<?php 
					if($success == -1 || $success == 0) { 
						
						if($success == 0) {
						?>
							<div class="row">
								<div class="column12 error">
									It looks like there was a problem with your submission.  Please refresh the page and start 
									again.  Error(s): <?php echo $error; ?>
								</div>
							</div>
						<?php 
						}

					?>
						<form id="mentorForm" class="signupForm" action="slack.php" method="post" enctype="multipart/form-data">
							
							
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-user"></i><input type="text" placeholder="First Name (Required)" name="first_name" value=""/>
									</div>
								</div>
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-user"></i><input type="text" placeholder="Last Name (Required)" name="last_name" value=""/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput">
										<i class="fa fa-envelope-o"></i><input type="text" placeholder="Email (Required)" name="email" value=""/>
									</div>
								</div>
								
								<div class="fieldWrapper column6 types">
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='p' type='radio' name="type" value="Participant" >
		   								<label class='tgl-btn' data-tg-off='Participant' data-tg-on='Participant' for='p'></label>
									</div>
									<div class="fieldRadio">
										<input class="tgl tgl-flip" id='m' type='radio' name="type" value="Mentor">
		   								<label class='tgl-btn' data-tg-off='Mentor' data-tg-on='Mentor' for='m'></label>
									</div>
								</div>
							</div>
							
							
							<div class="row">
								<div class="fieldWrapper column12">
									<input type="text" name="honeypot" placeholder="Leave Blank" class="honeypot" />
									<input type="hidden" name="signup" value="7" />
									<button type="submit" class="btn btn-l right">Sign up</button>
								</div>
							</div>
							
						</form>
					<?php 
					} else {
						?>
						<div class="row">
							<div class="column12">
								<h3>Success!</h3>
								<p>Check your email for an invitation from Slack to join T9Hacks!</p>
							</div>
						</div>
						<?php 
					}
					?>
					
				</div>
			</div>
							
				
			
			
			
			
			
			</div>
	</section>



	<!-- Footer -->
	<?php include "includes/footer.php"; footer(); ?>
	
	
	<!-- Javascript -->
	<?php include "includes/js.php"; js(); ?>



</body>
</html>