<?php 

include 'RegisterFunctions.php';
include 'GeneralHelper.php';

//printArray($_POST);

$resultArray = array(
	"SUCCESS"	=> false,
	"MESSAGE"	=> "Start",
	
	"MISSING_INPUTS"	=> -1,
	"NO_UNREGISTER"		=> -1,
);



/* **************************** */
/* 		Test For Inputs			*/
/* **************************** */
// test - inputs exist
if( !array_key_exists('key', $_POST) || !array_key_exists('type', $_POST) ) {
	
	// bad - inputs exist
	$resultArray["MISSING_INPUTS"] = 1;
	$resultArray["MESSAGE"] = "There was a problem with your submission. It looks like pieces of it are missing. Please refresh the page and start again.";

// success - inputs exist
} else {
	
	// good - inputs exist
	$resultArray["MISSING_INPUTS"] = 0;
	
	
	// unregister
	$isParticipant = ($_POST["type"] == "participant") ? true : false;
	$res = reRegisterPerson($isParticipant, $_POST["key"]);
	
	if($res) {
		$resultArray["SUCCESS"] = true;
		$resultArray["NO_UNREGISTER"] = 0;
		$resultArray["MESSAGE"] = "SUCCESS!!!";
	} else {
		$resultArray["NO_UNREGISTER"] = 1;
		$resultArray["MESSAGE"] = "There was an error processing your request.  Please refresh the page and start again.";
	}

}



// json encode array
$jsonResult = json_encode($resultArray);

// print array to screen as results
print_r($jsonResult); 
	

?>