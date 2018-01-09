<!DOCTYPE html>
<html>
<head>

	<title>T9Hacks</title>

	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<?php 
		include "includes/css.php"; 
		css("home");
		facebookMeta(1);
	?>

</head>
<body id="page-top" class="index hackathon">

	<!-- Navigation -->
	<nav id="navigation">
		<div class="container">

			<!-- Brand -->
			<div class="navigation-brand">
				<a class="page-scroll" href="#header">T9Hacks</a>
			</div>
			
			<!-- Mobile nav button -->
			<div class="navigation-toggle" data-toggle="collapse" data-target="#navigationLinks">
				<button type="button" class="btn btn-l">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-bars"></i>
				</button>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navigation-links" id="navigationLinks">
				<ul>
					<li><a class="page-scroll" href="#about">About</a></li>
					<li><a class="page-scroll" href="#join">Sign Up</a></li>
					<li><a class="page-scroll" href="#schedule">Schedule</a></li>
					<li><a class="page-scroll" href="#sponsors">Sponsors</a></li>
				</ul>
			</div>
			
			<!-- MLH Trust Badge -->
			<a id="mlh-trust-badge" href="https://mlh.io/seasons/s2016/events?utm_source=s2016&utm_medium=TrustBadge&utm_campaign=s2016" target="_blank">
				<img src="https://s3.amazonaws.com/logged-assets/trust-badge/s2016.png" alt="MLH Official - Spring 2016">
			</a>

		</div>
	</nav>
	
	




	<!-- Header -->
	<header id="header" class="bg-medPurple">

		<canvas id="headerCanvas"></canvas>

		<div id="headerContainer" class="container">

			<div class="headerContent">

				<div class="row">
					<div class="column12">
						<img class="logo" src="images/t9hacks_logo_transparent.png" />
					</div>
				</div>

				<div class="row">
					<div class="column12 location">
						<p><span class="fa fa-clock-o"></span>&nbsp;&nbsp;20-21 February 2016</p>
						<p><span class="fa fa-map-marker"></span>&nbsp;&nbsp;<a href="http://www.atlas.colorado.edu">ATLAS Institute</a>, University of Colorado Boulder</p>
						<p><span class="fa fa-location-arrow"></span>&nbsp;&nbsp;<a href="https://www.google.com/maps/place/ATLAS+Institute,+University+of+Colorado/@40.0076244,-105.2721198,17z/data=!3m1!4b1!4m2!3m1!1s0x876bec3384ff175f:0xe59d1ef9575505f5">Black Box Experimental Studio</a></p>
					</div>
				</div>

				<div class="row">
					<div class="column12">
						<p><a href="#questions" class="page-scroll btn btn-circle"><i class="downBtn fa fa-angle-double-down"></i></a></p>
					</div>
				</div>

			</div>

		</div>

	</header>


	<!-- About Us Section -->
	<section id="about" class="bg-cream questions">
	<a id="about"></a>

		<div class="container">

			<div class="row">
				<div class="column12">
					<h1 class="blue">About Us</h1>
					<p class="tagline text-center">T9Hacks is a women's hackathon promoting gender diversity in technology!</p>
				</div>
			</div>

			<div class="row">
				<div class="column12">
					<p>
						T9Hacks is a 24-hour women's hackathon at the University of Colorado Boulder's ATLAS Institute 
						that brings together college students for two days of creativity, building, and hacking.
						Our goal is to increase participation of women in hackathons and to create an opportunity for 
						students to explore new technologies, solve problems, and create something amazing with a 
						team. In the US, women occupy only 26% of IT positions and represent 18% of engineering majors in 
						universities and we want to help raise those numbers!
					</p>
				</div>
			</div>
			
			
			<div class="row">
				<div class="column12 alpha">
			
			
					<div class="column6 faqs">
						<div class="row faq">
							<i class="faq-icon fa fa-code"></i>
							<div class="faq-question">
								<h2>Do I have to be a programmer?</h2>
								<p>
									Absolutely not!  We encourage women with all backgrounds to participate.  It doesn't matter if you are an art, a 
									journalism, or a marketing major, there is a place for you here.
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-ticket"></i>
							<div class="faq-question">
								<h2>How much does it cost?</h2>
								<p>
									Participating is completely free! We will provide food, snacks, and drinks to energize you throughout the event.  
									We only require that everyone <a href="signupPages/signup-participant1.php">register</a> before the event to come.
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-thumbs-o-up"></i>
							<div class="faq-question">
								<h2>I've never been to a hackathon before, should I still register?</h2>
								<p>
									Absolutely!  Register yourself, your best friend, your sister, and your roommate.  T9Hacks is a beginner hackathon, so  
									there is no expectation that our participants are familiar with these types of events.  We will have fun events, 
									plenty of mentors, and a super welcoming team to ease everyone into the experience.  
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-object-group"></i>
							<div class="faq-question">
								<h2>What kind of project should I make?</h2>
								<p>
									T9Hacks is an open hackathon, so if you have an idea, bring it!  Our theme this year is "helping the community".   
									We encourage students to build solutions, prototypes, or raise awareness for problems they see in their communities.  
									If you are really stumped, we will have some ideas ready at start of the hackathon.
								</p>
								<p>
									T9Hacks is also a <i>creative technology</i> hackathon.  This means that we encourage our participants to create projects with 
									tangible, artistic, media, or electronic components.  
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-laptop"></i>
							<div class="faq-question">
								<h2>What do I have to bring?</h2>
								<p>
									Bring your laptop, phone, chargers, change of clothes, a well-rested open mind, but most of all, your creativity.
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-plane"></i>
							<div class="faq-question">
								<h2>Do you cover travel expenses?</h2>
								<p>
									Since this is T9Hacks' first hackathon, we cannot cover or reimburse any travel costs.
								</p>
							</div>
						</div>
					</div>
					
					
					<div class="column6 faqs">
						<div class="row faq">
							<i class="faq-icon fa fa-terminal"></i>
							<div class="faq-question">
								<h2>What is "hacking"?</h2>
								<p>
									"Hacking" doesn't mean malicious programming or breaking into something.  We want you to "hack" 
									(design, build, create, MacGyver) technology, art, and media together to create something awesome.
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-clock-o"></i>
							<div class="faq-question">
								<h2>Do you really mean 24 hours?</h2>
								<p>
									We know, that sounds like a long time! But it goes quickly when you are collaborating, planning, and creating 
									projects.  We wanted to see what kinds of projects students would come up with if they were given a full 24 
									hours to devote themselves to their work.
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-hourglass-end"></i>
							<div class="faq-question">
								<h2>Do I have to stay the entire time?</h2>
								<p>
									Students are strongly encouraged to stay for the entire event. T9Hacks is a group effort and we want every team 
									to have the same opportunities as each other; this can only happen when all members are 100% committed!
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-group"></i>
							<div class="faq-question">
								<h2>Do I have to have a team to register?</h2>
								<p>
									Nope!  T9Hacks is a great place to meet new women with different skillsets.  You can come with a pre-formed group and 
									idea, an idea of your own and no team, or a desire to help someone else's idea along.  
								</p>
							</div>
						</div>
						<div class="row faq">
							<i class="faq-icon fa fa-car"></i>
							<div class="faq-question">
								<h2>How do I get to CU's campus?</h2>
								<p>
									CU has a great public transit system! There are local RTD busses that drop off directly in front of the 
									ATLAS building and many more regional busses that drop off at CU.  For more information about the bus system, 
									you can visit <a href="http://www.colorado.edu/pts/node/265" target='_blank'>CU's Public Transit Page</a> or the 
									<a href="http://www.rtd-denver.com/" target='_blank'>RTD website</a>.  If you are unsure of what bus to take, Google Maps is a 
									great way to plan your trip!
								</p>
								<p>
									If you plan on driving, you can park at the 
									<a href="https://www.google.com/maps/place/Euclid+Avenue+AutoPark/@40.0062224,-105.2725278,17z/data=!3m1!4b1!4m2!3m1!1s0x876bec346ecef901:0x42c56530fccd25dd" target="_blank">Euclid Avenue AutoPark</a> 
									parking garage for $4 a day on weekends. If you don’t mind walking, it is free to park at the 
									<a href="https://www.google.com/maps/place/Regent+Drive+AutoPark,+Boulder,+CO+80305/@40.0068572,-105.2614824,18z/data=!3m1!4b1!4m2!3m1!1s0x876bedcbd93d7161:0x8d630ccb6bb5d575" target="_blank">Regent Drive AutoPark</a> 
									on weekends and in a few nearby neighborhoods.
							</div>
						</div>
						<div class="row">
							<ul class="shareBtns">
								<li class="fb">
									<div class="fb-share-button" data-href="http://t9hacks.org/" data-layout="button_count"></div>
								</li>
								<li>
									<a href="https://twitter.com/intent/tweet?button_hashtag=T9Hacks&text=Design.%20Build.%20Create.%20%40T9Hacks%2C%20a%20women's%20hackathon%20promoting%20gender%20diversity%20in%20tech%20%40cuatlas%20Feb%2020-21" class="twitter-hashtag-button" data-related="Koscida" data-url="http://www.t9hacks.org">Tweet #T9Hacks</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		
								</li>
							</ul>
						</div>
					</div>
			
			
				</div>
			</div>
			
			
			
		</div>

	</section>



	<!-- Join Section -->
	<section id="join" class="bg-image bg-signup">
	<a id="join"></a>
	
		<div class="joinn">
		<div class="container">
			
			<div class="column5">
				<div class="joinWrapper">
					<div class="row">
						<div class="column12">
							<h1 class="white">Design. Build. Create.</h1>
						</div>
					</div>
					<?php if(false) { ?>
						<div class="row">
							<p class="column12 text-bold text-center">
								Registration is closing on Friday, February 12, 2016!
							</p>
						</div>
						<div class="row">
							<div class="column12">
								<p>
									If you would like to participate in T9Hacks, you will need to apply 
									by using our registration page. Click the application button below to get started.
								</p>
								<div class="signupBtns">
									<div class="signupBtn"><a href="signupPages/signup-participant1" class="btn btn-xl">Participant <span class="mobileOnly">&nbsp;</span>Application</a></div>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="row">
							<div class="column12">
								<p>
									Registration is now closed for participants.  If you want to keep 
									informed about T9Hacks, you can follow us on social media!
								</p>
							</div>
						</div>
					<?php } ?>
						<div class="row">
							<div class="column12">
								<?php if(false) { ?>
									<p>
										If you would like to participate as a mentor, you can also register by clicking the sign up button below.
									</p>
									<div class="signupBtns">
										<div class="signupBtn"><a href="signupPages/signup-mentor1" class="btn btn-xl">Mentor <span class="mobileOnly">&nbsp;</span>Sign Up</a></div>
									</div>
								<?php } else { ?>
									<p>
										Due to overwhelming response for mentors, we've had to close sign up early.  If you want to keep 
										informed about T9Hacks, you can follow us on social media!
									</p>
									
								<?php } ?>
							</div>
						</div>
					<?php if(true) { ?>
						<div class="row">
							<div class="column12">
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
			
		</div>
		</div>
	</section>



	<!-- Schedule Section -->
	<section id="schedule" class="bg-trianglePurple">
	<a id="schedule"></a>
	
		<div class="container">

			<div class="row">
				<div class="column12">
					<h1>Schedule</h1>
				</div>
			</div>

			<div class="row">
				<div class="scheduleOuter"><div class="scheduleInner">
					<div class="scheduleSection">
						<h2 class="white">Saturday, February 20</h2>
						<div class="item">
							<div class="time"><p>2:30pm</p></div>
							<div class="event">
								<p>Check-in Starts</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>3:30pm</p></div>
							<div class="event">
								<p>Opening Ceremonies</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>3:45pm</p></div>
							<div class="event">
								<p>Team Formation</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>4:00pm</p></div>
							<div class="event">
								<p>Hacking Begins</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>4:00pm</p></div>
							<div class="event"><p>Professional Photoshoot</p></div>
						</div>
						<div class="item">
							<div class="time"><p>6:30pm</p></div>
							<div class="event">
								<p>Dinner</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>8:00pm</p></div>
							<div class="event">
								<p>Mini Challenge #1</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>10:00pm</p></div>
							<div class="event">
								<p>Dessert</p>
							</div>
						</div>
					</div>
					
					<div class="scheduleSection">
						<h2 class="white">Sunday, February 21</h2>
						<div class="item">
							<div class="time"><p>Midnight</p></div>
							<div class="event">
								<p>Snack</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>2:00am</p></div>
							<div class="event">
								<p>Mini Challenge #2</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>3:00am</p></div>
							<div class="event">
								<p>Another Snack</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>5:00am</p></div>
							<div class="event">
								<p>Yet Another Snack</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>8:00am</p></div>
							<div class="event">
								<p>Breakfast</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>10:00am</p></div>
							<div class="event">
								<p>Mini Challenge #3</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>12:00pm</p></div>
							<div class="event">
								<p>Lunch</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>3:00pm</p></div>
							<div class="event">
								<p>We're Serious About Snacking</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>4:00pm</p></div>
							<div class="event">
								<p>Hacking Ends</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>4:30pm</p></div>
							<div class="event">
								<p>Presentations</p>
							</div>
						</div>
						<div class="item">
							<div class="time"><p>5:30pm</p></div>
							<div class="event">
								<p>End Ceremonies</p>
							</div>
						</div>
					</div>
					
				</div></div>
			</div>

		</div>
	</section>



	<!-- Sponsors Section -->
	<section id="sponsors" class="bg-cream">
	<a id="sponsors"></a>
	
		<div class="container12">
		
			<div class="row">
				<div class="column12">
					<h1 class="blue">Our Sponsors</h1>
				</div>
			</div>
			
			<!-- Platinum -->
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper platinum">
					<!-- ATLAS -->
					<div class="sponsor">
						<div class="sponsor1 atlas">
							<a href="http://atlas.colorado.edu" target="_blank"><img src="images/sponsors/atlas_logo.png" /></a>
						</div>
					</div>
					<!-- Twitter -->
					<div class="sponsor">
						<div class="sponsor1 twitter">
							<a href="https://twitter.com/twitter" target="_blank"><img src="images/sponsors/twitter_logo_white.png" /></a>
						</div>
					</div>
					<!-- Victor Ops -->
					<div class="sponsor">
						<div class="sponsor1 victorops">
							<a href="https://victorops.com/" target="_blank"><img src="images/sponsors/victorops_logo.svg" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper platinum">
					<!-- Think Topic -->
					<div class="sponsor">
						<div class="sponsor1 thinktopic">
							<a href="http://www.thinktopic.com/" target="_blank"><img src="images/sponsors/thinktopic_logo.png" /></a>
						</div>
					</div>
					<!-- Workday -->
					<div class="sponsor">
						<div class="sponsor1 workday">
							<a href="http://www.workday.com/" target="_blank"><img src="images/sponsors/workday_logo.png" /></a>
						</div>
					</div>
				</div>
			</div>
				
				
			<!-- Gold -->
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper gold">
					<!-- Cardinal Peak -->
					<div class="sponsor">
						<div class="sponsor2 cardinalpeak">
							<a href="https://cardinalpeak.com/" target="_blank"><img src="images/sponsors/cardinalpeak_logo.png" /></a>
						</div>
					</div>
					<!-- Google -->
					<div class="sponsor">
						<div class="sponsor2 google">
							<a href="https://www.google.com/about/careers/students/" target="_blank"><img src="images/sponsors/google_logo.svg" /></a>
						</div>
					</div>
					<!-- Code Craft School -->
					<div class="sponsor">
						<div class="sponsor2 codecraft">
							<a href="http://www.codecraftschool.com/" target="_blank"><img src="images/sponsors/codecraft_logo.png" /></a>
						</div>
					</div>
					<!-- Send Grid -->
					<div class="sponsor">
						<div class="sponsor2 sendgrid">
							<a href="https://sendgrid.com/" target="_blank"><img src="images/sponsors/sendgrid_logo_white.png" /></a>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Silver -->
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper silver">
					<!-- Fitter Faster -->
					<div class="sponsor">
						<div class="sponsor3 fitterfaster">
							<a href="http://fitterfaster.com/" target="_blank"><img src="images/sponsors/fitterfaster_logo_vertical.png" /></a>
						</div>
					</div>
					<!-- Quick Left -->
					<div class="sponsor">
						<div class="sponsor3 quickleft">
							<a href="https://quickleft.com/" target="_blank"><img src="images/sponsors/quickleft_logo.svg" /></a>
						</div>
					</div>
					<!-- RefactorU -->
					<div class="sponsor">
						<div class="sponsor3 refactoru">
							<a href="http://www.refactoru.com/" target="_blank"><img src="images/sponsors/refactoru_logo.png" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper silver">
					<!-- Sticker Giant -->
					<div class="sponsor">
						<div class="sponsor3 stickergiant">
							<a href="http://www.stickergiant.com/" target="_blank"><img src="images/sponsors/stickergiant_logo.png" /></a>
						</div>
					</div>
					<!-- Zayo -->
					<div class="sponsor">
						<div class="sponsor3 zayo">
							<a href="http://www.zayo.com/" target="_blank"><img src="images/sponsors/zayo_logo_white.png" /></a>
						</div>
					</div>
				</div>
			</div>

			
			<div class="row extra">
				<div class="column12">
					<h1 class="blue">Community Partners</h1>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper platinum">
					<!-- MLH -->
					<div class="sponsor">
						<div class="sponsor1 mlh">
							<a href="http://mlh.io" target="_blank"><img src="images/sponsors/mlh_logo.png" /></a>
						</div>
					</div>
					<!-- Jason's Deli -->
					<div class="sponsor">
						<div class="sponsor1 jasonsdeli">
							<a href="http://www.jasonsdeli.com/" target="_blank"><img src="images/sponsors/jasonsdeli_logo.png" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper silver">
					<!-- Susan's Bakery -->
					<div class="sponsor">
						<div class="sponsor3 susansbakery">
							<a href="http://susansbakeryboulder.com/" target="_blank"><img src="images/sponsors/susansbakery_logo.png" /></a>
						</div>
					</div>
					<!-- Tods -->
					<div class="sponsor">
						<div class="sponsor3 tods">
							<a href="http://www.todscafe.com/" target="_blank"><img src="images/sponsors/tods_logo.png" /></a>
						</div>
					</div>
					<!-- Moe's Bagels -->
					<div class="sponsor">
						<div class="sponsor3 moesbagels">
							<a href="http://www.moesbagel.com/" target="_blank"><img src="images/sponsors/moes_logo.png" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper silver">
					<!-- Invision -->
					<div class="sponsor">
						<div class="sponsor3 invision">
							<a href="http://www.invisionapp.com/" target="_blank"><img src="images/sponsors/invision_logo_white.png" /></a>
						</div>
					</div>
					<!-- Dash -->
					<div class="sponsor">
						<div class="sponsor3 dash">
							<a href="https://kapeli.com/dash" target="_blank"><img src="images/sponsors/dash_logo.png" /></a>
						</div>
					</div>
					<!-- Trello -->
					<div class="sponsor">
						<div class="sponsor3 trello">
							<a href="https://trello.com/" target="_blank"><img src="images/sponsors/trello_logo_white.svg" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row sponsorRow">
				<div class="sponsorRowWrapper silver">
					<!-- HackCU -->
					<div class="sponsor">
						<div class="sponsor3 hackcu">
							<a href="http://hackcu.org" target="_blank"><img src="images/sponsors/hackcu_logo.png" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">

			<div class="row">
				<div class="column12">
					<div class="sponsorInterested">
						<div class="sponsorBtnContainer">
							<div class="btn btn-xl" id="sponsorEmailBtn">Interested in <span class="mobileOnly">&nbsp;</span>becoming a <span class="mobileOnly">&nbsp;</span>sponsor or partner?</div>
							<p>Interested in volunteering as a mentor?  <a href="signupPages/signup-mentor1.php">Register here!</a></p>
						</div>
					</div>
				</div>
			</div>

			<div id="sponsorEmailDiv" class="row">
				<div class="column2">&nbsp;</div>
				<div class="column8">

					<div id="sponsorEmailOuterForm">

						<div id="sponsorEmailArrow"></div>

						<form id="sponsorEmailForm" action="signupScripts/sponsorEmail.php">

							<div id="sponsorEmailResult">Null</div>

							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput"><i class="fa fa-user"></i><input type="text" placeholder="Your Name (Required)" name="name" id="sponsorName"/></div>
								</div>
								<div class="fieldWrapper column6">
									<div class="fieldInput"><i class="fa fa-envelope-o"></i><input type="text" placeholder="Your Email (Required)" name="email" id="sponsorEmail"/></div>
								</div>
							</div>
							<div class="row">
								<div class="fieldWrapper column12">
									<div class="fieldInput textarea">
										<textarea name="message" placeholder="Message (Required)" id="sponsorMessage"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="fieldWrapper column6">
									<div class="fieldInput"><i class="fa fa-plus"></i><input type="text" placeholder="What is 2+3? (Required)" name="addition" id="sponsorAddition"/></div>
								</div>
								<div class="fieldWrapper column6">
									<input class="honeypot" type="text" name="honeypot" placeholder="Leave Blank"/>
									<button id="sponsorEmailSubmit" class="btn btn-l right">Send &nbsp;<i class="fa fa-arrow-circle-o-right"></i></button>
								</div>
							</div>
						</form>

						<div id="sponsorEmailSuccess">
							<h3>Email successfully sent!</h3>
							<p>Thank you for contacting us, we'll get back to you shortly.</p>
						</div>

					</div>

				</div>
			</div>

		</div>
	</section>
	
	
	
	
	<!-- Press Section -->
	<section id="press" class="bg-lightPurple">
	<a id="press"></a>
	
		<div class="container">

			<div class="row">
				<div class="column8">
					<h1 class="black">Press</h1>
					<div class="article">
						<p class="link">
							<a href="http://atlas.colorado.edu/t9-hacks-highlights/" target="_blank">T9 Hacks Highlights</a>
						</p>
						<p class="author">
							3 Mar 2016 &nbsp;|&nbsp; <a href="http://atlas.colorado.edu/" target="_blank">ATLAS Institute</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="http://cuindependent.com/2016/02/29/71520/" target="_blank">T9Hacks brings women together for 24 hours of hacking</a>
						</p>
						<p class="author">
							29 February 2016 &nbsp;|&nbsp; <a href="http://cuindependent.com/" target="_blank">CU Independent</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="http://www.dailycamera.com/news/ci_29545069/cuboulders-atlas-institute-hosts-inaugural-womencentric-hackathon" target="_blank">CU-Boulder's Atlas Institute hosts inaugural women-centric hack-a-thon</a>
						</p>
						<p class="author">
							21 February 2016 &nbsp;|&nbsp; <a href="http://www.dailycamera.com/" target="_blank">Daily Camera</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="http://bizwest.com/victorops-adds-mentorship-to-womens-24-hour-hackathon-at-cu/" target="_blank">VictorOps adds mentorship to women’s 24-hour hackathon at CU</a>
						</p>
						<p class="author">
							18 February 2016 &nbsp;|&nbsp; <a href="http://bizwest.com/" target="_blank">BizWest</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="http://www.businesswire.com/news/home/20160217005388/en/" target="_blank">VictorOps to Provide Mentors for 24-hour Women's Hackathon at the University of Colorado Boulder</a>
						</p>
						<p class="author">
							17 February 2016 &nbsp;|&nbsp; <a href="http://www.businesswire.com/portal/site/home/" target="_blank">Business Wire</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="http://atlas.colorado.edu/t9hacks/" target="_blank">ATLAS To Host CU’s First-Ever Women’s Hackathon Feb 20-21</a>
						</p>
						<p class="author">
							16 February 2016 &nbsp;|&nbsp; <a href="http://atlas.colorado.edu/" target="_blank">ATLAS Institute</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="https://victorops.com/blog/t9hacks-supporting-diversity-tech/" target="_blank">T9Hacks: Supporting Diversity in Tech</a>
						</p>
						<p class="author">
							3 February 2016 &nbsp;|&nbsp; <a href="https://victorops.com/" target="_blank">Victor Ops</a>
						</p>
					</div>
					<div class="article">
						<p class="link">
							<a href="https://quickleft.com/blog/cu-atlas-t9hacks-bridging-gap-women-tech/" target="_blank">CU ATLAS T9Hacks: Bridging the Gap Between Women & Tech</a>
						</p>
						<p class="author">
							27 January 2016 &nbsp;|&nbsp; <a href="https://quickleft.com/" target="_blank">QuickLeft</a>
						</p>
					</div>
				</div>
				
				<div class="column4">
					<h1 class="black">Tweets</h1>
					<a class="twitter-timeline" href="https://twitter.com/search?q=t9hacks" data-widget-id="702032161797353472">Tweets about t9hacks</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			
		</div>
		
	</section>
	


	<!-- Info Section -->
	<section id="info" class="bg-darkPurple">
	<a id="info"></a>
	
		<div class="container">

			<div class="row">
				<div class="column6 beta infoSection hack-def">
					<i class="fa fa-question"></i>
					<h2 class="white">What does "T9" stand for?</h2>
					<p>
						T9 stands for Title IX, the ninth title of the United States Education Amendments of 1972 which states:
					</p>
					<p>
						<span>
							No person in the United States shall, on the basis of sex, be excluded from participation in, be denied the benefits 
							of, or be subjected to discrimination under any education program or activity receiving federal financial assistance.
						</span>
					</p>
					<p>T9Hacks believes everyone deserves to learn.  We are here to help make that happen.</p>
				</div>
				<div class="column6 omega infoSection">
					<i class="fa fa-venus"></i>
					<h2 class="white">Why a women's hackathon?</h2>
					<p>
						Hackathons are a great way for college students to become exposed to different technology, create new technology, and build 
						community.  However, most hackathons have very low female participation. We aim to create an opportunity and space for 
						women to explore creative technologies and solve real world problems.
					</p>
				</div>
			</div>

			<div class="row">

				<div class="column6 beta infoSection">
					<i class="fa fa-transgender-alt"></i>
					<h2 class="white">What about other genders?</h2>
					<p>
						We welcome all college and university students to participate; we especially encourage all students who 
						self-identify as female to participate.
					</p>
				</div>
				<div class="column6 omega infoSection code-conduct">
					<i class="fa fa-heart-o"></i>
					<h2 class="white">Code of Conduct</h2>
					<p>
						At T9Hacks, we believe in creating a safe and welcoming environment for everyone.  Our organizers and our 
						participants follow the <a href="https://mlh.io/">MLH Code of Conduct</a>.
					</p>
					<a href="http://static.mlh.io/docs/mlh-code-of-conduct.pdf" class="btn btn-l" target="_blank">Learn More</a>
				</div>
			</div>

		</div>
	</section>



	<!-- Footer -->
	<?php include "includes/footer.php"; footer(); ?>


	<!-- Javascript -->
	<?php include "includes/js.php"; js(); ?>
	<script src="js/sponsorEmail.js"></script>
	
	

	<!-- Processing -->
	<script src="js/p5.min.js"></script>
	<script src="js/p5_starburst.js"></script>



</body>
</html>
