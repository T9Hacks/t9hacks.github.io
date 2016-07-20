<?php 
function loadNagivationMain() {
	?>
	<!-- Navigation -->
	<nav id="navigation" class="navbar navbar-inverse">
		<div class="container">
		
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation_links" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navigation_links">
				<ul class="nav navbar-nav">
					<li class="active">
						<a class="page-scroll" href="#home">Home</a>
					</li>
					<li>
						<a class="page-scroll" href="#about">About</a>
					</li>
					<li>
						<a class="page-scroll" href="#faq">FAQ</a>
					</li>
					<li class="brand">
						<a class="page-scroll">
							<img src="images/logos/t9hacks_logo_transparent.png">
						</a>
					</li>
					<li>
						<a class="page-scroll" href="#spring2016hackathon">Past Hackathons</a>
					</li>
					<li>
						<a class="page-scroll" href="#sponsors">Past Sponsors</a>
					</li>
					<!-- <li>
						<a class="page-scroll" href="#press">Press</a>
					</li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
			
			<!-- MLH Trust Badge -->
			<a id="mlh-trust-badge" href="https://mlh.io/seasons/s2016/events?utm_source=s2016&utm_medium=TrustBadge&utm_campaign=s2016" target="_blank">
				<img src="https://s3.amazonaws.com/logged-assets/trust-badge/s2016.png" alt="MLH Official - Spring 2016">
			</a>
			
		</div><!-- /.container-fluid -->
	</nav>
	
	
	<?php
}

function loadNavigationSimple($goUpDir = false) {
	$dirPrefix = ($goUpDir) ? "../" : "";
	?>
	
	<!-- Navigation -->
	<nav id="navigation" class="navigation-shrink-perm">
		<div class="container">
	
			<!-- Brand -->
			<div class="navigation-brand">
				<a href="<?php echo $dirPrefix; ?>index">T9Hacks</a>
			</div>
				
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navigation-simple">
	 			<a href="<?php echo $dirPrefix; ?>index" class="btn btn-l">Back to Home</a>
			</div>
			
			<!-- MLH Trust Badge -->
			<a id="mlh-trust-badge" href="https://mlh.io/seasons/s2016/events?utm_source=s2016&utm_medium=TrustBadge&utm_campaign=s2016" target="_blank">
				<img src="https://s3.amazonaws.com/logged-assets/trust-badge/s2016.png" alt="MLH Official - Spring 2016">
			</a>
	
		</div>
	</nav>
	
<?php 
}





?>