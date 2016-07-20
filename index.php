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
		loadCSSForPage("home");
		//loadFacebookMetaTags();
	?>
	
	
	<?php
	/*		Slideshow Data 		*/
	$slideshow = array(
		array(
			"desc" => "T9Hacks was held in the Black Box Experimental Studio",
			"alt" => "Photos of T9Hacks event.",
			"images" => array(
				"t9hacks_sp16hackathon_general_photo04.jpg",
				"t9hacks_sp16hackathon_mlh_photo11.jpg",
				"t9hacks_sp16hackathon_allhackers_photo05.jpg",
				"t9hacks_sp16hackathon_allhackers_photo06.jpg"
			),
			"folder" => "1_t9"
		),
		array(
			"desc" => "Last year, T9 was a creative technology hackathon.  We 
				encouraged our participants to create projects with 
				technology, arts, & media",
			"alt" => "Photos of T9Hacks hackers working.",
			"images" => array(
				"t9hacks_sp16hackathon_teams-01_photo03.jpg",
				"t9hacks_sp16hackathon_teams-05_photo05.jpg",
				"t9hacks_sp16hackathon_teams-06_photo04.jpg"
			),
			"folder" => "2_hackers1"
		),
		array(
			"desc" => "We had a large number of mentors to help teams with forming 
				their ideas and building their projects",
			"alt" => "Photos of T9Hack participants and mentors.",
			"images" => array(
				"t9hacks_sp16hackathon_mentors-twitter_photo01.jpg",
				"t9hacks_sp16hackathon_mentors-quickleft_photo01.jpg",
				"t9hacks_sp16hackathon_mentors-victor_photo03.jpg"
			),
			"folder" => "3_mentors"
		),
		array(
			"desc" => "There were a number of challenges throughout the 
				night, to keep hackers engaged and to win cool prizes",
			"alt" => "Photos of the no light challenge, hosted by MLH.",
			"images" => array(
				"t9hacks_sp16hackathon_nolight_photo05.jpg",
				"t9hacks_sp16hackathon_nolight_photo08.jpg",
				"t9hacks_sp16hackathon_nolight_photo17.jpg"
			),
			"folder" => "4_nolight"
		),
		array(
			"desc" => "We partnered with Major League Hacking, who helped support the event...",
			"alt" => "Photos of Major League Hacking members.",
			"images" => array(
				"t9hacks_sp16hackathon_mlh_photo02.jpg",
				"t9hacks_sp16hackathon_mlh_photo07.jpg"	
			),
			"folder" => "5_mlh"
		),
		array(
			"desc" => "...and provided a Hardware lab for teams to use for their projects",
			"alt" => "Photos of Major League Hacking's hardware lab.",
			"images" => array(
				"t9hacks_sp16hackathon_mlh_photo21.jpg",
				"t9hacks_sp16hackathon_indiv_photo12.jpg",
				"t9hacks_sp16hackathon_teams-01_photo02.jpg"
			),
			"folder" => "5_mlh"
		),
		array(
			"desc" => "Hackers worked throughout the night, making, coding, and building",
			"alt" => "Photos of T9Hackers working.",
			"images" => array(
				"t9hacks_sp16hackathon_indiv_photo21.jpg",
				"t9hacks_sp16hackathon_teams-02_photo02.jpg",
				"t9hacks_sp16hackathon_teams-12_photo04.jpg",
				"t9hacks_sp16hackathon_teams-09_photo03.jpg",
				"t9hacks_sp16hackathon_teams-15_photo01.jpg"
			),
			"folder" => "6_hackers2"
		),
		array(
			"desc" => "After 24 hours, teams demoed their work",
			"alt" => "Photos of T9Hackers demoing their projects.",
			"images" => array(
				"t9hacks_sp16hackathon_demos_photo19.jpg",
				"t9hacks_sp16hackathon_demos_photo06.jpg",
				"t9hacks_sp16hackathon_demos_photo16.jpg",
				"t9hacks_sp16hackathon_demos_photo13.jpg",
				"t9hacks_sp16hackathon_demos_photo14.jpg"
			),
			"folder" => "7_demos"
		),
		array(
			"desc" => "Thank you to our sponsors who made T9 possible!",
			"alt" => "Photos of the sponsors.",
			"images" => array(
				"t9hacks_sp16hackathon_sponsors-thinktopic_photo01.jpg",
				"t9hacks_sp16hackathon_sponsors-twitter_photo05.jpg",
				"t9hacks_sp16hackathon_sponsors-workday_photo10.jpg"
			),
			"folder" => "9_sponsors"
		),
	);
	?>
							

