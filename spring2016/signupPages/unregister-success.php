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
		facebookMeta(1);
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
				
					<div>
						<h1 class="blue">Complete</h1>
						<p>We are sorry to see you go.  If you change your mind, you contact us!</p>
						<br/>
						<br/>
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