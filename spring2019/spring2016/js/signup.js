var canReload = false;
$(document).ready(function(){
	fillConformationTableWithInputs();
	
	
});

function fillConformationTableWithInputs() {
	// get the text inputs
	$("input[type=text]").each(function(){
		var name = $(this).attr("name");
		$(this).change(function(){
			var cellValue = $(this).val();
			$("#"+name).html( cellValue );
		});
		var cellValue = $(this).val();
		$("#"+name).html( cellValue );
	});
	
	// get the textaras
	$("textarea").each(function(){
		var name = $(this).attr("name");
		$(this).change(function(){
			var cellValue = $(this).val()
			$("#"+name).html( cellValue );
		});
		var cellValue = $(this).val()
		$("#"+name).html( cellValue );
	});
	
	// get the checkboxes
	$("input[type=checkbox]").each(function(){
		var name = $(this).attr("name");
		$(this).change(function(){
			var cellValue = ( ($(this).prop("checked")) ? '<i class="fa fa-check-square-o"></i>' : "" );
			$("#"+name).html( cellValue );
		});
		var cellValue = ( ($(this).prop("checked")) ? '<i class="fa fa-check-square-o"></i>' : "" );
		$("#"+name).html( cellValue );
	});
	
	// get the radio buttons
	$("input[type=radio]").each(function(){
		var name = $(this).attr("name");
		$(this).change(function(){
			if($(this).prop("checked")) {
				var cellValue = $(this).val();
				$("#"+name).html( cellValue );
			}
		});
		if($(this).prop("checked")) {
			var cellValue = $(this).val();
			$("#"+name).html( cellValue );
		}
	});
	
}

/* On change event for resume uploading */
$("#resumeUploadInput").change(function() {
	var res = (this.value).split("\\");
	var file = res[res.length-1];
	$("#pResumeName").val(file);
	$("#resumeName").html(file);
});




/* On change events for	mentor confirmation table */
/*$("#mentorName")		.change(function(){ mName();		});
$("#mentorEmail")		.change(function(){ mEmail();		});
$("#mentorPhone")		.change(function(){ mPhone();		});
$("#mentorGender")		.change(function(){ mGender();		});
$("#mentorCompany")		.change(function(){ mCompany();		});
$("#mentorPosition")	.change(function(){ mPosition();	});

$("#mentorBreakfast")	.change(function(){ mBreakfast();	});
$("#mentorLunch")		.change(function(){ mLunch();		});
$("#mentorDinner")		.change(function(){ mDinner();		});

$("#mentorArea")		.change(function(){ mArea();		});
$("#mentorComment")		.change(function(){ mComment();		});*/


/* Functions for mentor confirmation table */
/*function mName()		{ $("#mName")		.html( $("#mentorName")		.val()); }
function mEmail()		{ $("#mEmail")		.html( $("#mentorEmail")	.val()); }
function mPhone()		{ $("#mPhone")		.html( $("#mentorPhone")	.val()); }
function mGender()		{ $("#mGender")		.html( $("#mentorGender")	.val()); }
function mCompany()		{ $("#mCompany")	.html( $("#mentorCompany")	.val()); }
function mPosition()	{ $("#mPosition")	.html( $("#mentorPosition")	.val()); }

function mBreakfast()	{  }
function mLunch()		{ $("#mLunch")		.html( (($("#mentorLunch")		.prop("checked")) ? '<i class="fa fa-check-square-o"></i>' : "") ); }
function mDinner()		{ $("#mDinner")		.html( (($("#mentorDinner")		.prop("checked")) ? '<i class="fa fa-check-square-o"></i>' : "") ); }

function mArea()		{ $("#mArea")		.html( $("#mentorArea")		.val()); }
function mComment()		{ $("#mComment")	.html( $("#mentorComment")	.val()); }*/

/* on change friend confirmation table */
/*$("#friendName1")	.change(function(){ $("#fName1")	.html( $("#friendName1").val());	});
$("#friendEmail1")	.change(function(){ $("#fEmail1")	.html( $("#friendEmail1").val());	});

$("#friendName2")	.change(function(){ $("#fName2")	.html( $("#friendName2").val());	});
$("#friendEmail2")	.change(function(){ $("#fEmail2")	.html( $("#friendEmail2").val());	});

$("#friendName3")	.change(function(){ $("#fName3")	.html( $("#friendName3").val());	});
$("#friendEmail3")	.change(function(){ $("#fEmail3")	.html( $("#friendEmail3").val());	});*/


