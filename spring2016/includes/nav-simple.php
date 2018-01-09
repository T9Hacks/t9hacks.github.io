<?php 
function nav($up = false) {
	$p = ($up) ? "../" : "";
	?>
	
	<!-- Navigation -->
	<nav id="navigation" class="navigation-shrink-perm">
		<div class="container">
	
			<!-- Brand -->
			<div class="navigation-brand">
				<a href="<?php echo $p; ?>index">T9Hacks</a>
			</div>
				
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navigation-simple">
	 			<a href="<?php echo $p; ?>index" class="btn btn-l">Back to Home</a>
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