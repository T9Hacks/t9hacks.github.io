<?php 
function loadCSSForPage($pageName) {
	$dirPrefix = "";
	if ($pageName == "signup")
		$dirPrefix = "../";
	?>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo $dirPrefix; ?>images/favicon.ico" type="image/x-icon">
	
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo $dirPrefix; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
	<link href="<?php echo $dirPrefix; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Rajdhani' rel='stylesheet' type='text/css'>
	
	<!-- Custom CSS -->
	<link href="<?php echo $dirPrefix; ?>css/1140.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo $dirPrefix; ?>css/hackathon.css" rel="stylesheet" type="text/css" media="all">
	<?php 
	switch ($pageName) {
		case "home":
			?>  
			<link href="css/inputs.css" rel="stylesheet" type="text/css" media="all"> 
			<?php 
			break;
		case "team":
			?> 
			<link href="css/team1.css" rel="stylesheet" type="text/css" media="all"> 
			<?php 
			break;
		case "schedule":
			?> 
			<link href="css/schedule.css" rel="stylesheet" type="text/css" media="all"> 
			<?php 
			break;
		case "signupStart":
			$p = "";
		case "signup":
			?> 
			<link href="<?php echo $dirPrefix; ?>css/signup.css" rel="stylesheet" type="text/css" media="all"> 
			<link href="<?php echo $dirPrefix; ?>css/inputs.css" rel="stylesheet" type="text/css" media="all">
			<?php 
			break;
		case "slack":
			?>
			<link href="css/signup.css" rel="stylesheet" type="text/css" media="all">
			<link href="css/slack.css" rel="stylesheet" type="text/css" media="all"> 
			<link href="css/inputs.css" rel="stylesheet" type="text/css" media="all"> 
			<?php 
			break;
		case "secret":
			?> 
			<link href="css/secret.css" rel="stylesheet" type="text/css" media="all"> 
			<?php 
			break;
	}
}

function loadFacebookMetaTags() {
	echo '<meta property="fb:app_id"			content="1734809350067997" />';
	echo '<meta property="og:site_name"			content="T9Hacks" />';
	echo '<meta property="og:type"				content="website" />';
	echo '<meta property="og:image"				content="http://www.t9hacks.org/images/block_t9purple.jpg" />';
	echo '<meta property="og:description"		content="T9Hacks is a 24 hour women\'s hackathon at the University of Colorado Boulder\'s ATLAS Institute that brings together college students for two days of creativity, building, and hacking." />';
	echo '<meta property="og:url"				content="http://www.t9hacks.org" />';
	echo '<meta property="og:title"				content="T9Hacks // A women\'s hackathon promoting gender diversity in technology" />';
	
}


?>