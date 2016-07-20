/* toggle button for show/hide email form */
$("#sponsorEmailBtn").click(function(){
	$("#sponsorEmailDiv").slideToggle();
});

/* submit button for email form */
$("#sponsorEmailSubmit").click(function(event){
	// first, prevent default
	event.preventDefault();
	
	
	// delete any old error messages
	$("#sponsorEmailDiv .fieldError").remove();
	$("#sponsorEmailDiv .error").removeClass("error").html("");
	
	
	// errors
	var errorCount = 0;
	
	// array of divs that must be checked
	var inputDivs = [$("#sponsorName"), $("#sponsorEmail"), $("#sponsorMessage"), $("#sponsorAddition")];
	
	// array of error messages
	var inputErrors = [ "You must enter your name.", "You must enter your email.", "You must enter a message.", "You must answer this question" ];
	
	// loop through the inputs
	for(var i=0; i<inputDivs.length; i++) {
		var inputVal = inputDivs[i].val();
		if(inputVal == null || inputVal == "") {
			errorCount++;
			inputDivs[i].parent().parent().append('<div class="fieldError error">' + inputErrors[i] + '</div>');
			console.log("error: " + inputErrors[i]);
		} else {}
	}
	
	// show general error
	if(errorCount > 0) {
		$("#sponsorEmailResult").show().addClass("error").html("It looks like there was a problem with your submission.  Please fix any problems and submit again.");
	}
	//console.log("errorCount: " + errorCount);
	
	
	// if no errors, submit
	if(errorCount == 0) {
		
		// get divs
		var $formDiv	= $("#sponsorEmailForm");
		var $resultDiv	= $("#sponsorEmailResult");
		
		// get the data
		var data = new FormData($formDiv[0]);
		
		// store the url
		var url = $formDiv.attr("action");
		
		// post the data
		$.ajax({
			type: "POST",
			url: url,
			data: data,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(xhr, status, error) {
				// everything went well
				if(xhr.SUCCESS) {
					//console.log("success");
					doSuccess();
				  
				// start trouble shooting problems
				} else {
					// print entire json response
					console.log(xhr);
					console.log(status);
					console.log(error);
					
					// get the message
					var errorMessage = xhr.MESSAGE;
					console.log(errorMessage);
				  
					// print error to screen
					$resultDiv.html(errorMessage).addClass("error");
				}
				
			},
			error: function(xhr, status, error) {
				// print entire json response
				console.log(xhr);
				console.log(status);
				console.log(error);
				
				// get the error
				var errorMessage = xhr.responseText;
				console.log(errorMessage);
				
				// print error to screen
				$resultDiv.html(errorMessage).addClass("error");
			}
		});
	} // end if errors

});

function doSuccess() {
	$("#sponsorEmailForm").hide();
	$("#sponsorEmailSuccess").show();
	
	setTimeout(function(){
		$("#sponsorEmailDiv").slideToggle();
	}, 4000);
	
}