/* On change events for friends */
$("input[type=radio][name=friends]").change(function(){ 
	var n = $(this).val(); 
	var h = $(".regBtn").attr("href");
	$(".regBtn").attr("href", h.slice(0, -1) + n);
});


// turn off reload for reg buttons
$(".regBtn").click(function(){ canReload = true; });


/* ******************************************** */
/*			Sign-up Form to 					*/
/* 			Confirmation Table					*/
/* ******************************************** */
// confirmation button, hides form and shows confirmation table
$(".confirmationBtn").click(function(event){
	event.preventDefault();

	$(".signupLoading").show();
	setTimeout(function(){
		$(".signupLoading").hide();
		$(".signupForm").hide();
		$(".signupConfirmation").show();
	}, 700);
	
	animateToTop($(".signupTop"));
});

//back to edit button, shows form and hides confirmation table
$(".backToEditBtn").click(function(event){
	event.preventDefault();
	showForm();
});
function showForm() {
	$(".signupForm").show();
	$(".signupConfirmation").hide();
	
	animateToTop($(".signupTop"));
}





/* **************************************************************** */
/*					Submit Registeration							*/
/*	Code adapted from: http://www.html5rocks.com/en/tutorials/cors  */
/* **************************************************************** */

$("#mentorSubmitBtn").click(function(event){
	var f = $(this).attr("data-friends");
	submitSignup(event, false, f);
});

$("#participantSubmitBtn").click(function(event){
	var f = $(this).attr("data-friends");
	submitSignup(event, true, f);
});


function submitSignup(event, isParticipant, numFriends) {
	// first, prevent default
	event.preventDefault();
	
	
	// delete any old error messages
	$(".fieldError").remove();
	$(".error").removeClass("error").html("");
	
	
	// create the ids
	var prefix = (isParticipant) ? "participant" : "mentor";
	var hashPrefix = "#" + prefix;
	var $nameDiv	= $(hashPrefix + "Name");
	var $emailDiv	= $(hashPrefix + "Email");
	var $phoneDiv	= $(hashPrefix + "Phone");
	var $collegeDiv	= $(hashPrefix + "College");
	var $majorDiv	= $(hashPrefix + "Major");
	var $genderDiv	= $(hashPrefix + "Gender");
	var $codeDiv	= $("#agree");
	
	var $topDiv		= $(hashPrefix + "Top");
	var $loadingDiv	= $(hashPrefix + "Loading");
	var $resultDiv	= $(hashPrefix + "Result");
	var $formDiv	= $(hashPrefix + "Form");
	var $confirmationDiv = $(hashPrefix + "Confirmation");
	
	
	// errors
	var errorCount = 0;
	
	// array of divs that must be checked
	var inputDivs = [$codeDiv, $nameDiv, $emailDiv, $phoneDiv, $genderDiv];
	
	// array of error messages
	var inputErrors = [
		"You must agree to the Code of Conduct.",
		"You must enter your email.",
		"You must enter your name.",
		"You must enter your phone number.",
		"You must enter your gender."
	];
	if(isParticipant) {
		inputDivs.push($collegeDiv);
		inputErrors.push("You must enter your college.");
		
		inputDivs.push($majorDiv);
		inputErrors.push("You must enter your major.");
	} else {
		inputDivs.push($("#mentorArea"));
		inputErrors.push("You must enter an area.");
	}
	for(var i=0; i<numFriends; i++) {
		var fid = i+1;
		inputDivs.push($("#friendName" + fid));
		inputErrors.push("You must enter their name.");
		inputDivs.push($("#friendEmail" + fid));
		inputErrors.push("You must enter their email.");
	}
	
	// loop through the inputs
	for(var i=0; i<inputDivs.length; i++) {
		var inputVal = inputDivs[i].val();
		if(
			( i == 0 && !inputDivs[i].prop("checked") ) ||
			( i >  0 && (inputVal == null || inputVal == "" ) )
		) {
				errorCount++;
				inputDivs[i].parent().parent().append('<div class="fieldError error">' + inputErrors[i] + '</div>');
				console.log("inputVal: " + inputVal + " inputDivs[i]: " + inputDivs[i]);
		}
	}
	
	if(errorCount > 0) {
		$(".signupResult").addClass("error").html("It looks like there was a problem with your submission.  Please fix any problems and submit again.");
		showForm();
	}
	
	
	//console.log("errorCount: " + errorCount);
	// only show if no errors
	if(errorCount == 0) {
		
		// show the loading gif
		var h = $topDiv.height();
		var w = $formDiv.width();
		var h40 = h + 40;
		var w40 = w + 40;
		$loadingDiv.height(h40).width(w40);
		$loadingDiv.fadeIn(100);
		
		// get the data
		var data = new FormData($formDiv[0]);
		//console.log(data);
		
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
					setTimeout(function(){
						doSuccess(isParticipant);
					}, 1000);
				  
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
					$loadingDiv.fadeOut();
					showForm();
				}
				
				// scroll to top
				animateToTop($topDiv);
				
			},
			error: function(xhr, status, error) {
				//console.log("error in ajax form submission");
				console.log(xhr);
				console.log(status);
				console.log(error);
				var errorMessage = xhr.responseText;
				console.log(errorMessage);
				$resultDiv.html(errorMessage).addClass("error");
				$loadingDiv.fadeOut();
				showForm();
				
				// scroll to top
				animateToTop($topDiv);
			}
		});
	} // end if errors
	
}

