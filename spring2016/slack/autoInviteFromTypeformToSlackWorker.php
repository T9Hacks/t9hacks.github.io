<?php 
// all this is generated from
// https://levels.io/slack-typeform-auto-invite-sign-ups/

// Your typeform lives in this URL:
// https://kosba.typeform.com/to/KWtGit
$typeformFormId = "KWtGit";

// Your Typeform API key ($typeformApiKey) can be found here:
// https://admin.typeform.com/account
$typeformApiKey = '89b5c03a5171dddaf6f6d66d1ac21f4ef22ba246';

// Typeform has a Data API which allows you to get the contents of your forms in JSON with this url:
$typeformUrl = "https://api.typeform.com/v0/form/$FormUID?key=$typeformAPIKey&completed=true&offset=0";

// The textfield_xxxxxxx value is the ID of the respective text field in your Typeform.
// For the email and name field ID you need to do an API call first though:
$typeformEmailField = 'textfield_17042444';
$typeformNameField = 'textfield_17042453';




// POST data when we invite people on Slack’s web interface:
// It posts data to this URL:
// https://hashtagnomads.slack.com/api/users.admin.invite?t=1416723927
/* So users.admin.invite is an undocumented method. The ?t= is a simple epoch or unix time. 
 * The POST data is here:
		email:example@example.com
		channels:C02RWGV3X,C02S05WJA,C02SU0WLE,C02S2B5CH,C02RVB0CK,C02SPEMBY
		first_name:Example
		token:xoxs-255168432
		set_active:true
		_attempts:1
 */
// generate token at https://api.slack.com/
$slackAuthToken = "xoxp-13821960546-13962991233-20679974532-26066b9d74";





// Now let’s make into a script that runs regularly to keep inviting new sign ups. Sorry it’s PHP, I know. Life happens.
// First specify the config vars (don’t worry I faked all the API keys and tokens in this post, you can stop tweeting me now haha!)

date_default_timezone_set('America/Denver');
mb_internal_encoding("UTF-8");

// your slack team/host name 
$slackHostName = "t9hacks";

// find this when checking the post at https://nomadslack.slack.com/admin/invites/full
// $slackAutoJoinChannels = 'C02RWGV3X,C02S05WJA,C02SU0WLE,C02S2B5CH,C02RVB0CK,C02SPEMBY';
// you can sniff from the POST call when you invite users through the web interface. That’s the channels the new 
// user is invited into automatically. Remember if you remove a channel from Slack, but it will still be here, the 
// invite will fail with “Error: channel_not_found”.
$slackAutoJoinChannels ='';



// We use a JSON text file to keep track of who we have invited already, to avoid useless API calls to Slack. 
// This filename is specified in $previouslyInvitedEmailsFile. The ?offset= for the Typeform API uses the 
// $previouslyInvitedEmails count and lets you only requests the new sign ups.
$previouslyInvitedEmailsFile = 'previouslyInvitedEmails.json';






// We continue.
if(@!file_get_contents($previouslyInvitedEmailsFile)) {
	$previouslyInvitedEmails=array();
}
else {
	$previouslyInvitedEmails=json_decode(file_get_contents($previouslyInvitedEmailsFile),true);
}
$offset=count($previouslyInvitedEmails);

$typeformApiUrl='https://api.typeform.com/v0/form/'.$typeformFormId.'?key='.$typeformApiKey.'&completed=true&offset='.$offset;

if(!$typeformApiResponse=file_get_contents($typeformApiUrl)) {
	echo "Sorry, can't access API";
	exit;
}

$typeformData=json_decode($typeformApiResponse,true);

$usersToInvite=array();
foreach($typeformData['responses'] as $response) {
	$user['email']=$response['answers'][$typeformEmailField];
	$user['name']=$response['answers'][$typeformNameField];
	if(!in_array($user['email'],$previouslyInvitedEmails)) {
		array_push($usersToInvite,$user);
	}
}
	
	
// We go through Typeform API’s response to see which emails we already invited before and which are new. We save 
// the new ones in $userToInvite.









// Then we hit Slack’s API:

$slackInviteUrl='https://'.$slackHostName.'.slack.com/api/users.admin.invite?t='.time();

$i=1;
foreach($usersToInvite as $user) {
	echo date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - Inviting to ".$slackHostName." Slack\n";
	
	$fields = array(
		'email' => urlencode($user['email']),
		'channels' => urlencode($slackAutoJoinChannels),
		'first_name' => urlencode($user['name']),
		'token' => $slackAuthToken,
		'set_active' => urlencode('true'),
		'_attempts' => '1'
	);
	
	// url-ify the data for the POST
	$fields_string='';
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	// open connection
	$ch = curl_init();
	
	// set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	// exec
	$replyRaw = curl_exec($ch);
	$reply=json_decode($replyRaw,true);
	
	if($reply['ok']==false) {
		echo date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - ".'Error: '.$reply['error']."\n";
	}
	else {
		echo date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - ".'Invited successfully'."\n";
	}
	
	// close connection
	curl_close($ch);
	
	array_push($previouslyInvitedEmails,$user['email']);
	
	$i++;
}






// The $fields array is an exact replica of the POST call Slack’s web interface made before. The echo calls are 
// simply to log everything and show me what’s going on. If Slack’s API replies ok=true, an invite has been 
// successful. After each invite, we add the email to $previouslyInvitedEmails which we then save:

file_put_contents($previouslyInvitedEmailsFile,json_encode($previouslyInvitedEmails));

//I save this script as autoInviteFromTypeformToSlackWorker.php.