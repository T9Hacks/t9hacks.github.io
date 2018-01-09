<!DOCTYPE html>
<html>
<head>

	<title>T9Hacks - Sign Up</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php 
		include "includes/css.php"; 
		css("signupStart");
		facebookMeta(2);
	?>
	
</head>
<body id="page-top" class="index hackathon">

	<!-- Navigation -->
	<?php include "includes/nav-simple.php"; nav(); ?>
	
	
	<section class="bg-trianglePurple">
		<div class="container">
		
			<div class="row">
				<div class="column12">
					<div class="signupTitle">
						<h1>Sign Up for T9Hacks</h1>
					</div>
				</div>
			</div>
			<?php if(false) { ?>
			<div class="row" id="signupWait">
				<div class="signupWrapper">
				<div class="column12">
					<div class="waitMessage">
						<p>Thank you for your interest in T9Hacks!  We will begin the registration process on Jan 1, 2016.</p>
						<br/>
						<br/>
						<a href="index.php" class="btn btn-l">Back to Website</a>
					</div>
				</div>
				</div>
			</div>
			<?php } else { ?>
			<div class="row" id="signupChoice">
				<div class="signupWrapper">
					<div class="row">			
						<p class="column12">
							If you are planning on attending T9Hacks, we kindly ask you to register.  This allows us to keep track of 
							tickets to make sure that we can provide enough space, food, and supplies for everyone.
						</p>
						<p class="column12">
							You can register yourself and your friends and colleagues here!
						</p>
					</div>
					<?php if(false) { ?>
					<div class="row">	
						<p class="column4">
							If you are a student, click here:
						</p>	
						<div class="column8 btnHolder">
							<a href="signupPages/signup-participant1" class="btn btn-xl">Participant <span class="mobileOnly">&nbsp;</span>Application</a>
						</div>
					
					</div>
					<?php } else { ?>
					<div class="row">	
						<p class="column12">
							Registration for participants is now closed.
						</p>
					</div>					
					<?php } ?>
					
					<?php if(false) { ?>
						<div class="row">	
							<p class="column4">
								If you are an external volunteer, click here:
							</p>
							<div class="column8 btnHolder">
								<a href="signupPages/signup-mentor1" class="btn btn-xl">Mentor <span class="mobileOnly">&nbsp;</span>Sign Up</a>
							</div>
						</div>
					<?php } else { ?>
						<div class="row">	
							<div class="column12">
								<p>
									Due to overwhelming response for mentors, we've had to close sign up early.  If you want to keep 
									informed about T9Hacks, you can follow us on social media!
								</p>
								<div class="socialMediaLinks">
									<ul class="socialButtons">
										<li>
											<a href="https://www.facebook.com/t9hacks/" target="_blank"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="https://twitter.com/t9hacks" target="_blank"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="https://www.instagram.com/t9hacks" target="_blank"><i class="fa fa-instagram"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
	
	
	<!-- Footer -->
	<?php include "includes/footer.php"; footer(); ?>
	
	
	<!-- Javascript -->
	<?php include "includes/js.php"; js();	 ?>
	
	
</body>
</html>