<?php 

include 'EmailHelperClass.php';
include 'GeneralHelper.php';


$resultArray = array(
	"SUCCESS"	=> false,
	"MESSAGE"	=> "Start",
	
	"MISSING_INPUTS"	=> -1,
	"HONEYPOT_FILLED"	=> -1,
	"ADDITION_WRONG"	=> -1,
	"EMPTY_INPUTS"		=> -1,
);
$inputValues = array();
$inputValues = $_POST;


/* **************************** */
/* 		Test For Inputs			*/
/* **************************** */
// test - inputs exist
if( !array_key_exists('name', $_POST) || !array_key_exists('email', $_POST) || !array_key_exists('message', $_POST)  || !array_key_exists('honeypot', $_POST) ) {
	
	// bad - inputs exist
	$resultArray["MISSING_INPUTS"] = 1;
	$resultArray["MESSAGE"] = "There was a problem with your form. It looks like pieces of it are missing. Please refresh the page and start again.";

// success - inputs exist
} else {
	
	// good - inputs exist
	$resultArray["MISSING_INPUTS"] = 0;
	
	
	
	
	
	/* ******************************** */
	/* 			Test Honeypot			*/
	/* ******************************** */
	// test - honeypot
	if( $_POST['addition'] != 5 ) {
		
		// bad - honeypot
		$resultArray["ADDITION_WRONG"] = 1;
		$resultArray["MESSAGE"] = "There was a problem verifying that you are human. Please complete the math problem set by the field.";
	
	// success - honeypot
	} else {
		
		// good - honeypot
		$resultArray["ADDITION_WRONG"] = 0;
		
		
		
		
		
		/* ******************************** */
		/* 			Test Honeypot			*/
		/* ******************************** */
		// test - honeypot
		if( !empty($_POST['honeypot']) ) {
			
			// bad - honeypot
			$resultArray["HONEYPOT_FILLED"] = 1;
			$resultArray["MESSAGE"] = "There was a problem verifying that you are human. If a field says to leave it blank, please do so.";
		
		// success - honeypot
		} else {
			
			// good - honeypot
			$resultArray["HONEYPOT_FILLED"] = 0;
			
			
			
			
			
		
		
			$inputValues = array(
				"name"		=> $_POST["name"],
				"email"		=> $_POST["email"],
				"message"	=> $_POST["message"]
			);
			
			
			/* ******************************** */
			/* 		Test For Empty Inputs		*/
			/* ******************************** */
			// count empty inputs
			$emptyInputs = 0;
			foreach($inputValues as $k => $v) {
				if( $v == null || empty($v) || $v == "" || removeWhiteSpace($v) == "" )
					$emptyInputs++;
			}
			
			// test - empty inputs
			if($emptyInputs != 0) {
				
				// bad - empty inputs
				$resultArray["EMPTY_INPUTS"] = 1;
				$resultArray["MESSAGE"] = "There was a problem with your registration.  Please check to make sure you have the required information entered in the form.";
			
			// success - empty inputs
			} else {
				
				// good - empty inputs
				$resultArray["EMPTY_INPUTS"] = 0;
		
			
				// send email
				$result = EmailHelperClass::createAndSendEmail_SponsorEmail($inputValues["name"], $inputValues["email"], $inputValues["message"]);
				$resultMessage = ($result) ? "Success!" : "There was a problem sending a email.  Please resubmit the form.";
				
				// create result array
				$resultArray = array(
					"SUCCESS"	=> $result, 
					"MESSAGE"	=> $resultMessage
				);
			
			} // end - empty test
			
		} // end - addition test
			
	} // end - honeypot test
	
} // end - inputs exist



// json encode array
$jsonResult = json_encode($resultArray);

// print array to screen as results
print_r($jsonResult); 

// send registration an email
//printArray($allInputValues); die();
EmailHelperClass::createAndSendEmail_Sponsor($resultArray, $inputValues);


die();


?>
