<?php 
function footer($up = false) {
	$p = ($up) ? "../" : "";
	?>
	<!-- Footer -->
	<footer>
		<div class="container">
	
			<div class="row">
				<div class="column4 location">
					<p>
						<span class="fa fa-clock-o"></span>
						<span class="text">20-21 February 2016</span>
					</p>
	                <p>
	                	<span class="fa fa-map-marker"></span>
	                	<span class="text">
	                		<a href="http://www.colorado.edu/" target="_blank">University of Colorado Boulder</a>
	                		<br/> 
	                		<a href="http://atlas.colorado.edu/" target="_blank">ATLAS Institute</a>
	                	</span>
	                </p>
	                <p>
	                	<span class="fa fa-location-arrow"></span>
	                	<span class="text">
	                		<a href="https://www.google.com/maps/place/ATLAS+Institute,+University+of+Colorado/@40.0076244,-105.2721198,17z/data=!3m1!4b1!4m2!3m1!1s0x876bec3384ff175f:0xe59d1ef9575505f5" target="_blank">Black Box Experimental Studio</a>
	                	</span>
	                </p>
				</div>
				<div class="column4">
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
						<!-- 
						<li>
							<a href="https://www.linkedin.com/groups/8448877" target="_blank"><i class="fa fa-linkedin"></i></a>
						</li>
						 -->
						<li>
							<a href="https://github.com/t9hacks" target="_blank"><i class="fa fa-github"></i></a>
						</li>
						<li>
							<a href="https://t9hacks.slack.com" target="_blank"><i class="fa fa-slack"></i></a>
						</li>
					</ul>
					<div class="socialSharing">
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
				<div class="column4">
					<div class="quicklinks">
						<p><a href="<?php echo $p; ?>team">Meet our team</a></p>
					</div>
					<div class="copyright">
						<p>T9Hacks &nbsp;<i class="fa fa-copyright"></i>&nbsp; <?php echo date("Y"); ?></p>
						<p>Made by T9 Hackers</p>
					</div>
				</div>
			</div>
		
		</div>
	</footer>
	<?php 
}

