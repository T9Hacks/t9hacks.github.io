<!DOCTYPE html>
<html>
<head>

	<title>T9Hacks - Sign Up</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php 
		$isParticipant = true;
		if(array_key_exists("t", $_GET)) {
			$t = $_GET['t'];
			if($t == 4)
				$isParticipant = false;
		}
		
		include "../includes/css.php"; 
		css("signup");
		if(!$isParticipant)
			facebookMeta(4);
		else
			facebookMeta(3);
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
						<h1>Sign-up for T9Hacks</h1>
					</div>
				</div>
			</div>
			
		
			<div class="row signupTop" id="participantTop">
				<div class="signupWrapper">
				
					<div class="column12">
						<h1 class="blue">Success!</h1>
						<?php
						if($isParticipant) { 
						?>
							<p>Thank you for applying for ATLAS T9Hacks.  An email will be sent to you with your application ticket.  We will get back to you shortly.</p>
						<?php 
						} else { ?>
							<p>Thank you for registering for ATLAS T9Hacks.  Your confirmation will be sent to your email.  We look forward to seeing you!</p>
						<?php 
						}
						?>
						<br/>
						<br/>
						<br/>
						<ul class="shareBtns">
							<li>
								<div class="fb-share-button" data-href="http://t9hacks.org/" data-layout="button_count"></div>
							</li>
							<li>
								<a href="https://twitter.com/intent/tweet?button_hashtag=T9Hacks&text=Just%20signed%20up%20for%20%40T9Hacks!%20A%20women's%20hackathon%20promoting%20gender%20diversity%20in%20tech%2C%20%40cuatlas%20Feb%2020-21" class="twitter-hashtag-button" data-related="T9Hacks" data-url="http://www.t9hacks.org">Tweet #T9Hacks</a>
								
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							</li>
						</ul>
						<a href="../" class="btn btn-l"><i class="fa fa-arrow-circle-o-left"></i> &nbsp;Back to Home</a>
					</div>
					
				</div> <!-- end signupWrapper -->
			</div> <!-- end participantSignup -->
			
			
			
		</div>
	</section>
	
	
	
	<!-- Footer -->
	<?php include "../includes/footer.php"; footer(true); ?>
	
	
	<!-- Javascript -->
	<?php include "../includes/js.php"; js(true); ?>
	
	
</body>
</html>