</head>
<body>
	<!-- Navigation -->
	<?php 
		include "includes/navigation.php"; 
		loadNagivationMain();
	?>
	
	<!-- BackgroundAnimation -->
	<div id="backgroundAnimationParent"></div>

	
	<!-- Main webpage -->
	<div id="page">
		
		
		<!-- Home -->
		<section id="home">
			<div class="container">
			
				<div class="row">
					<div class="column3">&nbsp;</div>
					<div class="column6">
					
						<div class="header_info_wrapper">
							<div class="header_info_inner">
								<span class="date">February 2017</span>
								<span class="logo_container">
									<img class="logo" src="images/logos/t9hacks_logo_transparent_white_brackets.png">
								</span>
								<span class="location">Boulder, CO</span>
							</div>
						</div>
						
						<h1 class="header_title">T9Hacks</h1>
						
					</div>
				</div>
				
			</div>
		</section>
		
		
		<hr/>
		
		
		<!-- About -->
		<section id="about">
			<div class="container">
			
				<div class="row">
					<div class="column12">
						<h1>About</h1>
					</div>
				</div>
				
			
				<div class="row">
				
					<div class="column2">&nbsp;</div>
					<div class="column8 about_text">
						<p>
							T9Hacks is a 24-hour gender equality hackathon at the University of Colorado Boulder's ATLAS Institute.   
							Our goal is to create opportunity for newcomers to explore a hackathon environment while learning and solving compelling problems.
						</p>
						<p>
							We are currently planning our second iteration of T9Hacks, so stay tuned!
						</p>
					</div>
					
					
				</div>
			
			</div>
		</section>
		
		
		<hr/>
		
		
		<!-- FAQ -->
		<section id="faq">
			<div class="container">
			
				<div class="row">
					<div class="column12">
						<h1>FAQ</h1>
					</div>
				</div>
				
				<div class="row">
					<div class="faq_line_wrapper">
						<div class="faq_line_inner">
							
							<div class="column1">&nbsp;</div>
							
							<div class="column5 faq_section faq_section_left alpha">
							
								<div class="faq_question">
									<h2>What is "hacking"?</h2>
									<p>
										"Hacking" doesn't mean malicious programming or breaking 
										into something. We want you to "hack" (design, build, create, 
										MacGyver) technology, art, and media together to create 
										something awesome.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>Do I have to be a programmer?</h2>
									<p>
										Absolutely not! We encourage women with all backgrounds to 
										participate. It doesn't matter if you are an art, a journalism, 
										or a marketing major, there is a place for you here.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>I've never been to a hackathon before, should I still register?</h2>
									<p>
										Absolutely! Register yourself, your best friend, your sister, 
										and your roommate. T9Hacks is a beginner hackathon, so there is no 
										expectation that our participants are familiar with these types of 
										events. We will have fun events, plenty of mentors, and a super 
										welcoming team to ease everyone into the experience.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>What kind of project should I make?</h2>
									<p>
										T9Hacks is an open hackathon, so if you have an idea, bring it! Our 
										theme this year is "helping the community". We encourage students to 
										build solutions, prototypes, or raise awareness for problems they see 
										in their communities. If you are really stumped, we will have some 
										ideas ready at start of the hackathon.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>What do I have to bring?</h2>
									<p>
										Bring your laptop, phone, chargers, change of clothes, a well-rested 
										open mind, but most of all, your creativity.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>Do you cover travel expenses?</h2>
									<p>
										Since this is T9Hacks' first hackathon, we cannot cover or reimburse 
										any travel costs.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
							</div>
							
							<div class="column5 faq_section faq_section_right alpha">
							
								<div class="faq_question">
									<h2>How much does it cost?</h2>
									<p>
										Participating is completely free! We will provide food, snacks, 
										and drinks to energize you throughout the event. We only require 
										that everyone register before the event to come.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>Do you really mean 24 hours?</h2>
									<p>
										We know, that sounds like a long time! But it goes quickly when 
										you are collaborating, planning, and creating projects. We wanted 
										to see what kinds of projects students would come up with if they 
										were given a full 24 hours to devote themselves to their work.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>Do I have to stay the entire time?</h2>
									<p>
										Students are strongly encouraged to stay for the entire event. 
										T9Hacks is a group effort and we want every team to have the same 
										opportunities as each other; this can only happen when all members 
										are 100% committed!
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>Do I have to have a team to register?</h2>
									<p>
										Nope! T9Hacks is a great place to meet new women with different 
										skillsets. You can come with a pre-formed group and idea, an idea 
										of your own and no team, or a desire to help someone else's idea 
										along.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
								<div class="faq_question">
									<h2>How do I get to CU's campus?</h2>
									<p>
										CU has a great public transit system! There are local RTD busses 
										that drop off directly in front of the ATLAS building and many 
										more regional busses that drop off at CU. For more information 
										about the bus system, you can visit 
										<a href="http://www.colorado.edu/pts/node/265" target="_blank">CU's Public Transit Page</a> 
										or the 
										<a href="http://www.rtd-denver.com/" target="_blank">RTD website</a>. 
										If you are unsure of what bus to take, Google Maps is a great way 
										to plan your trip!
									</p>
									<p>
										If you plan on driving, you can park at the 
										<a href="https://www.google.com/maps/place/Euclid+Avenue+AutoPark/@40.0062224,-105.2725278,17z/data=!3m1!4b1!4m2!3m1!1s0x876bec346ecef901:0x42c56530fccd25dd" target="_blank">Euclid Avenue AutoPark</a> 
										parking garage for $4 a day on weekends. If you don't mind walking, 
										it is free to park at the 
										<a href="https://www.google.com/maps/place/Regent+Drive+AutoPark,+Boulder,+CO+80305/@40.0068572,-105.2614824,18z/data=!3m1!4b1!4m2!3m1!1s0x876bedcbd93d7161:0x8d630ccb6bb5d575" target="_blank">Regent Drive AutoPark</a> 
										on weekends and in a few nearby neighborhoods.
									</p>
									<span class="faq_arrow"></span>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
		
		<hr/>
		
		
		<!-- Past Hackathon -->
		<section id="spring2016hackathon">
			<div class="container">
			
				<div class="row">
					<div class="column12">
						<h1>Spring 2016 Hackathon</h1>
					</div>
				</div>
				
				<div class="row sp16_hackathon_info">
					
					<div class="column6">
						<div class="row">
							<p>
								T9Hacks had our first iteration on Feb 20-21, 2016 at 
								the Black Box Experimental Studio at the ATLAS Institute.
							</p>
							<p>
								Our goal was to increase participation of women in hackathons 
								and to create an opportunity for students to explore new 
								technologies, solve problems, and create something amazing 
								with a team.
							</p>
						</div>
						<div class="row fact">
							<h3 class="fact_title">Gender Breakdown*</h3>
							<div class="fact_bar_graph">
								<span class="fact_graph_piece fact_graph_60 main">Women - 60%</span>
								<span class="fact_graph_piece fact_graph_40">Men - 40%</span>
							</div>
							<span class="note">Gender is broken into men-women binary due to self-reported data</span>
						</div>
						<div class="row fact">
							<h3 class="fact_title">Schools</h3>
							<div class="fact_bar_graph">
								<span class="fact_graph_piece fact_graph_94 main">UCB - 94%</span>
								<span class="fact_graph_piece fact_graph_6"></span>
							</div>
						</div>
						<div class="row fact">
							<h3 class="fact_title">Majors</h3>
							<table class="fact_table">
								<tr>
									<td>Computer Science</td>
									<td>50%</td>
								</tr>
								<tr>
									<td>Engineering Fields</td>
									<td>15%</td>
								</tr>
								<tr>
									<td>Info-Sci Fields</td>
									<td>10%</td>
								</tr>
								<tr>
									<td>Design Fields</td>
									<td>8%</td>
								</tr>
								<tr>
									<td>TAM</td>
									<td>5%</td>
								</tr>
								<tr>
									<td>Other Fields</td>
									<td>14%</td>
								</tr>
							</table>
						</div>
					</div>
					
					<div class="column6">
						<?php 
							foreach($slideshow as $group){
								$desc = $group["desc"];
								$alt = $group["alt"];
								$folder_ext = $group["folder"];
								foreach($group["images"] as $image) {
									$img_src = "images/sp16_hackathon/" . $folder_ext . "/" . $image;
									?>
									<div class="slideshow_slide">
										<img class="slideshow_img" src='<?php echo $img_src; ?>' alt='<?php echo $alt; ?>'>
										<div class="slideshow_desc">
											<span><?php echo $desc; ?></span>
										</div>
									</div>
									<?php 
								}
							}
						?>
						<p>
							For the full T9Hacks Spring 2016 photo album, visit the 
							<a href="https://www.facebook.com/MajorLeagueHacking/photos/?tab=album&album_id=1071433852907292" target="_blank">
							MLH Facebook page</a>.
						</p>
					
					</div>
					
					
				</div>
				
			</div>
		</section>
		
		
		<hr/>
		
		
		<!-- Past Sponsors -->
		<section id="sponsors">
			<div class="container">
			
				<div class="row">
					<div class="column12">
						<h1>Past Sponsors</h1>
					</div>
				</div>
				
				<!-- Platinum -->
				<div class="row sponsorRow">
					<div class="sponsorRowWrapper platinum">
						<!-- ATLAS -->
						<div class="sponsor">
							<a href="http://atlas.colorado.edu" target="_blank"><img src="images/sp16_sponsors/atlas_logo_white.png" alt="ATLAS Institute Logo" /></a>
						</div>
						<!-- Twitter -->
						<div class="sponsor">
							<a href="https://twitter.com/twitter" target="_blank"><img src="images/sp16_sponsors/twitter_logo_white.png" alt="Twitter Logo" /></a>
						</div>
						<!-- Victor Ops -->
						<div class="sponsor">
							<a href="https://victorops.com/" target="_blank"><img src="images/sp16_sponsors/victorops_logo_white.svg" alt="Victor Ops Logo" /></a>
						</div>
					</div>
				</div>
				<div class="row sponsorRow">
					<div class="sponsorRowWrapper platinum">
						<!-- Think Topic -->
						<div class="sponsor">
							<a href="http://www.thinktopic.com/" target="_blank"><img src="images/sp16_sponsors/thinktopic_logo_white.png" alt="Think Topic Logo" /></a>
						</div>
						<!-- Workday -->
						<div class="sponsor">
							<a href="http://www.workday.com/" target="_blank"><img src="images/sp16_sponsors/workday_logo_white.png" alt="Workday Logo" /></a>
						</div>
					</div>
				</div>
					
					
				<!-- Gold -->
				<div class="row sponsorRow">
					<div class="sponsorRowWrapper gold">
						<!-- Cardinal Peak -->
						<div class="sponsor">
							<a href="https://cardinalpeak.com/" target="_blank"><img src="images/sp16_sponsors/cardinalpeak_logo_white.png" alt="Cardinal Peak Logo" /></a>
						</div>
						<!-- Google -->
						<div class="sponsor">
							<a href="https://www.google.com/about/careers/students/" target="_blank"><img src="images/sp16_sponsors/google_logo_white.png" alt="Google Logo" /></a>
						</div>
						<!-- Code Craft School -->
						<div class="sponsor">
							<a href="http://www.codecraftschool.com/" target="_blank"><img src="images/sp16_sponsors/codecraft_logo_white.png" alt="CodeCraft School of Technology Logo" /></a>
						</div>
						<!-- Send Grid -->
						<div class="sponsor">
							<a href="https://sendgrid.com/" target="_blank"><img src="images/sp16_sponsors/sendgrid_logo_white.png" alt="Sendgrid Logo" /></a>
						</div>
					</div>
				</div>
				
				<!-- Silver -->
				<div class="row sponsorRow">
					<div class="sponsorRowWrapper silver">
						<!-- Fitter Faster -->
						<div class="sponsor">
							<a href="http://fitterfaster.com/" target="_blank"><img src="images/sp16_sponsors/fitterfaster_logo_white.png" alt="Fitter Faster Logo" /></a>
						</div>
						<!-- Quick Left -->
						<div class="sponsor">
							<a href="https://quickleft.com/" target="_blank"><img src="images/sp16_sponsors/quickleft_logo_white.png" alt="Quickleft Logo" /></a>
						</div>
						<!-- RefactorU -->
						<div class="sponsor">
							<a href="http://www.refactoru.com/" target="_blank"><img src="images/sp16_sponsors/refactoru_logo_white.png" alt="RefactorU Logo" /></a>
						</div>
					</div>
				</div>
				<div class="row sponsorRow">
					<div class="sponsorRowWrapper silver">
						<!-- Sticker Giant -->
						<div class="sponsor">
							<a href="http://www.stickergiant.com/" target="_blank"><img src="images/sp16_sponsors/stickergiant_logo_white.png" alt="Sticker Giant Logo" /></a>
						</div>
						<!-- Zayo -->
						<div class="sponsor">
							<a href="http://www.zayo.com/" target="_blank"><img src="images/sp16_sponsors/zayo_logo_white.png" alt="Zayo Logo" /></a>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
		
		
		<!-- Footer -->
		<?php 
			include "includes/footer.php"; 
			loadFooter();
		?>
	
	</div>
	
	
	<!-- Javascript -->
	<?php 
		include "includes/js.php"; 
		loadJS(); 
		loadAminationScripts();
		//loadContactUsSectionJS();
	?>

</body>
</html>
