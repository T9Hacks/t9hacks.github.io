<?php
include_once '../EmailHelperClass.php';

$styles = EmailHelperClass::getEmailStyles();
$linkStyles = $styles['linkStyles'];
		

echo EmailHelperClass::createEmailHeader();
?>

<tr><td style='padding: 20px 20px 0 20px;'>
	<h2>Hi [[NAME]],</h2>
	<p>This is your last application notice for T9Hacks Spring 2016!</p>
</td></tr>

<tr><td style='padding: 0 20px;'>
	<hr/>
</td></tr>
	
<tr><td style='padding: 0 20px;'>
	<p>
		Your friend started your application for 
		<a href='www.t9hacks.org' style='<?php echo $linkStyles; ?>' target='_blank' wotsearchprocessed='true'>T9Hacks</a>.
	</p>
	<p>
		T9Hacks is a 24 hour women's hackathon promoting gender diversity in technology.  It is held
		at the University of Colorado Boulder's ATLAS Institute on Feb 20-21.  T9Hacks brings students together 
		for a weekend of creativity, building, and hacking.
	</p>
	<p><b>
		Your friend has started your application, but to be considered for a spot at T9Hacks you will need to 
		complete your registration form.  If you do not complete your registration form by the end of Sunday, 
		February 7, 2016, we will remove your registration.
	</b></p>
	<p>
		Click on this link: 
		<br/>
		<a href='[[LINK]]' style='<?php echo $linkStyles; ?>' target='_blank' wotsearchprocessed='true'>[[LINK]]</a> 
		<br/>
		(or copy and paste it into a web browser)  
		to go to the application page.
	</p>
	<p>
		Thank you,<br/>
		T9Hacks Team
	</p>
</td></tr>

<?php 
echo EmailHelperClass::createEmailFooter("[[NAME]]");
?>