function animateToTop($topDiv) {
	// scroll to top
	$('html, body').animate({
		scrollTop: ($topDiv.offset().top - 81)
	}, 500);
}

function doSuccess(isParticipant) {
	canReload = true;
	if(!isParticipant)
		window.location.href = "signup-success.php?t=3";
	else
		window.location.href = "signup-success.php?t=4";
}

window.onbeforeunload = function (e) {
	if(!canReload) {
		e = e || window.event;
		var t = "If you leave this page, your progress will be lost.";
		if (e) {
			e.returnValue = t;
		}
		return t;
	}
};





/* **************************************************************** */
/*					Submit Registeration							*/
/*	Code adapted from: http://www.html5rocks.com/en/tutorials/cors  */
/* **************************************************************** */
$(".cancelRegBtn").click(function(event){
	event.preventDefault();
	$(".cancelConfirm").slideToggle();
});
$(".cancelRegConfirm").click(function(event){
	event.preventDefault();
	var key = $("#key").val();
	var type = $("#type").val();
	console.log("key: " + key + " type: " + type);
	var data = { 
		"key" : key, 
		"type" : type
	};
	
	// post the data
	$.ajax({
		type: "POST",
		url: "../signupScripts/cancelRegister.php",
		data: data,
		dataType: 'json',
		success: function(xhr, status, error) {
			// everything went well
			if(xhr.SUCCESS) {
				window.location.href = "unregister-success.php";
				canReload = true;
			  
			// start trouble shooting problems
			} else {
				// print entire json response
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
			
		},
		error: function(xhr, status, error) {
			//console.log("error in ajax form submission");
			console.log(xhr);
			console.log(status);
			console.log(error);
			var errorMessage = xhr.responseText;
			console.log(errorMessage);
		}
	});
});


$(".reRegBtn").click(function(event){
	event.preventDefault();
	var key = $("#key").val();
	var type = $("#type").val();
	//console.log("key: " + key + " type: " + type);
	var data = { 
		"key" : key, 
		"type" : type
	};
	
	// post the data
	$.ajax({
		type: "POST",
		url: "../signupScripts/reRegister.php",
		data: data,
		dataType: 'json',
		success: function(xhr, status, error) {
			// everything went well
			if(xhr.SUCCESS) {
				canReload = true;
				if(type == "participant")
					window.location.href = "signup-participant2.php?key=" + key;
				if(type == "mentor")
					window.location.href = "signup-mentor2.php?key=" + key;
				
			// start trouble shooting problems
			} else {
				// print entire json response
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
			
		},
		error: function(xhr, status, error) {
			//console.log("error in ajax form submission");
			console.log(xhr);
			console.log(status);
			console.log(error);
			var errorMessage = xhr.responseText;
			console.log(errorMessage);
		}
	});
});
